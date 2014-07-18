<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Cache\Controller;

use Zend\Math\Rand;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Serializer\Serializer;
use Zend\View\Model\ViewModel;
use Zend\Cache\Storage\StorageInterface as CacheStorageInterface;
use Zend\View\View;

class IndexController extends AbstractActionController
{
    private $cacheFilesystem;

    private $cacheMemcache;

    public function __construct(CacheStorageInterface $cacheFilesystem, CacheStorageInterface $cacheMemcache){
        $this->cacheFilesystem = $cacheFilesystem;
        $this->cacheMemcache = $cacheMemcache;
    }
    public function indexAction()
    {
        $navigationView = new ViewModel();
        $navigationView->setTemplate('cache/cache-navigation');

        $view = new ViewModel();
        $view->addChild($navigationView, 'navigation');
        return $view;
    }
    public function cacheByFilesAction(){

        $navigationView = new ViewModel();
        $navigationView->setTemplate('cache/cache-navigation');

        $success = false;
        $randNumber = Rand::getInteger(1,5);
        $cacheFilesystemKey =  "$randNumber";
        $result = $this->cacheFilesystem->getItem($cacheFilesystemKey, $success);
        if(!$success){
            $result = date(DATE_RFC822);
            $this->cacheFilesystem->setItem($cacheFilesystemKey, $result);
        }
        $view = new ViewModel(array(
            'key' => $cacheFilesystemKey,
            'result' => $result,
            'success' => $success,
        ));
        $view->addChild($navigationView, 'navigation');
        return $view;
    }

    public function memcacheAction(){


        exec('tasklist /FI "IMAGENAME eq memcache.exe" | findstr "memcache.exe"', $output, $return);

        $navigationView = new ViewModel();
        $navigationView->setTemplate('cache/cache-navigation');

        $view = new ViewModel();
        $view->addChild($navigationView, 'navigation');

        if($return == 1){
            $view->setVariables(array(
                'error' => 'You need to run service "memcache.exe" in your system.',
            ));
            return $view;
        }
        $cache = $this->cacheMemcache;
        $cacheOptions = $cache->getOptions();
        $cacheID = $cacheOptions->getResourceId();
        $memcache = $cacheOptions->getResourceManager()->getResource($cacheID);
        $version = $memcache->getVersion();

        $serializedResult = null;
        $stdClassKey = 'stdClass';
        $result = $cache->getItem($stdClassKey,$success);
        if(!$success){
            $result = new \stdClass();
            $result->attribute1 = 'Test';
            $result->attribute2 = 12345;
            $cache->setItem('stdClass',$result);
        }
        if(is_object($result)){
           $serializedResult = Serializer::serialize($result);
        }

        $view->setVariables(array(
            'version' => $version,
            'result' => $serializedResult,
            'success' => $success,
        ));
        return $view;
    }
}
