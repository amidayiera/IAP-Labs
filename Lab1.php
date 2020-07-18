<?php
include_once 'Connection.php';
include_once 'User.php';
include_once 'FileUploader.php';

$connection = new DBconnector();
// session_start();
$_SESSION['style'] = "none";

if (isset($_POST['btn_save'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $city = $_POST['city_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $profile = $_FILES['fileToUpload']['name'];
    $utc_timestamp = $_POST['utc_timestamp'];
    $timezoneOffset = $_POST['time_zone_offset'];

    //Image
    // $file_name = $_FILES['fileToUpload']['name'];
    // $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    // $file_size = $_FILES['fileToUpload']['size'];
    // $final_file_name = $_FILES['fileToUpload']['tmp_name'];

    $user = new User($first_name, $last_name, $city, $username, $password, $profile, $utc_timestamp, $timezoneOffset);
    $fileUpload = new FileUploader();

    // $uploader = new FileUploader($file_original_name,$file_type,$file_size,$tmp_name);

    if (!$user->validateForm()) {
        $user->createFormErrorSessions();
        header("Refresh:0");
        die;
    }
    if ($user->isUserExist($username)) {
        session_start();
        $_SESSION['form_errors'] = "Sorry, the username '" . $username . "' is already in use. Please enter another";
        header("Refresh:0");
        die();
    }
    if ($fileUpload->uploadFile()) {
        $res = $user->save();
    } else {
        $res = false;
        session_start();
        $_SESSION['form_errors'] = "Error in profile image upload please try again";
        header("Refresh:0");
        die();
    }

    if ($res) {
        session_start();
        $_SESSION['form_success'] = "Account data save operation successful!";
        header("Refresh:0");
        die();
    } else {
        session_start();
        $_SESSION['form_errors'] = "Save operation failed!...Please try again";
        //header("Refresh:0");
        die();
    }

    // 		// $uploader = new FileUploader($file_original_name,$file_type,$file_size,$tmp_name);
    //         //Timezone
    //         $user->setUtcTimestamp($utc_timestamp);
    //         $user->setTimezoneOffset($offset);

    //         if (!$user->validateForm()) {
    //             $user->createFormErrorSessions();
    //             header("Refresh:0");
    //             die();
    //             // if(!$user->isUserExist()) {
    //             //     die();
    //             // }
    //         }


    //       $fileUpload = new FileUploader();

    //       //Setting the username
    //     //   $fileUpload->setUsername($username);

    //       //Using setter methods
    //       $fileUpload->setOriginalName($file_name);
    //       $fileUpload->setFileType($file_type);
    //       $fileUpload->setFinalFileName($final_file_name);
    //       $fileUpload->setFileSize($file_size);

    //       //Check for valid criteria without Javascript
    //       if(!$user->validateForm())
    //       {
    //          $user->createFormErrorSessions();
    //          header("Location:Lab1.php");
    //          die();
    //       }else{
    // 		if ($fileUpload->fileWasSelected()) {
    // 			// echo "SELECTED"."<br>";
    // 			if ($fileUpload->fileTypeisCorrect()) {
    // 				// echo "CORRECT TYPE"."<br>";
    // 				if ($fileUpload->fileSizeIsCorrect()) {
    // 					// echo "CORRECT SIZE"."<br>";

    // 					if (!($fileUpload->fileAlreadyExists())) {
    // 						// echo "FILE DOESNT EXIST"."<br>";
    // 				    $user->save($connection);
    // 					 $fileUpload->uploadFile() ;

    // 					}else{
    // 						echo "FILE EXISTS"."<br>";

    // 					}

    // 				}else{
    // 					echo "PICK A SMALLER SIZE"."<br>";
    // 				}

    // 			}else{
    // 				echo "INCORRECT TYPE"."<br>";
    // 			}


    // 		}else{echo "NO FILE DETECTED"."<br>";}
    // 	}
    //    $connection->closeConnection();

    // print_r($users);
}


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/Lab1.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    <script type="text/javascript" src="js/Timezone.js"></script>
    <script src="js/Validate.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/Validate.css">
</head>

<body>
    <form method="post" name="user_details" id="user_details" enctype="multipart/form-data" onsubmit="return validateForm()" action="<?= $_SERVER['PHP_SELF'] ?>">
        <div class="container">
            <!-- lab 2 -->
            <div id="form_errors">
                <?php
                session_start();
                if (!empty($_SESSION['form_errors'])) {
                    echo " " . $_SESSION['form_errors'] . "<br>";
                    unset($_SESSION['form_errors']);
                }
                ?>
            </div>
            <label for="fname"><b>First Name</b></label>
            <input type="text" placeholder="Enter First Name" name="first_name" id="fname" required>

            <label for="lname"><b>Last Name</b></label>
            <input type="text" placeholder="Enter Last Name" name="last_name" id="lname" required>

            <label for="city"><b>City</b></label>
            <input type="text" placeholder="Enter City Name" name="city_name" id="city" required>

            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" id="uname" required>
            <td><label style="display: <?php echo $_SESSION['style'] ?>">Try another username </label></td><br>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" id="pass" required>

            <label for="fileToUpload"><b>Profile Image</b></label><br>
            <input type="file" name="fileToUpload" id="fileToUpload">

            <button type="submit" name="btn_save">Save</button>
            <!-- <button type="submit"><a class="loginButton" href="Login.php" >Login</a></button> -->

            <tr>
                <td> <input type="hidden" name="utc_timestamp" id="utc_timestamp" value=""> </td>
            </tr>

            <tr>
                <td> <input type="hidden" name="time_zone_offset" id="time_zone_offset" value=""> </td>
            </tr>
        </div>
    </form>
</body>

<!-- // $result = $user->save($connection->connection);
        // // $users = $user->readAll($connection->connection)->fetch_assoc();


        // // lab 2 : create object for file uploading
        // $uploader = new FileUploader();
        // // lab 2 :call uploadFile() which returns
        // $file_upload_response = $uploader->uploadFile();

        // // lab 2 : check if the operation save occurred successfully
        // if($result && $file_upload_response)
        // {
        //     // header("Location:AllRecords.php?success=1");
        //     // echo 'Save operation successful!!';
        //     $connection->closeConnection();
        // }
        // else
        // {
        //     echo 'An Error occurred. Try again';
        // }
              //FileUpload Instance -->

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/Lab1.css">
        <script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> 
       
       <script type="text/javascript" src="js/Timezone.js"></script>
        <script src="js/Validate.js" type="text/javascript"></script>
        <link rel="stylesheet" href="css/Validate.css">
    </head>
    <body>
        <form method="post" name="user_details" id="user_details" onsubmit="return validateForm()" action="<?=$_SERVER['PHP_SELF']?>">
          <!-- enctype="multipart/form-data" -->
            <div class="container">
                <!-- lab 2 -->
                <div id="form_errors">
                    <?php
                        session_start();
                        if(!empty($_SESSION['form_errors'])){
                        echo " ". $_SESSION['form_errors'] ."<br>";
                        unset($_SESSION['form_errors']);
                        }

                        if(!empty($_SESSION['exists'])){
                        echo " ". $_SESSION['exists'];
                        unset($_SESSION['exists']);
                        }
                    ?>
                </div>
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
            
                <label for="fileToUpload">Profile Image</label>
                <input type="file" name="fileToUpload" id="fileToUpload">


                <!-- <button type="submit" name="btn_save">Save</button> -->
                <button type="submit"><a class="loginButton" href="Login.php" >Login</a></button>

                <tr>
                 <td> <input type="hidden" name="utc_timestamp" id="utc_timestamp" value=""> </td> 
             </tr>

             <tr>
                     <td> <input type="hidden" name="time_zone_offset" id="time_zone_offset" value=""> </td>
             </tr>
            </div>
        </form>
    </body>
</html>