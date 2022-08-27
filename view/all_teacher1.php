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

</style>


<div class="content-wrapper">
	
    <section class="content-header">
    	<h1>
        	Teacher
        	<small>Preview</small>
        </h1>
        <ol class="breadcrumb">
        	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Teacher</a></li>
            <li><a href="#">All Teacher</a></li>
    	</ol>
	</section>
    
    
    <section class="content" > 
        <div class="row" id="table1">
            <div class="col-md-7">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Teacher</h3>
                    </div>
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <th class="col-md-1">ID</th>
                                <th class="col-md-2">Name</th>
                                <th class="col-md-2">Action</th>
                            </thead>
                            <tbody>
<?php
include_once('../controller/config.php');
$my_index= $_SESSION["index_number"];
$my_school= "SELECT * FROM `student` WHERE `index_number` = '$my_index'";
$my_school_result= mysqli_query($conn,$my_school);
$my_school_row= mysqli_fetch_assoc($my_school_result);
$my_school= $my_school_row['Id_School'];
$class = $my_school_row['class_id'];


$sql="SELECT * FROM subject_routing where class_id = $class and $my_school = Id_School";
$result=mysqli_query($conn,$sql);
$count = 0;
if(mysqli_num_rows($result) > 0){
	while($row=mysqli_fetch_assoc($result)){
    	$count++;
        $sqls = "SELECT * FROM teacher WHERE id = '$row[teacher_id]'";
        $results = mysqli_query($conn,$sqls);
        $rows = mysqli_fetch_assoc($results);
        $name = $rows['full_name'];
?>   
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td id="td1_<?php echo $row['id']; ?>"><?php echo $name; ?></td>
                                    <td>

<a href="#" onClick="showTeacher(this)" class="btn btn-primary btn-xs"  data-id="<?php echo $rows["index_number"]; ?>">View Profile</a>
                                    </td>
                                    
                                </tr>
<?php } } ?>
                            </tbody>
                        </table>
                	</div>
                </div>
            </div>
        </div>
    </section> 

	<div class="row" id="tProfile">
        
     </div>
    
<script>
//MSK-00147
function showTeacher(viewForm){
	var index = $(viewForm).data("id"); 
	
	var xhttp = new XMLHttpRequest();//MSK-00149-Start Ajax  
  		xhttp.onreadystatechange = function() {
    		if (this.readyState == 4 && this.status == 200) {
				document.getElementById('tProfile').innerHTML = this.responseText;
				$('#modalviewTeacher').modal('show');
    		}
			
  		};	
		
    xhttp.open("GET", "teacher_profile1.php?index_number=" + index , true);												
  	xhttp.send();//MSK-00149--End Ajax
	 
};
  
</script>

</div>


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
               
