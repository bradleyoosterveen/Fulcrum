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
            Autoloader::start();
            Config::start();

            return new App();
        }
    }