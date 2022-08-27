<?php
    include_once('../controller/config.php');
 
        $file = $_FILES['my_file'];
        $tmp_name = $file['tmp_name'];
        $size = $file['size'];
        $type = $file['type'];
        $error = $file['error'];
        $name = $file['name'];
        
        $image = $_FILES['image'];
        $img_name_tmp = $image['tmp_name'];
        $img_size = $image['size'];
        $img_type = $image['type'];
        $img_error = $image['error'];
        $img_name = $image['name'];

        $Title_ = $_POST['Title'];
        $Comment = $_POST['Comment'];
        $class = $_POST['grade'];
        $id = $_POST['id_teacher'];
            
        $path = "../Cours/".$name;   
        $img_path = "../Cours/".$img_name;
        if($error == 0){
            if ($size > 500000) {
                $em = "Sorry, your file is too large.";
                header("Location: createCourses.php?error=$em");
            } else {
                $file_type = strtolower(pathinfo($path, PATHINFO_EXTENSION));
                $allow_type = array('jpg', 'jpeg', 'png', 'gif', 'pdf', 'doc', 'docx', 'ppt', 'pptx', 'xls', 'xlsx', 'txt', 'zip', 'rar');
                if(in_array($file_type, $allow_type)){
                    $image_type = strtolower(pathinfo($img_path, PATHINFO_EXTENSION));
                    $allow_type_image = array('jpg', 'jpeg', 'png', 'gif');
                    if(in_array($image_type, $allow_type_image)){
                        $new_file_name = uniqid('FILE', true).".".$file_type;
                        $new_file_path = "../Cours/".$new_file_name;

                        $new_image_name = uniqid('IMG', true).".".$image_type;
                        $new_image_path = "../Cours/".$new_image_name;

                        if((move_uploaded_file($tmp_name, $new_file_path)) && (move_uploaded_file($img_name_tmp, $new_image_path))){
                            
                            $sql1 = "SELECT id FROM `class` WHERE `name` = '$class'"; 
                            
                            $result1 = mysqli_query($conn, $sql1);
                            $row1 = mysqli_fetch_assoc($result1);
                            $idc = $row1['id'];
                           
                            $sql = "INSERT INTO cours(name, disription, class_id, teacher_id,img_name,img_path,file_name,file_path) VALUES('$Title', '$Comment', '$idc', $id,'$new_image_name','$new_image_path','$new_file_name','$new_file_path')";
    
                            
                            mysqli_query($conn,$sql); 
                       
                            move_uploaded_file($tmp_name, $new_file_path);
                            $em = "File Uploaded Successfully";
                            echo "<script>alert('$em');</script>";
                            $msg = 1;
                            header("Location:CreateCours.php?do=alert_from_insert&msg=$msg");
    
                        } else {
                            $em = "Sorry, there was an error uploading your file.";
                            
                            $msg = 2;
                            header("Location:CreateCours.php?do=alert_from_insert&msg=$em");
                        }
                    }
                    else{
                        $em = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        header("Location:Home_Work_Create.php?do=alert_from_insert&msg=$em");
                    }
                } else {
                    $em = "Sorry, only JPG, JPEG, PNG, GIF, PDF, DOC, DOCX, PPT, PPTX, XLS, XLSX, TXT, ZIP, RAR files are allowed.";
                    header("Location:CreateCours.php?error=$em");
                }
            }


        }
        else{
            $em = "There was an error uploading your file.";
            header("Location:CreateCours.php?error=$em");
        }
    ?>