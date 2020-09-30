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
            if($_SERVER['REQUEST_METHOD'] === 'GET') {
                Self::$methodAllowed = true;
                Router::make($route, $view);
            } else {
                Self::$methodAllowed = false;
            }

            return new Router;
        }

        public static function post($route, $view)
        {
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                Self::$methodAllowed = true;
                Router::make($route, $view);
            } else {
                Self::$methodAllowed = false;
            }

            return new Router;
        }

        private static function make($route, $view)
        {
            $url = array_slice(explode("?", $_SERVER['REQUEST_URI']), 0);

            if(substr($route, 0, 1) !== '/')
                $route = '/' . $route;

            if($url[0] === $route)
                Self::$view = $view;
        }

        function title($title)
        {
            $separator = ' &bull; '; // Customize to your liking

            Self::$title = APP_NAME;

            if($title !== '')
                Self::$title .= $separator . $title;

            return $this;
        }

        function redirect($url, $status = 303)
        {
            $this::redirect($url, $status = 303);
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
