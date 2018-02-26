<?php

namespace Drupal\pizza_menu;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Link;

/**
 * Defines a class to build a listing of Pizza Order entities.
 *
 * @ingroup pizza_menu
 */
class PizzaOrderListBuilder extends EntityListBuilder {


  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('Pizza Order ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\pizza_menu\Entity\PizzaOrder */
    $row['id'] = $entity->id();
    $row['name'] = Link::createFromRoute(
      $entity->label(),
      'entity.pizza_order.edit_form',
      ['pizza_order' => $entity->id()]
    );
    return $row + parent::buildRow($entity);
  }

}
