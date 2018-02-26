<?php

namespace Drupal\pizza_menu;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Pizza Order entity.
 *
 * @see \Drupal\pizza_menu\Entity\PizzaOrder.
 */
class PizzaOrderAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\pizza_menu\Entity\PizzaOrderInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished pizza order entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published pizza order entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit pizza order entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete pizza order entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add pizza order entities');
  }

}
