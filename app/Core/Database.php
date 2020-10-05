<?php


    namespace Core;


    use PDO;
    use PDOException;

    class Database
    {
        public $conn;

        private $result;
        private $preparedQuery;

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
            $this->preparedQuery = $this->conn->prepare($query);

            return $this;
        }

        function bind($params)
        {
            foreach ($params as $key => $value)
                $this->preparedQuery->bindParam(":{$key}", $value);

            return $this;
        }

        function execute()
        {
            if(!$this->preparedQuery->execute())
                return false;

            return $this;
        }

        function fetch()
        {
            $this->result = $this->preparedQuery->fetch();

            return $this->result;
        }

        function fetchAll()
        {
            $this->result = $this->preparedQuery->fetchAll();

            return $this->result;
        }
    }