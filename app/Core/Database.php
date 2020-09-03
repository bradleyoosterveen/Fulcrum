<?php


    namespace Core;


    use PDO;
    use PDOException;

    class Database
    {
        public $conn;

        private $result;
        private $query;

        private function __construct() {}

        public static function connect()
        {
            if(empty(SQL_HOST))
                return false;

            $db = new Database;

            try {
                $db->conn = new PDO("mysql:host=" . SQL_HOST . ";dbname=" . SQL_DATABASE, SQL_USER, SQL_PASSWORD);
                $db->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                return $db;
            }
            catch(PDOException $e)
            {
                return false;
            }
        }

        function query($query, $params = [])
        {
            $q = $this->conn->prepare($query);

            if(!$q->execute())
                return false;

            $this->result = $q->fetchAll();

            return $this;
        }

        function result()
        {
            return $this->result;
        }
    }