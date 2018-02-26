<?php
/**
 * @file
 * Contains \Drupal\pizza_notification\NotificationEventSubscriber.
 */
namespace Drupal\pizza_notificator\EventSubscriber;

use Drupal\pizza_menu\OrderEvent;
use Drupal\pizza_notificator\NotificatorService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;


/**
 * Class NotificatorEventSubscriber.
 *
 * @package Drupal\pizza_notificator
 */
class NotificatorEventSubscriber implements EventSubscriberInterface {
    /**
     * @var NotificatorService
     */
    protected $pizzaNotifier;

    public function __construct($pizza_notifier) {
        $this->pizzaNotifier = $pizza_notifier;
    }

    /**
     * {@inheritdoc}
     */

    public static function getSubscribedEvents() {
        $events[OrderEvent::ADD][] = 'event.order.add';
        $events[orderEvent::UPDATE][] = 'event.order.update';
        return $events;
    }

  /**
   * @param OrderEvent $event
   */
  public function orderChanged(OrderEvent $event) {
        $order = $event->getOrder('event.order.update');

//        $this->pizzaNotifier->send($order['id'], $order['status']);
    }

    public function orderCreated() {

    }

}
