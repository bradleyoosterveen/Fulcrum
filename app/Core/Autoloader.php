<?php


    namespace Core;


    class Autoloader
    {
        public static function start()
        {
            spl_autoload_register(function ($class) {
                $class = str_replace('\\', DIRECTORY_SEPARATOR, $class); // Enable cross platform
                include $_SERVER['DOCUMENT_ROOT'].'/app/'.$class.'.php';
            });
        }
    }
