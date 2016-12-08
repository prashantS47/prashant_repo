<?php
     header('Access-Control-Allow-Origin: *');
	var_dump($_POST);
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$age=$_POST['age'];
	$gender=$_POST['gender'];
	$dob=$_POST['dob'];
	$phone=$_POST['phone'];
	$freetext=$_POST['freetext'];
	$uri = $_SERVER['HTTP_HOST'];
	$conn = mysql_connect('sql6.freesqldatabase.com', 'sql6147862', '9EaGabMn8E') or die (mysql_error());
	//echo "connected";
	@mysql_select_db('sql6147862') or die("Unable to select database");
    $sql = "insert into patient (firstname,lastname,age,gender,date_of_birth,phone,free_text_info) values('".$firstname."','".$lastname."',".$age.",'".$gender."','".$dob."','".$phone."','".$freetext."')";
	echo $sql;
  $result = mysql_query($sql);
	mysql_close();
?>
