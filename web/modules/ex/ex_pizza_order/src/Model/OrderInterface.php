<?php
/**
 * Created by PhpStorm.
 * User: VladDancer
 * Date: 2/26/18
 * Time: 12:48 AM
 */

namespace Drupal\ex_pizza_order\Model;


use Drupal\Core\Session\AccountInterface;

interface OrderInterface {

  public function getOrderId();

  public function setOrderId($order_id);

  public function getStatus();

  public function setStatus($status);

  public function getChanged();

  public function setChanged($changed);

  public function getCreated();

  public function setCreated($created);

  public function getProducts();

  public function setProducts($products = []);

  public function getOrderEmail();

  public function setOrderEmail($mail);

  /**
   * @return AccountInterface;
   */
  public function getCustomer();

  /**
   * @param \Drupal\Core\Session\AccountInterface $client
   *
   * @return mixed
   */
  public function setCustomer(AccountInterface $client);
}