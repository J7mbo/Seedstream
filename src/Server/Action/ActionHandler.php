<?php

namespace Server\Action;

use App\Model\Entity\User;

/**
 * Interface ActionHandler
 *
 * @package Server\Action
 */
interface ActionHandler
{
    /**
     * Handle the actual data retrieval and pass it to the EventHandler
     *
     * @return mixed The data to be sent to the client
     *
     * @note The ActionFactory has access to the Auryn DiC (Auryn\Provider), so typehint for whatever in the constructor
     */
    public function handle();
} 