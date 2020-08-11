<?php
    /**
     * Use the Composer autoloader
     */
    require __DIR__.'/../vendor/autoload.php';

    /**
     * Autoload classes
     */
    spl_autoload_register(function ($class) {
        include $class . '.php';
    });

    /**
     * Load config
     */
    Core\Config::load();

    /**
     * Include web routes
     */
    require __DIR__.'/../routes/web.php';

    /**
     * Handle response
     */
    Core\Response::handle();