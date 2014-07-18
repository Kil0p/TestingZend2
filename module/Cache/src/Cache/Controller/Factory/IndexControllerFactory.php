<?php
/**
 * Created by PhpStorm.
 * User: Joanna
 * Date: 11.07.14
 * Time: 20:25
 */

namespace Cache\Controller\Factory;


use Cache\Controller\IndexController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class IndexControllerFactory implements FactoryInterface{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $applicationLocator = $serviceLocator->getServiceLocator();
        $cacheFilesystem = $applicationLocator->get('cache_filesystem');
        $cacheMemcache = $applicationLocator->get('cache_memcache');
        $controller = new IndexController($cacheFilesystem, $cacheMemcache);
        return $controller;
    }
}