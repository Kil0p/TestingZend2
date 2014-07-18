<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return array(
    'caches' => array(
        'cache_filesystem' => array(
            'adapter' => array(
                'name' => 'filesystem',
                'options' => array(
                    'namespace' => 'test',
                    'cache_dir' => './data/cache'
                )
            ),
            'plugins' => array(
                'exception_handler' => array(
                    'throw_exceptions' => true,
                ),
            )
        ),
        'cache_memcache' => array(
            'adapter' => array(
                'name' => 'memcache',
                'options' => array(
                    'servers' => array(
                       array(
                           'localhost',11211,
                       ),
                    ),
                    'namespace' => 'test',
                ),
            ),
            'plugins' => array(
                'exception_handler' => array(
                    'throw_exceptions' => true,
                ),
            ),
        ),
    ),
);
