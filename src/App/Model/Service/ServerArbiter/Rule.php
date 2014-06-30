<?php

namespace App\Model\Service\ServerArbiter;

use App\Model\Entity\Server;

/**
 * Interface Rule
 *
 * @package App\Model\Service\ServerArbiter
 */
interface Rule
{
    /**
     * Resolve whether or not the Rule is successful
     *
     * @param Server $server The server to check the rule against
     *
     * @return boolean
     */
    public function resolve(Server $server);
}