<?php
    /**
     * Config file
     */
    require_once('_config/config.php');

    /**
     * Autoload classes
     */
    spl_autoload_register(function ($class) {
        include $class . '.php';
    });

    /**
     *  Include web routes
     */
    require_once('routes/web.php');

    /**
     * Handle response
     */
    Core\Response::handle();