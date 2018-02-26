<?php

namespace Drupal\pizza_menu\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Pizza Order entities.
 *
 * @ingroup pizza_menu
 */
interface PizzaOrderInterface extends ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Pizza Order name.
   *
   * @return string
   *   Name of the Pizza Order.
   */
  public function getName();

  /**
   * Sets the Pizza Order name.
   *
   * @param string $name
   *   The Pizza Order name.
   *
   * @return \Drupal\pizza_menu\Entity\PizzaOrderInterface
   *   The called Pizza Order entity.
   */
  public function setName($name);

  /**
   * Gets the Pizza Order creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Pizza Order.
   */
  public function getCreatedTime();

  /**
   * Sets the Pizza Order creation timestamp.
   *
   * @param int $timestamp
   *   The Pizza Order creation timestamp.
   *
   * @return \Drupal\pizza_menu\Entity\PizzaOrderInterface
   *   The called Pizza Order entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Pizza Order published status indicator.
   *
   * Unpublished Pizza Order are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Pizza Order is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Pizza Order.
   *
   * @param bool $published
   *   TRUE to set this Pizza Order to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\pizza_menu\Entity\PizzaOrderInterface
   *   The called Pizza Order entity.
   */
  public function setPublished($published);

}
