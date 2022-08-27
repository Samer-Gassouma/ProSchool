<?php
include_once('controller/config.php');

	
	$std_index = $_POST['std_index'];	
	$grade_id = $_POST['grade_id'];
	$exam_id = $_POST['exam_id'];
	$page = $_POST['current_page'];
	
	$sqls = "SELECT * FROM student WHERE index_number='$std_index'";
	$results = mysqli_query($conn,$sqls);
	$rows = mysqli_fetch_assoc($results);
	$Id_School = $rows['Id_School'];
	$current_year=date('Y');
	$date=date("Y-m-d");
	$msg=0;//for alerts


		$sx = "SELECT * FROM exam WHERE id='$exam_id'";
		$result_sx=mysqli_query($conn,$sx);
		$row_sx=mysqli_fetch_assoc($result_sx);
		if(mysqli_num_rows($result_sx)>0){
			$subject_id=$row_sx['subject_id'];
		}
		$mark = $_POST['exam_mark'];
		
		$sql = "INSERT INTO student_exam(index_number,class_id,exam_id,subject_id,marks,year,date,Id_School)
				VALUES ('".$std_index."','".$grade_id."','".$exam_id."','".$subject_id."','".$mark."','".$current_year."','".$date."','".$Id_School."')";
				
		if(mysqli_query($conn,$sql)){
			$msg+=1;
			//MSK-000143-3 The record has been successfully inserted into the database.
		}else{
			$msg+=-1; 
		}
		
	

	header("Location: view/student_exam_marks.php?do=show_student_from_insert&msg=$msg&exam=$exam_id&current_year=$current_year&grade=$grade_id");		//MSK-000143-5


?>