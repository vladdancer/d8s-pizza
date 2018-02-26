<?php

namespace Drupal\ex_pizza_order;

use Drupal\Core\Database\Connection;
use Drupal\ex_pizza_order\Event\OrderEvent;
use Drupal\ex_pizza_order\Event\OrderEvents;
use Drupal\ex_pizza_order\Model\Order;
use Drupal\ex_pizza_order\Model\OrderInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class OrderService.
 */
class OrderStorage implements OrderStorageInterface {
  const ORDER_TABLE = 'ex_pizza_order';

  /**
   * @var Connection
   */
  protected $connection;

  /**
   * @var EventDispatcherInterface
   */
  protected $eventDispatcher;

  /**
   * Constructs a new OrderService object.
   */
  public function __construct(Connection $connection, EventDispatcherInterface $eventDispatcher) {
    //database connectio
    $this->connection = $connection;
    //event dispatcher interface
    $this->eventDispatcher = $eventDispatcher;
    //order
  }

  /**
   * Get all orders
   */
  function getOrderAll(){
    $orders = [];
    $data = $this->connection->select(static::ORDER_TABLE, 'ord')
      ->fields('ord')
      ->execute()
      ->fetchAll();

    foreach ($data as $datum) {
      $order = $this->mapOrder($datum);
      $orders[$order->getOrderId()] = $this->mapOrder($datum);
    }
    return $orders;
  }

  /**
   * Get order object
   * @param $order_id
   */
  function getOrder($order_id){
    $query = $this->connection
      ->select(self::ORDER_TABLE, 'ord')
      ->fields('ord');

    $query->condition('ord.id', $order_id);

    $data = $query->execute()->fetchObject();

    return $this->mapOrder($data);
  }

  protected function mapOrder($data) {
    $item = new Order();

    $setValues = \Closure::bind(function ($data) {
      $this->orderId = $data->id;
      $this->created = $data->created;
      $this->changed = $data->changed;

      if (isset($data->uid)) {
        $this->customer = \Drupal::entityTypeManager()
          ->getStorage('user')
          ->load($data->uid);
      }
      elseif (isset($data->mail)) {
        $this->mail = $data->mail;
      }
    }, $item, '\Drupal\ex_pizza_order\Model\Order');

    $setValues($data);

    return $item;
  }

  /**
   * Create new order
   *
   * @param $order
   *
   * @throws \Exception
   */
  function createOrder(OrderInterface $order){
    $fields = [
      'created',
      'changed',
      'status',
    ];

    $values = [
      $order->getCreated(),
      $order->getChanged(),
      $order->getStatus(),
    ];

    if (!empty($order->getCustomer())) {
      $fields[] = 'uid';
      $values[] = $order->getCustomer()->id();
    }
    else {
      $fields[] = 'mail';
      $values[] = $order->getOrderEmail();
    }

    try {
      $query = $this->connection->insert(static::ORDER_TABLE);
      $query->fields($fields, $values);
      $query->execute();

    }
    catch (\Exception $e) {
      drupal_set_message('error', $e->getMessage());
    }

    $event = new OrderEvent($order);
    $this->eventDispatcher->dispatch(OrderEvents::ADD, $event);
  }

  /**
   * Update order
   */
  function updateOrder(OrderInterface $order){
    $this->connection->update(self::ORDER_TABLE)
      ->fields($fields)
      ->condition('id', $order->getOrderId())
      ->execute();

    $event = new OrderEvent($order);
    $this->eventDispatcher->dispatch(OrderEvents::UPDATE, $event);
  }

  /**
   * Remove Order
   */
  function removeOrder(OrderInterface $order){
    $result = $this->connection->update(self::ORDER_TABLE)
      ->fields(['deleted' => 1])
      ->condition('id', $order->getOrderId())
      ->execute();
    $event = new OrderEvent($order);
    $this->eventDispatcher->dispatch(OrderEvents::DELETE, $event);

    return $result;
  }

}
