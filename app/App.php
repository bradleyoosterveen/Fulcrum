<?php


    namespace Core;


    class App
    {
        public function __construct() {}

        public static function run()
        {
            Session::start();
            Config::start();
            Router::start();
            Response::handle();

            return new App();
        }

        function autoload() {
            spl_autoload_register(function ($class) {
                $class = str_replace('\\', DIRECTORY_SEPARATOR, $class); // Enable cross platform
                include $_SERVER['DOCUMENT_ROOT'].'app/'.$class.'.php';
            });
        }
    }