<?php

namespace App\Controllers;

/**
 * Class DownloadsController
 *
 * @package App\Controllers
 */
class DownloadsController
{
    public function indexAction(\Twig_Environment $twig)
    {
        return $twig->render('downloads/index.html.twig');
    }
}