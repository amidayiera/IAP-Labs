<?php
    include 'User.php';
    include 'Connection.php';

    $connection = new DBconnector();
    $result = User::readAll($connection->connection);

    if ( isset($_GET['success']) && $_GET['success'] == 1 )
{
     // treat the succes case ex:
    echo 'Save Operation Successful';
}
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/AllRecords.css">
        <title>View Records</title>
    </head>
    <body>

        <table style="width: 100%" class="container">
            <tr>
                <th>Id.</th>
                <th>First Name.</th>
                <th>Last Name.</th>
                <th>City.</th>
            </tr>
            <?php
                if ($result->num_rows > 0)
                {
                    while($row=$result->fetch_assoc())
                    {
                        echo '<tr>';
                        echo '<td>' . $row['id'] . '</td>';
                        echo '<td>' . $row['first_name'] . '</td>';
                        echo '<td>' . $row['last_name'] . '</td>';
                        echo '<td>' . $row['user_city'] . '</td>';
                        echo '</tr>';
                    }
                }
            ?>
        </table>
    </body>
</html>