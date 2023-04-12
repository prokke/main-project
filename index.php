<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>клиент серверное приложение</title>
</head>
<body>
    <?php
        define("HOST","localhost");
        define("USER","root");
        define("PASS","root");
        define("DB","school");
        // connect with db
        $connect = new mysqli(HOST, USER, PASS, DB);
        if($connect->connect_error){
            exit();
            echo "ошибка при подключении к базе данных: " . $connect->connect_error;
        }
        // set utf-8
        $connect->set_charset("utf8");
        // request code
        $sql = "SELECT * FROM `students`";
        // request run
        $result = $connect->query($sql);
        // output request result 
        
        while($row = $result->fetch_assoc()){
            echo "<div>$row[l_name], $row[f_name], $row[gender], $row[age]</div>";
        }


        echo "па кайфу! жи есс!";
    ?>    


</body>
</html>