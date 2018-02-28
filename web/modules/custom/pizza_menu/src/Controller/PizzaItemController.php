<?php

namespace Drupal\pizza_menu\Controller;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Controller\ControllerBase;
use Drupal\ex_pizza_menu\Services\PizzaMenuSeriviceInterface;
use Drupal\pizza_menu\Command\GetPizzaItemCommand;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ContainerInterface;

class PizzaItemController extends ControllerBase {
		
  protected $pizzaItemService;

  public function __construct(PizzaMenuSeriviceInterface $menuService)	{
    $this->pizzaItemService = $menuService;
  }

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('ex_pizza_menu')
    );
  }

  public function getTitle($product) {
    $pizzaItem = $this->pizzaItemService->getAll();
    return $pizzaItem[$product]->title;
  }

  public function render (Request $request, $product) {
    $pizzaItem = $this->pizzaItemService->getItem($product);
    $is_ajax = \Drupal::request()->isXmlHttpRequest();
    $markup = [
      '#theme' => 'pizza_item',
      '#content' => $pizzaItem,
    ];
    if ($is_ajax) {
      $response = new AjaxResponse();
      $markup = $response->addCommand(new GetPizzaItemCommand($markup));
    }
    return $markup;
  }
}
