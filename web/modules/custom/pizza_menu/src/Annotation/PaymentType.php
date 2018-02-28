<?php

namespace Drupal\PaymentMethods\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
* Defines a payment type plugin annotation object.
*
* @Annotation
*/
class PaymentType extends Plugin {

/**
* The plugin ID.
*
* @var string
*/
public $id;

/**
* The name of the form plugin.
*
* @var \Drupal\Core\Annotation\Translation
*
* @ingroup plugin_translatable
*/
public $name;

}