<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:../index.php');
    exit;
}
?>
<form action="attendanceUpdate.php" method="POST"> 
<div class="col-md-10">
	<div class="box">
    	<div class="box-header">
        	<h3 class="box-title">All Student</h3>
        </div><!-- /.box-header -->
        <div class="box-body table-responsive">
        	<table id="example1" class="table table-bordered table-striped">
            	<thead>
                    <th class="col-md-3">Name</th>
                    <th class="col-md-8">Action</th>
                </thead>
                <tbody>
<?php
include_once('../controller/config.php');
$grade_id=$_GET['grade'];
$my_school = $_GET['my_school'];
$current_year=date('Y');


$sql="select * from student where class_id='$grade_id' and Id_School = '$my_school' and (color = 'red' or color = 'Yellow')";
	  	  
$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){
	while($row=mysqli_fetch_assoc($result)){

		$id =$row["id"];
        $color = $row["color"];
        $index = $row["index_number"];
        $sql1 = "SELECT * from student_attendance where '$id' = index_number and Id_School = '$my_school' ORDER BY date DESC, time DESC";
        $result1=mysqli_query($conn,$sql1);
        $row1=mysqli_fetch_assoc($result1);
        $date = $row1["date"];
        $time = $row1["time"];

        if($color == "red"){

?>   
                	<tr>
                        <input type="hidden" name="Absent" value="<?php echo $id; ?>">
                        <input type="hidden" name="Id_School" value="<?php echo $my_school; ?>">
                        
                        <td id="td1_'><?php echo $row['full_name']; ?>">
                        	<a href="#modalviewform" onClick="showModal1(this)" class=""  data-id="<?php echo $row["id"]; ?>,<?php echo $grade_id; ?>" data-toggle="modal"><?php echo $row['full_name']; ?></a>
                        </td>
                        <td> 
                   
                    <input type="submit" value="Billet" class="homebutton btn btn-success btn-xs" id="btnHome" />
<?php } if($color == "Yellow"){ ?> 
                	<tr>
                        <input type="hidden" name="Retard" value="<?php echo $id; ?>">
                        <td id="td1_'><?php echo $row['full_name']; ?>">
                        	<a href="#modalviewform" onClick="showModal1(this)" class=""  data-id="<?php echo $row["id"]; ?>,<?php echo $grade_id; ?>" data-toggle="modal"><?php echo $row['full_name']; ?></a>
                        </td>
                        <td> 
                   
                    <input type="submit" value="Billet Retard" class="homebutton btn btn-success btn-xs" id="btnHome" />
                    <input type="hidden" name="Id_School" value="<?php echo $my_school; ?>">
    <?php }?>


                       </td>
                       <td> <?php echo $date; ?></td>
                       <td> <?php echo $time; ?></td>
                    </tr>
                    </tr>
<?php } } ?>
                </tbody>
         	</table>	
     	</div>        
	</div>
</div>
</form>