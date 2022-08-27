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
$my_index=$_SESSION['index_number'];
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
		Teacher Subject Management
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Teacher Subject Management</a></li>
        </ol>
	</section>

    
    <section class="content">
    	<div class="row">
            <div class="col-md-6">
              	<div class="box box-primary">
                	<div class="box-header with-border">
                  		<h3 class="box-title">Add Teacher Subject Management</h3>
                	</div>
                	
                           
                    <form role="form" action="../index.php" method="post"  enctype="multipart/form-data" id="form1" class="form-horizontal" >
                        <div class="box-body" >
							<div class="form-group tt2 " id="divEmail">
                                <div class="col-xs-3">
                                    <label>Class</label>
                                    <label id="class" name="class_id"></label>
                                </div>
                                <div class="col-xs-6" id="divEmail1">
                                    <select class="form-control"  name="class_id">
                                        <option value="">Select Class</option>
                                        <?php
                                        include_once('../controller/config.php');
                                        $sql="SELECT * FROM class WHERE id_school='$my_school'";
                                        $result=mysqli_query($conn,$sql);
                                        if(mysqli_num_rows($result) > 0) {
											
                                            while($row=mysqli_fetch_assoc($result)){
                                                $id=$row['id'];
                                                $name=$row['name'];
                                                echo '<option value="'.$id.'">'.$name.'</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group tt2 " id="divEmail">
                                <div class="col-xs-3">
                                    <label>Teacher</label>
                                </div>
                                <div class="col-xs-6" id="divEmail1" >
                                    <select class="form-control" name="teacher_id" id="teacher_id" onchange(subject(this.))>
                                        <option value="">Select Teacher</option>
                                        <?php
                                        include_once('../controller/config.php');
                                        
                                        $sql="SELECT * FROM teacher WHERE id_school='$my_school'";
                                        $result=mysqli_query($conn,$sql);
                                        if(mysqli_num_rows($result) > 0) {
                                            while($row=mysqli_fetch_assoc($result)){
                                                $id2=$row['id'];
                                                $name=$row['full_name'];
                                                echo '<option value="'.$id2.'">'.$name.'</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
							<script>
								function showUser(str) {
										if (str == "") {
										document.getElementById("sub").innerHTML = "";
										return;
										} else {
											document.getElementById("sub").innerHTML = this.responseText;
										}
									}
									
							</script>
                        </div>
                        <div class="box-footer">
							<input type="hidden" name="my_school" value="<?php echo $my_school ?>">
                            <input type="hidden" name="do" value="add_teacher_subject"  />
							<button type="submit" name="submit" class="btn btn-primary" id="btnSubmit">Submit</button>
                        </div>
                    </form>
              	</div>
            </div>
		</div>
	</section>
   

   

<?php
if(isset($_GET["msg"])){
//MSK-000143-6-PHP-JS-INSERT
	
	$msg=$_GET['msg'];

	if($msg==1){
		echo"
			<script>
			
			var myModal = $('#insert_Success');
			myModal.modal('show');
			
    		
    		myModal.data('hideInterval', setTimeout(function(){
    			myModal.modal('hide');
				
    		}, 3000));
						
			</script>
		";
	
	}

	if($msg==2){
		echo"
			<script>
			
			var myModal = $('#insert_Error');
			myModal.modal('show');

			clearTimeout(myModal.data('hideInterval'));
    		myModal.data('hideInterval', setTimeout(function(){
    			myModal.modal('hide');
    		}, 3000));
			
			</script>
		";
	
	}

	if($msg==3){
		echo"
			<script>
			
			var myModal = $('#routing_Duplicated');
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
    

       
    
    <section class="content" > 
    	<div class="row" id="table1">
        	<div class="col-md-8">
            	<div class="box">
                	<div class="box-header">
                  		<h3 class="box-title">All Class</h3>
                	</div>
                	<div class="box-body table-responsive" style="overflow-x:auto;">
                    	
                		<table id="example1" class="table table-bordered table-striped">
                    		<thead>
                            	<th>Class Name</th>
                            	<th>Teacher Name</th>
								<th>subject</th>
                        	</thead>
                        	<tbody>
<?php

include_once('../controller/config.php');
$sql="SELECT * FROM subject_routing WHERE id_school='$my_school'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){
	while($row=mysqli_fetch_assoc($result)){	
	$class_id=$row['class_id'];
	$subject_id=$row['subject_id'];
	$teacher_id=$row['teacher_id'];
	$sql1="SELECT * FROM class WHERE id='$class_id'";
	$result1=mysqli_query($conn,$sql1);
	if(mysqli_num_rows($result1) > 0){
		while($row1=mysqli_fetch_assoc($result1)){
			$class_name=$row1['name'];
		}
	}
	$sql2="SELECT * FROM teacher WHERE id='$teacher_id' and id_school='$my_school'";
	$result2=mysqli_query($conn,$sql2);
	if(mysqli_num_rows($result2) > 0){
		while($row2=mysqli_fetch_assoc($result2)){
			$teacher_name=$row2['full_name'];
		}
	}
	$sql3="SELECT * FROM subject WHERE id='$subject_id' and id_school='$my_school'";
	$result3=mysqli_query($conn,$sql3);
	if(mysqli_num_rows($result3) > 0){
		while($row3=mysqli_fetch_assoc($result3)){
			$subject_name=$row3['name'];
		}
	}
		echo"
			<tr>
				<td>$class_name</td>
				<td>$teacher_name</td>
				<td>$subject_name</td>
			</tr>
		";
	}
?>   
<?php }  ?>
                        	</tbody>
                    	</table>	                
               		</div>
              	</div>
            </div>
		</div>
	</section> 
    
	
    
<script>
function showModal(Updateform){
//MSK-00104
	
	var Id = $(Updateform).data("id");  
		
	var xhttp = new XMLHttpRequest();//MSK-00105-Ajax Start  
  		xhttp.onreadystatechange = function() {
    		if (this.readyState == 4 && this.status == 200) {
				//MSK-00107 
				var myArray1 = eval(xhttp.responseText);
				
				document.getElementById("id").value =myArray1[0];
				document.getElementById("name1").value =myArray1[1];


    		}
			
  		};	
		
    xhttp.open("GET", "../model/get_teache_Subject.php?id=" + Id , true);												
  	xhttp.send();//MSK-00105-Ajax End
	 
};
  
function Updateclassroom(){
//MSK-000108
	
	var Id1 = document.getElementById('id').value;
	var name1 = document.getElementById('name1').value;


	if(name1 == ''){
		//MSK-00109-name
		$("#btnSubmit1").attr("disabled", true);
		$('#divNameUpdate').addClass('has-error has-feedback');	
		$('#divNameUpdate').append('<span id="spanNameUpdate" class="glyphicon glyphicon-remove form-control-feedback set-width-tooltip" data-toggle="tooltip"    title="The name is required" ></span>');	
			
		$("#name1").keydown(function() {
			//MSK-00110-name 
			$("#btnSubmit1").attr("disabled", false);	
			$('#divNameUpdate').removeClass('has-error has-feedback');
			$('#spanNameUpdate').remove();
			
		});	
	}
				 		
	if(name1 == ''){
		//MSK-000098-validation failed
		$("#btnSubmit1").attr("disabled", true);
		e.preventDefault();
		return false;
			
	}else{
		
		$("#btnSubmit1").attr("disabled", false);
		var do1 = "update_classroom";	
		
		var xhttp = new XMLHttpRequest();//MSK-00111-Ajax Start  
  			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					//MSK-000112
					var myArray2 = eval(xhttp.responseText);
					var msg = myArray2[3];
					
					if(msg==1){//MSK-000113
						
						//MSK-000114
						document.getElementById("td1_"+Id1 ).innerHTML =myArray2[1];
						document.getElementById("td2_"+Id1 ).innerHTML =myArray2[2];
						$("#modalUpdateform").modal('hide');
						Update_alert(msg);//MSK-000116
						
					}
			
					if(msg==2){//MSK-000118
						
						$("#modalUpdateform").modal('hide');
						Update_alert(msg);
						
					}

					if(msg==3){//MSK-000119
						
						$("#modalUpdateform").modal('hide');
						Update_alert(msg);
		
					}
			
					if(msg==4){//MSK-000120
						
						$("#modalUpdateform").modal('hide');
						Update_alert(msg);
		
					}
			
    			}
			
  			};
			
  			xhttp.open("GET", "../model/update_classroom.php?id=" + Id1 + "&name="+name1 + "&student_count="+student_count1  +  "&do="+do1, true);												
  			xhttp.send();//MSK-00111-Ajax End
		
	}

};


function Update_alert(msg){
//MSK-000117	
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
	
	if(msg==3){

    	var myModal = $('#update_error1');
		myModal.modal('show');
		
    	clearTimeout(myModal.data('hideInterval'));
    	myModal.data('hideInterval', setTimeout(function(){
    		myModal.modal('hide');
    	}, 3000));
				
	}
	
	if(msg==4){
		
    	var myModal = $('#classroom_Duplicated');
		myModal.modal('show');
		
    	clearTimeout(myModal.data('hideInterval'));
    	myModal.data('hideInterval', setTimeout(function(){
    		myModal.modal('hide');
    	}, 3000));
				
	}
	
};

</script>    

<form action="">
	<div class="modal msk-fade " id="deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  		<div class="modal-dialog">
    		<div class="modal-content">
				<div class="modal-header bg-primary">
        			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        			<h4 class="modal-title" id="frm_title">Delete</h4>
      			</div>

				<div class="modal-body bgColorWhite">
        			<strong style="color:red;">Are you sure?</strong>  Do you want to Delete this ord
        		</div>Rec
      			<div class="modal-footer">

				<?php
				  echo ' <a href="../model/delete.php?id='.$id.'"  style="margin-left:10px;" class="deletebtn btn btn-danger col-sm-2 pull-right">Yes</a>'; ?>
        			<button type="button" class="btn btn-primary col-sm-2 pull-right" data-dismiss="modal" id="frm_cancel">No</button>
      			</div>
    		</div>
  		</div>
	</div>

   