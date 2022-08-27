<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:../index.php');
    exit;
}
include_once('../controller/config.php');

$title = $_POST['title'];
$class = $_POST['Class'];
$text = $_POST['teacher_text'];
$type = $_POST['type'];
$number = $_POST['number'];
$idt = $_POST['id_teacher'];
echo $title;
echo $class;
echo $text;
echo $type;
echo $number;
$date = date("d-m-y h:i:s");
for($x = 1; $x <= $number + 1; $x++){
$name = 'a'.$x;

    $name = $_POST[$name];


    $sql = "INSERT into avertissement(Title,Id_class,text,Id_type,Id_student,date,Id_teacher) 
    VALUES ('$title','$class','$text','$type','$name','$date','$idt')";
mysqli_query($conn,$sql);

}



    header("Location: ../view/avertissement.php");




