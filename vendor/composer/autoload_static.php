<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7a7d4517ce187645fc786fe715c64b3f
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'App\\Controller\\SiteController' => __DIR__ . '/../..' . '/Controller/SiteController.php',
        'App\\Database\\Database' => __DIR__ . '/../..' . '/Database/Database.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7a7d4517ce187645fc786fe715c64b3f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7a7d4517ce187645fc786fe715c64b3f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7a7d4517ce187645fc786fe715c64b3f::$classMap;

        }, null, ClassLoader::class);
    }
}
