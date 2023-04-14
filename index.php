<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>клиент серверное приложение</title>
</head>
<body>


<form action="insert-student.php" method="POST">
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