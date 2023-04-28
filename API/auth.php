<?php
require_once('config.php');
// подключаемся к БД
$connect = new mysqli(HOST, USER, PASS, DB);
if ($connect->connect_error) {
  exit("Ошибка при подключении к базе данных: " . $connect->connect_error);
}
// устанавливаем кодировку utf-8
$connect->set_charset("utf8");


$login = $_POST['login'];
$password = $_POST['password'];



$sql = "SELECT * FROM `users` WHERE `login` = ? AND `password`= md5(?)";

$result = $connect->prepare($sql);
$result->bind_param("ss",$login,$password);
$result->execute();
$result = $result->get_result();

if($row = $result->fetch_assoc()){
    echo "вы авторизировались";
}else{
    echo "логин или пароль не вырен";
}










?>