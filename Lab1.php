<?php
    include_once 'Connection.php';
    include_once 'User.php';

    $connection = new DBconnector();

    if(isset($_POST['btn_save']))
    {
        $first_name =$_POST['first_name'];
        $last_name = $_POST['last_name'];
        $city = $_POST['city_name'];

        $user = new User($first_name,$last_name,$city, $username, $password);
        $result = $user->save($connection->connection);
        $users = $user->readAll($connection->connection)->fetch_assoc();

        if (!$user->validateForm()) {
            $user->createFormErrorSessions();
            header("Refresh:0");
            die();
        }
        if($result)
        {
            header("Location:AllRecords.php?success=1");
            // echo 'Save operation successful!!';
            $connection->closeConnection();
        }
        else
        {
            echo 'An Error occurred.';
        }

        // print_r($users);
    }
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/Lab1.css">
        <script src="js/validate.js" type="text/javascript"></script>
        <link rel="stylesheet" href="css/validate.css">
    </head>
    <body>
        <form method="post" name="user_details" id="user_details" onsubmit="return validateForm()" action="<?=$_SERVER['PHP_SELF']?>">
            <div class="container">
                <!-- lab 2 -->
                <div id="form_errors">
                    <?php
                        session_start();
                        if (!empty($_SESSION['form_errors'])) {
                            echo " " . $_SESSION['form_errors'];
                            unset($_SESSION['form_errors']);
                        }
                    ?>
                </div>
                <!-- end of lab 2 -->
                <label for="fname"><b>First Name</b></label>
                <input type="text" placeholder="Enter First Name" name="first_name" id="fname" required>
            
                <label for="lname"><b>Last Name</b></label>
                <input type="text" placeholder="Enter Last Name" name="last_name"id="lname" required>
            
                <label for="city"><b>City</b></label>
                <input type="text" placeholder="Enter City Name" name="city_name" id ="city" required>
            
                <label for="username"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" id ="uname" required>
            
                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" id ="pass" required>
            
                <button type="submit" name="btn_save">Save</button>
            </div>
            <a href="Login.php" >Login</a>
        </form>
    </body>
</html>