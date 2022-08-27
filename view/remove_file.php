<?php
include_once('../controller/config.php');
	if(ISSET($_POST['File_id'])){
		$File_id = $_POST['File_id'];
		$query = mysqli_query($conn, "SELECT * FROM `backup_homework` WHERE `File_id` = '$File_id'") or die(mysqli_error());
		$fetch  = mysqli_fetch_array($query);
		$filename = $fetch['File_name'];
		$File_id = $fetch['File_id'];
		if(unlink("files/".$File_id."/".$filename)){
			mysqli_query($conn, "DELETE FROM `backup_homework` WHERE `File_id` = '$File_id'") or die(mysqli_error());
		}
	}
?>