<?php

namespace Server\Request;

/**
 * Class SubscriptionRequest
 *
 * {@inheritdoc}
 *
 * @package Server\Request
 */
class SubscriptionRequest extends AbstractRequest
{
    /**
     * Constant designating a request type as a subscription
     */
    const REQUEST_TYPE = AbstractRequest::TYPE_SUB;

    /**
     * Subscription requests should only contain a topic, userId and token
     */
    const DATA_COUNT_REQ = 3;

    /**
     * {@inheritdoc}
     */
    public function isValid()
    {
        /** Subscriptions should only be a subject, userId and token **/
        return (parent::isValid()) ? (count($this->data) === self::DATA_COUNT_REQ) : false;
    }
} 