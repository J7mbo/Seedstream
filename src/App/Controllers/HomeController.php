<?php

namespace App\Controllers;

use Symfony\Component\HttpFoundation\RedirectResponse,
    Symfony\Component\Routing\Generator\UrlGenerator,
    Symfony\Component\Security\Core\SecurityContext,
    Symfony\Component\HttpFoundation\Request;

/**
 * Class HomeController
 *
 * @package App\Controllers
 */
class HomeController
{
    public function indexAction()
    {
        return [];
    }
    
    public function loginAction(Request $req, SecurityContext $sc, UrlGenerator $urlgen)
    {
        if ($sc->isGranted('IS_AUTHENTICATED_FULLY'))
        {
            return new RedirectResponse($urlgen->generate('home'));
        }
        else
        {
            $session = $req->getSession();
            $errorConst = $sc::AUTHENTICATION_ERROR;
            $lastUsernameConst = $sc::LAST_USERNAME;

            return [
                'error' => ($session->has($errorConst)) ? $session->get($errorConst)->getMessage() : null,
                'last_username' => $session->get($lastUsernameConst),
            ];
        }
    }
}