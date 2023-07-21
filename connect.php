<?php
$conn_server = "localhost";
$conn_username = "root";
$conn_password = "";
$conn_tableName = "js2cshool";

// Create connection
$connect = mysqli_connect($conn_server, $conn_username, $conn_password, $conn_tableName);
mysqli_set_charset($connect, 'utf8');
