<?php


namespace Middleware;


class Auth
{
    public static function handle()
    {
        $authenticated = true;

        if($authenticated) return true;

        return false;
    }
}