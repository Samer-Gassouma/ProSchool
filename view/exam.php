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
$my_school= $my_school_row['id']; ?>

<style>

.modal-content1 {
   position: absolute;
   left: 125px; 
}

@media only screen and (max-width: 500px) {

	.modal-content1 {
   		width:100%;
		position:static;
   
	}
	
	[class*="col-"] {
        width: 100%;
    }
}

@media only screen and (max-width: 768px) {
		
	.modal-content1 {
   		width:100%;
		position:static;
   
	}
	
	[class*="col-"] {
        width: 100%;
    }

	
}

@media only screen and (max-width: 1200px) {
	.modal-content1 {
   		width:100%;
		position:static;
   
	}
	
	[class*="col-"] {
        width: 100%;
    }
	
}

.form-control-feedback {
  
   pointer-events: auto;
  
}

.set-width-tooltip + .tooltip > .tooltip-inner { 
  
     min-width:180px;
}
</style>


<div class="content-wrapper">
	
    <section class="content-header">
    	<h1>
        	Exam
        </h1>
        <ol class="breadcrumb">
        	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Exam</a></li>
        </ol>
	</section>
    
    
	<section class="content" > 
    	<div class="row" id="table1">
        	<div class="col-md-8">
            	<div class="box">
                	<div class="box-header">
                 		<a href="#modalInsertform" onClick="" class="btn btn-success btn-sm pull-right" data-id="<?php echo $row["id"]; ?>" data-toggle="modal">Add <span class="glyphicon glyphicon-plus"></span></a>
                  		<h3 class="box-title">All Exam</h3>
                	</div>
                	<div class="box-body table-responsive">
                    	
                		<table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <th class="col-md-1">Name</th>
								<th class="col-md-3">Teacher Creator</th>
                                <th class="col-md-2">Action</th>
                            </thead>
                        	<tbody>
<?php
include_once('../controller/config.php');

