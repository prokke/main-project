<?php
require_once('API/config.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $title = $_POST["title"];
    $conn = new mysqli(HOST, USER, PASS, DB);

    if($conn->connect_error){
        die("Ошибка подключения: " . $conn->connect_error);
    }

    $sql = "INSERT INTO groups (title) VALUES ('$title')";

    if($conn->query($sql) === TRUE){
        echo "ok";
    }else{
        echo "error";
    }

    $conn->close();
}
?>
