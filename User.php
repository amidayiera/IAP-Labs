<?php
    include "Crud.php";
    class User implements Crud{
        private $user_id;
        private $first_name;
        private $last_name;
        private $city_name;
    
        /*
        class constructor to initialize our values
        memberr varilables cannot be instantiated from elsewhere; they're private
        */
        function __construct($first_name, $last_name, $city_name) {
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->city_name = $city_name;
        }

        // user id setter
        public function setUserId($user_id) {
            $this->user_id = $user_id;
        }
        // user id getter
        public function getUserId() {
            return $this->user_id;
        }

        public function save($connection){
            $fname = $this->first_name;
            $lname = $this->last_name;
            $city = $this->city_name;
            $result = mysqli_query($connection, "INSERT INTO user(first_name, last_name, user_city) VALUES('$fname','$lname','$city')") or die ("Error: " . mysql_error());
            return $result;
        }

        public function readAll($connection) {
            $result = $connection->query("SELECT * FROM user");
            return $result;
        }
        public function readUnique() {
            return null;
        }
        public function search() {
            return null;
        }
        public function update() {
            return null;
        }
        public function removeOne() {
            return null;
        }
        public function removeAll() {
            return null;
        }

    }




?>