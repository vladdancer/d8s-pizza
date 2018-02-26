<?php

namespace Drupal\ex_pizza_order;

/**
 * Interface OrderServiceInterface.
 */

use Drupal\ex_pizza_order\Model\OrderInterface;

/**
 * Interface OrderServiceInterface
 * @package Drupal\pizza_menu
 */
interface OrderStorageInterface {

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
