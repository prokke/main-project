<?php
header("Content-Type:text/html; charset=UTF-8");
require_once("API/config.php");
require_once("API/core.php");

if(file_exists("API/main.php")){
    include("API/main.php");
    if(class_exists("Main")){
        $obj = new Main;
        $obj->get_body();
    }else{
        exit("<p>неверный класс</p>");
    }
}else{
    exit("<p>неверный путь</p>");
}


?>