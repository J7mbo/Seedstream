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
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=100, nullable=false)
     */
    protected $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="port", type="integer", length=5, nullable=false)
     */
    protected $port;

    /**
     * @var string
     *
     * @ORM\Column(name="endpoint", type="string", length=20, nullable=false)
     */
    protected $endPoint;

    /**
     * @var string
     *
     * @ORM\Column(name="auth_username", type="string", length=100, nullable=false)
     */
    protected $authUsername;

    /**
     * @var string
     *
     * @ORM\Column(name="auth_password", type="string", length=100, nullable=false)
     */
    protected $authPassword;

    /**
     * @var Server
     *
     * @ORM\ManyToOne(targetEntity="Server", inversedBy="clients")
     * @ORM\JoinColumn(name="server_id", referencedColumnName="id", onDelete="SET NULL")
     */
    protected $server;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Download", mappedBy="client", cascade={"persist", "remove"})
     */
    protected $downloads;

    /**
     * @constructor
     *
     * @param string $type         The type of client - for example "transmission" or "deluge"
     * @param int    $port         The port number to get the details of
     * @param string $endPoint     The endpoint to make requests to
     * @param string $authUsername The authentication username to login with
     * @param string $authPassword The authentication password to login with
     *
     * @note The endPoint and type are immutable, only the username, password and port can be changed
     */
    public function __construct($type, $port, $endPoint, $authPassword, $authUsername)
    {
        $this->downloads    = new ArrayCollection();
        $this->endPoint     = trim($endPoint, "/");
        $this->type         = strtolower($type);
        $this->changeAuthUsername($authUsername);
        $this->changeAuthPassword($authPassword);
        $this->changePort($port);
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
     * Change Port
     *
     * @param int $port
     *
     * @return Client
     */
    public function changePort($port)
    {
        $this->port = (int)$port;

        return $this;
    }

    /**
     * Change AuthUsername
     *
     * @param string $authUsername
     *
     * @return Client
     */
    public function changeAuthUsername($authUsername)
    {
        $this->authUsername = $authUsername;

        return $this;
    }
    /**
     * Change AuthPassword
     *
     * @param string $authPassword
     *
     * @return Client
     */
    public function changeAuthPassword($authPassword)
    {
        $this->authPassword = $authPassword;

        return $this;
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
     * Remove Server
     *
     * @param Server $server
     */
    public function removeServer(Server $server)
    {
        /** For PHPstorm code highlighting reasons **/
        $server = is_null($server) ?: null;
        $this->server = $server;
    }

    /**
     * Add Download
     *
     * @param Download $download
     *
     * @return Client
     */
    public function addDownload(Download $download)
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
    public function removeDownload(Download $download)
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