<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit1394c21fed2e87cfbdfa92e91badcc59
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit1394c21fed2e87cfbdfa92e91badcc59', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit1394c21fed2e87cfbdfa92e91badcc59', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit1394c21fed2e87cfbdfa92e91badcc59::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
