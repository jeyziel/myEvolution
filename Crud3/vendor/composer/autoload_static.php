<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0f17dcbd6e5ddd667be30e82e158fe26
{
    public static $prefixLengthsPsr4 = array (
        'J' => 
        array (
            'JG\\' => 3,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'JG\\' => 
        array (
            0 => __DIR__ . '/..' . '/JG',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0f17dcbd6e5ddd667be30e82e158fe26::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0f17dcbd6e5ddd667be30e82e158fe26::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}