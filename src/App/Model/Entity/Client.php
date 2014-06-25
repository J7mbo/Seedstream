<?php

namespace App\Model\Entity;

use Doctrine\Common\Collections\ArrayCollection,
    Doctrine\ORM\Mapping as ORM;

/**
 * Class Client
 *
 * @ORM\Table(name="clients")
 * @ORM\Entity(repositoryClass="App\Model\Repository\ClientRepository")
 */
class Client
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
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=100, nullable=false)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="port", type="integer", length=5, nullable=false)
     */
    private $port;

    /**
     * @var string
     *
     * @ORM\Column(name="endpoint", type="string", length=20, nullable=false)
     */
    private $endPoint;

    /**
     * @var string
     *
     * @ORM\Column(name="auth_username", type="string", length=100, nullable=false)
     */
    private $authUsername;

    /**
     * @var string
     *
     * @ORM\Column(name="auth_password", type="string", length=100, nullable=false)
     */
    private $authPassword;

    /**
     * @var Server
     *
     * @ORM\ManyToOne(targetEntity="Server", inversedBy="client")
     * @ORM\JoinColumn(name="id", referencedColumnName="id")
     */
    private $server;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Download", mappedBy="client")
     */
    private $downloads;

    /**
     * @constructor
     *
     * @param string $type         The type of client - for example "transmission" or "deluge"
     * @param int    $port         The port number to get the details of
     * @param string $endPoint     The endpoint to make requests to
     * @param string $authUsername The authentication username to login with
     * @param string $authPassword The authentication password to login with
     */
    public function __construct($type, $port, $endPoint, $authPassword, $authUsername)
    {
        $this->downloads    = new ArrayCollection();
        $this->authUsername = $authUsername;
        $this->authPassword = $authPassword;
        $this->endPoint     = trim($endPoint, "/");
        $this->type         = strtolower($type);
        $this->port         = (int)$port;
    }

    /**
     * Get the id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Get the port
     *
     * @return int
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * Get the endpoint
     *
     * @return string
     */
    public function getEndPoint()
    {
        return $this->endPoint;
    }

    /**
     * Get the authentication username
     *
     * @return string
     */
    public function getAuthUsername()
    {
        return $this->authUsername;
    }

    /**
     * Get the authentication password
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->authPassword;
    }

    /**
     * Get server
     *
     * @return Server
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * Set server
     *
     * @param Server $server
     */
    public function setServer(Server $server)
    {
        $this->server = $server;
    }

    /**
     * Add Download
     *
     * @param Download $download
     *
     * @return Client
     */
    public function addClient(Download $download)
    {
        $this->downloads->add($download);

        return $this;
    }

    /**
     * Remove Download
     *
     * @param Download $download
     *
     * @return Client
     */
    public function removeClient(Download $download)
    {
        if ($this->downloads->contains($download))
        {
            $this->downloads->removeElement($download);
        }

        return $this;
    }

    /**
     * Get downloads
     *
     * @return Download[]
     */
    public function getDownloads()
    {
        return $this->downloads;
    }
} 