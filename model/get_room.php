<?php

include_once('../controller/config.php');
$id=$_GET["id"];
$my_school = $_GET["id_school"];
$sql = "SELECT * FROM class_room WHERE id=$id and Id_school = $my_school";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

$row1=array($row['id'],$row['name']);
echo json_encode($row1);//MSK-00106

?>	