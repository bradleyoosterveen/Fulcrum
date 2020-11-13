<?php
    use Core\Router as Router;

    /**
     * Register your routes here
     */

    Router::middleware('auth', function() {
        Router::get('', '/pages/index.php')->title('Hello there!');
    });