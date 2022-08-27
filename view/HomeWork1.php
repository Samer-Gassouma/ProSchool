<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:../index.php');
    exit;
}
?>
<?php include_once('head.php'); ?>
<?php include_once('header_student.php'); ?>
<?php include_once('sidebar1.php'); ?>

<style>

body { 
	overflow-y:scroll;
}
.modal-content1 {
   position: absolute;
   left: 125px; 
}
@media only screen and (max-width: 500px) {

	.modal-content1 {
   		
		position:static;
   
	}
}

.form-control-feedback {
  
   pointer-events: auto;
  
}

.set-width-tooltip + .tooltip > .tooltip-inner { 
  
     min-width:180px;
}
.set-color-tooltip + .tooltip > .tooltip-inner { 
  
     min-width:180px;
	 background-color:red;
}

.msk-fade{  
      
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s

}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

</style>


<div class="content-wrapper">
	
    <section class="content-header">
    	<h1>
        	HomeWork
        </h1>
        <ol class="breadcrumb">
        	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Home Work</a></li>
        </ol>
	</section>

	
	<section class="content" > 
    	<div class="row" id="table1">
        	<div class="col-md-7">
            	<div class="box">
                	<div class="box-header">
                  		<h3 class="box-title">Home Work</h3>
                	</div>
                	<div class="box-body table-responsive">
                    	
                		<table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <th class="col-md-1">Title</th>
                                <th class="col-md-1">Date</th>
                                <th class="col-md-1">Teacher</th>
                                <th class="col-md-1">Comment</th>
                                <th class="col-md-1">Action</th>
                            </thead>
                        	<tbody>
<?php
include_once('../controller/config.php');

$index=$_SESSION["index_number"];
 
$class_id = "SELECT * FROM student WHERE index_number='$index'";
$class_id_result = mysqli_query($conn,$class_id);
$class_id_row = mysqli_fetch_array($class_id_result);
$class_id = $class_id_row['class_id'];
$school_id = $class_id_row['Id_School'];



$sql="SELECT * FROM `backup_homework`where id_school = '$school_id' ORDER BY `Date_Homewok` DESC";
$result=mysqli_query($conn,$sql);
$count = 0;
if(mysqli_num_rows($result) > 0) {
	while($row=mysqli_fetch_assoc($result)){
        $t = $row['id_Teacher'];
        $tname = "SELECT * FROM `teacher` WHERE `id`=$t";
        $tname_result = mysqli_query($conn,$tname);
        $tname_row = mysqli_fetch_array($tname_result);
        $tname = $tname_row['full_name'];
		$count++;
?>   
                                <tr>
                                    <td><?php echo $row['Title']; ?></td>
                                    <td><?php echo $row['Date_Homewok']; ?></td>
                                    <td><?php echo $tname; ?></td>
                                    <td><?php echo $row['Comment']; ?></td>
                                    <td>
                                        <?php if($row['File_path'] !=""){ ?>
                                        <a href="Download.php?File_id=<?php echo $row['File_id']; ?>">
                                            <button class="btn btn-primary">
                                                <i class="fa fa-download"></i>
                                            </button>
                                        </a>
                                        <?php } ?>
                            	</tr>
<?php } } ?>
                        	</tbody>
                    	</table>
                	</div>
            	</div>
        	</div> 
    	</div>
	</section> 
    

<script>
(function(window, location) {
history.replaceState(null, document.title, location.pathname+"#!/history");
history.pushState(null, document.title, location.pathname);

window.addEventListener("popstate", function() {
  if(location.hash === "#!/history") {
    history.replaceState(null, document.title, location.pathname);
    setTimeout(function(){
      location.replace("../index.php");//path to when click back button
    },0);
  }
}, false);
}(window, location));
</script>
 	 	
</div>
                            
