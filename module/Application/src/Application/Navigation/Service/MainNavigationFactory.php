<?php
/**
 * Created by PhpStorm.
 * User: asia
 * Date: 16.07.14
 * Time: 12:26
 */

namespace Application\Navigation\Service;


use Zend\Navigation\Service\AbstractNavigationFactory;

class MainNavigationFactory extends AbstractNavigationFactory {

    /**
     * @return string
     */
    protected function getName()
    {
        return "main";
    }
}