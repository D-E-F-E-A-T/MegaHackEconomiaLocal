<?php
    // Turn off error reporting
    // error_reporting(0);
    date_default_timezone_set('America/Sao_Paulo');
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "my_neighbor";
    $mysqli = new mysqli($servername, $username, $password, $dbname);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    // printf("Initial character set: %s\n", $mysqli->character_set_name());
    if (!$mysqli->set_charset("utf8")) {
        //printf("Error loading character set utf8: %s\n", $mysqli->error);
        exit();
    }/* else {
        printf("Current character set: %s\n", $mysqli->character_set_name());
    }*/
    
/*
    $mysqli->close();
?>*/