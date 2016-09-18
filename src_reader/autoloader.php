<?php

/**
 * autoloader to load classes in /src/models/
 */
spl_autoload_register(function ($class) {
                if (is_file($file = dirname(__FILE__) . '/02 controllers/' . $class . '.php')) {
                    require $file;
                }

                if (is_file($file = dirname(__FILE__) . '/03 model/do/' . $class . '.php')) {
                    require $file;
                }

                if (is_file($file = dirname(__FILE__) . '/03 model/mapper/' . $class . '.php')) {
                    require $file;
                }

                if (is_file($file = dirname(__FILE__) . '/04 util/' . $class . '.php')) {
                    require $file;
                }

        });


?>
