<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:../index.php');
    exit;
}
?>
<?php include_once('head.php'); ?>
<?php include_once('header_teacher.php'); ?>
<?php include_once('sidebar2.php'); ?>
<?php include_once('alert.php'); ?>
<?php include_once('../controller/config.php');
$my_index=$_SESSION['index_number'];
$sql = "SELECT * from teacher where index_number = $my_index";
$res = mysqli_query($conn,$sql);
$rows = mysqli_fetch_array($res);
$idt = $rows['id'];
?>

<head>
<link rel = "stylesheet" type="text/css" href="../dist/css/bootstrap.css" />		
<link rel = "stylesheet" type="text/css" href="../dist/css/style.css" />

</head>
<style>

</style>
<body>
<div class='content-wrapper'>   
  <div >
 
<section class="content-header">
    	<h1>
			<i class="fa fa-user"></i>
        	Student
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
        	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Avertisssement</a></li>
        </ol>
	</section>

    <section class="content">
    <div class="form-group">
    <a href="avertissement.php"><i class="fa fa-arrow-left" aria-hidden="true">Retour</i></a><br> <br><br>
    <table>
      <tr>
    <label for="exampleFormControlSelect1">Type of the avertissement</label>
    <form action="../model/advance.php" method="POST">
    <br><br>
<?php     
    include_once('../controller/config.php');
    $sql1 = "SELECT * from teacher where id = $id";
    $result1 = mysqli_query($conn,$sql1);
    $row = mysqli_fetch_array($result1);
    $my_school = $row['Id_School'];
    $sql = "SELECT * FROM avertissement_type where id_school = $my_school";
    $result = mysqli_query($conn,$sql); 

    ?>
    <select name="type" class="form-control" >
        <option value="">Select a type d'avertissement</option>
    <?php

    if(mysqli_num_rows($result)){
      while($row = mysqli_fetch_assoc($result)){
          $id = $row['id'];
          $type = $row['type'];
            
          ?> <option  value = <?php echo $id; ?>><?php echo $type; ?></option>"; ?><?php
        }
      }
      ?>
    </select>
  </div>
  </tr>
    <tr>



<div class="container mt-5">
        <div class="table-responsive">
            <table  class="table table-striped table-dark text-white table-hover">
              

                <tbody>
                <?php 
    include_once('../controller/config.php');
    $Title = $_POST['title'];
    $class = $_POST['class'];
    $text = $_POST['teacher_text'];
    ?>
    <input type="hidden" name="title" value="<?php echo $Title; ?>">
    <input type="hidden" name="Class" value="<?php echo $class; ?>">
    <input type="hidden" name="teacher_text" value="<?php echo $text; ?>">
    <input type="hidden" name="id_teacher" value="<?php echo $idt; ?>">
    <?php
$i = 0;
    $sql = "SELECT * from student where class_id = $class";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result)){
    $i++;
    $f = 'a'. $i;
    ?>
             <tr>
                        <td class="text-center"><input name="<?php echo $f; ?>" value="<?php echo $row['id']; ?>" type="checkbox"></td>

                        <td>
                            <div class="d-flex align-items-center"><img class="rounded-circle" src="<?php echo '../'.$row['image_name']; ?>" width="30"><span class="ml-2"><?php echo $row['full_name']; ?></span></div>
                        </td>
                    </tr>

<br>
  <?php } ?>
  <input type="hidden" name="number" value="<?php echo $i; ?>">
  

           
                   


                </tbody>
            </table>
        </div>
    </div>
    </tr>
<tr>
<button style="margin-left: 50px;" type="submit" class="btn btn-primary">Submit</button>
</tr>
    </table>
</form>
</div>
</div>
</section>
</body>