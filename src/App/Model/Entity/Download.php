<?php

namespace App\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Download
 *
 * @ORM\Table(name="downloads")
 * @ORM\Entity(repositoryClass="App\Model\Repository\DownloadRepository")
 */
class Download
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
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="downloads")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="hash_string", type="string", nullable=false)
     */
    private $hashString;

    /**
     * @constructor
     *
     * @param User   $user       The user this download belongs to
     * @param string $hashString The unique identifier provided by the torrent client
     */
    public function __construct(User $user, $hashString)
    {
        $this->hashString = $hashString;
        $this->user = $user;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get hash string
     *
     * @return string
     */
    public function getHashString()
    {
        return $this->hashString;
    }
}