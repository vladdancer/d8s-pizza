<?php

namespace Drupal\pizza_menu\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for Pizza Order edit forms.
 *
 * @ingroup pizza_menu
 */
class PizzaOrderForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\pizza_menu\Entity\PizzaOrder */
    $form = parent::buildForm($form, $form_state);

    $entity = $this->entity;

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $entity = $this->entity;

    $status = parent::save($form, $form_state);

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Pizza Order.', [
          '%label' => $entity->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Pizza Order.', [
          '%label' => $entity->label(),
        ]));
    }
    $form_state->setRedirect('entity.pizza_order.canonical', ['pizza_order' => $entity->id()]);
  }

}
