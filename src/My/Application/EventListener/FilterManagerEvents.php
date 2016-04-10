<?php

/**
 * File for Filter Manager Events Listener class
 */

namespace My\Application\EventListener;

use Cayman\Manager\EventManager\EventContext;

/**
 * Class for Filter Manager Events Listener
 *
 */
class FilterManagerEvents
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
