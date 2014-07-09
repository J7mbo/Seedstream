<?php

namespace App\Controllers;

use Doctrine\DBAL\Exception\UniqueConstraintViolationException,
    Symfony\Component\HttpFoundation\RedirectResponse,
    Symfony\Component\HttpFoundation\Session\Session,
    Symfony\Component\Routing\Generator\UrlGenerator,
    Symfony\Component\HttpFoundation\Response,
    App\Model\Factory\RedirectResponseFactory,
    Symfony\Component\HttpFoundation\Request,
    App\Model\Repository\ClientRepository,
    App\Model\Repository\ServerRepository,
    Symfony\Component\Form\FormFactory,
    Doctrine\ORM\EntityManager,
    App\Model\Form\ClientType,
    App\Model\Form\ServerType,
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
     *
     * @return array Servers / clients list
     */
    public function serversAction(ServerRepository $serverRepository)
    {
        $servers = $serverRepository->findAll();

        return [
            'servers' => $servers
        ];
    }

    /**
     * Displays the add client form
     *
     * @param FormFactory $formFactory
     * @param ClientType  $clientFormType
     *
     * @return array Add client form
     */
    public function clientFormAction(FormFactory $formFactory, ClientType $clientFormType)
    {
        $formBuilder = $formFactory->createBuilder($clientFormType);
        $clientForm  = $formBuilder->getForm()->createView();

        return [
            'form' => $clientForm
        ];
    }

    /**
     * Displays the add server form
     *
     * @param FormFactory $formFactory
     * @param ServerType  $serverFormType
     *
     * @return array Add server form
     */
    public function serverFormAction(FormFactory $formFactory, ServerType $serverFormType)
    {
        $formBuilder = $formFactory->createBuilder($serverFormType);
        $serverForm  = $formBuilder->getForm()->createView();

        return [
            'form' => $serverForm
        ];
    }

    /**
     * Hit when the user removes a client
     *
     * Requires a POST request with the 'id' parameter containing the client id
     *
     * @param Request          $request
     * @param Response         $response
     * @param ClientRepository $clientRepository
     * @param EntityManager    $em
     * @param Session          $session
     *
     * @return array
     */
    public function removeClientAction(
        Request                 $request,
        Response                $response,
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
        else
        {
            try
            {
                /** @var Server $server */
                $server = $client->getServer();
                $server->removeClient($client);
                $em->remove($client);

                $em->persist($server);
                $em->flush();

                $session->getFlashBag()->add('success',
                    sprintf('Successfully removed %s client on port %s', $client->getType(), $client->getPort())
                );
            }
            catch (\Exception $e)
            {
                $session->getFlashBag()->add('error',
                    sprintf("Couldn't delete client - please refresh and try again")
                );
            }
        }

        return $response;
    }

    /**
     * Hit when the user removes a server
     *
     * Requires a POST request with the 'id' parameter containing the client id
     *
     * @param Request          $request
     * @param Response         $response
     * @param ServerRepository $serverRepository
     * @param EntityManager    $em
     * @param Session          $session
     *
     * @return array
     */
    public function removeServerAction(
        Request                 $request,
        Response                $response,
        ServerRepository        $serverRepository,
        EntityManager           $em,
        Session                 $session
    )
    {
        if (!$request->request->has('id'))
        {
            $session->getFlashBag()->add('error',
                sprintf("Couldn't delete server - please refresh and try again")
            );
        }

        $serverId = $request->request->get('id');

        /** @var Server $server **/
        if (($server = $serverRepository->find($serverId)) === null)
        {
            $session->getFlashBag()->add('error',
                sprintf("Couldn't delete server - please refresh and try again")
            );
        }

        if ($server->getClients()->count() > 0)
        {
            $session->getFlashBag()->add('error',
                sprintf("Server still has clients - please delete these first before removing the server")
            );
        }
        else
        {
            try
            {
                /** @var Server $server */
                $em->remove($server);
                $em->flush();

                $session->getFlashBag()->add('success',
                    sprintf('Successfully removed server: %s', $server)
                );
            }
            catch (\Exception $e)
            {
                $session->getFlashBag()->add('error',
                    sprintf("Couldn't delete server - please refresh and try again")
                );
            }
        }

        return $response;
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

            $session->getFlashBag()->add('success',
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

    /**
     * Hit when the user submits a new server using the ServerType form
     *
     * @param UrlGenerator            $urlGenerator
     * @param RedirectResponseFactory $redirectResponseFactory
     * @param Request                 $request
     * @param ServerType              $serverFormType
     * @param FormFactory             $formFactory
     * @param Session                 $session
     * @param EntityManager           $em
     *
     * @return RedirectResponse
     */
    public function addServerAction(
        UrlGenerator            $urlGenerator,
        RedirectResponseFactory $redirectResponseFactory,
        Request                 $request,
        ServerType              $serverFormType,
        FormFactory             $formFactory,
        Session                 $session,
        EntityManager           $em
    )
    {
        $formBuilder = $formFactory->createBuilder($serverFormType);

        $form = $formBuilder->getForm();

        $url = $urlGenerator->generate('admin_servers_new_server_form');

        try
        {
            $form->handleRequest($request);

            if ($form->isValid())
            {
                /** @var Server $server **/
                $server = $form->getData();
                $em->persist($server);

                try
                {
                    $em->flush();

                    $session->getFlashBag()->add('success',
                        sprintf('Successfully added server: %s', $server)
                    );

                    $url = $urlGenerator->generate('admin_servers');
                }
                catch (UniqueConstraintViolationException $exception)
                {
                    $session->getFlashBag()->add('error',
                        sprintf("Couldn't add server: %s, a server with this IP Address already exists", $server)
                    );
                }
            }
            else
            {
                $session->getFlashBag()->add('error',
                    sprintf("Couldn't add server - please refresh and try again")
                );
            }
        }
        catch (\InvalidArgumentException $e)
        {
            $session->getFlashBag()->add('error',
                sprintf("Couldn't add server - it did not have a valid IP Address")
            );
        }

        return $redirectResponseFactory->build($url);
    }
} 