
<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:../index.php');
    exit;
}
?>
<?php include_once('head.php'); ?>
<?php include_once('header_admin.php'); ?>
<?php include_once('sidebar.php'); ?>
<?php include_once('alert.php'); 
$my_index= $_SESSION["index_number"];
$my_school= "SELECT * FROM `admin` WHERE `index_number` = '$my_index'";
$my_school_result= mysqli_query($conn,$my_school);
$my_school_row= mysqli_fetch_assoc($my_school_result);
$my_school= $my_school_row['id'];
?>


<style>
body { 
	overflow-y:scroll;
}
.form-control-feedback {
   pointer-events: auto;
}

.set-width-tooltip + .tooltip > .tooltip-inner { 
     min-width:180px;
}

.msk-fade {  
      
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

@media only screen and (max-width: 500px) {
	
.content {
	width:100% !important;
}

#example1{
	width:100% !important;
}
}

</style>


<div class="content-wrapper">
	
    <section class="content-header">
    	<h1>
		Attendance
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Attendance</a></li>
        </ol>
	</section>

    

   

 
   



    <section class="content" > 
    	<div class="row" id="table1">
        	<div class="col-md-8">
            	<div class="box">
                	<div class="box-header">
                  		<h3 class="box-title">All Teacher</h3>
                	</div>
                	<div class="box-body table-responsive" style="overflow-x:auto;">
                    	
                		<table id="example1" class="table table-bordered table-striped">
                    		<thead>
                            	<th>Name</th>
                            	<th>Action</th>
                        	</thead>
                        	<tbody>
<?php

include_once('../controller/config.php');
$sql="SELECT * FROM teacher where Id_school = $my_school";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){
	while($row=mysqli_fetch_assoc($result)){	
	$name=$row['full_name'];
	$id=$row['id'];
	$color = $row['color'];
	if($color == 'red'){ ?>
		<tr class="danger">
		<td id="td1_<?php echo $row['full_name']; ?>">
		<a href="#modalviewform" style="color:red; " onClick="showModal1(this)" class=""  data-id="<?php echo $row["id"]; ?>,<?php echo $class_id; ?>" data-toggle="modal"><?php echo $row['full_name']; ?></a>
		
	</td>
		<td>
			       
<form action="../model/attendanceStatePre.php" method="POST">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="hidden" name="my_school" value="<?php echo $my_school; ?>">
			<h5> <input type="submit" value="PRESENT" class="homebutton btn btn-success btn-xs" id="btnHome"/></h5>
	</form>
			<?php
	}else{
?>   
                        		<tr>
                            		<td><p style="color:green;" ><?php echo $name; ?></p></td>
                                	<td>
									<form action="../model/attendanceStateAbs.php" method="POST">  
										<input type="hidden" name="id" value="<?php echo $id; ?>">
										<input type="hidden" name="my_school" value="<?php echo $my_school; ?>">
										
									<input type="submit" value="Absent" class="homebutton btn btn-danger btn-xs" id="btnHome"/>
									</form>
	
                               		</td>          
                            	</tr>
<?php } } }?>
                        	</tbody>
                    	</table>	                
               		</div>
              	</div>
            </div>
		</div>
	</section> 
    
</form>

<?php
if(isset($_GET["dos"])){
//MSK-000143-6-PHP-JS-INSERT
  
	$msg=$_GET['msg'];
	

	if($msg==1){
		
		
		echo"
			<script>
			
			var myModal = $('#insert_Success');
			myModal.modal('show');

			clearTimeout(myModal.data('hideInterval'));
    		myModal.data('hideInterval', setTimeout(function(){
    			myModal.modal('hide');
    		}, 3000));
			
			</script>
		";
	
	}

	if($msg==2){
		
		
		
		echo"
			<script>
			
			var myModal = $('#connection_Problem');
			myModal.modal('show');
			
			clearTimeout(myModal.data('hideInterval'));
    		myModal.data('hideInterval', setTimeout(function(){
    			myModal.modal('hide');
    		}, 3000));
			
			</script>
		";
	
	}
	
	
}
?>

   




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
                             
