<?php
include_once('../controller/config.php');

if (isset($_POST['Absent'])) {
$id = $_POST['Absent'];
    $sql = "UPDATE student SET color='' where id = '$id'";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo "<script>alert('Successfully Updated');</script>";
        $Id_School = $_POST["Id_School"];
        $current_month=date('F');
        $current_year=date('Y');
        $current_date=date("Y-m-d");
        $current_day=date("l");
        $current_time=date("h:i:s");
        $day_no=date("d");
      
      
  $sql1="INSERT INTO student_attendance (index_number, date,month,year,time,status,id_school) 
  VALUES ('".$id."','".$current_date."','".$current_month."','".$current_year."','".$current_time."','Billet','".$Id_School."')";

    mysqli_query($conn,$sql1);
    }else{
        echo "<script>alert('Failed to Update');</script>";
    }
    header('location:Billet.php');
}

  
  else{
    $id = $_POST['Retard'];
    $sql = "UPDATE student SET color='' where id = '$id'";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo "<script>alert('Successfully Updated');</script>";
        
        $Id_School = $_POST["Id_School"];
        $current_month=date('F');
        $current_year=date('Y');
        $current_date=date("Y-m-d");
        $current_day=date("l");
        $current_time=date("h:i:s");
        $day_no=date("d");
      
      
  $sql1="INSERT INTO student_attendance (index_number, date,month,year,time,status,id_school) 
  VALUES ('".$id."','".$current_date."','".$current_month."','".$current_year."','".$current_time."','Billet Retard','".$Id_School."')";

    mysqli_query($conn,$sql1);
    }
    header("location:Billet.php");


  }