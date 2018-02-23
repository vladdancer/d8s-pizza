<?php

namespace Drupal\pizza_menu;

/**
 * Class PizzaMenuServices.
 */
class PizzaMenuServices implements PizzaMenuServicesInterface {

  /**
   * Constructs a new PizzaMenuServices object.
   */
  public function __construct() {

  }

    /**
     * @return string
     */
    public function run() {
        return "This is a test Service";
    }

}
