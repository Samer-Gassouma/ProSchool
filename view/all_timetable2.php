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

<style>

body { 
	overflow-y:scroll;
}

tbody tr{
	height:100px;	
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
.image-error{
	border:1px solid #f44336;
	
}

.image-success{
	border:1px solid #009900;
	
}

.msk-fade {  
      
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s

}

body.modal-open-noscroll1
{
    overflow:hidden;
	
 
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
        	<i class="fa fa-calendar"></i>
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
        	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Timetabe</a></li>
            <li><a href="#">All Timetabe</a></li>
        </ol>
	</section>

	
    <section class="content">
    	<div class="row">
        	
            <div class="col-xs-6">
            	
              	<div class="box box-primary">
                	<div class="box-header with-border">
                  		<h3 class="box-title">All Timetable</h3>
                	</div>
                  	<div class="box-body" >
                  	 	<div class="form-group" id="divGender">
                    		<div class="col-xs-3">
                      			<label for="exampleInputPassword1">Grade</label>
                    		</div>
                    		<div class="col-xs-4" id="divGender1">
							<select name="grade" class="form-control" id="grade" >
                    				<option>Select class</option>
									<?php
									include_once('../controller/config.php');
									$sqls = "SELECT * FROM teacher where id = $id";
									$results = mysqli_query($conn,$sqls);
									$row = mysqli_fetch_assoc($results);
									$my_school = $row['Id_School'];

									$sql="SELECT name FROM class,subject_routing WHERE  subject_routing.teacher_id='$id' and class.id = subject_routing.class_id and subject_routing.Id_School=$my_school";
									$result=mysqli_query($conn,$sql);
									if(mysqli_num_rows($result) > 0){
										while($row=mysqli_fetch_assoc($result)){
									?> 
     								<option value="<?php echo $row["name"]; ?>"><?php echo $row['name']; ?></option>
<?php }} ?>
					  			</select>
                     		</div>
                    	</div>
                  	</div>
                  	<div class="box-footer">
                    	<button type="button" class="btn btn-primary"  onClick="showTimeTable(this)">Submit</button>
                  	</div>
            	</div>
        	</div>
    	</div>
	</section>

	
    <section class="content" > 
    	<div class="row" id="table1">
           
        </div>
    </section> 
        
<script>

function showTimeTable(){
//MSK-000109
	
	var grade = document.getElementById("grade").value;	
	var do1 ="show_Timetable";
	
	var xhttp = new XMLHttpRequest();//MSK-000110-Start Ajax  
  		xhttp.onreadystatechange = function() {
			
    		if (this.readyState == 4 && this.status == 200) {	
					
				document.getElementById('table1').innerHTML = this.responseText;//MSK-000111
										
    		}
			
  		};
			
    	xhttp.open("GET", "timetable_grade_wise2.php?grade="+grade + "&do="+do1 , true);												
  		xhttp.send();//MSK-000110-End Ajax
	
};

</script>


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
                              
