<?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header("Location:Login.php");
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
        <link rel="stylesheet" href="css/validate.css">
</head>
<body>
    <h1>This is a private page</h1>
    <h1>we want to protect  it</h1>
    <h4><a href="Logout.php">Logout</a></h4>
    
</body>
</html>