<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit85c5bdad669c4c3a299665ee45bb0801
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit85c5bdad669c4c3a299665ee45bb0801::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit85c5bdad669c4c3a299665ee45bb0801::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit85c5bdad669c4c3a299665ee45bb0801::$classMap;

        }, null, ClassLoader::class);
    }
}
