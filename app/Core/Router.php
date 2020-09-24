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

        public static function get($route, $view, $title = '')
        {
            if($_SERVER['REQUEST_METHOD'] !== 'GET') die('Request method is not supported for this route.');
            self::handle($route, $view, $title);
        }

        public static function post($route, $view, $title = '')
        {
            if($_SERVER['REQUEST_METHOD'] !== 'POST') die('Request method is not supported for this route.');
            self::handle($route, $view, $title);
        }

        /**
         * @param $route
         * @param $view
         * @param string $title
         */
        private static function handle($route, $view, $title = '')
        {

            /**
             * Handle routing and views
             */
            $url = array_slice(explode("?", $_SERVER['REQUEST_URI']), 0);

            if(substr($route, 0, 1) !== '/')
                $route = '/' . $route;

            if($url[0] === $route) {
                /**
                 * Handle title
                 */
                $separator = ' &bull; '; // Customize to your liking

                Self::$title = APP_NAME;

                if($title !== '')
                    Self::$title .= $separator . $title;

                Self::$view = $view;
            }
        }
    }
