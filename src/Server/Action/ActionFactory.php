<?php

namespace Server\Action;

use App\Model\Entity\User,
    Auryn\Provider;

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
     * @param User   $user
     * @param string $topic
     *
     * @throws ActionException When a handler for the action doesn't exist
     *
     * @return ActionHandler
     *
     * @note Any typehint for a $user in the handler will provide the User object of the logged-in user
     */
    public function build(User $user, $topic)
    {
        if (class_exists($action = sprintf('\Server\Action\%sHandler', ucfirst(strtolower($topic)))))
        {
            return $this->provider->make($action, [':user' => $user]);
        }
        else
        {
            throw new ActionException(sprintf("Invalid websocket request topic, '%sHandler' doesn't exist.", $topic));
        }
    }
} 