<?php

namespace App\Controllers;

use App\Model\Service\Statistics\ActiveDownloadsStatistic,
    Twig_Environment;

/**
 * Class DashboardController
 *
 * @package App\Controllers
 */
class DashboardController
{
    public function indexAction(
        ActiveDownloadsStatistic $activeDownloadsStatistic,
        Twig_Environment         $twig
    )
    {
        $active = $activeDownloadsStatistic->getStatistic();

        return $twig->render('dashboard/index.html.twig', [
            'statistics' => [
                'active' => $active
            ]
        ]);
    }
} 