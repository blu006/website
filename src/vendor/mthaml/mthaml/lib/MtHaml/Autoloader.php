<?php

namespace MtHaml;

class Autoloader
{
    public static function register()
    {
        spl_autoload_register(array(new self, 'autoload'));
    }

    public static function autoload($class)
    {
        if (strncmp($class, 'MtHaml', 6) !== 0) {
            return;
        }

        if (file_exists($file = __DIR__ . '/../' . strtr($class, '\\', '/').'.php')) {
            require $file;
        }
    }
}
