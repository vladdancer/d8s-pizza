<?php
/**
 * Created by PhpStorm.
 * User: VladDancer
 * Date: 2/26/18
 * Time: 12:47 AM
 */

namespace Drupal\pizza_menu\Model;


use Drupal\Core\Session\AccountInterface;

class Order implements OrderInterface {

  protected $id;

  protected $customer;

  protected $status;

  protected $mail;

  protected $created;

  public $changed;

  public function getOrderId() {
    return $this->id;
  }

  public function setOrderId($order_id) {
    if (!empty($order_id)) {
      $this->id = $order_id;
    }
  }

  public function getChanged() {
    return $this->changed;
  }

  public function setChanged($changed) {
    if (!empty($changed)) {
      $this->changed = $changed;
    }
  }

  public function getCreated() {
    return $this->created;
  }

  public function setCreated($created) {
    if (!empty($changed)) {
      $this->created = $created;
    }
  }

  public function getProducts() {
    return [];
  }

  public function setProducts($products = []) {}

  public function getOrderEmail() {
    return $this->mail;
  }

  public function setOrderEmail($email) {
    if (!empty($email)) {
      $this->mail = $email;
    }
  }

  public function getCustomer() {
    $this->customer;
  }

  public function setCustomer(AccountInterface $customer) {
    if (!empty($customer)) {
      $this->customer = $customer;
    }
  }

  public function getStatus() {
    return $this->status;
  }

  public function setStatus($status) {
    if (!empty($status)) {
      $this->status = $status;
    }
  }

}