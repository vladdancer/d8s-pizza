<?php

namespace Drupal\pizza_menu;
use Drupal\Core\Database\Connection;

/**
 * Class OrderService.
 */
class OrderService implements OrderServiceInterface {
  const ORDER_TABLE = 'pizza_menu_order';

  /**
   * @var Connection
   */
  protected $connection;

  /**
   * id
   * @var
   */
  protected $id;

  /**
   * Order status
   * @var
   */
  public $status;

  /**
   * Created Timestamp
   * @var
   */
  public $created;

  /**
   * Chnaged Timestamp
   * @var
   */
  public $changed;

  /**
   * Constructs a new OrderService object.
   */
  public function __construct(Connection $connection) {
    $this->connection = $connection;
  }

  /**
   * Get all orders
   * @return
   */
  function getOrderAll(){
    return $this->connection->select(self::ORDER_TABLE, 'ord')
      ->fields('ord')
      ->execute();
  }

  /**
   * Get order object
   * @param $order_id
   * @return
   */
  function getOrder($order_id){
    return $this->connection->select(self::ORDER_TABLE, 'ord')
      ->fields('ord')
      ->condition('ord.id', $order_id, '=');

      // Execute the statement
      return $query->execute()->fetchObject('id');
  }

  /**
   * Create new order
   * @param $order
   * @return \Drupal\Core\Database\StatementInterface|int|null
   */
  function setOrder($order){
    return $this->connection->insert(self::ORDER_TABLE)
      ->fields($order)
      ->execute();
  }

  /**
   * Update order
   * @param $order_id
   * @param $fields
   * @return \Drupal\Core\Database\StatementInterface|int|null
   */
  function updateOrder($order_id, $fields = array()){
    return $this->connection->update(self::ORDER_TABLE)
      ->fields($fields)
      ->condition('id',$order_id)
      ->execute();
  }


  /**
   * Remove Order
   * @param $order_id
   * @return \Drupal\Core\Database\StatementInterface|int|null
   */
  function removeOrder($order_id){
    return $this->connection->update(self::ORDER_TABLE)
      ->fields(array('deleted' => 1))
      ->condition('id', $order_id)
      ->execute();
  }

}
