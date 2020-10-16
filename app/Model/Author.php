<?php


    namespace Model;

    use Core\Database;

    class Author
    {
        public static function all()
        {
            return Database::query("SELECT * FROM author")->execute()->fetchAll();
        }
    }