<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:../index.php');
    exit;
}
?>
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
$current_year=date('Y');
	
$sql="select * from student where class_id='$grade_id' and _status=''";
	  	  
$result=mysqli_query($conn,$sql);
$count=0;
if(mysqli_num_rows($result) > 0){
	while($row=mysqli_fetch_assoc($result)){
		$count++;
?>   
                	<tr>
                        <td id="td1_'><?php echo $row['full_name']; ?>">
                        	<a href="#modalviewform" onClick="showModal1(this)" class=""  data-id="<?php echo $row["id"]; ?>,<?php echo $grade_id; ?>" data-toggle="modal"><?php echo $row['full_name']; ?></a>
                        </td>
                        <td> 
<!--MSK-00113 -->                                     
<a href="edit_student.php?std_index=<?php echo $row["index_number"]; ?>&grade_id=<?php echo $grade_id; ?>" onClick="" class="btn btn-info btn-xs" data-id="<?php echo $row["id"]; ?>" data-toggle="modal">Edit</a>
<!--MSK-00128 -->
<a href="#" class="confirm-delete btn btn-danger btn-xs" data-id="<?php echo $row["id"];?>,<?php echo $grade_id; ?>,<?php echo $row["index_number"];?>">Leave</a>
<!--MSK-00146 -->


<!--MSK-00146 --> 

                       </td>
                    </tr>
<?php } } ?>
                </tbody>
         	</table>	
     	</div>        
	</div>
</div>