<?php

namespace App\Controllers;

use App\Model\Form\ClientType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\JsonResponse,
    Symfony\Component\HttpFoundation\Request,
    App\Model\Repository\ClientRepository,
    App\Model\Repository\ServerRepository,
    Doctrine\ORM\EntityManager,
    App\Model\Entity\Server,
    App\Model\Entity\Client;

/**
 * Class AdminController
 *
 * @package App\Controllers
 */
class AdminController
{
    public function indexAction()
    {
        return [];
    }

    public function serversAction(
        ServerRepository $serverRepository,
        FormBuilder $formBuilder,
        FormFactory $formFactory,
        ClientType $clientFormType
    )
    {
        $servers = $serverRepository->findAll();

        $formBuilder = $formFactory->createBuilder($clientFormType);

        $form = $formBuilder->getForm()->createView();

        return [
            'servers' => $servers,
            'form' => $form
        ];
    }

    public function removeClientAction(
        Request          $request,
        ClientRepository $clientRepository,
        EntityManager    $em,
        JsonResponse     $response
    )
    {
        if (!$request->request->has('id'))
        {
            return $response->setData(['status' => 'failure']);
        }

        $clientId = $request->request->get('id');

        /** @var Client $client **/
        if (($client = $clientRepository->find($clientId)) === null)
        {
            return $response->setData(['status' => 'failure']);
        }

        try
        {
            /** @var Server $server */
            $server = $client->getServer();
            $server->removeClient($client);
            $em->remove($client);

            $em->persist($server);
            $em->flush();

            return $response->setData(['status' => 'success']);
        }
        catch (\Exception $e)
        {
            return $response->setData(['status' => 'failure']);
        }
    }

    public function addClientAction(Request $request, FormBuilder $formBuilder, EntityManager $em)
    {

    }
} 