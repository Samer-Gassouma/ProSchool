<?php
    include_once('../controller/config.php');
        $new_date = $_POST['date'];
        $Id_School=  $_POST['id_school'];
		$id = $_POST['id'];
		$Title = $_POST['Title'];
		$Comment = $_POST['Comment'];
		$class = $_POST['grade'];
		$file_name = $_FILES['file']['name'];

		$file_temp = $_FILES['file']['tmp_name'];
		$file_size = $_FILES['file']['size'];
		$file_error = $_FILES['file']['error'];
        $path = "uploads/".$file_name;   

        if($file_size ==0){
            $sql1 = "SELECT id FROM `class` WHERE `name` = '$class'"; 
            $result1 = mysqli_query($conn, $sql1);
            $row1 = mysqli_fetch_assoc($result1);
            $idc = $row1['id'];
            
            $d = date("Y-m-d H:i:s");
            
            $sql = "INSERT INTO homework_upload(Title, Comment, class,Id_class,Date_homework,id_Teacher,deadline,Id_School) VALUES('$Title', '$Comment', '$class','$idc','$d','$id','$new_date','$Id_School')";
            $result = mysqli_query($conn, $sql);
            if($result){
                $em = "success";
                header("Location: ../view/Home_Work_Create.php?em=$em");
            }else{
                $em = "error";
                header("Location: ../view/Home_Work_Create.php?em=$em");
            }
            $res = mysqli_query($conn,$sql); 
            if($res){
                $BackUp = "INSERT INTO backup_homework(Title,Comment,Class,id_class,Date_Homewok,id_Teacher,Id_School) VALUES('$Title', '$Comment', '$class','$idc','$d','$id','$Id_School')";
                mysqli_query($conn,$BackUp);
            }
            move_uploaded_file($tmp_name, $new_file_path);
            $em = "File Uploaded Successfully";
            echo "<script>alert('$em');</script>";
            $msg = 1;
            header("Location:Home_Work_Create.php?do=alert_from_insert&msg=$msg");
        }else{ 
        if($file_error == 0){
            if ($file_size > 500000) {
                $em = "Sorry, your file is too large.";
                header("Location: Home_Work_Create.php?error=$em");
            } else {
                $file_type = strtolower(pathinfo($path, PATHINFO_EXTENSION));
                $allow_type = array('jpg', 'jpeg', 'png', 'gif', 'pdf', 'doc', 'docx', 'ppt', 'pptx', 'xls', 'xlsx', 'txt', 'zip', 'rar');
                if(in_array($file_type, $allow_type)){
                    $new_file_name = uniqid('FILE', true).".".$file_type;
                    $new_file_path = "../uploads/".$new_file_name;
                    if(move_uploaded_file($file_temp, $new_file_path)){
                        
                        $sql1 = "SELECT id FROM `class` WHERE `name` = '$class'"; 
                        
                        $result1 = mysqli_query($conn, $sql1);
                        $row1 = mysqli_fetch_assoc($result1);
                        $idc = $row1['id'];
                        
                        $d = date("Y-m-d H:i:s");
                       
                      	$sql = "INSERT INTO homework_upload(Title, Comment, class, File_path,File_name,Id_class,Date_homework,id_Teacher,deadline,Id_School) VALUES('$Title', '$Comment', '$class', '$new_file_path','$new_file_name','$idc','$d','$id','$new_date','$Id_School')";
                        $result = mysqli_query($conn, $sql);
                        if($result){
                            $em = "success";
                            header("Location: ../view/Home_Work_Create.php?em=$em");
                        }else{
                            $em = "error";
                            header("Location: ../view/Home_Work_Create.php?em=$em");
                        }
                      $res = mysqli_query($conn,$sql); 
                      if($res){
                            $BackUp = "INSERT INTO backup_homework(Title,Comment,Class,File_path,File_name,id_class,Date_Homewok,id_Teacher,Id_School) VALUES('$Title', '$Comment', '$class', '$new_file_path','$new_file_name','$idc','$d','$id','$Id_School')";
                            mysqli_query($conn,$BackUp);
                      }
                        move_uploaded_file($tmp_name, $new_file_path);
                        $em = "File Uploaded Successfully";
                        echo "<script>alert('$em');</script>";
                        $msg = 1;
                        header("Location:Home_Work_Create.php?do=alert_from_insert&msg=$msg");

                    } else {
                        $em = "Sorry, there was an error uploading your file.";
                        
                        $msg = 2;
                        header("Location:Home_Work_Create.php?do=alert_from_insert&msg=$msg");
                    }
                } else {
                    $em = "Sorry, only JPG, JPEG, PNG, GIF, PDF, DOC, DOCX, PPT, PPTX, XLS, XLSX, TXT, ZIP, RAR files are allowed.";
                    header("Location:Home_Work_Create.php?error=$em");
                }
            }


        }
        else{
            $em = "There was an error uploading your file.";
            header("Location:Home_Work_Create.php?error=$em");
        }
        }
        ?>