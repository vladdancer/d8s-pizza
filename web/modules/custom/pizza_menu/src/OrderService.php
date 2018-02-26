<?php

namespace Drupal\pizza_menu;

use Drupal\Core\Database\Connection;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Drupal\pizza_menu\OrderEvent;

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
   * @var EventDispatcherInterface
   */
  protected $eventDispatcher;

  /**
   * @var OrderEvent
   */
  protected $orderEvent;
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
  public function __construct(Connection $connection, EventDispatcherInterface $eventDispatcher) {
    //database connectio
    $this->connection = $connection;
    //event dispatcher interface
    $this->eventDispatcher = $eventDispatcher;
    //order event
    $this->orderEvent = new OrderEvent();
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
    //add order
    $this->connection->insert(self::ORDER_TABLE)
    ->fields($order)
    ->execute();

    //dispatch event
    $this->eventDispatcher->dispatch($this->orderEvent::ADD, $this->orderEvent);
  }

  /**
   * Update order
   * @param $order_id
   * @param $fields
   * @return \Drupal\Core\Database\StatementInterface|int|null
   */
  function updateOrder($order_id, $fields = array()){
    $this->connection->update(self::ORDER_TABLE)
      ->fields($fields)
      ->condition('id',$order_id)
      ->execute();

    $this->eventDispatcher->dispatch($this->orderEvent::UPDATE,$this->orderEvent);
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
    $this->eventDispatcher->dispatch($this->orderEvent::DELETE,$this->orderEvent);
  }

}
