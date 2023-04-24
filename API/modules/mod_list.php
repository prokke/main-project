<form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
  <label for="age"></label>
  <input type="range" id="age" name="age" min="0" value="110" max="110" step="1" oninput="level.value = age.valueAsNumber" >
  <output for="age" name="level">110</output>
  <select name="group_id">
    <option value="">Все группы</option>
    <?php
      $result = $this->connect->query("SELECT * FROM groups");
      while($row = $result->fetch_assoc()){
        echo "<option value='{$row['group_id']}'>{$row['title']}</option>";
      }
    ?>
  </select>
  <select name="sort">
    <option value="asc">по возр.</option>
    <option value="desc">по убыв.</option>
  </select>
  <input type="submit" value="фильтровать">
</form>


<?php

$extra_sql = " ";
if(isset($_POST['age'])){
    $age = $this->formatstr($_POST['age']);
    $extra_sql .= " WHERE age < $age";
  }
  
  if(isset($_POST['group_id']) && $_POST['group_id'] != ''){
    $group_id = $this->formatstr($_POST['group_id']);
    $extra_sql .= " AND students.id_group = $group_id";
  }
  
  if(isset($_POST['sort'])){
    $sort = $this->formatstr($_POST['sort']);
    $extra_sql .= " ORDER BY age $sort";
  }
  


// request run
$result=$this->connect->query("SELECT * FROM students JOIN groups ON students.id_group=groups.group_id".$extra_sql);
// output request result 

while($row = $result->fetch_assoc()){
    echo "<div><a href='?option=details&id={$row['student_id']}'>{$row['l_name']}, {$row['f_name']}, {$row['gender']}, {$row['age']}, {$row['title']}</a></div>";
}

?>
