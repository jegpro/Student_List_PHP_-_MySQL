<?php
$pdo = new PDO('mysql:host=localhost;dbname=student_list', 'root', '');
$query = "DELETE FROM `student_list`";

$stmt = $pdo->prepare($query);
$stmt->execute();
?>
<h2 style="font-family: Arial, Helvetica, sans-serif; color:red;">All data deleted !</h2>
<a href="index.php" style="font-family: Arial, Helvetica, sans-serif;"><b>Main page</b></a>

