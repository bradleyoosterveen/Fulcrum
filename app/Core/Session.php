<?php


    namespace Core;


    class Session
    {
        public static function start()
        {
            session_start();
        }

        public static function destroy()
        {
            session_destroy();
        }

        public static function flash($value, $key = 'return_message')
        {
            $_SESSION['_flash'][$key] = $value;
        }

        public static function removeFlash()
        {
            $_SESSION['_flash'] = [];
        }
    }