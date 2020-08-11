<?php


    namespace Core;


    class Config
    {
        public static function start()
        {
            $ini = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'config.ini', true);

            foreach ($ini as $group => $array)
                foreach ($array as $key => $value)
                    define("{$group}_{$key}", "{$value}");
        }
    }