<?php 
$servername = "localhost";
$username = "root";
$password = "";
$tableName = "";

// Create connection
$connect = mysqli_connect($servername, $username, $password, $tableName);
mysqli_set_charset($connect, 'utf8');