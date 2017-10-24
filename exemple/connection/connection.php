<?php
$server_username = "root";
$server_password = "123456";
$server_host = "localhost";
$database = 'dangky1';
 
$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
mysqli_query($conn,"SET NAMES 'UTF8'");