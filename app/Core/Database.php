<?php
    namespace Core;

    use PDO;
    use PDOException;

    class Database
    {

        /**
         * @return bool|PDO
         */
        public static function construct()
        {
            if(empty(SQL_HOST))
                return false;

            try {
                $conn = new PDO("mysql:host=" . SQL_HOST . ";dbname=" . SQL_DATABASE, SQL_USER, SQL_PASSWORD);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                return $conn;
            }
            catch(PDOException $e)
            {
                return false;
            }
        }
    }