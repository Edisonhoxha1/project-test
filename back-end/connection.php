<?php

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "newmedia";

    $conn = mysqli_connect($hostname, $username, $password, $database);

    if($conn == false){
        die ("Error: not connection" .mysqli_connect_error());
    }
?>