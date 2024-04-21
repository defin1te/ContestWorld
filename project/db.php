<?php

// $conn = mysqli_connect('localhost', 'root', 'root', 'ContestWorld');

// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// } else {
//     echo "Success";
// }

?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ContestWorld";
$db_port = 8888;

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(mysqli_connect_errno()){
    echo "FAiled";
    exit();
}
?>
