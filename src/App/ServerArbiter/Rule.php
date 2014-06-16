<?php

namespace App\ServerArbiter\Rules;

use App\Model\Entity\Server;

/**
 * Interface Rule
 *
 * @package App\ServerArbiter\Rules
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