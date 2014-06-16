<?php

namespace App\Model\Entity\ValueObjects\Server;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class IpAddress
 *
 * @package App\Model\Entity\ValueObjects\Server
 *
 * @ORM\Embeddable
 */
class IpAddress
{
    /**
     * @var string
     *
     * @ORM\Column(name="ip_address", type="string", length=15, nullable=false, unique=true)
     */
    private $ipAddress;

    /**
     * @constructor
     *
     * @param string $ipAddress The ip address string
     *
     * @throws \InvalidArgumentException When an invalid ip address is provided
     */
    public function __construct($ipAddress)
    {
        if (filter_var($ipAddress, FILTER_VALIDATE_IP) !== false)
        {
            $this->ipAddress = $ipAddress;
        }
        else
        {
            throw new \InvalidArgumentException(sprintf(
                "%s expected a valid, single ip address, got: %s", __METHOD__, $ipAddress
            ));
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->ipAddress;
    }
}