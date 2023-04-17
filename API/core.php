<?php
abstract class Core{
    protected $connect;

    public function __construct(){
        // connect with DB
        $this->connect = new mysqli(HOST, USER, PASS, DB);
        if($this->connect->connect_error){
            exit();
            echo "ошибка при подключении к базе данных: " . $this->connect->connect_error;
        }
        // set utf-8
        $this->connect->set_charset("utf8");
    }
    public function __destruct(){
        $this->connect->close();
    }
    public function get_body(){
        include "template/index.php";
    }




}
?>