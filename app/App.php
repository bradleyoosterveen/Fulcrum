<?php


    namespace Core;


    class App
    {
        private $startTime;

        public function __construct()
        {
            $this->startTime = microtime(true);
        }

        public static function launch()
        {
            Session::start();
            Config::start();
            Router::start();

            return new App();
        }

        function autoload() {
            spl_autoload_register(function ($class) {
                $class = str_replace('\\', DIRECTORY_SEPARATOR, $class); // Enable cross platform
                include $_SERVER['DOCUMENT_ROOT'].'app/'.$class.'.php';
            });
        }
    }