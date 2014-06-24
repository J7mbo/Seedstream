<?php

namespace App\Controllers;

use App\Model\Service\Statistics\ActiveDownloadsStatistic;

/**
 * Class DashboardController
 *
 * @package App\Controllers
 */
class DashboardController
{
    public function indexAction(ActiveDownloadsStatistic $activeDownloadsStatistic)
    {
        $active = $activeDownloadsStatistic->getStatistic();

        return [
            'statistics' => [
                'active' => $active
            ]
        ];
    }
} 