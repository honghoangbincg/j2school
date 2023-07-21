<?php 
$admin_servername = "localhost";
$admin_username = "root";
$admin_password = "";
$admin_tableName = "js2cshool";

// Create connection
$connect = mysqli_connect($admin_servername, $admin_username, $admin_password, $admin_tableName);
mysqli_set_charset($connect, 'utf8');