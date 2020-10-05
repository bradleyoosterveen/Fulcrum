<?php


    namespace Models;


    use Core\Database;

    class AuthorModel
    {
        public static function getAuthors()
        {
            return Database::connect()->query("SELECT * FROM author")->execute()->fetchAll();
        }
    }