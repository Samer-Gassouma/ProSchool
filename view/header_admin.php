<body class="hold-transition skin-blue sidebar-mini" >
<div class="wrapper">
  <header class="main-header" >
    
    <a href="" class="logo">
      
      <span class="logo-mini"><strong>OK</strong></span>
      
      <span class="logo-lg"><strong>Admin</strong></span>
    </a>
    
    <nav class="navbar navbar-static-top">
      
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
       		<span class="sr-only">Toggle navigation</span>
       	</a>
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">

<script>

$('body').on('click', '.dropdown-toggle', function (e){
   clearInterval(intervalID1);
});
              
</script>

<?php 

$index=$_SESSION["index_number"];
$type=$_SESSION["type"];
$school=$_SESSION["id"];

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
                      <span class="hidden-xs"><?php echo $row['full_name']; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                      
                      <li class="user-header">
                        <img src="../<?php echo $row['image_name']; ?>" class="img-circle" alt="User Image">
        
                        <p>
                          <?php echo $row['full_name']; ?> - <?php echo $type; ?>
                          <?php
                          		$date = strtotime($row['reg_date']);
                                echo '<small>'."Member since ".date('M'.'.'.' Y', $date).'</small>';
                           ?>
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
            </ul> 
        </div>
	</nav>
  </header>
  <div class="row" id="fProfile">
        
  </div>
  
  
   
    
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

.modal-content1 {
   position: absolute;
   left: 25%; 
}

</style>