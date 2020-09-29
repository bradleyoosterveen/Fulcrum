<?php


    namespace Core;


    class Response
    {
        public static function handle()
        {
            if(!Router::getMethodAllowed())
                Router::setView('/errors/405.php')->title('Method now allowed');

            if(!Router::getView())
                Router::setView('/errors/404.php')->title('Page not found');

            require_once __DIR__.'/../../resources/views/app.php';
        }
    }