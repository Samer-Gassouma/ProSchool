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
$my_school= "SELECT Id FROM `admin` WHERE `index_number` = '$my_index'";
$my_school_result= mysqli_query($conn,$my_school);
$my_school_row= mysqli_fetch_assoc($my_school_result);
$my_school= $my_school_row['Id']; ?>

<style>

.noScroll{
	overflow-y:hidden;	
}

@media only screen and (max-width: 500px) {
	
	#divGender1, #divPhone1, #divEmail1{
		
	 	width:75%;
		
	}

}



@media print{

	body{
		
		visibility: hidden;
	
	}

	#modalINV{
		
	   visibility: visible;
	
	}

	#divPhoto{
		display:none;	
	}

}

.form-control-feedback {
  
   pointer-events: auto;
  
}
.btn{
	
	pointer-events: auto;
	margin-right:220px;
}

.msk-set-width-tooltip + .tooltip > .tooltip-inner { 
  
     min-width:180px;
}
.msk-set-color-tooltip + .tooltip > .tooltip-inner { 
  
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

.msk-modal-content {
   position: absolute;
   left: 125px; 
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

/* #modalINV css  */

#modalINV .pdetail1 {
	padding:0;
	float:right;
	margin-right:7px; 
	
}

#modalINV .pdetail2 {
	float: right;
	
}


#modalINV .div-logo {
	float: left;
	height: 130px;
}

#modalINV .logo{
	float: left;
	width: 90px;
	height: 90px;
	margin-right: 10px;
	border-radius: 50%;
	text-align: center;
	background-color:#8860a7;
}

#modalINV .class-name{
	float: left;		
	margin-top:0;
	padding-top:0;			
}

#modalINV h1,#modalINV h2,#modalINV h3{
	margin-top:0;
	color:#8860a7;

}

#modalINV .class-address {
	float: left;
			
}

#modalINV .class-email {
	float: right;
	margin-right:15px;
	padding-right:0;
	color:white;
	background-color:#8860a7;
}

#modalINV th{			
	background-color:#8860a7;
	color:white;
}
#modalINV .std-name{
	color:#8860a7;
	font-size:16px;
}
#modalINV #h1{
display:none;	
}


@media print{

#modalINV .logo{
		background-color:#8860a7 !important;	
	}

#modalINV h1,#modalINV h2,#modalINV h3,#modalINV .std-name{
		color:#8860a7 !important;	
	}
	
	
#modalINV .table-bordered th{
			
		color:white!important;
		background-color:#8860a7 !important;		
				
	}
#modalINV .class-email {
		color:white!important;
		background-color:#8860a7 !important;
		
} 
	
#modalINV .panel{
		border:hidden!important;
}
#modalINV #btn1,#modalINV .panel-footer ,#modalINV .msk-heading {
		display:none;
			
}
	
#modalINV #h1{
		display:inline;	
}

#modalINV .close{
		display:none;	
}
	
@-moz-document url-prefix() {
		
	.panel{
		
		margin:0;
		padding:0;
	}
	#modalINV{
		
		margin:0!important;
		padding:0!important;
		position:absolute;
		left:-150px;
	}
	@page{
		margin:0;
		padding:0;	
	}

}
}

</style>


