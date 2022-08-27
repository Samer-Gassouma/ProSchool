<?php
include_once('controller/config.php');
if(isset($_POST["do"])&&($_POST["do"]=="add_room")){
	$msg =0;
	$name=$_POST["name"]; 
	$id_school = $_POST["id_shcool"];
	$sql1="SELECT * FROM  class_room where name='$name' and Id_School ='$id_school'";	
	$result1=mysqli_query($conn,$sql1);
	if (mysqli_num_rows($result1) >0) {
		$msg+=1;
	}else{
		$sql="INSERT INTO class_room (name,Id_School) 
		   VALUES ('".$name."','".$id_school."')";
		if(mysqli_query($conn,$sql)){
			$msg+=2;
		}else{
			$msg+=3;
		}
	}


header("Location: view/room.php?do=alert_from_insert&msg=$msg");//MSK-000143-5

}
?>

