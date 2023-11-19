<?php

$server   = "localhost";
$user     = "root";
$password = "";
$db       = "CHICKSPACE";

if($_SERVER['SERVER_NAME'] === 'localhost'){
    
define("ROOT", "http://localhost/ChickSpace/");
$server   = "localhost";
$user     = "root";
$password = "";
$db       = "CHICKSPACE";

} else {

define("ROOT", "https://chickspace.online/");
$server   = "localhost";
$user     = "u447134747_rafael";
$password = "Chick08082005";
$db       = "u447134747_CHICKSPACE";
    
}

$conn     = mysqli_connect($server,$user,$password,$db);
?>