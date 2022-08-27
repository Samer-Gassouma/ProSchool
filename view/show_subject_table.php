<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:../index.php');
    exit;
}
?>
<div class="col-xs-7">
	<div class="box">
    	<div class="box-header">
        	<h3 class="box-title">All Subject</h3>
        </div>
        <div class="box-body table-responsive">
        	<table id="example1" class="table table-bordered table-striped">
            	<thead>

                    <th>Subject</th>
                    <th>Action</th>
                </thead>
                <tbody>
<?php
include_once('../controller/config.php');
$sql="SELECT * FROM subject";
$result=mysqli_query($conn,$sql);


if(mysqli_num_rows($result) > 0) {
	while($row=mysqli_fetch_assoc($result)){
		$id=$row['id'];
?>   
                	<tr>
						<td><?php echo $row['name']; ?></td>
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