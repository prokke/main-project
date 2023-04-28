
<?php
    /* создание подготавливаемого запроса */
    $result = $this->connect->prepare("SELECT *
    FROM students
    JOIN groups
    ON students.id_group = groups.group_id
    WHERE students.student_id = ?
    ");
    if (!$result) {
        echo "Error: " . $this->connect->error;
        exit;
    }
    
    /* связывание параметров с метками */
    $result->bind_param("i", $id);
    /* выполнение запроса */
    $result->execute();
    /* получение данных*/
    $rows = $result->get_result();


    if (!$rows) {
        echo "<p>Данных нет</p>";
    } else {
    
        echo "<p class='back'><a href='./'>Назад</a></p>";
        $myrow  =  $rows->fetch_assoc();

        echo "<div>
        $myrow[l_name],$myrow[f_name],$myrow[age],$myrow[title]
        </div>
        <img class='avatar'
        src='./content/$myrow[path_image]'
        alt='student avatar'>"; 
    }
