<?php
namespace Drupal\ex_pizza_menu\Services;


interface PizzaMenuInterface {

  public function get($id);

  public function getAll();

}