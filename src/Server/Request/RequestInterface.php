<?php

namespace Server\Request;

/**
 * Interface RequestInterface
 *
 * A request is a generic request over the websocket protocol that will hit this server. It encapsulates all of the
 * request data used throughout the websocket call / response. It is also responsible using a validator to validate
 * the request id to make sure it contains the correct json keys specified by the concrete request object.
 *
 * @package Server\Request
 */
interface RequestInterface
{
    /**
     * Validates the original request data against a set of required values
     *
     * @return boolean True or false depending on validator
     */
    public function isValid();
}