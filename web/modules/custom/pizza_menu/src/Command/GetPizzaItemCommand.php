<?php
/**
 *
 *
 *
 */

namespace Drupal\pizza_menu\Command;


use Drupal\Core\Ajax\CommandInterface;

class GetPizzaItemCommand implements CommandInterface {
  protected $item;

  public function __construct($item) {
    $this->item = \Drupal::service('renderer')->render($item);
  }

  public function render() {
    return [
      'command' => 'getPizzaItem',
      'item' => $this->item,
    ];
  }
}
