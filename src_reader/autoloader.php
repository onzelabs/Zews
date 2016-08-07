<?php

/**
 * autoloader to load classes in /src/models/
 */
spl_autoload_register(function ($class) {
                if (is_file($file = dirname(__FILE__) . '/01 businnes/' . $class . '.php')) {
                    require $file;
                }

                if (is_file($file = dirname(__FILE__) . '/01 businnes/do/' . $class . '.php')) {
                    require $file;
                }

                if (is_file($file = dirname(__FILE__) . '/02 model/' . $class . '.php')) {
                    require $file;
                }

                if (is_file($file = dirname(__FILE__) . '/02 model/mapper/' . $class . '.php')) {
                    require $file;
                }

                if (is_file($file = dirname(__FILE__) . '/03 util/' . $class . '.php')) {
                    require $file;
                }

        });


?>
