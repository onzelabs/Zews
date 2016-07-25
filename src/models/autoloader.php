<?php

/**
 * autoloader to load classes in /src/models/
 */
spl_autoload_register(function ($class) {
            if (0 !== strpos($class, 'Mapper')) {
                if (is_file($file = dirname(__FILE__) . '/mapper/' . $class . '.php')) {
                    require $file;
                }
            }
        });


?>
