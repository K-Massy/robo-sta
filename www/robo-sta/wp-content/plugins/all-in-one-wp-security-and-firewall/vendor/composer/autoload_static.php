<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit888bc1b214a0205c02dae97361d36f08
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit888bc1b214a0205c02dae97361d36f08::$classMap;

        }, null, ClassLoader::class);
    }
}
