<?php
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
    require_once('routes/web.php');

    /**
     * Handle response
     */
    Core\Response::handle();