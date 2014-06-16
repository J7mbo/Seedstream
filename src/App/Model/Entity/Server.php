<?php

namespace App\Model\Entity;

use App\Model\Entity\ValueObjects\Server\IpAddress,
    Doctrine\ORM\Mapping as ORM;

/**
 * Class Server
 *
 * @ORM\Table(name="servers")
 * @ORM\Entity(repositoryClass="App\Model\Repository\ServerRepository")
 */
class Server
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var IpAddress
     *
     * @ORM\Embedded(class="App\Model\Entity\ValueObjects\Server\IpAddress")
     */
    private $ipAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $isActive = true;

    /**
     * @ORM\OneToOne(targetEntity="Client", mappedBy="server", cascade={"persist"})
     */
    private $client;

    /**
     * @constructor
     */
    public function __construct(IpAddress $ipAddress, $name, Client $client)
    {
        $this->ipAddress = $ipAddress;
        $this->client    = $client;
        $this->name      = $name;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get ip address
     *
     * @return string
     */
    public function getIpAddress()
    {
        return (string)$this->ipAddress;
    }

    /**
     * Change ip address
     *
     * @param IpAddress $ipAddress
     */
    public function changeIpAddress(IpAddress $ipAddress)
    {
        $this->ipAddress = $ipAddress;
    }

    /**
     * Change name
     *
     * @param string $name
     */
    public function changeName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set isActive to true
     */
    public function setActive()
    {
        $this->isActive = true;
    }

    /**
     * Set isActive to false
     */
    public function setInactive()
    {
        $this->isActive = false;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function isActive()
    {
        return $this->isActive;
    }

    /**
     * Get Client
     *
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }
}
