<?php

$dbServername="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="procows";

$conn= mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}