$sql="SELECT * FROM exam where Id_school = '$my_index'";
$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0) {
	while($row=mysqli_fetch_assoc($result)){
		$tname = "SELECT * FROM teacher WHERE id = '".$row["teacher_id"]."' and Id_school = $my_index";
		$tresult = mysqli_query($conn,$tname);
		$trow = mysqli_fetch_assoc($tresult);
		$tname = $trow["full_name"];
		$id=$row['id'];
?>   
                                <tr>
                                    <td> 
										<?php echo $row['name']; ?>
									</td>
									<td>
										<?php echo $tname; ?>
									</td>
									<td>
<?php 

$sql1="SELECT * FROM exam_timetable WHERE exam_id='$id' and Id_school = $my_school";	
   
$result1=mysqli_query($conn,$sql1);

if(mysqli_num_rows($result1) > 0){
	$cant_remove1=1;
}else{
	$cant_remove1=0;
}

$sql2="SELECT * FROM student_exam WHERE exam_id='$id' and Id_school = $my_school";	
   
$result2=mysqli_query($conn,$sql2);

if(mysqli_num_rows($result2) > 0){
	$cant_remove2=1;
}else{
	$cant_remove2=0;
}




	echo '<a href="#modalUpdateform" onClick="UpdateExam(this)" class="btn btn-info btn-xs" data-id="'.$id.'" data-toggle="modal">Edit</a>';
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
    	</div>
	</section> 
    
     
  
  <div class="modal msk-fade" id="modalInsertform" tabindex="-1" role="dialog" aria-labelledby="modalInsertform" aria-hidden="true">  
  	<div class="modal-dialog ">
    	<div class="container modal-content1 ">
      		<div class="row ">	
           		<div class="col-md-3 ">
            		<div class="panel panel-primary">
        				<div class="panel-heading">               
        					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
          					<h3 class="panel-title">Add Exam</h3>
   						</div>
            			 <form role="form" action="../index.php" method="post">
            				<div class="panel-body"> 
							<div class="form-group" id="divName">
								<label for="" >Teacher</label>
								<?php 
									$sql="SELECT * FROM teacher where Id_school = $my_school";
									$result=mysqli_query($conn,$sql);
									echo '<select class="form-control" name="teacher_id">';
									while($row=mysqli_fetch_assoc($result)){
										echo '<option value="'.$row['id'].'">'.$row['full_name'].'</option>';
									}
									echo '</select>';
								?>
							</div>
							<div class="form-group" id="divName">
								<label for="" >Name</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="Name">
							</div>
						<div class="form-group" id="divName"><label for="" >
							Description
						</label>
						<textarea class="form-control" id="description" name="description" placeholder="Description">

						</textarea>
					</div>
					<div class="form-group" id="divName">
						<label for="" >
							Date
						</label>
						<input type="date" class="form-control" id="date" name="date" placeholder="Date">
					</div><div class="form-group" id="divName"><label for="" >
						Time
					</label>
					<input type="time" class="form-control" id="time" name="time" placeholder="Time">
				</div><div class="form-group" id="divName"><label for="" >
					Duration
				</label><input type="text" class="form-control" id="duration" name="duration" placeholder="Duration">
			</div>
			<div class="form-group" id="divName"><label for="" >Room</label>
				<?php 
					$sql="SELECT * FROM class_room where Id_school = $my_school";
					$result=mysqli_query($conn,$sql);
					echo '<select class="form-control" name="room">';
					while($row=mysqli_fetch_assoc($result)){
						echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
					}
					echo '</select>';
					?>
			</div>
			<div class="form-group" id="divName"><label for="" >Class</label>
			<?php 
				$sql="SELECT * FROM class where Id_school = $my_school";
				$result=mysqli_query($conn,$sql);
				echo '<select class="form-control" name="class">';
				while($row=mysqli_fetch_assoc($result)){
					echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
				}
				echo '</select>';
				?>
			</div>
            				</div>
							<?php $x =$_SESSION["index_number"]; ?>
            				<div class="panel-footer bg-blue-active">
								<input type="hidden" name="my_school" value="<?php echo $x; ?>" />

            					<input type="hidden" name="do" value="add_exam"  />
                    			<button type="submit" class="btn btn-info " id="btnSubmit" style="width:100%;">Submit</button>
             				</div>
             			</form>       
      				</div>
         		</div>
            </div>
        </div>
  	</div>
</div>

<script> 

$("form").submit(function (e) {
	
	var name = $('#name').val();	

	if(name == ''){
		//MSK-00100-fee
		$("#btnSubmit").attr("disabled", true);
		$('#divName').addClass('has-error has-feedback');
		$('#divName').append('<span id="spanName" class="glyphicon glyphicon-remove form-control-feedback set-width-tooltip" data-toggle="tooltip"    title="The name is required" ></span>');	
	
		$("#name").keydown(function() {
			//MSK-00101-fee       
  			$("#btnSubmit").attr("disabled", false);	
			$('#divName').removeClass('has-error has-feedback');
			$('#spanName').remove();
		
		});

	}else{
	
	}

	if(name == '' ){
		//MSK-000099- form validation failed
		$("#btnSubmit").attr("disabled", true);
		e.preventDefault();
		return false;
			
	}else{
		$("#btnSubmit").attr("disabled", false);
		//return true;
	}


});
</script>


<?php
if(isset($_GET["msg"])){
  
	$msg=$_GET['msg'];

	if($msg==1){
		echo"
			<script>
			
			var myModal = $('#exam_Duplicated');
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
			
			var myModal = $('#insert_Success');
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

	
  	<div class="modal msk-fade" id="modalUpdateform" tabindex="-1" role="dialog" aria-labelledby="modalUpdateform" aria-hidden="true">  
  		<div class="modal-dialog">
    		<div class="container">
            	<div class="row ">	
           			<div class="col-md-6">
                		<div class="panel">
        					<div class="panel-heading bg-orange">                 
        						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
          						<h4 class="modal-title custom_align" id="Heading">Edit Exam</h4>
                            </div>
                            <div class="panel-body"> 
                                <div class="form-group" id="divSubjectUpdate">
                                    <label for="">Exam</label>
                                    <input class="form-control" type="text" id="name1" name="name" autocomplete="off">
                                </div> 
                            </div>

                            <div class="panel-footer bg-gray-light">
                                <input type="hidden" id="id" name="id" value="<?php echo $id; ?>" />
                                <button type="submit" onClick="UpdateExam(this)" id="btnSubmit1" class="btn btn-info" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>         
        	  				</div>
	
            			</div>
            		</div>
            	</div>
        	</div>
		</div>
	</div>

<script>

function showModal(Updateform){
//MSK-00104

	var Id = $(Updateform).data("id");  
	var school = $(Updateform).data("my_school");
		
	var xhttp = new XMLHttpRequest();//MSK-00105-Ajax Start  
  		xhttp.onreadystatechange = function() {
			
    		if (this.readyState == 4 && this.status == 200) {
				//MSK-00107 
				var myArray1 = eval(xhttp.responseText);
				
				document.getElementById("id").value =myArray1[0];
				document.getElementById("name1").value =myArray1[1];

    		}
			
  		};	
		
    	xhttp.open("GET", "../model/get_exam.php?id=" + Id + "&school="+school  , true);												
  		xhttp.send();//MSK-00105-Ajax End
	 
};
  
function UpdateExam(){
//MSK-000108
	
	var Id1 = document.getElementById('id').value;
	var name1 = document.getElementById('name1').value;

	if(name1 == ''){
		//MSK-00109-name
		$("#btnSubmit1").attr("disabled", true);
		$('#divExamUpdate').addClass('has-error has-feedback');	
		$('#divExamUpdate').append('<span id="spanExamUpdate" class="glyphicon glyphicon-remove form-control-feedback set-width-tooltip" data-toggle="tooltip"    title="The exam is required" ></span>');	
			
		$("#name1").keydown(function() {
			//MSK-00110-name 
			$("#btnSubmit1").attr("disabled", false);	
			$('#divExamUpdate').removeClass('has-error has-feedback');
			$('#spanExamUpdate').remove();
			
		});	
	}else{
		
	}
	
	if(name1 == ''){
		//MSK-000098-validation failed
		$("#btnSubmit1").attr("disabled", true);
		e.preventDefault();
		return false;
			
	}else{
		
		var do1 = "update_exam";	
		
		var xhttp = new XMLHttpRequest();//MSK-00111-Ajax Start  
  			xhttp.onreadystatechange = function() {
			
				if (this.readyState == 4 && this.status == 200) {
					//MSK-000112
					var myArray2 = eval(xhttp.responseText);
					var msg = myArray2[2];
			
					if(msg==1){//MSK-000112
					
						document.getElementById("td1_"+Id1 ).innerHTML =myArray2[1];//MSK-000114
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
  		
		xhttp.open("GET", "../model/update_exam.php?id=" + Id1 + "&name="+name1 + "&do="+do1, true);												
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
		
    	var myModal = $('#exam_Duplicated');
		myModal.modal('show');
		
    	clearTimeout(myModal.data('hideInterval'));
    	myModal.data('hideInterval', setTimeout(function(){
    		myModal.modal('hide');
    	}, 3000));
				
	}
	 
};

</script>   
    
    
	<div class="modal msk-fade" id="deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  		<div class="modal-dialog">
    		<div class="modal-content">
				<div class="modal-header bg-primary">
        			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        			<h4 class="modal-title" id="frm_title">Delete</h4>
      			</div>

				<div class="modal-body bgColorWhite">
        			<strong style="color:red;">Are you sure?</strong>  Do you want to Delete this Record
        		</div>
      			<div class="modal-footer">
					<a href="#" style='margin-left:10px;' id="btnYes" class="deletebtn btn btn-danger col-sm-2 pull-right">Yes</a>
        			<button type="button" class="btn btn-primary col-sm-2 pull-right" data-dismiss="modal" id="frm_cancel">No</button>
      			</div>
    		</div>
  		</div>
	</div>
         
<script>

$('body').on('click', '.confirm-delete', function (e){
//MSK-000122		
    e.preventDefault();
    var id = $(this).data('id');
	$('#deleteConfirm').data('id1', id).modal('show');//MSK-000123

});

$('#btnYes').click(function() {
//MSK-000126
     
    var id = $('#deleteConfirm').data('id1');	
	var do1 = "delete_record";	
	var table_name = "exam";
		
	var info = $('#example1').DataTable().page.info();
	var currentPage= (info.page + 1);
	
	var xhttp = new XMLHttpRequest();//MSK-000127-Ajax Start  
  		xhttp.onreadystatechange = function() {
			
    		if (this.readyState == 4 && this.status == 200) {
				//MSK-000129
				var myArray = eval( xhttp.responseText );
					
				if(myArray[0]==1){//MSK-000130
				
					$("#deleteConfirm").modal('hide');	        		
					var page = myArray[1];
				
					var xhttp1 = new XMLHttpRequest();//MSK-000131-Start Ajax  
						xhttp1.onreadystatechange = function() {		
				
							if (this.readyState == 4 && this.status == 200) {
										
								document.getElementById('table1').innerHTML = this.responseText;//MSK-000132
								cTablePage(page);//MSK-000133
								Delete_alert(myArray[0]);//MSK-000134	
								//window.document.reload();
							
							}
								
						};
						
						xhttp1.open("GET", "show_exam_table.php" , true);												
  						xhttp1.send();//MSK-000131-End Ajax
				
				 }
		
				 if(myArray[0]==2){//MSK-000137
			
					$("#deleteConfirm").modal('hide');
					Delete_alert(myArray[0]);//MSK-000138
				
				 }


    		}
			
  		};	
    	
		xhttp.open("GET", "../model/delete_record.php?id=" + id + "&do="+do1 + "&table_name="+table_name + "&page="+currentPage , true);												
  		xhttp.send();//MSK-000127-Ajax End
	 			   		
});

function cTablePage(page){
//MSK-000135	
	var currentPage1 = (page-1)*10;
	
	$(function(){
		$("#example1").DataTable({
			"displayStart": currentPage1,    
			"bDestroy": true       
   		});
						
	});
					  
	window.scrollTo(0,document.body.scrollHeight);
	
};	

function Delete_alert(msg){
//MSK-000136	
	if(msg==1){
		
    	var myModal = $('#delete_Success');
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
                           
