<?php
/**
 * Created by PhpStorm.
 * User: VladDancer
 * Date: 2/26/18
 * Time: 12:48 AM
 */

namespace Drupal\pizza_menu;



use Drupal\Core\Session\AccountInterface;
use Drupal\pizza_menu\Model\OrderInterface;

interface OrderServiceInterface {

  /**
   * Get all orders
   * @return
   */
  function getOrderAll();

  /**
   * Get order object
   * @param $order_id
   * @return
   */
  function getOrder($order_id);

  /**
   * Create new order
   * @param $order
   */
  function createOrder(OrderInterface $order);

  /**
   * Update order
   */
  function updateOrder(OrderInterface $order);

  /**
   * Remove Order
   * @param $order_id
   */
  function removeOrder(OrderInterface $order);
}
