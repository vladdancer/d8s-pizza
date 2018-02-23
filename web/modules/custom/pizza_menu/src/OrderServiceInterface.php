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
  function get_order_all();

  /**
   * Get order object
   * @param $order_id
   * @return
   */
  function get_order($order_id);

  /**
   * Create new order
   * @param $order
   * @return \Drupal\Core\Database\StatementInterface|int|null
   */
  function set_order($order);

  /**
   * Update order
   * @param $order_id
   * @param $fields
   * @return \Drupal\Core\Database\StatementInterface|int|null
   */
  function update_order($order_id, $fields);


  /**
   * Remove Order
   * @param $order_id
   * @return \Drupal\Core\Database\StatementInterface|int|null
   */
  function remove_order($order_id);
}
