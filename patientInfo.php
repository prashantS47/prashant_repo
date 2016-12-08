<?php
	 header('Access-Control-Allow-Origin: *'); 
	//echo "i am alive";
	
	$uri = $_SERVER['HTTP_HOST'];
	$conn = mysql_connect('sql6.freesqldatabase.com', 'sql6147862', '9EaGabMn8E') or die (mysql_error());
	//echo "connected";
	@mysql_select_db('sql6147862') or die("Unable to select database");
	$sql = "SELECT * from patient";

    $result = mysql_query($sql);
	
	$patientDetailsArray=array('patientDetails'=>array());
	$arr=array();
	
    while($row =mysql_fetch_array($result)) {
	$arr[$row['patient_id']]=$row;
	
    }
	$patientDetailsArray['patientDetails']=$arr;
			echo json_encode($patientDetailsArray);
		//	$sql = "insert into patient (patient_id,firstname,lastname,age,gender,date_of_birth,phone) values(3,'mayank','ali','34','M','11-10-1986','7204219771')";

  //  $result = mysql_query($sql);
	mysql_close();
?>
