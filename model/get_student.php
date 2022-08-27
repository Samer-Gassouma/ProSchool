<?php

include_once('../controller/config.php');
$id=$_GET["id"];

$sql = "SELECT * FROM student WHERE id=$id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);


$row=array($row['id'],$row['full_name'],$row['address'],$row['gender'],$row['phone'],$row['email'],$row['image_name']);
echo json_encode($row);//MSK-00117 

?>