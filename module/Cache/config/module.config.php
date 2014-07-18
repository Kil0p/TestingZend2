<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'navigation' => array(
        'cache' => array(
            array(
                'label' => 'Start',
                'route' => 'cache',
            ),
            array(
                'label' => 'Cache with files',
                'route' => 'cache/files',
            ),
            array(
                'label' => 'Cache with memcache',
                'route' => 'cache/memcache'
            )
        ),
    ),
    'controllers' => array(
        'factories' => array(
            'Cache\Controller\Index' => 'Cache\Controller\Factory\IndexControllerFactory',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'cache-navigation' => 'Cache\Navigation\Service\CacheNavigationFactory',
        )
    )
);
