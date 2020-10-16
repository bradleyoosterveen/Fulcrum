<?php


    namespace Controller;

    use Model\Author;

    class AuthorController
    {
        public static function index()
        {
            return Author::all();
        }
    }