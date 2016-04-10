<?php

/**
 * File for Cache Manager Events Listener class
 */

namespace My\Application\EventListener;

use Cayman\Manager\EventManager\EventContext;

/**
 * Class for Cache Manager Events Listener
 *
 */
class CacheManagerEvents
{
    /**
     * Listen to event
     * @param string       $eventName
     * @param EventContext $context
     * @return bool        Flag to stop propagation or not
     */
    static function eventListen($eventName, EventContext $context)
    {
        error_log(__METHOD__ . ': ' . $eventName);
    }
}
