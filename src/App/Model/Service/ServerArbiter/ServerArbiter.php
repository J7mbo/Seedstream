<?php

namespace App\Model\Service\ServerArbiter;

use App\ServerArbiter\ServerSet,
    App\Model\Entity\Server;

/**
 * Class ServerArbiter
 *
 * @package App\ServerArbiter
 */
class ServerArbiter
{
    /**
     * @var RuleSet
     */
    private $ruleSet;

    /**
     * @var ServerSet
     */
    private $serverSet;

    /**
     * @constructor
     *
     * @param RuleSet   $ruleSet   A set of Rule objects used to decide on a Server
     * @param ServerSet $serverSet A set of Server objects to be chosen from
     */
    public function __construct(RuleSet $ruleSet, ServerSet $serverSet)
    {
        $this->ruleSet = $ruleSet;
        $this->serverSet = $serverSet;
    }

    /**
     * Run each Server in the ServerSet against each Rule in the RuleSet and return the Server matching the most rules
     *
     * Think of this as a 'points' system. Each Rule returns 1 / 0. The Server with the highest points matched the most
     * rules successfully and therefore is the Server that is returned
     *
     * @return Server The one Server to rule them all
     *
     * @note If two servers match the same number of rules successfully, the first one will be returned
     */
    public function decide()
    {
        $decisions = [];

        /** @var Rule $rule */
        foreach ($this->ruleSet as $rule)
        {
            /** @var Server $server */
            foreach ($this->serverSet as $server)
            {
                if (!array_key_exists($server->getId(), $decisions))
                {
                    $decisions[$server->getId()]['successes'] = 0;
                }

                if ($rule->resolve($server))
                {
                    $decisions[$server->getId()]['successes']++;
                }
            }
        }

        $chosenServer = array_search(max($decisions), $decisions);

        return $chosenServer;
    }
}