<?php
include_once('controller/config.php');
if(isset($_POST["do"])&&($_POST["do"]=="add_timetable")){
	

	$grade_id=$_POST["grade_id"]; 
	$sqls = "SELECT * FROM class where id='$grade_id'";
	$results = mysqli_query($conn,$sqls);
	$rows = mysqli_fetch_assoc($results);
	$my_school = $rows['Id_School'];
	//$my_school = $_POST["my_school"];
	$day=$_POST["day"]; 

	$teacher_id=$_POST["teacher_id"]; 
	$sqas = "SELECT * FROM teacher where id='$teacher_id'";
	$resultas = mysqli_query($conn,$sqas);
	$rowsas = mysqli_fetch_assoc($resultas);
	$Subject = $rowsas['Subject'];

	$num = "SELECT * FROM subject where name='$Subject'";
	if($result = mysqli_query($conn,$num)){
		$rowq = mysqli_fetch_assoc($result);
		$id_subject = $rowq['id'];
	}

	$classroom_id=$_POST["classroom_id"];
	$start_time=$_POST["start_time"]; 
	$end_time=$_POST["end_time"]; 
	
	$msg=0;//for alerts

	$sql_test = "SELECT * FROM timetable where start_time = $start_time and day ='$day' and teacher_id = $teacher_id";
	$res_test = mysqli_query($conn,$sql_test);
	if(mysqli_num_rows($res_test) > 0){
		$msg+=4;
	}else{ 
		$sql_test1 = "SELECT * FROM timetable where start_time = $start_time and day ='$day' and class_id = $grade_id";
		$res_test1 = mysqli_query($conn,$sql_test1);
		if(mysqli_num_rows($res_test1)){ 
			$msg+=5;
		}else{
			$sql_test2 = "SELECT * FROM timetable where start_time = $start_time and day ='$day' and classroom_id = $classroom_id";
			$res_test2 = mysqli_query($conn,$sql_test1);
			if(mysqli_num_rows($res_test2)){
				$msg+=6;
			}else{
				$sql1="SELECT * FROM timetable WHERE day='$day' and classroom_id=$classroom_id and end_time > $start_time and (start_time <= $start_time or start_time<$end_time) and id_school ='$my_school'";	
				$result1=mysqli_query($conn,$sql1);
				
				if(($result1)){
					$sql="INSERT INTO timetable (class_id,day,subject_id,teacher_id,classroom_id,start_time,end_time,Id_School)
					VALUES ( '".$grade_id."','".$day."','".$id_subject."','".$teacher_id."','".$classroom_id."','".$start_time."','".$end_time."' ,'".$my_school."')";
						$result = mysqli_query($conn,$sql);
			
					if($result) {
						$msg+=2;
					}else{
						$msg+=3;
					}
					
				}else{//MSK-000143-2 
				
					
					$sql="INSERT INTO timetable (class_id,day,teacher_id,classroom_id,start_time,end_time,Id_School)
				VALUES ( '".$grade_id."','".$day."','".$teacher_id."','".$classroom_id."','".$start_time."','".$end_time."' ,'".$my_school."')";
					$result = mysqli_query($conn,$sql);

					if(mysqli_num_rows($result) > 0){
						$msg+=2;
					}else{
						$msg+=3;
					}
				}
			}
			
		}
		
	}
	  	

	if(isset($_POST["do1"])&&($_POST["do1"]=="add_timetable1")){
		
		header("Location: view/timetable.php?do=alert_from_insert&msg=$msg&grade=$grade_id");//MSK-000143-5

	}
	
	
	if(isset($_POST["do2"])&&($_POST["do2"]=="add_timetable2")){
		
		header("Location: view/my_timetable2.php?do=alert_from_insert&msg=$msg");//MSK-000143-5

	}

}
?>

