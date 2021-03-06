<?php
    class Database
    {
        private $host = "localhost";
        private $username = "root";
        private $password = "";
        private $db = "socialbook";

        protected $connection;

        // Create connection to the database. If connection failed, display error message.
        public function __construct()
        {
            if (!isset($this->connection)) {
                // if there is no connection setted, create one
                $this->connection = new mysqli($this->host, $this->username, $this->password, $this->db);
                
                // if failed to create connection
                if (!$this->connection) {
                    echo 'Cannot connect to database server';
                    exit;
                }            
            }   
            // if there is connection, return it 
            return $this->connection;
            // $connection = mysqli_connect($this->host, $this->username, $this->password, $this->db);
            // return $connection;
        }

        function read($query)
        {
            $conn = $this->__construct();
            $result = mysqli_query($conn, $query);

            if(!$result)
            {
                return false;
            }
            else
            {
                $data = false;
                while ($row = mysqli_fetch_assoc($result))
                {
                    $data[] = $row;
                }

                return $data;
            }
        }

        function save($query)
        {
            $conn = $this->__construct();
            $result = mysqli_query($conn, $query);

            if(!$result)
            {
                return false;
            }
            else 
            {
                return true;;
            }
        }

        function write($query)
        {
            $conn = $this->__construct();
            $result = mysqli_query($conn, $query);

            if(!$result)
            {
                return false;
            }
            else 
            {
                return true;;
            }
        }
    }
?>