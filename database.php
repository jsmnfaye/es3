<?php 
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "es3";
    $mysqli = new mysqli($server, $username, $password, $database);
    $con = mysqli_connect($server, $username, $password, $database);
    if($mysqli->connect_error){
        die("Connect failed: ".$mysqli->connect_error);
    }
?>