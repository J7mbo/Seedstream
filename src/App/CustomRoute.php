<?php

namespace App;

use Silex\Route;

/**
 * Class CustomRoute
 *
 * Allows the usage of _template within the routes config
 *
 * @package App
 */
class CustomRoute extends Route
{
    /**
     * Adds a template method to the routes used during route matching process
     *
     * @see App\Application::registerRoutes()
     *
     * @param $path
     *
     * @return $this
     */
    public function template($path)
    {
        $this->setOption('_template', $path);

        return $this;
    }

    /**
     * Gets called when no _template provided for a route, currently just a dummy object
     */
    public function noTemplate() { }
} 