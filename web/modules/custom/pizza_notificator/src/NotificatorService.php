<?php

namespace Drupal\pizza_notificator;




class NotificatorService  {
  /**
   * @var
   */
  protected $connection;

  /**
   * NotificatorService constructor.
   * @param $connection
   */
  public function __construct()
  {
    $this->connection = $this->getClientInstance();
  }

  protected function getClientInstance() {
    if (!isset($this->clientInstance)) {
      $this->clientInstance = stream_socket_client('tcp://127.0.0.1:8001');
    }
    return $this->clientInstance;
  }
  public function send($ids, $status) {
    fwrite($this->getClientInstance(), json_encode(['user' => $ids, 'message' => $status])  . "\n");
  }
}
