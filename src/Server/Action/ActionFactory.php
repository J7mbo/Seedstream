<?php

namespace Server\Action;

use Auryn\Provider;

/**
 * Class ActionFactory
 *
 * Responsible for mapping a topic to an ActionHandler object
 *
 * @package Server\Action
 */
class ActionFactory
{
    /**
     * @var Provider
     */
    private $provider;

    /**
     * @constructor
     *
     * This factory is going to need the Auryn DiC to resolve the handlers
     *
     * @param Provider $provider
     */
    public function __construct(Provider $provider)
    {
        $this->provider = $provider;
    }

    /**
     * Build the actual object
     *
     * @param $topic
     *
     * @throws ActionException When a handler for the action doesn't exist
     *
     * @return ActionHandler
     */
    public function build($topic)
    {
        if (class_exists($action = sprintf('\Server\Action\%sHandler', ucfirst(strtolower($topic)))))
        {
            return $this->provider->make($action);
        }
        else
        {
            throw new ActionException(sprintf("Invalid websocket request topic, '%sHandler' doesn't exist.", $topic));
        }
    }
} 