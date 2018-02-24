<?php

namespace Drupal\pizza_menu\Controller;


use Drupal\Core\Controller\ControllerBase;

class PizzaMenuController extends ControllerBase {
    public function render() {
        return [
            '#type' => 'markup',
            '#markup' => 'laidsukgh',
        ];
    }
}