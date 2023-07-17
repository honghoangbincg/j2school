<?php 
$servername = "localhost";
$username = "root";
$password = "";
$tableName = "js2cshool";

// Create connection
$connect = mysqli_connect($servername, $username, $password, $tableName);
mysqli_set_charset($connect, 'utf8');