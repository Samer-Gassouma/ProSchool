<?php
include_once('controller/config.php');
if(isset($_POST["do"])&&($_POST["do"]=="add_subject")){

	$name=$_POST["name"]; 
	$school = $_POST["my_school"];
	
	$sql1="SELECT * FROM subject where name='$name' and Id_School ='$school'";	
	$result1=mysqli_query($conn,$sql1);
	if (mysqli_num_rows($result1) >0) {
		$msg+=1;
	}else{
		$sql="INSERT INTO subject (name,Id_School) 
		   VALUES ('".$name."','".$school."')";
		if(mysqli_query($conn,$sql)){
			$msg+=2;
		}else{
			$msg+=3;
		}
	}
	

	header("Location: view/subject.php?do=alert_from_insert&msg=$msg");//MSK-000143-5

}
?>

