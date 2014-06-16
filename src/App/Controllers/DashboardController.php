<?php

namespace App\Controllers;

use Twig_Environment;

/**
 * Class DashboardController
 *
 * @package App\Controllers
 */
class DashboardController
{
    public function indexAction(Twig_Environment $twig)
    {
        return $twig->render('dashboard/index.html.twig', array());
    }
} 