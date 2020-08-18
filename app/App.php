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
            Autoloader::start(); // First and foremost

            Session::start();
            Config::start();
            Router::start();

            return new App();
        }
    }