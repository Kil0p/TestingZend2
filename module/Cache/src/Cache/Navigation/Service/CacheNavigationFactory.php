<?php
/**
 * Created by PhpStorm.
 * User: asia
 * Date: 16.07.14
 * Time: 15:54
 */

namespace Cache\Navigation\Service;


use Zend\Navigation\Service\AbstractNavigationFactory;

class CacheNavigationFactory extends AbstractNavigationFactory{

    /**
     * @return string
     */
    protected function getName()
    {
        return "cache";
    }
}