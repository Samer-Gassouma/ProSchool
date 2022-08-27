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
<?php include_once('../controller/config.php');?>

<link rel = "stylesheet" type="text/css" href="../dist/css/bootstrap.css" />		
<link rel = "stylesheet" type="text/css" href="../dist/css/style.css" />
<body>
<div class="content-wrapper">
	
    <section class="content-header">
    	<h1>
        	Teacher
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
        	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Teacher</a></li>
         </ol>
     </section>

     <div class="col-md-8">
		<div class="" style="margin-top:100px;"></div>
		<div class="panel panel-default">
			<div class="panel-body " >
				<form action="../model/Delete_Homework.php" method="POST">
				<table id="table" class="table table-bordered">
					<thead>
						<tr>
							<th>Title</th>
							<th>Comment</th>
                            <th>class name</th>
							<th>Date Uploaded</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sqls= "SELECT * FROM teacher where id = '$id'";
							$results = mysqli_query($conn,$sqls);
							$rows = mysqli_fetch_assoc($results);
							$id_school=$rows['Id_School'];
							
							$query1 = mysqli_query($conn, "SELECT * FROM `backup_homework` WHERE `id_Teacher` = '$id'") or die(mysqli_error());
							while($fetch1 = mysqli_fetch_array($query1)){
								$className = "SELECT * FROM class where id = '$fetch1[id_class]' and Id_School = '$id_school'";
                                
						?>
						<tr class="del_file<?php echo $fetch1['File_id']?>">
							<td><?php echo substr($fetch1['Title'], 0 ,30)."..."?></td>
							<td><?php echo $fetch1['Comment']?></td>
                            <td><?php echo $fetch1['id_class'];?></td>
							<td><?php echo $fetch1['Date_Homewok']?></td>
							<input type="hidden" id="<?php echo $fetch1['File_id']?>">
							
							<?php if($fetch1['File_name']!= ""){?>
								
							<td><a href="download.php?id=<?php echo $fetch1['File_id']?>" class="btn btn-success"><span class="glyphicon glyphicon-download"></span> Download</a> | <button class="btn btn-danger btn_remove" type="submit" id="<?php echo $fetch1['File_id']?>"><span class="glyphicon glyphicon-trash"></span> Remove</button></td>
							<?php }else{?>
								<td> <button class="btn btn-danger btn_remove" type="submit"  ><span class="glyphicon glyphicon-trash"></span> Remove</button></td>
							<?php }?>
						</tr>
						<?php
							}
						?>
					</tbody>
					</form>
				</table>
			</div>
		</div>
	</div>

	<?php 
		 $d = date("Y-m-d H:i:s");
		 $ws = "SELECT * FROM `homework_upload`";
		 $w = mysqli_query($conn, $ws);
		 if(mysqli_num_rows($w) > 0){
			 while($f = mysqli_fetch_array($w)){
				 $date = $f['deadline'];
				 $date1 = strtotime($date);
				 $date2 = strtotime($d);
				 if($date1 == $date2){
					 $id = $f['File_id'];
					 $sql = "DELETE FROM `homework_upload` WHERE `File_id` = '$id'";
					 $query = mysqli_query($conn, $sql);
				 }
				 
			 }
		 }
		?>

	<div class="col-md-4">
		<div class="panel panel-primary" style="margin-top:20%;">
			<div class="panel-heading">
				<h1 class="panel-title">Add Homework</h1>
			</div>
			<div class="panel-body">
                <form method="POST" enctype="multipart/form-data" action="save_file.php">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <h4>Title: <input type="text" class="form-control" placeholder="Enter Title" name="Title" id="index_number" autocomplete="off" > </h4>
                    <hr style="border-top:1px dotted #ccc;"/>
                    <h4>Comment: <label class="pull-right"><input type="text" class="form-control" placeholder="Enter Your Comment" name="Comment" id="full_name" autocomplete="off"></label></h4>
                    <hr style="border-top:1px dotted #ccc;"/>
                    <h4>Class: <label class="pull-right"> <select name="grade" class="form-control" id="grade" >
                    				<option>Select class</option>
									<?php
									include_once('../controller/config.php');
									$sqls= "SELECT * FROM teacher where id = '$id'";
									$results = mysqli_query($conn,$sqls);
									$rows = mysqli_fetch_assoc($results);
									$id_school=$rows['Id_School'];
							

									$sql="SELECT name FROM class,subject_routing WHERE  subject_routing.teacher_id='$id' and class.id = subject_routing.class_id and class.id_school = '$id_school'";
									$result=mysqli_query($conn,$sql);
									if(mysqli_num_rows($result) > 0){
										while($row=mysqli_fetch_assoc($result)){
									?> 
     								<option value="<?php echo $row["name"]; ?>"><?php echo $row['name']; ?></option>
<?php }} ?>
					  			</select></label></h4>
                    <hr style="border-top:1px dotted #ccc;"/>
                    <h3>End Date</h3>
					<input class="form-control" name="date" type="date" value="<?php echo date('Y-m-d'); ?>">
					<hr style="border-top:1px dotted #ccc;"/>
					<h4>File: <label class="pull-right"><input type="file" class="form-control" name="file" id="file" autocomplete="off"></label></h4>
					<hr style="border-top:1px dotted #ccc;"/>
					<input type="hidden" name="id_school" value="<?php echo $id_school;?>">
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
				<br style="clear:both;"/>
			</div>
		</div>
	</div>
    <div class="modal fade" id="modal_remove" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">System</h3>
				</div>
				<div class="modal-body">
					<center><h4 class="text-danger">Are you sure you want to remove this file?</h4></center>
				</div>
				<div class="modal-footer">
					<a type="button" class="btn btn-success" data-dismiss="modal">No</a>
					<button type="button" class="btn btn-danger" id="btn_yes">Yes</button>
				</div>
			</div>
		</div>
	</div>

<script type="text/javascript">
$(document).ready(function(){
	$('.btn_remove').on('click', function(){
		var store_id = $(this).attr('id');
		$("#modal_remove").modal('show');
		$('#btn_yes').attr('name', store_id);
	});
	
	$('#btn_yes').on('click', function(){
		var id = $(this).attr('name');
		$.ajax({
			type: "POST",
			url: "remove_file.php",
			data:{
				store_id: id
			},
			success: function(data){
				$("#modal_remove").modal('hide');
				$(".del_file" + id).empty();
				$(".del_file" + id).html("<td colspan='4'><center class='text-danger'>Deleting...</center></td>");
				setTimeout(function(){
					$(".del_file" + id).fadeOut('slow');
				}, 1000);
				
			}
		});
	});
});
</script>	

    <script>

    if(msg==1){
		
    var myModal = $('#update_Success');
    myModal.modal('show');
    
    clearTimeout(myModal.data('hideInterval'));
      myModal.data('hideInterval', setTimeout(function(){
        myModal.modal('hide');
      
      }, 3000));
      
        
  }

  if(msg==2){
    
      var myModal = $('#connection_Problem');
    myModal.modal('show');
    
      clearTimeout(myModal.data('hideInterval'));
      myModal.data('hideInterval', setTimeout(function(){
        myModal.modal('hide');
      }, 3000));
        
  }
    </script>