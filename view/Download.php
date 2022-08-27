<?php 
include_once('../controller/config.php');
if(isset($_GET['File_id'])){
    $id=$_GET['File_id'];
    $file = "SELECT * FROM cours WHERE id =$id";
    $result = mysqli_query($conn,$file);
    $data = mysqli_fetch_assoc($result);
    $file = basename($data['file_name']);
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
   header('location:dashboard2.php');
}