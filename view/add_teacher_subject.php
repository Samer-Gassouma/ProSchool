<?php
    include_once('controller/config.php');
    $msg = 0;
    $class_id=$_POST['class_id'];
    $teacher=$_POST['teacher_id'];
    $sqls = "SELECT * FROM teacher where id='$teacher'";
    $results = mysqli_query($conn, $sqls);
    $row = mysqli_fetch_assoc($results);
    $Subject = $row['Subject'];
    $id_sql = "SELECT * FROM subject where name='$Subject'";
    $id_result = mysqli_query($conn, $id_sql);
    $id_row = mysqli_fetch_assoc($id_result);
    $id_subject = $id_row['id'];
    $id_school = $_POST['my_school'];
    $sql = "SELECT * FROM subject_routing where teacher_id='$teacher' and class_id ='$class_id' and id_school='$id_school'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
        $msg = 3;
    }
    else{
    
        $sql="INSERT INTO `subject_routing`(`class_id`,`subject_id`,teacher_id,id_school) VALUES ('$class_id','$id_subject','$teacher','$id_school')";
        $result=mysqli_query($conn,$sql);
        if($result){
            $msg+=1;
        }
        else{
            $msg+=2 ;
        }
    }
    header("Location: view/teacherManagment.php?msg=$msg");
?>