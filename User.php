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

        public function save($connection){
            $fname = $this->first_name;
            $lname = $this->last_name;
            $city = $this->city_name;
            //  lab 2
            $uname = $this->username;
            $this->hashPassword();
            $pass = $this->password;

            $result = mysqli_query($connection, "INSERT INTO user(first_name, last_name, user_city, username, pass) VALUES('$fname','$lname','$city','$uname','$pass')") or die ("Error: " . mysqli_error($connection));
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
            if($fname == "" || $lname == "" || $city == "") {
                return false;
            }
            return true;
        }
        public function createFormErrorSessions()
        {
            session_start();
            $_SESSION['form_errors'] = "All fileds are required";
        }

        public function hashPassword() {
            $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        }

        public function isPasswordCorrect() {
            $connection = new DBConnector();
            $found = false;
            $result = mysqli_query($connection, "SELECT * FROM user") or die("Error" . mysqli_error($connection));

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
                header("Location: PrivagtePage.php");
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
        }
    }

?>
<!-- 
Explain what is happening in line 3. Remember that we are using the functionality we put in method logout () in class User. 
Finally, we need to alter our database table, accommodate our new application. 
Execute this query against your table user
  ALTER TABLE user ADD(usernmae varcahr(20),password text);
Now test your application. Check if you can register a user, login and logout. Also check if you can view the private_page.php without the user logged in.
Also view your records in the database, notice how your passwords look like. 
Your task 
You know that 2 users cannot have the same username. 
Create a method in the class User called isUserExist() and write the logic that would prevent the user from using a username that is already in use. You should be able to report if such an attempt occurs.  -->
