<?php

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$age = $_POST["age"];
$gender = $_POST["gender"];

require_once('config.php');
// connect with db
$connect = new mysqli(HOST, USER, PASS, DB);
    if($connect->connect_error){
        exit();
        echo "ошибка при подключении к базе данных: " . $connect->connect_error;
    }
// set utf-8
$connect->set_charset("utf8");
//require code
$sql = "INSERT INTO `students`(`f_name`, `l_name`, `gender`, `age`) VALUES ('$fname','$lname','$gender',$age)";
//request run
$result = $connect->query($sql);

if($result){
    echo "ok)";
    // header("location: index.php");
    // redirect
}else{
    echo "error!";
}


?>