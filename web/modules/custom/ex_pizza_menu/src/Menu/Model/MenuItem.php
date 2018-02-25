<?php
/**
 * Created by PhpStorm.
 * User: VladDancer
 * Date: 2/24/18
 * Time: 11:25 PM
 */

namespace Drupal\ex_pizza_menu\Menu\Model;


class MenuItem {

  protected $id;

  protected $uuid;

  protected $price;

  protected $picture;

  protected $ingradietns;

  protected $description;

  protected $badge;

  public $title;

  public function __toString() {
    return $this->title;
  }
  
  public function getTitle() {
    return $this->title;
  }

  public function getDescription() {
    return $this->description;
  }

}