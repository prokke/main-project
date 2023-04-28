<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script defer src="script.js"></script>
    <script defer src="fetch.js"></script>
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
        require_once('API/config.php');
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
            echo "<div class='student' data-id='$row[student_id]'>$row[l_name], $row[f_name], $row[gender], $row[age]
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-heart like' viewBox='0 0 16 16'>
  <path d='m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z'/>
</svg><span class='num-like'>$row[num_like]</span>
            </div>";
        }
        while($row = $resultg->fetch_assoc()){
            echo "<div>$row[title]</div>";
        }
    ?> 
    </div>
       
<div class="block"></div>

<div class="message">

</div>


<form id="form-auth" method="POST" action="API/auth.php">
        <input type="text" id="login" name="login" placeholder="Введите логин" required><br>
        <input type="password" id="password" name="password" placeholder="Введите пароль" required><br>
        <input type="submit" value="Войти">
</form>


</body>
</html>