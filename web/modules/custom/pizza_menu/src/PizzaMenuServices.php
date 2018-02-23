<?php

namespace Drupal\pizza_menu;

/**
 * Class PizzaMenuServices.
 */
class PizzaMenuServices implements PizzaMenuServicesInterface {

  protected function getData() {
    $json = file_get_contents('http://www.json-generator.com/api/json/get/bQdXQHhViW?indent=2');
  }

  /**
   * @return string
   */
  public function getAll() {
    $json = self::getData();
      return $json;
  }

  /**
   * @return string
   */
  public function get() {
    $json = self::getData();
      return $json;
  }

}
