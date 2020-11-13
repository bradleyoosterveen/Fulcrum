<?php


namespace Middleware;

class Middleware
{
    public static function map()
    {
        return (object) [
            'auth' => Auth::handle()
        ];
    }
}