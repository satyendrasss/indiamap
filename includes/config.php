<?php
session_start();
define('hostname','localhost');
define('username','root');
define('password','');
define('database','v2');

$conn = mysqli_connect(hostname,username,password,database) or die(mysqli_error());
mysqli_set_charset($conn,"utf8");

if(!$conn)
{
    echo "Connection failed.......!";
}
error_reporting(0);
?>