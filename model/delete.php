<?php
include_once('../controller/config.php');



	$id=$_GET["id"]; 
	
	$msg=0;//for alerts

	$sql="DELETE FROM class WHERE id='$id'";	
	
	if(mysqli_query($conn,$sql)){
		$msg+=1; 
	}else{
		$msg+=2; 
	}
	
	$res=array($msg,$page);
	echo json_encode($res);//MSK-000128-Del
	header("location:../view/class_room.php");



?>
