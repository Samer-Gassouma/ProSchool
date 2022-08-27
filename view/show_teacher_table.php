<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:../index.php');
    exit;
}

?>
<div class="col-md-8">
	<div class="box">
    	<div class="box-header">
        	<h3 class="box-title">All Teacher</h3>
        </div>
        <div class="box-body table-responsive">
        	<table id="example1" class="table table-bordered table-striped">
            	<thead>
                	<th class="col-md-1">ID</th>
                    <th class="col-md-3">Name</th>
                    <th class="col-md-4">Action</th>
                </thead>
                <tbody>
                
<?php
include_once('../controller/config.php');
if ($_SESSION['index_number'] == "") {1
	header("Refresh:0");
}
$my_index=$_SESSION['index_number'];
$my_school= "SELECT * FROM `admin` WHERE `index_number` = '$my_index'";
$my_school_result= mysqli_query($conn,$my_school);
$my_school_row= mysqli_fetch_assoc($my_school_result);
$my_school= $my_school_row['id'];

$sql="SELECT * FROM teacher WHERE Id_School ='$my_school'";
$result=mysqli_query($conn,$sql);


if(mysqli_num_rows($result) > 0) {
	while($row=mysqli_fetch_assoc($result)){
	$count++;
	$id=$row['id'];
	$index=$row['index_number'];

?>   
    
               		<tr>
                    	<td><?php echo $count; ?></td>
                        <td id="td1_<?php echo $row['id']; ?>"><?php echo $row['i_name']; ?></td>
						<td>   
                                
<?php


	
	echo '<a href="#modalUpdateform" onClick="showModal(this)" class="btn btn-info btn-xs" data-id="'.$id.'" data-toggle="modal">Edit</a>';
	echo ' <a href="#" class="confirm-delete btn btn-danger btn-xs"  data-id="'.$id.'">Delete</a>';
	


?>                                 
  
						</td>
					</tr>

<?php } } ?>
				</tbody>
			</table>	
		</div>
	</div>
</div>