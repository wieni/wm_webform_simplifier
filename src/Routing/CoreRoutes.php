<?php

namespace Drupal\wm_webform_simplifier\Routing;

use Symfony\Component\Routing\RouteCollection;
use Drupal\Core\Routing\RoutingEvents;
use Drupal\Core\Routing\RouteSubscriberBase;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Class CoreRoutes
 * @package Drupal\wm_webform_simplifier\Routing
 */
class CoreRoutes extends RouteSubscriberBase
{
    /**
     * @return mixed
     */
    public static function getSubscribedEvents()
    {
        $events[RoutingEvents::ALTER] = ['onAlterRoutes', -9999];
        return $events;
    }

    /**
     * @param \Symfony\Component\Routing\RouteCollection $collection
     */
    protected function alterRoutes(RouteCollection $collection)
    {
        // Webform view route
        $route = $collection->get('entity.webform.canonical');


        $req = [
            '_custom_access' =>
                '\\Drupal\\wm_webform_simplifier\\Routing\\CoreRoutes::accessWebform',
        ];

        $route->addRequirements($req);
    }

    /**
     * @param \Drupal\Core\Session\AccountInterface $account
     *
     * @return \Drupal\Core\Access\AccessResult
     */
    public function accessWebform(AccountInterface $account)
    {
        return AccessResult::allowedIf(
            $account->id() == 1
            || $account->hasPermission('use advanced webform configuration')
        );
    }

}

