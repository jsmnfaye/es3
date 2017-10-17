<?php
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "es3";

// connect to mysql
$connect = mysqli_connect($hostname, $username, $password, $databaseName);

// mysql select query

$query = "SELECT * FROM mydata limit 10";


// result for method one
$result1 = mysqli_query($connect, $query);

?>

<!DOCTYPE html>

<html>

    <head>

        <title>PHP DATA ROW TABLE FROM DATABASE</title>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <style>

            table,th,tr,td
            {
                border: 1px solid black;
            }

        </style>

    </head>

    <body>

<!-- Table One -->
        <table style="background-color: red;">

            <tr>
                <th>Id</th>
                <th>Voltage</th>
                <th>Luminosity</th>
                <th>Temperature</th>
            </tr>

            <?php while($row1 = mysqli_fetch_array($result1)):;?>
            <tr>
                <td><?php echo $row1[0];?></td>
                <td><?php echo $row1[1];?></td>
                <td><?php echo $row1[2];?></td>
                <td><?php echo $row1[3];?></td>
            </tr>
            <?php endwhile;?>

        </table>

        <br><br>