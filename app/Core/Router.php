<?php


    namespace Core;


    class Router
    {
        public static $view;
        public static $title;

        public static function start()
        {
            $userDefinedRoutes = [
                'web.php'
            ];

            foreach($userDefinedRoutes as $file) {
                if(file_exists(__DIR__.'/../../routes/'.$file)) {
                    require_once __DIR__.'/../../routes/'.$file;
                }
            }
        }

        /**
         * @param $route
         * @param $view
         * @param string $title
         */
        public static function url($route, $view, $title = '')
        {

            /**
             * Handle title
             */
            $separator = ' &bull; '; // Customize to your liking

            Self::$title = APP_NAME;

            if($title !== '')
                Self::$title .= $separator . $title;

            /**
             * Handle routing and views
             */
            $url = array_slice(explode("?", $_SERVER['REQUEST_URI']), 0);

            if(substr($route, 0, 1) !== '/')
                $route = '/' . $route;

            if($url[0] === $route)
                Self::$view = $view;
        }
    }