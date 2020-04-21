<?php
    include_once 'Connection.php';
    include_once 'User.php';

    $connection = new DBconnector();

    if(isset($_POST['btn_save']))
    {
        $first_name =$_POST['first_name'];
        $last_name = $_POST['last_name'];
        $city = $_POST['city_name'];

        $user = new User($first_name,$last_name,$city);
        $result = $user->save($connection->connection);
        $users = $user->readAll($connection->connection)->fetch_assoc();

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
        <!-- <title>Lab 1</title> -->
    </head>
    <body>
    <form method="post">
        <div class="container">
            <label for="fname"><b>First Name</b></label>
            <input type="text" placeholder="Enter First Name" name="first_name" id="fname" required>

            <label for="lname"><b>Last Name</b></label>
            <input type="text" placeholder="Enter Last Name" name="last_name"id="lname" required>
            
            <label for="city"><b>City</b></label>
            <input type="text" placeholder="Enter City Name" name="city_name" id ="city" required>
           
            <button type="submit" name="btn_save">Save</button>
    
        </div>

        <a href="AllRecords.php" >View All Records</a>

    </body>
</html>