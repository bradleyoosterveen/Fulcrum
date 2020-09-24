<?php


    namespace Core;


    class Response
    {
        public static function handle()
        {
            if(!isset(Router::$view))
                Router::$view = '/errors/404.php';

            require_once __DIR__.'/../../resources/views/app.php';
        }
    }