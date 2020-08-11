<?php


    namespace Core;


    class Autoloader
    {
        public static function start()
        {
            spl_autoload_register(function ($class) {
                include __DIR__.'/../'.$class.'.php';
            });
        }
    }