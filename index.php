<?php
    /**
     * Use the Composer autoloader
     */
    require __DIR__ . '/vendor/autoload.php';

    /**
     * You know what? Let's launch Fulcrum
     */
    require __DIR__ . '/app/App.php';

    $app = new Core\App();

    $app->autoload();

    $app->launch();

    /**
     * Handle response
     */
    Core\Response::handle();
