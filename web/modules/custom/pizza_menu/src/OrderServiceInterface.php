<?php

namespace Drupal\pizza_menu;

/**
 * Interface OrderServiceInterface.
 */
/**
 * Interface OrderServiceInterface
 * @package Drupal\pizza_menu
 */
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