<div class="content-wrapper">
	
    <section class="content-header">
     	<h1>
            Student
        	<small>Preview</small>
        </h1>
        <ol class="breadcrumb">
        	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Student</a></li>
        </ol>
	</section>

	  
    
    
    <section class="content">
    	<div class="row">
            <div class="col-md-12">
              	<div class="box box-primary">
                	<div class="box-header with-border">
                  		<h3 class="box-title">Add Student</h3>
                	</div>
                   	<form role="form" action="../index.php" method="post"  enctype="multipart/form-data" id="form1" class="form-horizontal">
                		<div class="box-body" >
                        	<div class="row">
                        		<div class="col-md-6">
                                	<p class="alert-info ">Student Details </p>
                                     <div class="form-group" id="divFullName">
                                        <div class="col-xs-3">
                                            <label for="exampleInputEmail1">Full Name</label>
                                        </div>
                                        <div class="col-xs-9" id="divFullName1">
                                           <input type="text" class="form-control" placeholder="Enter full name" name="full_name" id="full_name" autocomplete="off">  
                                        </div>                    
                                    </div>
                                    <div class="form-group" id="divAddress">
                                        <div class="col-xs-3">
                                           <label for="exampleInputEmail1">Address</label>
                                        </div>
                                        <div class="col-xs-9" id="divAddress1">
                                           <input type="text" class="form-control" placeholder="Enter address" name="address" id="address" autocomplete="off"> 
                                        </div>                    
                                    </div>
                                    <div class="form-group" id="divEmail">
                                        <div class="col-xs-3">
                                           <label for="exampleInputEmail1">Email</label>
                                        </div>
                                        <div class="col-xs-9" id="divEmail1">
                                           <input type="text" class="form-control" placeholder="Enter email address" name="email" id="email" autocomplete="off"> 
                                        </div>                    
                                    </div>
                                    <div class="row" >
                        				<div class="col-xs-7">
                                            
                                            <div class="form-group" id="divPhone">
                                                <div class="col-xs-5">
                                                    <label for="exampleInputEmail1">Phone</label>
                                                </div>
                                                <div class="col-xs-7" id="divPhone1">
                                                	<input type="text" class="form-control" id="phone" name="phone" placeholder="111-111-1111">
                                                </div> 
                                        	</div>  
                                            <div class="form-group" id="divDOB">
                                                <div class="col-xs-5">
                                                    <label for="exampleInputEmail1">Date of Birth</label>
                                                </div>
                                                <div class="col-xs-7" id="divDOB1">
                                                	<input type="date" class="form-control" id="b_date" name="b_date" >
                                                </div> 
                                        	</div>  
                                            <div class="form-group" id="divGender" >
                                                <div class="col-xs-5">
                                                    <label for="exampleInputEmail1">Gender</label>
                                                </div>
                                                <div class="col-xs-7" id="divGender1">
                                                 	<select name="gender" class="form-control" id="gender" >
                                                        <option>Select Gender</option>
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                    </select>                                          
                                                </div> 
                                        	</div> 
											<div class="form-group" id="divGender" >
                                                <div class="col-xs-5">
                                                    <label for="exampleInputEmail1">Class</label>
                                                </div>
                                                <div class="col-xs-7" id="divGender1">
												<?php
														$sql = "SELECT * FROM class where Id_School = '$my_school'";
														$result = mysqli_query($conn, $sql);
														if (mysqli_num_rows($result) > 0) {
															echo "<select name='grade' class='form-control' id='class' >";
															echo "<option>Select Class</option>";
															while($row = mysqli_fetch_assoc($result)) {
																echo "<option value='".$row['id']."'>".$row['name']."</option>";
															}
															echo "</select>";
														}
													?>

															
                                                </div> 
                                        	</div> 
											
                                               	                   
                                    	</div>
                        			   	<div class="col-xs-5">
                                        	<div class="form-group" id="divPhoto">
                                                <div class="col-xs-3">
                                                    <label>Photo</label>
                                                </div>                            
                                                <div class="col-xs-3" id="divPhoto1" style="height:150px;">
                                                    <img id="output" style="width:130px;height:150px;" />
                                                    <input type="file" name="fileToUpload" id="fileToUpload" style="margin-top:7px;"  />
                                                </div>
                                            </div>
                                        </div>
                                    </div>                
                            	</div>
                                
                            </div><br>
                    	</div>
                       <div class="box-footer text-right">
							<input type="hidden" name="my_school" id="my_school" value="<?php $my_school ?> ">
                  			<input type="hidden" name="do" value="add_student"  />
                    		<button style="width:150px;" type="submit" class="btn text-right btn-success asd" id="btnSubmit">Next</button><br>

                             
<?php
/*
$current_day_no=date("d");
if($current_day_no > 25){
	//echo '<script>$(".asd").attr("disabled", true);///';
}
*/
?>
                  		</div>
                   </form>
				</div>
			</div>
		</div>
	</section>
   

<script>



