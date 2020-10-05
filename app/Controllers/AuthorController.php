<?php


    namespace Controllers;

    use Models\AuthorModel;

    class AuthorController
    {
        public static function index()
        {
            return AuthorModel::getAuthors();
        }
    }