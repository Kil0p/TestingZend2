<?php
return array(
    'navigation' => array(
        'main' => array(
            array(
                'label' => 'Home',
                'route' => 'home',
            ),
            array(
                'label' => 'Cache',
                'route' => 'cache',
            ),
            array(
                'label' => 'Cache',
                'route' => 'cache/files',
            ),
            array(
                'label' => 'Cache',
                'route' => 'cache/memcache',
            )
        ),
    ),
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action' => 'index',
                    ),
                ),
            ),
            'cache' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/cache',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Cache\Controller',
                        'controller' => 'Index',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'files' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/files',
                            'defaults' => array(
                                'action' => 'cache-by-files',
                            ),
                        ),
                    ),
                    'memcache' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/memcache',
                            'defaults' => array(
                                'action' => 'memcache',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'factories' => array(
            'Application\Controller\Index' => 'Application\Controller\Factory\IndexControllerFactory'
        )
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
        'factories' => array(
            'main-navigation' => 'Application\Navigation\Service\MainNavigationFactory'
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type' => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern' => '%s.mo',
            ),
        ),
    ),

    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(),
        ),
    ),
);