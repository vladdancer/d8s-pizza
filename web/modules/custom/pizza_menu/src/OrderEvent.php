<?php

namespace Drupal\pizza_menu;

use Drupal\pizza_menu\Model\Order;
use Symfony\Component\EventDispatcher\GenericEvent;

class OrderEvent extends GenericEvent {

  /**
   * @var \Drupal\ex_pizza_order\Model\Order;
   */
  protected $order;

  public function __construct(Order $order) {
    parent::__construct();
    $this->order = $order;
  }

  public function getOrder() {
    return $this->order;
  }

}