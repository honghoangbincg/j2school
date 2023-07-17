<?php 
$servername = "localhost";
$username = "root";
$password = "";
$tableName = "learn_j2school";

// Create connection
$connect = mysqli_connect($servername, $username, $password, $tableName);
mysqli_set_charset($connect, 'utf8');