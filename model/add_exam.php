<?php
include_once('controller/config.php');
if(isset($_POST["do"])&&($_POST["do"]=="add_exam")){

	$name=$_POST["name"];
	$Room=$_POST["room"];
	$teacher_id=$_POST["teacher_id"];
	$date=$_POST["date"];
	$time=$_POST["time"];
	$duration=$_POST["duration"];
	$description=$_POST["description"];
	$class_id=$_POST["class"];
	$my_school = $_POST["my_school"];
	$sub = "SELECT * FROM teacher WHERE id='$teacher_id' and Id_School='$my_school'";
	$res = mysqli_query($conn,$sub);
	$row = mysqli_fetch_assoc($res);
	$Subject = $row['Subject'];
	$id_sub = "SELECT * FROM subject WHERE name='$Subject' and Id_School='$my_school'";
	$res = mysqli_query($conn,$id_sub);
	$row = mysqli_fetch_assoc($res);
	$id_sub = $row['id'];
	

	$sql1="SELECT * FROM exam where name='$name'";	
	$result1=mysqli_query($conn,$sql1);
	$row1=mysqli_fetch_assoc($result1);
	
		//MSK-000143-2
		$sql="INSERT INTO exam VALUES ('','$name','$teacher_id ','$class_id','$id_sub','$Room','$date','$time','$duration','$description','$my_school')";
      		  
	  
	 	if(mysqli_query($conn,$sql)){
	  		$msg+=2;  
			//MSK-000143-3 The record has been successfully inserted into the database.
	  	}else{
		  $msg+=3;  
		  //MSK-000143-4 Connection problem. 
	  	}
	
	header("Location: view/exam.php?msg=$msg");

}
?>

