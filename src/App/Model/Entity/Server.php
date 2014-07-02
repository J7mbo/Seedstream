<?php

namespace App\Model\Entity;

use App\Model\Entity\ValueObjects\Server\IpAddress,
    Doctrine\Common\Collections\ArrayCollection,
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
    protected $id;

    /**
     * @var IpAddress
     *
     * @ORM\Embedded(class="App\Model\Entity\ValueObjects\Server\IpAddress")
     */
    protected $ipAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    protected $isActive = true;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Client", mappedBy="server", cascade={"all"})
     */
    protected $clients;

    /**
     * @constructor
     *
     * @param IpAddress $ipAddress
     * @param           $name
     */
    public function __construct(IpAddress $ipAddress, $name)
    {
        $this->clients = new ArrayCollection();
        $this->ipAddress = $ipAddress;
        $this->name = strtolower($name);
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
        $this->name = strtolower($name);
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
     * Get Clients
     *
     * @return ArrayCollection
     */
    public function getClients()
    {
        return $this->clients;
    }

    /**
     * Add Clients
     *
     * @param Client $client
     *
     * @return Server
     */
    public function addClient(Client $client)
    {
        $this->clients->add($client);
        $client->setServer($this);

        return $this;
    }

    /**
     * Remove Client
     *
     * @param Client $client
     *
     * @return Server
     */
    public function removeClient(Client $client)
    {
        if ($this->clients->contains($client))
        {
            $this->clients->removeElement($client);
        }

        return $this;
    }

    /**
     * Get the name and ip address of the server
     *
     * @return string
     */
    public function __toString()
    {
        return sprintf('%s - %s', $this->name, $this->ipAddress);
    }
}
