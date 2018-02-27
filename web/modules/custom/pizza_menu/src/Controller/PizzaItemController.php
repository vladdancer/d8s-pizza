<?php

namespace Drupal\pizza_menu\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\ex_pizza_menu\Services\PizzaMenuInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ContainerInterface;

class PizzaItemController extends ControllerBase {
		
		protected $pizzaItemService;
		
		public function __construct(PizzaMenuInterface $menuService)	{
				$this->pizzaItemService = $menuService;
		}

		public static function create(ContainerInterface $container) {
				return new static(
						$container->get('ex_pizza_menu')
				);
		}
		
		public function render (Request $request, $product) {
				$pizzaItem = $this->pizzaItemService->getItem();
        return [
            '#theme' => 'pizza_item',
            '#content' => $pizzaItem[$product],
        ];
    }
    public function getTitle($product) {
				$pizzaItem = $this->pizzaItemService->getAll();
				return $pizzaItem[$product]->title;
		}
}
