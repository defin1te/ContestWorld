<?php
require_once('db.php');

session_start();

$login = $_POST['login'];
$pass = $_POST['pass'];

if(empty($login) || empty($pass)){
    echo 'Empty space';
}
else {
    try {
        $stmt = $conn->prepare("SELECT * FROM `Users` WHERE login = ? AND pass = ?");
        $stmt->bind_param("ss", $login, $pass);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $_SESSION['login'] = $row["login"];
                header('Location: about.php?login='.$row["login"]);
            }
        }
        else {
            echo "No such user";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>