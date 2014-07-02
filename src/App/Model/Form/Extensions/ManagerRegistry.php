<?php

namespace App\Model\Form\Extensions;

use Doctrine\Common\Persistence\AbstractManagerRegistry,
    Silex\Application;

/**
 * Class ManagerRegistry
 *
 * This class is used for connecting Symfony/Form to Doctrine entities
 *
 * @package App\Model\Form\Extensions
 */
class ManagerRegistry extends AbstractManagerRegistry
{
    /**
     * @var Application
     */
    protected $container;

    /**
     * {@inheritdoc}
     */
    protected function getService($name)
    {
        return $this->container[$name];
    }

    /**
     * {@inheritdoc}
     */
    protected function resetService($name)
    {
        unset($this->container[$name]);
    }

    /**
     * {@inheritdoc}
     */
    public function getAliasNamespace($alias)
    {
        throw new \BadMethodCallException('Namespace aliases not supported.');
    }

    /**
     * Set the container
     *
     * @param Application $container
     */
    public function setContainer(Application $container)
    {
        $this->container = $container['orm.ems'];
    }
}