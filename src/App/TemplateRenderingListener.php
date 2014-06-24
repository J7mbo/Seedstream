<?php

namespace App;

use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent,
    Symfony\Component\EventDispatcher\EventSubscriberInterface,
    Symfony\Component\Routing\RouteCollection,
    Symfony\Component\HttpKernel\KernelEvents,
    Symfony\Component\HttpFoundation\Response;

/**
 * Class TemplateRenderingListener
 *
 * Lovingly stolen from Dave Marshall
 *
 * @see <http://davedevelopment.co.uk/2012/11/26/silex-route-helpers-for-a-cleaner-architecture.html>
 *
 * @package App
 */
class TemplateRenderingListener implements EventSubscriberInterface
{
    protected $app;

    /**
     * @constructor
     *
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Middleware allowing automatic template response when _template is provided
     *
     * @param GetResponseForControllerResultEvent $event
     */
    public function onKernelView(GetResponseForControllerResultEvent $event)
    {
        $response = $event->getControllerResult();

        if (!is_array($response))
        {
            return;
        }

        $request = $event->getRequest();
        $routeName = $request->attributes->get('_route');

        /** @var RouteCollection $routes */
        $routes = $this->app['routes'];

        if (!$route = $routes->get($routeName))
        {
            return;
        }

        if (!$template = $route->getOption('_template'))
        {
            return;
        }

        /** @var \Twig_Environment $twig */
        $twig = $this->app['twig'];
        $output = $twig->render($template, $response);

        $event->setResponse(new Response($output));
    }

    public static function getSubscribedEvents()
    {
        return [KernelEvents::VIEW => array('onKernelView', -10)];
    }
}