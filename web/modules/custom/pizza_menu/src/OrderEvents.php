<?php
/**
 * Created by PhpStorm.
 * User: ioncracea
 * Date: 2/27/18
 * Time: 8:52 PM
 */

namespace Drupal\pizza_menu;


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