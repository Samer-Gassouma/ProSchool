<?php
include_once('controller/config.php');
if(isset($_POST["do"])&&($_POST["do"]=="add_student")){

	$index_number = date("Ymjhis").uniqid().substr(str_shuffle("0123456789"),0,4);	
	$full_name = $_POST["full_name"];
	$gender = $_POST["gender"];
	$address = $_POST["address"];
	$phone = $_POST["phone"];
	$email = $_POST["email"];
	$b_date = $_POST["b_date"];
	$class_id = $_POST["grade"];
	$my_school = $_POST["my_school"];

	
	$reg_year=date("Y");
	$reg_month=date("F");
	$reg_date=date("Y-m-d");
	
	$target_dir = "uploads/";
	$name = $_FILES["fileToUpload"]["name"];
	$size = $_FILES["fileToUpload"]["size"];
	$type = $_FILES["fileToUpload"]["type"];
	$tmpname = $_FILES["fileToUpload"]["tmp_name"];

	
	$extention = strtolower(substr($name, strpos($name, ".")+ 1));
	$filename = date("Ymjhis");
	
	//Guardian Details

	$msg=0;//for alerts

	$image_path =  $target_dir.$filename.".".$extention;

	
	
	//Insert Student--------------------------------------------------
	
	$sql1="SELECT * FROM student where full_name='$full_name'";	
	$result1=mysqli_query($conn,$sql1);
	if(mysqli_num_rows($result1)>0){
		$msg=1;
	}
	else{
		$sql2="SELECT * FROM student where email='$email'";	
		$result2=mysqli_query($conn,$sql2);
		if(mysqli_num_rows($result2)>0){
			$msg=2;
		}
		else{
			$sql3="SELECT * FROM student where phone='$phone'";	
			$result3=mysqli_query($conn,$sql3);
			if(mysqli_num_rows($result3)>0){
				$msg=1;
			}
			else{
					move_uploaded_file($tmpname, $image_path);
						$sql = "INSERT INTO student (index_number,full_name,gender,address,phone,email,image_name,b_date,reg_year,reg_month,reg_date,class_id,id_school)
								VALUES ('".$index_number."','".$full_name."','".$gender."','".$address."','".$phone."','".$email."','".$image_path."','".$b_date."','".$reg_year."','".$reg_month."','".$reg_date."','".$class_id."','".$my_school."')";
		
						if(mysqli_query($conn,$sql)){
							$sql3= "INSERT INTO user (email,password,type)
									VALUES ('".$email."','12345','Student')";
							
							$res= mysqli_query($conn,$sql3);
							if($res){
								$msg+=4;
								//MSK-000144-6 The record has been successfully inserted into the database.
							}
							else{
								$msg+=8;
								//MSK-000145-6 The record has been successfully inserted into the database.
							}

						}else{
							$msg+=3;  
							//MSK-000143-7 Connection problem.
						}
					
						
			}
		}
	}
	
	
	header("Location: view/student.php?do=alert_from_insert&msg=$msg&index=$index_number");
	
}
?>