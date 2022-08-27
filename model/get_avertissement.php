<?php
include_once('../controller/config.php');

$id=$_GET["id"];
$sql = "SELECT * FROM avertissement_type WHERE id=$id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

$res=array($row['id'],$row['type']);
echo json_encode($res);//MSK-00106

?>	