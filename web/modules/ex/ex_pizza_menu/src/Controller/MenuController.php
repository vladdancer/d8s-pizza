<?php

namespace Drupal\ex_pizza_menu\Controller;

use Drupal\Core\Cache\Cache;
use Drupal\Core\Controller\ControllerBase;
use Drupal\ex_pizza_menu\Services\PizzaMenuSeriviceInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class MenuController.
 */
class MenuController extends ControllerBase {

  /**
   * PizzaMenuInterface
   * @var
   */
  protected $menu;

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('ex_pizza_menu')
    );
  }

  public function __construct(PizzaMenuSeriviceInterface $menu_service) {
    $this->menu = $menu_service;
  }


  /**
   * Overview.
   *
   * @return string|array
   *   Return Hello string.
   */
  public function overview() {

    return [
      '#theme' => 'ex_pizza_menu_list',
      '#items' => $this->menu->getAll(),
      //'#cache' => [
        //'max-age' => Cache::PERMANENT,
        //'tags' => ['menu_data'],
      //]
    ];
  }

}