$('#fileToUpload').change(function(){
	//MSK-00098
			
	var fileSize = this.files[0].size;	
    var maxSize = 1000000;// bytes
	var ext = $('#fileToUpload').val().split('.').pop().toLowerCase();
	var imageNoError = 0;
	
	if($.inArray(ext, ['png','jpg','jpeg']) == -1){
		//MSK-00099
		output.src="../uploads/error.png";
		$("#btnSubmit").attr("disabled", true);
		$('#divPhoto').addClass('has-error');
		$('#divPhoto1').addClass('has-feedback');
		$('#divPhoto1').append('<span id="spanPhoto" class="glyphicon glyphicon-remove form-control-feedback msk-set-width-tooltip" data-toggle="tooltip"                                title="The file type is not allowed" ></span>');
		
	}else{

		if(fileSize > maxSize) {
			//MSK-00100
			output.src="../uploads/error.png";
			$("#btnSubmit").attr("disabled", true);
			$('#divPhoto').addClass('has-error');
			$('#divPhoto1').addClass('has-feedback');	
			$('#divPhoto1').append('<span id="spanPhoto" class="glyphicon glyphicon-remove form-control-feedback msk-set-width-tooltip" data-toggle="tooltip" title="The file size is too large" ></span>');		
			
					
		}else{
			// MSK-00101
			output.src = URL.createObjectURL(this.files[0]);	
			$("#btnSubmit").attr("disabled", false);	
			$('#divPhoto').removeClass('has-error');
			$('#spanPhoto').remove();// MSK-00101
			
		}
	}
});



