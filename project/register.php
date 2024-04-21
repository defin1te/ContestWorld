<?php
require_once('db.php');
$login = $_POST['login'];
$pass = $_POST['pass'];
$repeatpass = $_POST['repeatpass'];
$email = $_POST['email'];

if (empty($login) || empty($pass) || empty($repeatpass) || empty($email)){
    echo "Enter data";
}
else{
    if($pass != $repeatpass){
        echo "Passwords do not match";
    }
    else{
        $sql = "INSERT INTO `Users` (login, pass, email) VALUES ('$login', '$pass', '$email')";
        if($conn -> query($sql) === TRUE){
            echo "Success";
        }
        else{
            echo "Error: " . $conn->error;
        }
    }
}
?>