<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc2bef0b121ef91304bb5dc59f828f45c
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PhpOffice\\PhpWord\\' => 18,
        ),
        'L' => 
        array (
            'Laminas\\Escaper\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PhpOffice\\PhpWord\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpoffice/phpword/src/PhpWord',
        ),
        'Laminas\\Escaper\\' => 
        array (
            0 => __DIR__ . '/..' . '/laminas/laminas-escaper/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc2bef0b121ef91304bb5dc59f828f45c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc2bef0b121ef91304bb5dc59f828f45c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc2bef0b121ef91304bb5dc59f828f45c::$classMap;

        }, null, ClassLoader::class);
    }
}
