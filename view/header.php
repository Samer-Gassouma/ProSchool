<?php session_start();?>

<body class="hold-transition skin-blue sidebar-mini" >
<div class="wrapper">
  <header class="main-header" >
    
    <a href="" class="logo">
      
      <span class="logo-mini"><strong>Pro</strong></span>
      
      <span class="logo-lg"><strong>PRO SCHOOL </strong></span>
    </a>
    
    <nav class="navbar navbar-static-top">
      
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
       		<span class="sr-only">Toggle navigation</span>
       	</a>
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
            
              
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>

         
  
<?php
if($my_type == 'Teacher' || $my_type == 'Student'){
?>
					 <span class="label label-warning">0</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 0 notifications</li>
                  <li>
                    
                    <ul class="menu">
                     <li>
                        <a href="#" onClick="">
                         
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#" onClick="">View all</a></li>
                </ul>
              </li>
<?php } ?>

           
<script>
var count = 0;

function viewAllNotifi(){
	
	var xhttp = new XMLHttpRequest();//MSK-00149-Start Ajax  
  		xhttp.onreadystatechange = function() {
    		if (this.readyState == 4 && this.status == 200) {
				
				document.getElementById('viewAllDuePayment').innerHTML = this.responseText;
				$('#modalviewAllDPayment').modal('show');
				count++;
				
    		}
			
  		};	
		
    	xhttp.open("GET", "all_student_due_payment.php", true);												
  		xhttp.send();
}

function viewNotifications(std_index,due_month,due_year,notifications_id){
	
	$("#modalviewAllDPayment").modal('hide');
	
	var xhttp = new XMLHttpRequest();//MSK-00149-Start Ajax  
  		xhttp.onreadystatechange = function() {
    		if (this.readyState == 4 && this.status == 200) {
				
				document.getElementById('viewDuePayment').innerHTML = this.responseText;
				$('#modalviewDuePayment').modal('show');
				
				notifiRead(notifications_id);
    		}
			
  		};	
		
    	xhttp.open("GET", "student_due_payment.php?std_index=" + std_index +"&due_month="+due_month +"&due_year="+due_year, true);												
  		xhttp.send();
	
}

function showAllNotfi1(){
	
	if(count > 0){
		viewAllNotifi();
	}
	
}

function countEquel0(){
	
	count = count-count;
	
}
 
</script>           
                   

              	
<script>
//MSK-00147
var intervalID1;
var count3 = 0;


function studentProfile(std_index){
	
	$("#modalviewAllDPayment").modal('hide');
	
	var xhttp = new XMLHttpRequest();//MSK-00149-Start Ajax  
		xhttp.onreadystatechange = function() {
																	
			if (this.readyState == 4 && this.status == 200) {
																		
				document.getElementById('stdProfile').innerHTML = this.responseText;
				$('#modalviewStudent').modal('show');														
			}
		};
																
		xhttp.open("GET", "student_profile1.php?std_index=" + std_index , true);												
		xhttp.send();
	
	
	
};


</script>          
            


<?php 

$my_index=$_SESSION["index_number"];
$my_type=$_SESSION["type"];

?>

<?php
include_once('../controller/config.php');

if($type=="Student"){
	$sql="SELECT * FROM student where index_number='$index'";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
}

if($type=="Teacher"){
	$sql="SELECT * FROM teacher where index_number='$index'";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);	
}

if($type=="Admin"){
	$sql="SELECT * FROM admin where index_number='$index'";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);	
}

?> 

                
            	<li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <img src="../<?php echo $row['image_name']; ?>" class="user-image" alt="User Image">
                      <span class="hidden-xs"><?php echo $row['i_name']; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                      
                      <li class="user-header">
                        <img src="../<?php echo $row['image_name']; ?>" class="img-circle" alt="User Image">
        
                        <p>
                          <?php echo $row['i_name']; ?> - <?php echo $type; ?>
                          <small>Member since Nov. 2012</small>
                        </p>
                      </li>
                      
                      
                      
                      <li class="user-footer">
                        <div class="pull-left">
                          <a href="#" class="btn btn-default btn-flat">Profile</a>
                        </div>
                        <div class="pull-right">
                          <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                        </div>
                      </li>
                    </ul>
              </li>
          
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
            </ul> 
           
        </div>
	</nav>
  </header>
  <div class="row" id="fProfile">
        
  </div>
  <div id="viewDuePayment">
    
  </div>
  <div id="viewAllDuePayment">
    
  </div>
  <div id="stdProfile">
    
  </div>
  
   
<script>

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
