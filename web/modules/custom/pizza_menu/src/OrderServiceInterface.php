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
   * @return \Drupal\Core\Database\StatementInterface|int|null
   */
  function setOrder($order);

  /**
   * Update order
   * @param $order_id
   * @param $fields
   * @return \Drupal\Core\Database\StatementInterface|int|null
   */
  function updateOrder($order_id, $fields);


  /**
   * Remove Order
   * @param $order_id
   * @return \Drupal\Core\Database\StatementInterface|int|null
   */
  function removeOrder($order_id);
}
