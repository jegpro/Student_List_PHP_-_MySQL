<table> 
<div style="overflow-x:auto;">

    <style>



table, th, td {
  border: 0px solid;
}

th, td {
  padding: 5px;
  text-align: center;
}

th, td {
  border-bottom: 2px solid gray;
}

tr:hover {background-color: #CEFDA3;}


</style>

<?php
 //Вывод колонок из БД
select('last_name','first_name', 'isikukood',  'course',  'email',  'msg'   );
 function select($s1,$s2,$s3,$s4,$s5,$s6)
 {
     //Подключение в БД
 $connect = mysqli_connect('localhost', 'root', '', 'student_list');
       
    $all = mysqli_query($connect, "SELECT * FROM student_list");

        echo "<th>$s1</th>";
        echo "<th>$s2</th>";
        echo "<th>$s3</th>";
        echo "<th>$s4</th>";
        echo "<th>$s5</th>";
        echo "<th>$s6</th>";
      
        while($row = mysqli_fetch_assoc($all))
        {       echo "<tr>";
           foreach ($row as $key => $value) { 
                echo("<td>".$value."</td>"); }   
                echo "</tr>";
        }
 }
?>
</table>
</div>
<a href="index.php" style="font-family: Arial, Helvetica, sans-serif;"><b>Main page</b></a>