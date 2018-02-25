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


  protected $referenceID;

  public function __construct()
  {
//    $this->referenceID = $referenceID;
  }

  public function getReferenceID()
  {
//    return $this->referenceID;
  }

  public function myEventDescription() {
    return "This is pizza_menu example event";
  }

}