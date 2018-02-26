<?php
/**
 * Created by PhpStorm.
 * User: VladDancer
 * Date: 2/26/18
 * Time: 12:42 AM
 */

namespace Drupal\ex_pizza_order\Event;


final class OrderEvents {
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

}