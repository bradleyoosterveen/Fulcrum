<?php


    namespace Core;


    class App
    {
        private $startTime;

        public function __construct()
        {
            $this->startTime = microtime(true);
        }

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