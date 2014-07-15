<?php
/**
 * Created by PhpStorm.
 * User: Joanna
 * Date: 11.07.14
 * Time: 20:25
 */

namespace Application\Controller\Factory;


use Application\Controller\IndexController;
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
        $cache = $applicationLocator->get('cache');
        $controller = new IndexController($cache);
        return $controller;
    }
}