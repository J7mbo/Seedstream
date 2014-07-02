<?php

namespace App\Model\Factory;

use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Class RedirectResponseFactory
 *
 * Allows the delayed creation of a symfony RedirectResponse object for Dependency Injection
 *
 * @package App\Model\Factory
 */
class RedirectResponseFactory
{
    public function build($url, $status = 302)
    {
        return new RedirectResponse($url, $status);
    }
} 