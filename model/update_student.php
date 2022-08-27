<?php
include_once('controller/config.php');
if(isset($_POST["do"])&&($_POST["do"]=="update_student")){
	$msg =0;
	$std_index=$_POST['std_index'];
	$grade_id=$_POST['grade_id'];
	
	$full_name=$_POST['full_name']; 
 
	$address=$_POST['address']; 
	$gender=$_POST['gender']; 
	$phone=$_POST['phone']; 
	$email=$_POST['email'];
	$b_date = $_POST["b_date"];
	
	
		
	$target_dir = "uploads/";
	
	$name = basename($_FILES["fileToUpload"]["name"]);
	$size = $_FILES["fileToUpload"]["size"];
	$type = $_FILES["fileToUpload"]["type"];
	$tmpname = $_FILES["fileToUpload"]["tmp_name"];

	$max = 31457280;
	$extention = strtolower(substr($name, strpos($name, ".")+ 1));
	$filename = date("Ymjhis");
	
	
	if(!$name){
		
		$sql = "update student set full_name='".$full_name."',address='".$address."',gender='".$gender."',phone='".$phone."' ,email='".$email."',b_date='".$b_date."' where index_number='$std_index'";
	
		if(mysqli_query($conn,$sql)){
			$msg+=1; 
			//MSK-000143-U-8 The record has been successfully updated into the database
		}else{
			$msg+=2; 
			//MSK-000143-U-9 Connection problem
		}
	}else{
		if(move_uploaded_file($tmpname, $image_path)){
			$sql = "update student set full_name='".$full_name."',address='".$address."',gender='".$gender."',phone='".$phone."' ,email='".$email."',image_name='".$image_path."',b_date='".$b_date."' where index_number='$std_index'";
	
			if(mysqli_query($conn,$sql)){
				
				$msg+=1; 
				//MSK-000143-U-8 The record has been successfully updated into the database
			}else{
				$msg+=2; 
				//MSK-000143-U-9 Connection problem
			}
		}
		
	}
	
	

	
	if(isset($_POST["showPage"])&&($_POST["showPage"]=="all_student")){
	
		header("Location: view/all_student.php?do=alert_from_update&msg=$msg&grade=$grade_id");//MSK-000143-U-23			
	}
	
	if(isset($_POST["showPage"])&&($_POST["showPage"]=="my_student")){
	
		header("Location: view/my_student.php?do=alert_from_update&msg=$msg&grade=$grade_id");//MSK-000143-U-23			
		
	}


		
}
?>