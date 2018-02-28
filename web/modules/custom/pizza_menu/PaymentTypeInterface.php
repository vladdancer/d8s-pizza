<?php

/**
 * @file
 * Provides Drupal\icecream\FlavorInterface
 */

namespace Drupal\PaymentMethods;

use Drupal\Component\Plugin\PluginInspectionInterface;

/**
 * Defines an interface for ice cream flavor plugins.
 */
interface PaymentTypeInterface extends PluginInspectionInterface {

  /**
   * Return the name of the payment type.
   * @return string
   */
  public function getName();

  /**
   * A slogan for the payment type.
   *
   * @return string
   */
  public function slogan();

}
