<?php

namespace cache\doctrine\__CG__\App\Model\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Client extends \App\Model\Entity\Client implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', '' . "\0" . 'App\\Model\\Entity\\Client' . "\0" . 'id', '' . "\0" . 'App\\Model\\Entity\\Client' . "\0" . 'type', '' . "\0" . 'App\\Model\\Entity\\Client' . "\0" . 'port', '' . "\0" . 'App\\Model\\Entity\\Client' . "\0" . 'endPoint', '' . "\0" . 'App\\Model\\Entity\\Client' . "\0" . 'authUsername', '' . "\0" . 'App\\Model\\Entity\\Client' . "\0" . 'authPassword', '' . "\0" . 'App\\Model\\Entity\\Client' . "\0" . 'server', '' . "\0" . 'App\\Model\\Entity\\Client' . "\0" . 'downloads');
        }

        return array('__isInitialized__', '' . "\0" . 'App\\Model\\Entity\\Client' . "\0" . 'id', '' . "\0" . 'App\\Model\\Entity\\Client' . "\0" . 'type', '' . "\0" . 'App\\Model\\Entity\\Client' . "\0" . 'port', '' . "\0" . 'App\\Model\\Entity\\Client' . "\0" . 'endPoint', '' . "\0" . 'App\\Model\\Entity\\Client' . "\0" . 'authUsername', '' . "\0" . 'App\\Model\\Entity\\Client' . "\0" . 'authPassword', '' . "\0" . 'App\\Model\\Entity\\Client' . "\0" . 'server', '' . "\0" . 'App\\Model\\Entity\\Client' . "\0" . 'downloads');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Client $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', array());

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function getType()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getType', array());

        return parent::getType();
    }

    /**
     * {@inheritDoc}
     */
    public function getPort()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPort', array());

        return parent::getPort();
    }

    /**
     * {@inheritDoc}
     */
    public function getEndPoint()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEndPoint', array());

        return parent::getEndPoint();
    }

    /**
     * {@inheritDoc}
     */
    public function getAuthUsername()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAuthUsername', array());

        return parent::getAuthUsername();
    }

    /**
     * {@inheritDoc}
     */
    public function getAuthPassword()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAuthPassword', array());

        return parent::getAuthPassword();
    }

    /**
     * {@inheritDoc}
     */
    public function getServer()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getServer', array());

        return parent::getServer();
    }

    /**
     * {@inheritDoc}
     */
    public function setServer(\App\Model\Entity\Server $server)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setServer', array($server));

        return parent::setServer($server);
    }

    /**
     * {@inheritDoc}
     */
    public function removeServer(\App\Model\Entity\Server $server)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeServer', array($server));

        return parent::removeServer($server);
    }

    /**
     * {@inheritDoc}
     */
    public function addDownload(\App\Model\Entity\Download $download)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addDownload', array($download));

        return parent::addDownload($download);
    }

    /**
     * {@inheritDoc}
     */
    public function removeDownload(\App\Model\Entity\Download $download)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeDownload', array($download));

        return parent::removeDownload($download);
    }

    /**
     * {@inheritDoc}
     */
    public function getDownloads()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDownloads', array());

        return parent::getDownloads();
    }

}
