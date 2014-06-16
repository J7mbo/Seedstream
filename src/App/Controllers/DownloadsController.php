<?php

namespace App\Controllers;
use App\Model\Entity\Client;
use App\Model\Entity\Server;
use App\Model\Entity\ValueObjects\Server\IpAddress;
use App\Model\Repository\ClientRepository;
use App\Model\Repository\ServerRepository;
use Doctrine\ORM\EntityManager;

/**
 * Class DownloadsController
 *
 * @package App\Controllers
 */
class DownloadsController
{
    public function indexAction(\Twig_Environment $twig, ClientRepository $cl, ServerRepository $sr, EntityManager $em)
    {
        // @todo client / server not working, server has a null client value :/ shitty doctrine
        /*
        $client = new Client('transmission', '20000', 'transmission/rpc', 'james', 'james');
        $server = new Server(new IpAddress('127.0.0.1'), 'localhost', $client);

        $em->persist($server);
        $em->flush();

        die;*/

        return $twig->render('downloads/index.html.twig');
    }
}