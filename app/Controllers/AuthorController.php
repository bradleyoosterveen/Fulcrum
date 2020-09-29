<?php


    namespace Controllers;

    use Models\AuthorModel;

    class AuthorController
    {

        /**
         * @return array
         */
        public static function index()
        {
            return AuthorModel::getAuthors();
        }
    }