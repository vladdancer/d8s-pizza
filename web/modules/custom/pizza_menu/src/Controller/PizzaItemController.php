<?php

namespace Drupal\pizza_menu\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\ex_pizza_menu\Services\PizzaMenuSeriviceInterface;
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
		
		public function render (Request $request, $product) {
        $pizzaItem = $this->pizzaItemService->getItem($product);
        return [
            '#theme' => 'pizza_item',
            '#content' => $pizzaItem,
        ];
    }
    public function getTitle($product) {
				$pizzaItem = $this->pizzaItemService->getAll();
				return $pizzaItem[$product]->title;
		}
}
