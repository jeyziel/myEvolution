<?php

require __DIR__ . '/vendor/autoload.php';

$db = require __DIR__ . '/config/database.php';

return [
    'paths' => [
        'migrations' => [
            __DIR__ . '/database/migrations' 
        ],
        'seeds' => [
            __DIR__ . '/database/seeds'  
        ],
    ],
    'environments' => [
        'default_migration_table' => 'migrations',
        'default_database' => 'dev',
        'dev' => [
            'adapter' => 'mysql',
        	'host' => 'localhost',
        	'name' => 'cms_blog',
	        'user' => 'root',
	        'pass' => 'root',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
        ],
        'prod' => [
            'adapter' => 'mysql',
            'host' => 'localhost',
            'name' => 'cms_blog',
            'user' => 'root',
            'pass' => 'root',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
        ],
    ],
];