<?php

namespace Drupal\pizza_menu\Controller;


use Drupal\Core\Controller\ControllerBase;
use Drupal\ex_pizza_menu\Services\PizzaMenuSeriviceInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class PizzaMenuController extends ControllerBase {
    protected $pizzaMenuService;

    public function __construct(PizzaMenuSeriviceInterface $menuService) {
        $this->pizzaMenuService = $menuService;
    }

    public static function create(ContainerInterface $container) {
        return new static(
            $container->get('ex_pizza_menu')
        );
    }

    public function render() {
        $pizzas = $this->pizzaMenuService->getAll();
        return [
            '#theme' => 'pizza_menu',
            '#content' => $pizzas,
            '#attached' => array(
                'library' => array(
                    'pizza_menu/form-command',
                )
            ),
        ];
    }
}
