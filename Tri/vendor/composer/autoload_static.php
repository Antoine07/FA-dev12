<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5ef49bfa3f4b8141faf2c3094cd7585a
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Component\\Yaml\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Component\\Yaml\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/yaml',
        ),
    );

    public static $fallbackDirsPsr4 = array (
        0 => __DIR__ . '/../..' . '/src',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5ef49bfa3f4b8141faf2c3094cd7585a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5ef49bfa3f4b8141faf2c3094cd7585a::$prefixDirsPsr4;
            $loader->fallbackDirsPsr4 = ComposerStaticInit5ef49bfa3f4b8141faf2c3094cd7585a::$fallbackDirsPsr4;

        }, null, ClassLoader::class);
    }
}