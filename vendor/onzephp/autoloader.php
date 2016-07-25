<?php

/**
 * Autoloader to load classes in onzephp.
 */
spl_autoload_register(function ($class) {
    // Autoload for DAOs
    if (0 !== strpos($class, 'DO')) {
        if (is_file($file = dirname(__FILE__) . '/do/' . $class . '.php')) {
            require $file;
        }
    }
    // Autoload for DTOs
    if (0 !== strpos($class, 'Mapper')) {
        if (is_file($file = dirname(__FILE__) . '/mapper/' . $class . '.php')) {
            require $file;
        }
    }

});

?>
