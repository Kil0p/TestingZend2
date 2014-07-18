<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Cache;

use Zend\Cache\StorageFactory;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\ServiceManager\ServiceLocatorInterface;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    public function getServiceConfig(){
        return array(
//          'factories' => array(
//              'cache_file_system' => function(ServiceLocatorInterface $sl){
//                      $cache   = StorageFactory::factory(array(
//                          'adapter' => array(
//                              'name' => 'filesystem',
//                              'options' => array(
//                                  'namespace' => 'test',
//                                  'cache_dir' => './data/cache'
//                              )
//                          ),
//                          'plugins' => array(
//                              'exception_handler' => array(
//                                  'throw_exceptions' => true,
//                              ),
//                          )
//                      ));
//                      return $cache;
//              }
//          )
        );
    }
}
