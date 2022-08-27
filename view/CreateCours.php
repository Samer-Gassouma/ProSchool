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
                <?php include_once('../controller/config.php');
                $query = mysqli_query($conn, "SELECT * FROM `cours` WHERE `teacher_id` = '$id'");
				if(mysqli_num_rows($query) > 0){
					while($fetch = mysqli_fetch_array($query)){
						$class = $fetch['class_id'];
						$query2 = mysqli_query($conn, "SELECT * FROM `class` WHERE `id` = '$class'");
						$fetch2 = mysqli_fetch_array($query2);
						$class_name = $fetch2['name'];
						if($fetch["img_name"] !=""){
							
					?>
					<div class="col-sm-4">
						<div class="thumbnail">
						<img src="<?php echo $fetch['img_path'];?>"  width="300" height="250">
						<p><strong><?php $fetch["name"]; ?></strong></p>
						<p><?php $fetch["disription"]; ?></p>
						<p><?php echo $class_name; ?></p>
						<a href="downloadCours.php?id=<?php echo $fetch['id']?>" class="btn btn-success"><span class="glyphicon glyphicon-download"></span> Download</a><br>
						</div>
					</div>
					<?php } else{ ?>
						<div class="col-sm-4">
							<div class="thumbnail">
							<img src="" width="200" height="150">
							<center><h2><strong><?php $fetch["name"];?></strong></h2></center>
							<p><?php $fetch["disription"]; ?></p>
							<p><?php echo $class_name; ?></p>
							<a href="downloadCours.php?id=<?php echo $fetch['id']?>" class="btn btn-success"><span class="glyphicon glyphicon-download"></span> Download</a><br>
							</div>
						</div>
					<?php }} ?>

				<?php } else{ ?>
						<center><h2>No Courses</h2></center>
					<?php } ?>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="panel panel-primary" style="margin-top:20%;">
			<div class="panel-heading">
				<h1 class="panel-title">Add Course</h1>
			</div>
			<div class="panel-body">
                <form method="POST" enctype="multipart/form-data" action="CoursMaker.php">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <h4>Title: <input type="text" class="form-control" placeholder="Enter Title" name="Title" id="index_number" autocomplete="off" > </h4>
                    <hr style="border-top:1px dotted #ccc;"/>
                    <h4>disription: <label class="pull-right"><input type="text" class="form-control" placeholder="Enter Your Comment" name="Comment" id="full_name" autocomplete="off"></label></h4>
                    <hr style="border-top:1px dotted #ccc;"/>
                    <h4>Class: <label class="pull-right"> <select name="grade" class="form-control" id="grade" >
                    				<option>Select class</option>
									<?php
									include_once('../controller/config.php');
									$sqls= "SELECT * FROM teacher where id = '$id'";
									$results = mysqli_query($conn,$sqls);
									$rows = mysqli_fetch_assoc($results);
									$id_school=$rows['Id_School'];
							
									$sql="SELECT name FROM class,subject_routing WHERE  subject_routing.teacher_id='$id' and class.id = subject_routing.class_id and class.Id_School='$id_school'";
									$result=mysqli_query($conn,$sql);
									if(mysqli_num_rows($result) > 0){
										while($row=mysqli_fetch_assoc($result)){
									?> 
     								<option value="<?php echo $row["name"]; ?>"><?php echo $row['name']; ?></option>
<?php }} ?>
					  			</select></label></h4>
                    <hr style="border-top:1px dotted #ccc;"/>
                    <input type="hidden" name="id_teacher" value="<?php echo $id;?>">
                    <h3>File</h3>
					<input type="file" name="my_file" size="4" style="background-color:#fff;" required="required" />
                    <h3>Image</h3>
					<input type="file" name="image" size="4" style="background-color:#fff;" required="required" />
					<br />
					<button class="btn btn-success btn-sm" name="save"><span class="glyphicon glyphicon-plus"></span> Add File</button>
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