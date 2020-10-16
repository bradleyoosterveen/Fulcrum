<?php


    namespace Model;

    use Core\Database;

    class Author
    {
        public static function all()
        {
            return Database::connect()->query("SELECT * FROM author")->execute()->fetchAll();
        }
    }