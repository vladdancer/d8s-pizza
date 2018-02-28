<?php
/**
 * @file
 * Contains \Drupal\PaymentMethods\Plugin\PaymentType\Paypal.
 */

namespace Drupal\PaymentMethods\Plugin\Paypal;

use Drupal\PaymentMethod\PaymentTypeBase;

/**
 * Provides a 'paypal' type.
 *
 * @Paypal(
 *   id = "paypal",
 *   name = @Translation("Paypal"),
 * )
 */
class Paypal extends PaymentTypeBase {

  public function getName()
  {
    return t('Paypal');
  }

  public function slogan() {
    return t('Paypal best Payming type EVER !.');
  }
}
