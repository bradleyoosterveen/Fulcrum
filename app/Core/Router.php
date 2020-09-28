<?php


    namespace Core;


    class Router
    {
        private static $view;
        private static $title;

        private function __construct() {}

        public static function start()
        {
            require_once __DIR__.'/../../routes/routes.php';
        }

        public static function make($route, $view)
        {
            /**
             * Handle routing and views
             */
            $url = array_slice(explode("?", $_SERVER['REQUEST_URI']), 0);

            if(substr($route, 0, 1) !== '/')
                $route = '/' . $route;

            if($url[0] === $route) {
                Self::$view = $view;
            }

            return new Router;
        }

        function title($title)
        {
            $separator = ' &bull; '; // Customize to your liking

            Self::$title = APP_NAME;

            if($title !== '')
                Self::$title .= $separator . $title;

            return $this;
        }

        public static function setView($view)
        {
            Self::$view = $view;

            return new Router;
        }

        public static function getView()
        {
            return Self::$view;
        }

        public static function setTitle($title)
        {
            Self::$title = $title;

            return new Router;
        }

        public static function getTitle()
        {
            return Self::$title;
        }
    }
