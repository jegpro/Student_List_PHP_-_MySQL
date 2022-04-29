<a href="add.php" style="font-family: Arial, Helvetica, sans-serif; color:green; border-left: 6px solid green; text-decoration: none;"><b>Add New Student</b></a><br><br>
<a href="view.php" style="font-family: Arial, Helvetica, sans-serif; color:black; border-left: 6px solid black; text-decoration: none;"><b>Show Student List</b></a><br><br>
<a href="del.php" style="font-family: Arial, Helvetica, sans-serif; color:red; border-left: 6px solid red; text-decoration: none;"><b>Delete All Student Data</b></a>
<br/><br/><br/>
<?php
//Вывод таблицы с данными стунеднтов
$connect = mysqli_connect('localhost', 'root', '', 'student_list');
?>
