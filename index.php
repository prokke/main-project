<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script defer src="script.js"></script>
    <title>клиент серверное приложение</title>
</head>
<body>


<form id="form-insert-students">
    <input type="text" name="fname" id="fname" placeholder="Введите имя" required><br>
    <input type="text" name="lname" id="lname" placeholder="Введите фамилию" required><br>
    <input type="number" name="age" id="age" placeholder="Введите возраст" required><br>
    <input type="radio" name="gender" id="m" value="m" >
    <label for="m">мужской</label>
    <input type="radio" name="gender" id="f" value="f" >
    <label for="f">женский</label>
    <input type="radio" name="gender" id="attack helicopter" value="attack helicopter" checked>
    <label for="attack helicopter">боевой вертолет</label><br>
    <input type="submit" value="добовить"><br><br><br>
</form>

<form id="form-insert-group">
    <input type="text" name="title" id="title" placeholder="Введите имя группы" required><br>
    <input type="submit" value="добавить"><br><br><br>
</form>


    <div class="content">
    <?php
        require_once('config.php');
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
        $sqlg = "SELECT * FROM `groups`";
        // request run
        $result = $connect->query($sql);
        $resultg = $connect->query($sqlg);
        // output request result 
        
        
        while($row = $result->fetch_assoc()){
            echo "<div>$row[l_name], $row[f_name], $row[gender], $row[age]</div>";
        }
        while($row = $resultg->fetch_assoc()){
            echo "<div>$row[title]</div>";
        }
    ?> 
    </div>
       
<div class="block"></div>

<div class="message">

</div>

</body>
</html>