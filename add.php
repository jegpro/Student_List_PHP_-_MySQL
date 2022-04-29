 <style type="text/css">
 	input {display: flex;justify-content: center;width: 20%;}
 </style>

 <form action="?add" method="post" enctype="multipart/form-data">
        <label style="font-family: Arial, Helvetica, sans-serif;"><b>Lastname</b></label>
        <input type="text" name="last_name" placeholder="Input your lastname" style="border-radius: 5px; border: 2px solid green; background-color: #DBFFA4; margin-top: 5px; margin-bottom: 5px; height:30px;">
        <label style="font-family: Arial, Helvetica, sans-serif;"><b>Firstname</b></label>
        <input type="text" name="first_name" placeholder="Input your firstname" style="border-radius: 5px; border: 2px solid green; background-color: #DBFFA4; margin-top: 5px; margin-bottom: 5px; height:30px;">
        <label style="font-family: Arial, Helvetica, sans-serif;"><b>Isikukood</b></label>
        <input type="text" name="isikukood" placeholder="Input your isikukood (11 digits)" style="border-radius: 5px; border: 2px solid green; background-color: #DBFFA4; margin-top: 5px; margin-bottom: 5px; height:30px;">
         <label style="font-family: Arial, Helvetica, sans-serif;"><b>Course</b></label>
        <input type="integer" name="course" placeholder="Input your course (1-2-3-4-5-...)" style="border-radius: 5px; border: 2px solid green; background-color: #DBFFA4; margin-top: 5px; margin-bottom: 5px; height:30px;">
        <label style="font-family: Arial, Helvetica, sans-serif;"><b>E-mail</b></label>
        <input type="text" name="email" placeholder="Input your E-mail (mail@mail.com)" style="border-radius: 5px; border: 2px solid green; background-color: #DBFFA4; margin-top: 5px; margin-bottom: 5px; height:30px;">
        <label style="font-family: Arial, Helvetica, sans-serif;"><b>Message</b></label><br>
        <textarea type="text" name="msg" placeholder="Input message (not required)" style="border-radius: 5px; border: 2px solid green; background-color: #DBFFA4; margin-top: 5px; margin-bottom: 5px; width:252px; height:100px;"></textarea><br>
        <button type="submit" id=submit style="margin-top: 5px; width:124px; height:30px; border-radius: 5px; border: 2px solid green; background-color: #74E315; font-family: Arial, Helvetica, sans-serif;"><b>Record</b></button>
        <button type="reset" id=cancel style="margin-top: 5px; width:124px; height:30px; border-radius: 5px; border: 2px solid red; background-color: #FFADA4; font-family: Arial, Helvetica, sans-serif;"><b>Cancel</b></button>
       
    </form>

<?php
//Условие срабатывает при нажатии на кнопку "Record"
if (isset($_GET['add'])) 
{ 
//Подключение к БД
try {
	$dbh = new PDO('mysql:dbname=student_list;host=localhost', 'root', '');
} catch (PDOException $e) {
	die($e->getMessage());
}
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $email = $_POST['email'];
    $isikukood = $_POST['isikukood'];
    $course = $_POST['course'];
    $msg = $_POST['msg'];

    $error = 2;

    //Проверка на пустоту полей
    function valid()
    {
    	if (!empty($last_name) or !empty($first_name) or !empty($email) or !empty($isikukood) or !empty($course)) {
    		?><script type="text/javascript">alert("Please fill empty fields!");</script>
    		<?php
    		$error = 1;
    	}
    }
    valid();
 //Проверка корректности почты
    function check_email ($email_1)
    {
		    if (filter_var($email_1, FILTER_VALIDATE_EMAIL)) {
		    return true;
		}
		else {return false;}
	}
 //Проверка личного кода на кол-во символов
	 function check_code ($isikukood_1)
    {
		    if(is_numeric($isikukood_1) and strlen($isikukood_1)>=11)
{
		    return true;
		}
		else {return false;}
	}
 //Проверка почты и если она неверна, то возвращает оповещение о неверно введонной почты
	if (check_email($email) == false){
		?><script type="text/javascript">alert("Email input incorrectly! Try again...");</script>

    		<?php
    		$error = 1;
	}

	if (check_code($isikukood) == false){
		?><script type="text/javascript">alert("Lenght of isikukood should be 11 symbols!");</script>

    		<?php
    		$error = 1;
	}
   //Если значение 2 - то заносим в таблицу данные
if ($error == 2){
 //Делает первую букву имени и фимилии большими 
	function mb_ucfirst($str) {
    $str = mb_strtoupper(mb_substr($str, 0, 1, 'UTF-8'), 'UTF-8') .
            mb_strtolower(mb_substr($str, 1, mb_strlen($str), 'UTF-8'), 'UTF-8');
    return $str;
  }

  $last_name = mb_ucfirst($last_name);
  $first_name = mb_ucfirst($first_name);

  function mini($email1){
  	$email1 = mb_strtolower($email1);
  	return $email1;
  }
  $email = mini($email);

   //Вставка данных полей в БД
  if(strlen($msg)<1){
  $sth = $dbh->prepare("INSERT INTO `student_list` SET `last_name` = :last_name, `first_name` = :first_name, `isikukood` = :isikukood, `course` = :course, `email` = :email, `msg` = :msg");
	$sth->execute(array('last_name' => $last_name, 'first_name' => $first_name, 'isikukood' => $isikukood, 'course' => $course, 'email' => $email, 'msg' => $msg));
}
if(strlen($msg)>0){
    $sth = $dbh->prepare("INSERT INTO `student_list` SET `last_name` = :last_name, `first_name` = :first_name, `isikukood` = :isikukood, `course` = :course, `email` = :email, `msg` = :msg");
      $sth->execute(array('last_name' => $last_name, 'first_name' => $first_name, 'isikukood' => $isikukood, 'course' => $course, 'email' => $email, 'msg' => $msg));
  }
	?>

<script type="text/javascript">
    var javaScriptVar = "<?php echo $last_name;echo(' ');echo $first_name; echo (' added into DB!'); ?>";
    alert(javaScriptVar);
</script>
	<?php
}
}
?>
<a href="index.php" style="font-family: Arial, Helvetica, sans-serif; margin-left:85px;"><b>Main page</b></a>