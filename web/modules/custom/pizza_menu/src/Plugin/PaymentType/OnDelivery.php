<?php
/**
 * @file
 * Contains \Drupal\PaymentMethods\Plugin\PaymentType\OnDelivery.
 */

namespace Drupal\PaymentMethods\Plugin\Paypal;

use Drupal\PaymentMethod\PaymentTypeBase;

/**
 * Provides a 'paypal' type.
 *
 * @OnDelivery(
 *   id = "ondelivery",
 *   name = @Translation("OnDelivery"),
 * )
 */
class OnDelivery extends PaymentTypeBase {

  public function getName()
  {
    return t('OnDelivery');
  }

  public function slogan() {
    return t('OnDelivery tha\'s what you need !.');
  }
}
