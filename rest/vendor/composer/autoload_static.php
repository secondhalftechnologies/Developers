<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit280f811bac72a8ec639f006c88029d9d
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'CorsSlim\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'CorsSlim\\' => 
        array (
            0 => __DIR__ . '/..' . '/palanik/corsslim',
        ),
    );

    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'Slim' => 
            array (
                0 => __DIR__ . '/..' . '/slim/slim',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit280f811bac72a8ec639f006c88029d9d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit280f811bac72a8ec639f006c88029d9d::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit280f811bac72a8ec639f006c88029d9d::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
