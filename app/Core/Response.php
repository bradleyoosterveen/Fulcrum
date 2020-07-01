<?php


    namespace Core;


    class Response
    {
        public static function handle()
        {
            if(!isset(Router::$view))
                Router::$view = 'resources/views/errors/404.php';

            require_once('resources/views/app.php');
        }
    }