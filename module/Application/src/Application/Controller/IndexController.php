<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Math\Rand;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Cache\Storage\StorageInterface as CacheStorageInterface;

class IndexController extends AbstractActionController
{
    private $cache;
    public function __construct(CacheStorageInterface $cache){
        $this->cache = $cache;
    }
    public function indexAction()
    {
        $success = false;
        $randNumber = Rand::getInteger(1,5);
        $cacheKey =  "$randNumber";
        $result = $this->cache->getItem($cacheKey, $success);
        if(!$success){
            $result = date(DATE_RFC822);
            $this->cache->setItem($cacheKey, $result);
        }
        return new ViewModel(array(
            'key' => $cacheKey,
            'result' => $result,
            'success' => $success,
        ));
    }
}
