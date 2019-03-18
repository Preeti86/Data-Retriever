<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc0212c53830418f8514c395ee9c4292c
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Cocur\\Slugify\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Cocur\\Slugify\\' => 
        array (
            0 => __DIR__ . '/..' . '/cocur/slugify/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc0212c53830418f8514c395ee9c4292c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc0212c53830418f8514c395ee9c4292c::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
