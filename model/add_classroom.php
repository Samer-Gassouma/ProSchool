<?php
include_once('controller/config.php');
if(isset($_POST["do"])&&($_POST["do"]=="add_classroom")){

	$name=$_POST["name"];
	$levle = substr($name,0,1);

	$id_school = $_POST["id_shcool"];
	$sql1="SELECT * FROM class where name='$name' and Id_School ='$id_school'";	
	$result1=mysqli_query($conn,$sql1);
	if (mysqli_num_rows($result1) >0) { 
		$msg+=1;
	}else{
		$sql="INSERT INTO class (name,Id_School,level) 
		   VALUES ('".$name."','".$id_school."','".$levle."')";
		if(mysqli_query($conn,$sql)){
			$msg+=2;
		}else{
			$msg+=3;
		}
	}


header("Location: view/class_room.php?do=alert_from_insert&msg=$msg");//MSK-000143-5

}
?>

