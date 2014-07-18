<?php
/**
 * Created by PhpStorm.
 * User: asia
 * Date: 16.07.14
 * Time: 00:52
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
        return new IndexController();
    }
}