$("form").submit(function (e){
	//MSK-000098-form submit

	var full_name = $('#full_name').val();
	var address = $('#address').val();
	var gender = $('#gender').val();
	var b_date = $('#b_date').val();
	var email = $('#email').val();
	var photo = $('#fileToUpload').val();
	var phone = $('#phone').val();
	
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	var telformat = /\d{8}$/;
	
	
	
	
	if(full_name == ''){
		//MSK-00102-full_name 
		$("#btnSubmit").attr("disabled", true);
		$('#divFullName').addClass('has-error has-feedback');
		$('#divFullName').append('<span id="spanFullName" class="glyphicon glyphicon-remove form-control-feedback msk-set-width-tooltip" data-toggle="tooltip"    title="The full name is required" ></span>');	
		
		$("#full_name").keydown(function(){
			//MSK-00103-full_name 
			$("#btnSubmit").attr("disabled", false);	
			$('#divFullName').removeClass('has-error has-feedback');
			$('#spanFullName').remove();
			
		});
		
	}
	

	
	if(address == ''){
		//MSK-00102-address
		$("#btnSubmit").attr("disabled", true);
		$('#divAddress').addClass('has-error has-feedback');
		$('#divAddress').append('<span id="spanAddress" class="glyphicon glyphicon-remove form-control-feedback msk-set-width-tooltip" data-toggle="tooltip"    title="The address is required" ></span>');	
		
		$("#address").keydown(function() {
			//MSK-00103-address
			$("#btnSubmit").attr("disabled", false);	
			$('#divAddress').removeClass('has-error has-feedback');
			$('#spanAddress').remove();
			
		});
	
	}

	
	if(gender == 'Select Gender'){
		//MSK-00102-gender
		$("#btnSubmit").attr("disabled", true);
		$('#divGender').addClass('has-error ');
		$('#divGender1').addClass('has-error has-feedback');
		$('#divGender1').append('<span id="spanGender" class="glyphicon glyphicon-remove form-control-feedback msk-set-width-tooltip" data-toggle="tooltip"    title="The gender is required" ></span>');	
		
		$("#gender").change(function() {
			//MSK-00103-gender
			$("#btnSubmit").attr("disabled", false);	
			$('#divGender').removeClass('has-error');
			$('#divGender1').removeClass('has-error has-feedback');
			$('#spanGender').remove();
			
		});
	
	}
	
	
	if(b_date == ''){
		//MSK-00102-address
		$("#btnSubmit").attr("disabled", true);
		$('#divDOB').addClass('has-error');
		$('#divDOB1').addClass('has-error has-feedback');
		$('#divDOB1').append('<span id="spanDOB" class="glyphicon glyphicon-remove form-control-feedback msk-set-width-tooltip" data-toggle="tooltip"    title="The date of birth is required" ></span>');	
		
		$("#b_date").keydown(function() {
			//MSK-00103-address
			$("#btnSubmit").attr("disabled", false);	
			$('#divDOB').removeClass('has-error');
			$('#divDOB1').removeClass('has-error has-feedback');
			$('#spanDOB').remove();
			
		});
	
	}
	
	
	if(email == ''){
		//MSK-00102-email	
		$('#divEmail').addClass('has-error has-feedback');
		$('#divEmail1').append('<span id="spanEmail" class="glyphicon glyphicon-remove form-control-feedback msk-set-width-tooltip" data-toggle="tooltip"    title="The email address is required" ></span>');	
		
		$("#email").keydown(function() {
			//MSK-00103-email
			$("#btnSubmit").attr("disabled", false);	
			$('#divEmail').removeClass('has-error has-feedback');
			$('#spanEmail').remove();
			
		});
			
	}else{
		if (mailformat.test(email) == false){ 
			//MSK-00108-email
			$('#divEmail').addClass('has-error has-feedback');
			$('#divEmail1').append('<span id="spanEmail" class="glyphicon glyphicon-remove form-control-feedback msk-set-color-tooltip" data-toggle="tooltip"    title="Enter valid email address" ></span>');
			
			$("#email").keydown(function(){
				//MSK-00109-email
				var $field = $(this);// this is the value before the keypress
				var beforeVal = $field.val();
	
				setTimeout(function() {
	
					var afterVal = $field.val();// this is the value after the keypress
					
						if (mailformat.test(afterVal) == true){
							//MSK-00110-email
							$("#btnSubmit").attr("disabled", false);
							$('#divEmail').removeClass('has-error has-feedback');
							$('#spanEmail').remove();
							$('#divEmail').addClass('has-success has-feedback');
							$('#divEmail1').append('<span id="spanEmail" class="glyphicon glyphicon-ok form-control-feedback"></span>');
							
						}else{
							//MSK-00111-email
							$("#btnSubmit").attr("disabled", true);
							$('#spanEmail').remove();
							$('#divEmail').addClass('has-error has-feedback');
							$('#divEmail1').append('<span id="spanEmail" class="glyphicon glyphicon-remove form-control-feedback msk-set-color-tooltip" data-toggle="tooltip"    title="Enter valid email address" ></span>');
						
						}
					
				}, 0);
						
			});
			
		}else{
			
		}
			  
	}
	
	
	
	if(photo == ''){
		//MSK-00102-photo
		output.src="../uploads/error.png";
		
		$("#btnSubmit").attr("disabled", true);
		$('#divPhoto').addClass('has-error has-feedback ');
		$('#divPhoto1').addClass('has-feedback');
		$('#divPhoto1').append('<span id="spanPhoto" class="glyphicon glyphicon-remove form-control-feedback msk-set-width-tooltip" data-toggle="tooltip"    title="The image is required" ></span>');	
		
	}
	
	if(phone == ''){
		//MSK-00102-phone
		$('#divPhone').addClass('has-error');
		$('#divPhone1').addClass('has-error has-feedback');
		$('#divPhone1').append('<span id="spanPhone" class="glyphicon glyphicon-remove form-control-feedback msk-set-width-tooltip" data-toggle="tooltip"    title="The phone number is required" ></span>');	
				
		$("#phone").keydown(function() {
			//MSK-00103-phone
			$("#btnSubmit").attr("disabled", false);	
			$('#divPhone').removeClass('has-error');
			$('#divPhone1').removeClass('has-error has-feedback');
			$('#spanPhone').remove();
			
		});
		
	}else{
		if (telformat.test(phone) == false){ 
			//MSK-00104-phone
			$('#divPhone').addClass('has-error');
			$('#divPhone1').addClass('has-error has-feedback');
			$('#divPhone1').append('<span id="spanPhone" class="glyphicon glyphicon-remove form-control-feedback msk-set-color-tooltip" data-toggle="tooltip"    title="Enter valid phone number" ></span>');
			
			$("#phone").keydown(function() {
				//MSK-00105-phone
				var $field = $(this);
				var beforeVal = $field.val();// this is the value before the keypress
	
				setTimeout(function() {
	
					var afterVal = $field.val();// this is the value after the keypress
					
						if (telformat.test(afterVal) == true){
							//MSK-00106-phone
							$("#btnSubmit").attr("disabled", false);
							$('#divPhone').removeClass('has-error');
							$('#divPhone1').removeClass('has-error has-feedback');
							$('#spanPhone').remove();
							$('#divPhone1').addClass('has-success has-feedback');
							$('#divPhone1').append('<span id="spanPhone" class="glyphicon glyphicon-ok form-control-feedback"></span>');
							
						}else{
							//MSK-00107-phone
							$("#btnSubmit").attr("disabled", true);
							$('#spanPhone').remove();
							$('#divPhone').addClass('has-error');
							$('#divPhone1').addClass('has-error has-feedback');
							$('#divPhone1').append('<span id="spanPhone" class="glyphicon glyphicon-remove form-control-feedback msk-set-color-tooltip" data-toggle="tooltip"    title="Enter valid email address" ></span>');
					
						}
					
				}, 0);
						
			});
			
		}else{
			
		}
		
	}
	
	
	
	if(full_name == '' ||address == '' || gender == 'Select Gender'  || b_date == ''|| email == '' || mailformat.test(email) == false || telformat.test(phone) == false  || photo == ''  || phone == ''   ) {
		
		//MSK-000098- form validation failed
		$("#btnSubmit").attr("disabled", true);
		e.preventDefault();
		return false;
			
	}else{
		$("#btnSubmit").attr("disabled", false);
	}

});

