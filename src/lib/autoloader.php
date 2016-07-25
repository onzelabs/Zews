<?php

/**
 * autoloader to load classes in /src/models/
 */
spl_autoload_register(function ($class) {
                if (is_file($file = dirname(__FILE__) . '/' . $class . '.php')) {
                    require $file;
                }

                if (is_file($file = dirname(__FILE__) . '/do/' . $class . '.php')) {
                    require $file;
                }
        });


?>
