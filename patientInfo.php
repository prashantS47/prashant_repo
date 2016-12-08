<?php
	header('Access-Control-Allow-Origin: *'); 
	$conn = mysql_connect('sql6.freesqldatabase.com', 'sql6147862', '9EaGabMn8E') or die (mysql_error());
	@mysql_select_db('sql6147862') or die("Unable to select database");
	$rightLimit=10;
	$count=0;
	$leftLimit= $_GET['pageNumber'];
	if($leftLimit!=1){
	$leftLimit=($leftLimit-1)*10;
	}
    else{
          $countQuery="select count(*) as count from patient";
	  $resultcount = mysql_query($countQuery);
          while($row =mysql_fetch_array($resultcount)) 
          $count=$row['count'];
	   $leftLimit=0;
	}
	$sql = "SELECT * from patient limit ".$leftLimit.",".$rightLimit;
        $result= mysql_query($sql);
	
	$patientDetailsArray=array('patientDetails'=>array(),'count'=>$count);
	$arr=array();
	
       while($row =mysql_fetch_array($result)) 
 	$arr[$row['patient_id']]=$row;
     
	$patientDetailsArray['patientDetails']=$arr;
	echo json_encode($patientDetailsArray);
	mysql_close();
?>
