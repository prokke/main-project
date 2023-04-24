<?php
require_once('API/config.php');

// получаем данные из формы
$title = $_POST['title'];

// подключаемся к БД
$connect = new mysqli(HOST, USER, PASS, DB);
if ($connect->connect_error) {
  exit("Ошибка при подключении к базе данных: " . $connect->connect_error);
}
// устанавливаем кодировку utf-8
$connect->set_charset("utf8");

// формируем запрос на добавление группы
$sql = "INSERT INTO `groups` (`title`) VALUES ('$title')";

// выполняем запрос
if ($connect->query($sql) === TRUE) {
  echo "ок";
} else {
  echo "error: " . $connect->error;
}

// закрываем соединение с БД
$connect->close();
?>
