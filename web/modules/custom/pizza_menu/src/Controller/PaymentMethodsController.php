<?php

namespace Drupal\PaymentMethods\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Controller\ControllerInterface;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class PaymentMethodsController extends ControllerBase implements ContainerInjectionInterface {

  public static function create(ContainerInterface $container) {
    return new static($container->get('module_handler'));
  }

  public function page() {
    $build = array(
      '#type' => 'markup',
      '#markup' => t('Hello World!'),
    );

    $manager = \Drupal::service('plugin.manager.payment_methods');
    $plugins = $manager->getDefinitions();
    drupal_set_message(print_r($plugins, TRUE));

    foreach ($plugins as $method) {
      $instance = $manager->createInstance($method['id']);
      $build[] = array(
        '#type' => 'markup',
        '#markup' => t('<p>Payment @name, is @slogan.</p>', array('@name' => $instance->getName(), '@slogan' => $instance->slogan())),
      );
    }

    return $build;
  }
}
