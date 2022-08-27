<?php
    include_once('../controller/config.php');
        $msg = 0;




        $file = $_FILES['my_file'];
        $name = $file['name'];
        $tmp_name = $file['tmp_name'];
        $size = $file['size'];
        $type = $file['type'];
        $error = $file['error'];
        $Title = $_POST['Title'];
        $Comment = $_POST['Comment'];
        $class = $_POST['class'];
        $id = $_POST['id'];        
        $path = "uploads/".$name;   
        $id_school = $_POST['id_school'];
        if($error == 0){
            if ($size > 500000) {
                $em = "Sorry, your file is too large.";
                header("Location: createCourses.php?error=$em");
            } else {
                $file_type = strtolower(pathinfo($path, PATHINFO_EXTENSION));
                $allow_type = array('jpg', 'jpeg', 'png', 'gif', 'pdf', 'doc', 'docx', 'ppt', 'pptx', 'xls', 'xlsx', 'txt', 'zip', 'rar');
                if(in_array($file_type, $allow_type)){
                    $new_file_name = uniqid('FILE', true).".".$file_type;
                    $new_file_path = "../uploads/".$new_file_name;
                    echo $new_file_path;
                    if(move_uploaded_file($tmp_name, $new_file_path)){
                        
                        $sql1 = "SELECT id FROM `class` WHERE `name` = '$class' AND `id_shcool` = '$id_school'"; 
                        
                        $result1 = mysqli_query($conn, $sql1);
                        $row1 = mysqli_fetch_assoc($result1);
                        $idc = $row1['id'];
                        $d = date("Y-m-d H:i:s");
                       
                      $sql = "INSERT INTO homework_upload(Title, Comment, class, File_path,File_name,Id_class,Date_homework,id_Teacher,id_school) VALUES('$Title', '$Comment', '$class', '$new_file_path','$new_file_name','$idc','$d','$id','$id_school')";

                        
                      mysqli_query($conn,$sql); 
                      if(mysqli_affected_rows($conn) > 0){
                            $BackUp = "INSERT INTO backup_homework(Title, Comment, class, File_path,File_name,Id_class,Date_homework,id_Teacher,id_school) VALUES('$Title', '$Comment', '$class', '$new_file_path','$new_file_name','$idc','$d','$id','$id_school')";
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
    