</script>



    
	</div>
    
    <div id="viewSubjectDiv">
    	
    </div>
    <div id="insertSubjectDiv">
    
    </div>


<?php
if(isset($_GET["do"])&&($_GET["do"]=="alert_from_insert")){
  
$msg=$_GET['msg'];
$index=$_GET['index'];

	if($msg==1){
		echo"
			<script>
			
			var myModal = $('#index_Duplicated');
			myModal.modal('show');			
			
    		myModal.data('hideInterval', setTimeout(function(){
    			myModal.modal('hide');
				
    		}, 3000));
						
			</script>
		";
	}

	if($msg==2){//MSK-00120 
		echo"
			<script>
						
			var myModal1 = $('#modalSelectGrade');
			myModal1.data('id', '$index').modal('show');//MSK-00121
						 
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
	
	if($msg==4){
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
	
	if($msg==8){
		echo"
			<script>
			
			var myModal = $('#insert_Failed');
			myModal.modal('show');
			
			clearTimeout(myModal.data('hideInterval'));
    		myModal.data('hideInterval', setTimeout(function(){
    			myModal.modal('hide');
				
    		}, 3000));
			
			</script>
		";
	
	}
	
	if($msg==6){
		echo"
			<script>
			
			var myModal = $('#upload_error1');
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

$('#grade').change(function () {
	//MSK-00123
	var grade = $('#grade').val();
	var index = $('#modalSelectGrade').data("id"); 
	var do1 = "view_subject";
	
	$('#modalSelectGrade').modal('hide');
	 
	var xhttp = new XMLHttpRequest();//MSK-000124-Start Ajax 
  	xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {
			document.getElementById('viewSubjectDiv').innerHTML=this.responseText;//MSK-000125
			
			$("#modalViewSubject").modal('show');//MSK-000127
						
    	}
			
  	};
	
  	xhttp.open("GET", "show_student_subject.php?id=" + grade + "&do="+do1+ "&index="+index, true);												
  	xhttp.send();//MSK-000124-End Ajax
	

});

function showModalGrade(){
	//MSK-000129
	$('#modalSelectGrade').modal('show');
	$('body').addClass('noScroll');
		
};


</script>

<script>$("[data-mask]").inputmask(); </script>


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
                            
