<?php

namespace App\ServerArbiter\Rules;

use App\Model\Entity\Server;

/**
 * Class ServerActiveRule
 *
 * Returns the servers active status
 *
 * @package App\ServerArbiter\Rules
 */
class ServerActiveRule implements Rule
{
    /**
     * {@inheritdoc}
     */
    public function resolve(Server $server)
    {
        return $server->isActive();
    }
}