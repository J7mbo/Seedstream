<?php

namespace Server\Request\Validator;

/**
 * Interface ValidatorInterface
 *
 * @package Server\Request\Validator
 */
interface ValidatorInterface
{
    /**
     * Validates data retrieved from a websocket request
     *
     * @param string $data The data to perform validation against
     *
     * @return mixed False if invalid data; parsed / validated data if valid
     *
     * @note Example on return: False if json can't be parsed, decoded if can be
     */
    public function validate($data);
} 