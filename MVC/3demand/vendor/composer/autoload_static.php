<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit31ff86ea46839cb2f0d87186a4eaff5f
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit31ff86ea46839cb2f0d87186a4eaff5f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit31ff86ea46839cb2f0d87186a4eaff5f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit31ff86ea46839cb2f0d87186a4eaff5f::$classMap;

        }, null, ClassLoader::class);
    }
}
