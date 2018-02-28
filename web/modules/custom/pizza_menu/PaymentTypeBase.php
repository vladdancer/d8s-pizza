<?php


namespace Drupal\PaymentMethods;

use Drupal\Component\Plugin\PluginBase;

class PaymentTypeBase extends PluginBase implements PaymentTypeInterface {

  function __construct(array $configuration, $plugin_id, $plugin_definition)
  {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
  }

  public function getName() {
    return $this->pluginDefinition['name'];
  }

  public function slogan() {
    return t('Best payment type ever.');
  }
}
