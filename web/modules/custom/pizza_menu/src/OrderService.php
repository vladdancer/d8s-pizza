<?php

namespace Drupal\pizza_menu;

/**
 * Class OrderService.
 */
class OrderService implements OrderServiceInterface {
  const ORDER_TABLE = 'pizza_menu_order';

  /**
   * @var Order ID
   */
  protected $id;

  /**
   * @var Order status
   */
  public $status;

  /**
   * @var Created Timestamp
   */
  public $created;

  /**
   * @var Chnaged Timestamp
   */
  public $changed;

  /**
   * Constructs a new OrderService object.
   */
  public function __construct() {

  }

  /**
   * Get all orders
   * @return
   */
  function get_order_all(){
    return $query = \Drupal::database()->select(self::ORDER_TABLE, 'ord')
      ->fields('ord')
      ->execute()
      ->fetchAllAssoc();
  }

  /**
   * Get order object
   * @param $order_id
   * @return
   */
  function get_order($order_id){
    return $query = \Drupal::database()->select(self::ORDER_TABLE, 'ord')
      ->fields('ord')
      ->condition('ord.id', $order_id, '=');

      // Execute the statement
      $data = $query->execute();
      return $data->fetchObject();
  };

  /**
   * Create new order
   * @param $order
   * @return \Drupal\Core\Database\StatementInterface|int|null
   */
  function set_order($order){
    return $query = \Drupal::database()->insert(self::ORDER_TABLE)
      ->fields($order)
      ->execute();
  };

  /**
   * Update order
   * @param $order_id
   * @param $fields
   * @return \Drupal\Core\Database\StatementInterface|int|null
   */
  function update_order($order_id, $fields = array()){
    return $query = \Drupal::database()->update(self::ORDER_TABLE)
      ->fields($fields)
      ->condition('id',$order_id)
      ->execute();
  }


  /**
   * Remove Order
   * @param $order_id
   * @return \Drupal\Core\Database\StatementInterface|int|null
   */
  function remove_order($order_id){
    return $query = \Drupal::database()->update(self::ORDER_TABLE)
      ->fields(array('deleted' => 1))
      ->condition('id', $order_id)
      ->execute();
  }

}
