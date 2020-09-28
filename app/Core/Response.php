<?php


    namespace Core;


    class Response
    {
        public static function handle()
        {
            if(!Router::getView())
                Router::setView('/errors/404.php')->title('Hello there');

            require_once __DIR__.'/../../resources/views/app.php';
        }
    }