<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    
    header('location:../index.php');
    exit;
}
?>
<form action="attendanceAbsent.php" method="POST">
<div class="col-md-8">
	<div class="box">
    	<div class="box-header">
        	<h3 class="box-title">My Student</h3>
        </div>
        <div class="box-body table-responsive">
        	<table id="example1" class="table table-bordered table-striped">
            	<thead>
                    <th class="col-md-4">Name</th>
					<th class="col-md-4">Action</th>
                </thead>
                <tbody>
<?php
include_once('../controller/config.php');
$class_name=$_GET['grade'];

$sql_class = "SELECT id FROM class WHERE name='$class_name'";
$result_class = mysqli_query($conn,$sql_class);
if(mysqli_num_rows($result_class)>0){
	$row_class = mysqli_fetch_assoc($result_class);
	$class_id = $row_class['id'];
	$sql="SELECT * FROM student WHERE class_id='$class_id'";
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0){

		while($row = mysqli_fetch_assoc($result)){
			$color = $row['color'];
			$id = $row['id'];
			$Id_School = $row['Id_School'];
			if($color == 'red'){ ?>
				<tr class="danger">
				<td id="td1_<?php echo $row['full_name']; ?>">
                   	<a href="#modalviewform" style="color:red; " onClick="showModal1(this)" class=""  data-id="<?php echo $row["id"]; ?>,<?php echo $class_id; ?>" data-toggle="modal"><?php echo $row['full_name']; ?></a>
				</td>
				<td>
					<h5>Contact Admin ! Absent</h5>

				<?php
				}elseif($color == 'Yellow'){ ?>
					<tr class="danger">
					<td id="td1_<?php echo $row['full_name']; ?>">
						   <a href="#modalviewform" style="color:red; " onClick="showModal1(this)" class=""  data-id="<?php echo $row["id"]; ?>,<?php echo $class_id; ?>" data-toggle="modal"><?php echo $row['full_name']; ?></a>
					</td>
					<td>
						<h5>Contact Admin ! Retard</h5>
	
					<?php
			}else{
					
		
?>					
                	<tr>
                        <td id="td1_<?php echo $row['full_name']; ?>">
							<input type="hidden" name="id" value="<?php echo $id; ?>">
							<input type="hidden" name="Id_School" value="<?php echo $Id_School; ?>">
                        	<a href="#modalviewform" onClick="showModal1(this)" class=""  data-id="<?php echo $row["id"]; ?>,<?php echo $class_id; ?>" data-toggle="modal"><?php echo $row['full_name']; ?></a>
                        </td>
						<td>  
							<input type="submit" name="Absent" value="Absent" class="homebutton btn btn-danger btn-xs" id="btnHome"  />

							<input type="submit" name="Retard" value="Retard" class="homebutton btn btn-warning btn-xs" id="btnHome"  />
						</td>     
                    </tr>
					
<?php } }} }?>
                </tbody>
         	</table>	
     	</div>
	</div>
</div>
</form>