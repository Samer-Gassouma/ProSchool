<?php
include_once('controller/config.php');
echo "<SCRIPT LANGUAGE='JavaScript'>
	window.location.href='".$config['url']."/index.php?page=add_subject';
	</SCRIPT>";
if(isset($_POST["do"])&&($_POST["do"]=="add_subject_routing")){

	$class_id=$_POST['class_id'];	
	$subject_id=$_POST['subject_id'];
	$teacher_id=$_POST['teacher_id'];


	$sql1="SELECT * FROM subject_routing where class_id='$class_id' and subject_id='$subject_id' and teacher_id='$teacher_id'";
	$result1=mysqli_query($conn,$sql1);
	$row1=mysqli_fetch_assoc($result1);

	$class_id1=$row1['class_id'];	
	$subject_id1=$row1['subject_id'];
	$teacher_id1=$row1['teacher_id'];


	$msg=0;//for alerts

	//MSK-000143-2
	
		$sql="INSERT INTO subject_routing(class_id,subject_id,teacher_id,) 
      VALUES ( '".$class_id."','".$subject_id."','".$teacher_id."')";
	  
	 	if(mysqli_query($conn,$sql)){
			$msg+=2;  
			//MSK-000143-3 The record has been successfully inserted into the database.
	  	}else{
			$msg+=3;
			//MSK-000143-4 Connection problem.  
	  	}
		


	header("Location: view/subject_Routing.php?do=alert_from_insert&msg=$msg");//MSK-000143-5
	
}

?>