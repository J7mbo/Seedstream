<?php

namespace App\Controllers;

use Symfony\Component\HttpFoundation\RedirectResponse,
    Symfony\Component\HttpFoundation\Session\Session,
    Symfony\Component\Routing\Generator\UrlGenerator,
    App\Model\Factory\RedirectResponseFactory,
    Symfony\Component\HttpFoundation\Request,
    App\Model\Repository\ClientRepository,
    App\Model\Repository\ServerRepository,
    Symfony\Component\Form\FormFactory,
    Doctrine\ORM\EntityManager,
    App\Model\Form\ClientType,
    App\Model\Entity\Server,
    App\Model\Entity\Client;

/**
 * Class AdminController
 *
 * @package App\Controllers
 */
class AdminController
{
    /**
     * Displays the admin page
     *
     * @return array
     */
    public function indexAction()
    {
        return [];
    }

    /**
     * Displays the the servers and clients page
     *
     * @param ServerRepository $serverRepository
     * @param FormFactory      $formFactory
     * @param ClientType       $clientFormType
     *
     * @return array Servers / clients list and the add client form
     */
    public function serversAction(
        ServerRepository $serverRepository,
        FormFactory $formFactory,
        ClientType $clientFormType
    )
    {
        $servers     = $serverRepository->findAll();
        $formBuilder = $formFactory->createBuilder($clientFormType);
        $form        = $formBuilder->getForm()->createView();

        return [
            'servers' => $servers,
            'form' => $form
        ];
    }

    /**
     * Hit when the user removes a client
     *
     * Requires a POST request with the 'id' parameter containing the client id
     *
     * @param Request          $request
     * @param ClientRepository $clientRepository
     * @param EntityManager    $em
     * @param Session          $session
     *
     * @return array
     */
    public function removeClientAction(
        Request                 $request,
        ClientRepository        $clientRepository,
        EntityManager           $em,
        Session                 $session
    )
    {
        if (!$request->request->has('id'))
        {
            $session->getFlashBag()->add('error',
                sprintf("Couldn't delete client - please refresh and try again")
            );
        }

        $clientId = $request->request->get('id');

        /** @var Client $client **/
        if (($client = $clientRepository->find($clientId)) === null)
        {
            $session->getFlashBag()->add('error',
                sprintf("Couldn't delete client - please refresh and try again")
            );
        }

        try
        {
            /** @var Server $server */
            $server = $client->getServer();
            $server->removeClient($client);
            $em->remove($client);

            $em->persist($server);
            $em->flush();

            $session->getFlashBag()->add('message',
                sprintf('Successfully removed %s client on port %s', $client->getType(), $client->getPort())
            );
        }
        catch (\Exception $e)
        {
            $session->getFlashBag()->add('error',
                sprintf("Couldn't delete client - please refresh and try again")
            );
        }

        return [];
    }

    /**
     * Hit when the user submits a new client using the ClientType form
     *
     * @param UrlGenerator            $urlGenerator
     * @param RedirectResponseFactory $redirectResponseFactory
     * @param Request                 $request
     * @param ClientType              $clientFormType
     * @param FormFactory             $formFactory
     * @param Session                 $session
     * @param EntityManager           $em
     *
     * @return RedirectResponse
     */
    public function addClientAction(
        UrlGenerator            $urlGenerator,
        RedirectResponseFactory $redirectResponseFactory,
        Request                 $request,
        ClientType              $clientFormType,
        FormFactory             $formFactory,
        Session                 $session,
        EntityManager           $em
    )
    {
        $formBuilder = $formFactory->createBuilder($clientFormType);

        $form = $formBuilder->getForm();

        $form->handleRequest($request);

        if ($form->isValid())
        {
            /** @var Client $client **/
            $client = $form->getData();
            $em->persist($client);
            $em->flush();

            $session->getFlashBag()->add('message',
                sprintf('Successfully added %s client on port %s', $client->getType(), $client->getPort())
            );
        }
        else
        {
            $session->getFlashBag()->add('error',
                sprintf("Couldn't add client - please refresh and try again")
            );
        }

        return $redirectResponseFactory->build($urlGenerator->generate('admin_servers'));
    }
} 