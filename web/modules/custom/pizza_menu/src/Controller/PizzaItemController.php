<?php

namespace Drupal\pizza_menu\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;

class PizzaItemController extends ControllerBase {
    public function render (Request $request, $product) {
        return [
            '#type' => 'markup',
            '#markup' => '<h2>'  . $product . '</h2>',
        ];
    }
}
