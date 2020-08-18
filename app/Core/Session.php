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
    }