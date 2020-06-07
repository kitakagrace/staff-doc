<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "photos";

$conn = mysqli_connect($host, $username,$password, $database);

if(!$conn){
   echo "error connction"; 
}else{
    
}
?>