<?php


    namespace Core;

    use Throwable, Exception, Error;

    class Config
    {
        public static function start()
        {
            if(!$ini = parse_ini_file(__DIR__.'/../../config.ini', true))
                die('Could not find config.ini file. Create one!');

            foreach ($ini as $group => $array)
                foreach ($array as $key => $value)
                    define("{$group}_{$key}", "{$value}");
        }
    }
