<?php
include_once('controller/config.php');
if(isset($_POST["do"])&&($_POST["do"]=="add_student_exam_mark")){
	
	$my_index = $_POST['my_index'];
	$std_index = $_POST['std_index'];	
	$grade_id = $_POST['grade'];
	$exam_id = $_POST['exam_id'];
	$page = $_POST['current_page'];
	
	$current_year=date('Y');
	$date=date("Y-m-d");
	$msg=0;//for alerts

	
		$subject_id = $_POST['subject_id'];
		$mark = $_POST['exam_mark'];
		$sqls = "SELECT * FROM student WHERE index_number='$std_index'";
		$results = mysqli_query($conn,$sqls);
		$row = mysqli_fetch_array($results);
		$Id_School = $row['Id_School'];
		
		$sql = "INSERT INTO student_exam(index_number,class_id,exam_id,subject_id,marks,year,date,Id_School)
				VALUES ('".$std_index."','".$grade_id."','".$exam_id."','".$subject_id."','".$mark."','".$current_year."','".$date."','".$Id_School."')";
				
		if(mysqli_query($conn,$sql)){
			$msg=1;
			//MSK-000143-3 The record has been successfully inserted into the database.
		}else{
			$msg=2; 
			//MSK-000143-4 Connection problem.
		}
		

	
//header("Location: view/all_student.php?do=alert_from_insert_eMark&msg=$msg&grade=$grade_id&page=$page");//MSK-000143-5

header("Location: view/my_student_exam_marks.php?do=alert_from_insert&msg=$msg&exam=$exam_id&current_year=$current_year&my_index=$my_index&grade=$grade_id");//MSK-000143-5

}
?>