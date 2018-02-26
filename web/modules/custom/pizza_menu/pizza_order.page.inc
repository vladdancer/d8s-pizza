<?php

/**
 * @file
 * Contains pizza_order.page.inc.
 *
 * Page callback for Pizza Order entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Pizza Order templates.
 *
 * Default template: pizza_order.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_pizza_order(array &$variables) {
  // Fetch PizzaOrder Entity Object.
  $pizza_order = $variables['elements']['#pizza_order'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
