<?php
header("Content-Type:text/html; charset=UTF-8");
require_once("API/config.php");
require_once("API/core.php");


if (isset($_GET['option'])){ //проверяем get параметр
    $class=trim(strip_tags($_GET['option'])); //очищаем его от HTML и PHP-теги и пробелы из начала и конца строки
    
} else {
    $class='main';
}



if(file_exists("API/".$class.".php")){
    include("API/".$class.".php");
    if(class_exists($class)){
        $obj = new $class;
        $obj->get_body();
    }else{
        exit("<p>неверный класс</p>");
    }
}else{
    exit("<p>неверный путь</p>");
}


?>