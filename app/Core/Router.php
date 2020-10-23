<?php


    namespace Core;


    class Router
    {
        private static $view;
        private static $title;
        private static $methodAllowed;

        private function __construct() {}

        public static function start()
        {
            $headersAccepted = getallheaders()['Accept'];
            if(strpos($headersAccepted, 'application/json')) {
                require_once __DIR__.'/../../routes/api.php';
            } else {
                require_once __DIR__.'/../../routes/web.php';
            }
        }

        public static function get($route, $view)
        {
            Router::make($route, $view, "GET");

            return new Router;
        }

        public static function post($route, $view)
        {
            Router::make($route, $view, "POST");

            return new Router;
        }

        private static function make($route, $view, $method)
        {
            $url = array_slice(explode("?", $_SERVER['REQUEST_URI']), 0);

            if(substr($route, 0, 1) !== '/')
                $route = '/' . $route;

            if($url[0] === $route && self::methodAllowed($method))
                Self::$view = $view;
        }

        private static function methodAllowed($method) {
            if($_SERVER['REQUEST_METHOD'] === $method) {
                return Self::$methodAllowed = true;
            } else {
                return Self::$methodAllowed = false;
            }
        }

        function title($title)
        {
            $separator = ' &bull; '; // Customize to your liking

            Self::$title = APP_NAME;

            if($title !== '')
                Self::$title .= $separator . $title;

            return $this;
        }

        public static function redirectTo($url, $status = 303)
        {
            header('Location: '.$url, true, $status);
            die;
        }

        public static function getMethodAllowed()
        {
            return Self::$methodAllowed;
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
