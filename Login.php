<?php
    include_once 'Connection.php';
    include_once 'User.php';

    $connection = new DBconnector;
    if(isset($_POST['btn_login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $instance = User::create();
        $instance->setPassword($password);
        $instance->setUsername($username);

        // if($instance->isPasswordCorrect()) {
        //     $instance->login();
        //     // close database connection
        //     $connection->closeConnection();
        //     // create a user session
        //     $instance->createUserSession();
        //     header("Location:PrivatePage.php");

        // // if(User::isPasswordCorrect($username, $password)) {
        // //     User::createUserSession($username);
        // //     header("Location:PrivatePage.php");
        // // } else {
        //     $connection->closeConnection();
        //     header("Location:Login.php");
        // }

        if($instance->isPasswordCorrect()){
            $instance->login();

            $connection->closeConnection();

            $instance->createUserSession();
        }else{
        $connection->closeConnection();
        header("Location:Login.php");
            // header("Location:PrivatePage.php");

        }
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/Lab1.css">
        <script src="js/validate.js" type="text/javascript"></script>
        <link rel="stylesheet" href="css/Validate.css">
        <link rel="stylesheet" href="css/Lab1.css">
    </head>
    <body>
        <!-- PHP SELF means submitting this form to itself for processing -->
        <form method="post" name="login" id="login" action="<?=$_SERVER['PHP_SELF']?>">
            <div class="container">

                <label for="username"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" id ="uname" required>
            
                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" id ="pass" required>
            
                <button type="submit" name="btn_login">Login</button>
            </div>
        </form>
    </body>
</html>