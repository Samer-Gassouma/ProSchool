<?php
include_once('controller/config.php');
if(isset($_POST["do"])&&($_POST["do"]=="add_teacher")){

	$index_number = date("Ymjhis").uniqid().substr(str_shuffle("0123456789"),0,8);	
	$full_name = $_POST["full_name"];
	$gender = $_POST["gender"];
	$address = $_POST["address"];
	$phone = $_POST["phone"];
	$email = $_POST["email"];
	$subject = $_POST["subject"];
	$school = $_POST["my_school"];
	$current_date=date("Y-m-d");
	
	$target_dir = "uploads/";
	$name = basename($_FILES["fileToUpload"]["name"]);
	$size = $_FILES["fileToUpload"]["size"];
	$type = $_FILES["fileToUpload"]["type"];
	$tmpname = $_FILES["fileToUpload"]["tmp_name"];
	
	$max = 31457280;
	$extention = strtolower(substr($name, strpos($name, ".")+ 1));
	$filename = date("Ymjhis");
	
	$sql1="SELECT * FROM teacher where index_number='$index_number' and Id_School ='$school'";	
	$result1=mysqli_query($conn,$sql1);
	if (mysqli_num_rows($result1) >0) {
		$msg+=1;
	}else{
		$sql2="SELECT * FROM teacher where email='$email' and Id_School ='$school'";	
		$result2=mysqli_query($conn,$sql2);
		if (mysqli_num_rows($result2) >0) {
			$msg+=2;
		}else{
			$image_path =  $target_dir.$filename.".".$extention;
			if(($extention == "jpg" || $extention == "jpeg" || $extention == "png") && $size < $max){//This line is not needed, bcz we checked it before.    																					
				if(move_uploaded_file($tmpname, $image_path)){
					//MSK-000143-5	
					
					$sql = "INSERT INTO teacher (index_number,full_name,gender,address,phone,email,image_name,reg_date,Subject,id_school)
							VALUES ('".$index_number."','".$full_name."','".$gender."','".$address."','".$phone."','".$email."','".$image_path."','".$current_date."','".$subject."','".$school."')";
					if(mysqli_query($conn,$sql)){
						$msg+=2;  
						//MSK-000143-6 The record has been successfully inserted into the database.
						$sql3= "INSERT INTO user (email,password,type)
								VALUES ('".$email."','12345','Teacher')";
						
						mysqli_query($conn,$sql3);
					}else{
						$msg+=3;  
						//MSK-000143-7 Connection problem.
					}
		
				}else{
					//MSK-000143-8 If there aren't any folder - "uploads"
					$msg+=6;  
				}

			}else{
				//you can do anything when image type or size have a problem, but we have checked it before submit the form. 
				//And you need to know, how to check that using PHP
			}
		}
	}
	header("Location: view/teacher.php?do=alert_from_insert&msg=$msg");//MSK-000143-9
}
?>