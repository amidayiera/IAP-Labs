<?php
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME','btc3205');

    class DBconnector {
        public $connection;

        function __construct(){
            $this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("Error Connecting:" . mysqli_error($this));
            mysqli_select_db($this->connection, DB_NAME);
        }
        public function closeConnection(){
            mysqli_close($this->connection);
        }
    }

?>