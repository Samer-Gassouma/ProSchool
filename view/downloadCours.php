<?php 
include_once('../controller/config.php');
if(isset($_GET['id'])){
    echo "<script>alert('".$_GET['id']."')</script>";
    $id=$_GET['id'];
    $file = "SELECT * FROM cours WHERE id=$id";
    $result = mysqli_query($conn,$file);
    $data = mysqli_fetch_assoc($result);
    $file = basename($data['File_name']);
    $filepath = '../Cours/'.$file;
    if(file_exists($filepath)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        readfile($filepath);
        exit;
    }
    header('location:Courses.php');
}