<?php
$sql = "SELECT * FROM `students`";
// request run
$result = $this->connect->query($sql);
// output request result 

while($row = $result->fetch_assoc()){
    echo "<div>$row[l_name], $row[f_name], $row[gender], $row[age]</div>";
}
?>