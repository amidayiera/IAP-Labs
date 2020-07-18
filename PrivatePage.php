<?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header("Location:Login.php");
    }
    function fetchUserApiKey()
    {
     
      $dbcon = new DBconnector();
      $user = $_SESSION['username'];
      $myquery = mysqli_query($dbcon->conn, "SELECT * FROM users WHERE username='$user'");
      $user_array = mysqli_fetch_assoc($myquery);
      $uid = $user_array['id'];
      $good = mysqli_query($dbcon->conn, "SELECT * FROM api_keys WHERE user_id = '$uid' ORDER BY `api_keys`.`id` DESC") or die(mysqli_error($dbcon->conn));
      $key =  mysqli_fetch_assoc($good);
      return $key['api_key'];
  
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/Lab1.css">
        <script src="js/validate.js" type="text/javascript"></script>

     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/validate.css">
</head>
<body>
<p align='right'><a href="logout.php">Logout</a></p>
        <hr>
        <h3>Here, we will create an API that will allow Users/Developer to order items from external systems</h3>
        <hr>
        <h4>We now put this feature of allowing users to generate an API key. Click the button to generate the API key</h4>

        <button class="btn btn-primary" id="api-key-btn">Generate APi key</button> <br> <br>

        <!---The text area below will hold the APi key-->
        <strong>Your API key:</strong>(Note that if your API key is already in use by already running applications, generating new key will stop the application from functioning) <br>

        <textarea name="api_key" id="api_key" cols="100" rows="2" readonly> <?php echo fetchUserApiKey(); ?> </textarea>

        <h3>Service Description:</h3>
        We have a service/API that allows extrenal applications to order food and also pull all order status by using order id. Let's do it

        <hr>

</body>
</html>