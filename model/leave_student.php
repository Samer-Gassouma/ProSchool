<?php
include_once('../controller/config.php');
if(isset($_GET["do"])&&($_GET["do"]=="leave_student")){

	$id=$_GET["id"]; 
	$index_number=$_GET["index_number"];
	$page=$_GET["page"]; 
	$msg=0;//for alerts
	
	$sql1="update student set _status='leave' where id='$id'";	
	
	if(mysqli_query($conn,$sql1)){

		$sql="delete from student_attendance where index_number='$index_number'";	
	
		if(mysqli_query($conn,$sql)){
			$msg+=1; 
		}else{
			$msg+=2; 
		}
		
	}
	
	$res=array($msg,$page);
	echo json_encode($res);//MSK-000128-Del

}
?>
