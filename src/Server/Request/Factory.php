<?php

namespace Server\Request;

use Server\Request\Exception\InvalidRequestTypeException,
    Server\Request\Validator\JSONValidator,
    Ratchet\Wamp\WampConnection,
    Ratchet\Wamp\Topic;

/**
 * Class Factory
 *
 * @package Server\Request
 */
class Factory
{
    /**
     * Returns the revelant request object
     *
     * @param string              $type The type of request to build [Subscription|Call]
     * @param WampConnection      $conn
     * @param Topic               $data
     *
     * @throws InvalidRequestTypeException
     *
     * @return RequestInterface
     */
    public function build($type, WampConnection $conn, Topic $data)
    {
        switch ($type)
        {
            case (AbstractRequest::TYPE_SUB):
                return new SubscriptionRequest($conn, $data, new JSONValidator);
            case (AbstractRequest::TYPE_CALL):
                /** @todo Implement call requests when needed **/
            break;
            default:
                throw new InvalidRequestTypeException(sprintf(
                    "Websocket type must be one of: Request::TYPE_SUB or Request::TYPE_CALL. %s given.", $type
                ));
            break;
        }
    }
}