<?php
    include "interfaces/Crud.php";
    include "interfaces/Authenticator.php";
    include_once "Connection.php";

    class User implements Crud, Authenticator{
        private $user_id;
        private $first_name;
        private $last_name;
        private $city_name;
    
        // lab 2
        private $username;
        private $password;

        // lab3
        private $timezone_offset;
        private $utc_timestamp;

        
        /*
        class constructor to initialize our values
        memberr varilables cannot be instantiated from elsewhere; they're private
        */
        function __construct($first_name, $last_name, $city_name, $username, $password) {
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->city_name = $city_name;
            $this->username = $username;
            $this->password = $password;
        }

        /*
        PHP does not allow multople constructors, so we fake one
        we make this method static so that we can access it with the class rather than an object
        */

        // static constructor
        public static function create () {
            $instance = new self("","","","","");
            return $instance;
        }
        // username setter
        public function setUsername($username) {
            $this->username = $username;
        }
        // usernmae getter
        public function getUsername() {
           return $this->username;
        }
        // password setter
        public function setPassword($password) {
            $this->password = $password;
        }
         // password getter
         public function getPassword() {
            return $this->password;
        }
        // user id setter
        public function setUserId($user_id) {
            $this->user_id = $user_id;
        }
        // user id getter
        public function getUserId() {
            return $this->user_id;
        }
            //time_zone_offset (Set and Get)

        public function getTimezoneOffset()
        {
            return $this->timezone_offset;
        }

        public function setTimezoneOffset($timezoneOffset)
        {
            $this->timezone_offset = $timezoneOffset;
        }


        //Utc_timestamp (Set and Get)
        public function getUtcTimestamp()
        {
            return $this->utc_timestamp;
        }

        public function setUtcTimestamp($utc_timestamp)
        {
            $this->utc_timestamp = $utc_timestamp;
        }


        public function save($connection){
            $fname = $this->first_name;
            $lname = $this->last_name;
            $city = $this->city_name;
            //  lab 2
            $uname = $this->username;
            $this->hashPassword();
            $pass = $this->password;
            // lab3
            $timezoneOffset = $this->getTimezoneOffset();
            $utc_timestamp = $this->getUtcTimestamp();
       

            $result = mysqli_query($connection, "INSERT INTO user(first_name, last_name, user_city, username, password, created_on, offset) VALUES('$fname','$lname','$city','$uname','$pass', '$utc_timestamp', '$timezoneOffset')") or die ("Error: " . mysqli_error($connection));
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

        // lab 2
        public function validateForm() {
            // return true if the values aren not empty
            $fname = $this->first_name;
            $lname = $this->last_name;
            $city = $this->city_name;
            $username = $this->username;
            $password= $this->password;
            if($fname == "" || $lname == "" || $city == "" || $password =="" || $username=="" ||$this->isUserExist()) {
                return false;
            }
            return true;
        }
        public function createFormErrorSessions()
        {
            session_start();
            $_SESSION['form_errors'] = "All fields are required";
        }

        public function hashPassword() {
            $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        }

        public function isPasswordCorrect() {
            $connection = new DBConnector();
            $found = false;
            $result = mysqli_query($connection->connection, "SELECT * FROM user") or die("Error: ".mysqli_error($connection->connection));

            while($row = mysqli_fetch_array($result)) {
                if(password_verify($this->getPassword(),$row['password']) && $this->getUsername() == $row['username']) {
                    $found = true;
                }
        
            }
            // close the database connection
            $connection->closeConnection();
            return $found;
            // return true
        }
        public function login()
        {
            if($this->isPasswordCorrect()) {
                // password is correct, lead to protected page
                header("Location: PrivatePage.php");
            }
        }
        public function createUserSession() {
            session_start();
            $_SESSION['username'] = $this->getUsername();
        }
        public function logout() {
            session_start();
            unset($_SESSION['username']);
            session_destroy();
            header("Locaation: Lab1.php");
        }

        public function isUserExist() {
            // ensure users dont have the same username
            $connection = new DBconnector();
            $username = $this->getUsername();
            $exists = false;
            $query = "SELECT * FROM user WHERE username = '$username'";
            $result = mysqli_query($connection, $query);
            if (mysqli_num_rows($result) > 0 ) {
                $exists = true;
            } 
            $connection->closeConnection;
            return $exists;
        

        }
    }

?>

