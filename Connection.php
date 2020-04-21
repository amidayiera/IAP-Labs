<?php
    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME','btc3205');

    class DBconnector {
        public $connection;

        function __construct(){
            $this->connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD) or die("Error:" .mysqli_error());
            mysqli_select_db($this->connection, DB_NAME);
        }

        public function closeConnection(){
            mysqli_close($this->connection);
        }
    }

?>