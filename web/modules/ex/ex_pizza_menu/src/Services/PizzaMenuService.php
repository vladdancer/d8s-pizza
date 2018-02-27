<?php
/**
 * Created by PhpStorm.
 * User: VladDancer
 * Date: 2/22/18
 * Time: 5:34 PM
 */

namespace Drupal\ex_pizza_menu\Services;


use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\ex_pizza_menu\Menu\Model\MenuItem;
use Symfony\Component\DependencyInjection\ContainerInterface;

class PizzaMenuService implements PizzaMenuSeriviceInterface {

  const DATA_URL = 'https://next.json-generator.com/api/json/get/4yEcqsqDE';
  const CACHE_KEY = 'cache_ex_pizza_menu_data';

  /**
   * @var CacheBackendInterface
   */
  protected $cache;

  protected $definitions = [];

  protected $items = [];

  public function getAll() {
    $items = [];

    foreach ($this->definitions as $definition) {
      $items[$definition->id] = $this->get($definition);
    }
    return $items;
  }

  public function __construct(CacheBackendInterface $cache) {
      $this->items =  [];
    try {
      $this->cache = $cache;
      $this->definitions = $this->loadData()['data'];
      foreach ($this->loadData()['data'] as $item) {
          $this->definitions[$item->id] = $item;
      }
    }
    catch (\ErrorException $e) {
      drupal_set_message($e->getMessage(), 'error');
    }
  }

  protected function loadData() {
    if ($cache = $this->cache->get(static::CACHE_KEY)) {
      return [
        'data' => $cache->data,
        'means' => 'cache',
      ];
    }
    else {
      $items = json_decode(file_get_contents(static::DATA_URL));

      $this->cache->set(static::CACHE_KEY, $items, CacheBackendInterface::CACHE_PERMANENT);
      return [
        'data' => $items,
        'means' => 'API',
      ];
    }
  }

  protected function createMenuItemfromDefinition($definition) {
    $item = new MenuItem();

    $setValues = \Closure::bind(function ($definition) {
      $this->id = $definition->id;
      $this->title = $definition->title;

      if (isset($definition->badge)) {
        $this->badge = $definition->badge;
      }
      if (isset($definition->description)) {
        $this->description = $definition->description;
      }
      if (isset($definition->ingradients)) {
        $this->ingradients = $definition->ingradients;
      }
    }, $item, '\Drupal\ex_pizza_menu\Menu\Model\MenuItem');
    $setValues($definition);

    return $item;
  }

  public function get($definition) {
    if (!isset($this->items[$definition->id])) {
      $this->items[$definition->id] = $this->createMenuItemfromDefinition($definition);
    }
    return $this->items[$definition->id];
  }

  public function getItem($item_id) {
    if (empty($this->items[$item_id])) {

      $this->items[$item_id] = $this->createMenuItemfromDefinition($this->definitions[$item_id]);
    }
    return $this->items[$item_id];
  }

}