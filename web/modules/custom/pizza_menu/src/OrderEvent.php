<?php
namespace Drupal\pizza_menu;

use Symfony\Component\EventDispatcher\Event;

class OrderEvent extends Event {

  /**
   * Changed order status
   */
  const STATUS = 'event.order.status';

  /**
   * Order Add
   */
  const ADD = 'event.order.add';

  /**
   * Order Update
   */
  const UPDATE = 'event.order.update';

  /**
   * Delete order
   */
  const DELETE = 'event.order.delete';


  protected $order_id;

  public function __construct($order_id)
  {
    $this->order_id = $order_id;
  }

  public function getOrderId()
  {
    return $this->$order_id;
  }

  public function myEventDescription() {
    return "This is pizza_menu example event";
  }

}