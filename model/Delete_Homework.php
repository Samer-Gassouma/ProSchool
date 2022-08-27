<?php
include_once('../controller/config.php');


	$id=$POST['id'];
    
	
	$sql="Delete FROM backup_homework where File_id='$id'";	
	$result=mysqli_query($conn,$sql);


header("Location: ../view/home_work_create.php");
?>