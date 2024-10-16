<?php

$servername = "localhost";
$username = "db24_081";
$password = "db24_081";
$dbname = "db24_081_football";

$conn = new mysqli($servername,$username,$password);
if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}
if(!$conn->select_db($dbname)){
    die("Connection failed: ".$conn->connect_error);
}
