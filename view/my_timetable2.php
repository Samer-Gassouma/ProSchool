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
        	Timetable
        	<small>Preview</small>
        </h1>
        <ol class="breadcrumb">
        	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Timetable</a></li>
            <li><a href="#">My Timetable</a></li>
    	</ol>
	</section>
    
	
	<section class="content" > 
    	<div class="row" id="table1">
        	<div class="col-md-10">
                <div class="box">
                    <div class="box-header">
                    
<?php $index=$_SESSION["index_number"]; ?> 
   
                        
                        <h3 class="box-title">My Timetable </h3>
                    </div>
                    <div class="box-body table-responsive">
                        <table id="example3" class="table table-bordered table-striped">
                            <thead style="color:white; background-color:#666;">
                                <th class="col-md-1">Time</th>
                                <th class="col-md-1">Monday</th>
                                <th class="col-md-1">Tuesday</th>
                                <th class="col-md-1">Wednesday</th>
                                <th class="col-md-1">Thursday</th>
                                <th class="col-md-1">Frieday</th>
                                <th class="col-md-1">Saturday</th>
                                <th class="col-md-1">Sunday</th>
                             </thead>
                        <tbody>
<?php
include_once('../controller/config.php');
            
$index=$_SESSION["index_number"];
$current_year=date('Y');
            
$sql1="SELECT * FROM teacher WHERE index_number='$index'";
$result1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_assoc($result1);
$id=$row1['id'];


$sql2="SELECT 
	    *
	   FROM
          timetable
		WHERE
			teacher_id = '$id'
       ORDER BY
          start_time";
$result2=mysqli_query($conn,$sql2);
while($row2=mysqli_fetch_assoc($result2)){
	
	$s_time=$row2['start_time'];
	$e_time=$row2['end_time'];
	
?>    
                 	<tr id="<?php echo $s_time; ?>_<?php echo $e_time; ?>" >
                    	<th  style="color:white; background-color:#666;">
                        	<span id="spanSTime_<?php echo $row2['id']; ?>" data-id="<?php echo $s_time; ?>"><?php echo $s_time ?></span> - 		
                            <span id="spanETime_<?php echo $row2['id']; ?>" data-id="<?php echo $e_time; ?>"><?php echo $e_time; ?></span>
                        </th>
                        <td bgcolor="#d74340" style="color:white;">
							<?php 
								$sql = "SELECT * FROM teacher where id = $id";
								$res = mysqli_query($conn,$sql);
								while($row = mysqli_fetch_assoc($res)){
									$name = $row["full_name"];
									$sql11 = "SELECT * FROM timetable where teacher_id = $id and start_time = $s_time and day='Monday'";
									$res11 = mysqli_query($conn,$sql11);
									if(mysqli_num_rows($res11)){
										$row11 = mysqli_fetch_assoc($res11);
										$class = $row11["class_id"];
										$classroom = $row11["classroom_id"];
										$sql_class = "SELECT * from class where id = $class";
										$res12 = mysqli_query($conn,$sql_class);
										$row12 = mysqli_fetch_assoc($res12);
										$clasName = $row12["name"];
										$sql_ss = "SELECT * from class_room where id = $classroom";
										$res13 = mysqli_query($conn,$sql_ss);
										$row13 = mysqli_fetch_assoc($res13);
										$classRoom_name= $row13["name"];
										?>
										
										<?php echo($name);?><br>
										<?php echo($clasName);?> <br>
										<?php echo($classRoom_name);?> <br>
									
									<?php
									}
								}
							?>
						</td>
						<td bgcolor="#d7cb40" style="color:white;">
						<?php 
								$sql = "SELECT * FROM teacher where id = $id";
								$res = mysqli_query($conn,$sql);
								while($row = mysqli_fetch_assoc($res)){
									$name = $row["full_name"];
									$sql11 = "SELECT * FROM timetable where teacher_id = $id and start_time = $s_time and day='Tuesday'";
									$res11 = mysqli_query($conn,$sql11);
									if(mysqli_num_rows($res11)){
										$row11 = mysqli_fetch_assoc($res11);
										$class = $row11["class_id"];
										$classroom = $row11["classroom_id"];
										$sql_class = "SELECT * from class where id = $class";
										$res12 = mysqli_query($conn,$sql_class);
										$row12 = mysqli_fetch_assoc($res12);
										$clasName = $row12["name"];
										$sql_ss = "SELECT * from class_room where id = $classroom";
										$res13 = mysqli_query($conn,$sql_ss);
										$row13 = mysqli_fetch_assoc($res13);
										$classRoom_name= $row13["name"];
										?>
										
										<?php echo($name);?><br>
										<?php echo($clasName);?> <br>
										<?php echo($classRoom_name);?> <br>
									<?php
									}
								}
							?>
						</td>
						<td bgcolor="#40b9d7" style="color:white;">
						<?php 
								$sql = "SELECT * FROM teacher where id = $id";
								$res = mysqli_query($conn,$sql);
								while($row = mysqli_fetch_assoc($res)){
									$name = $row["full_name"];
									$sql11 = "SELECT * FROM timetable where teacher_id = $id and start_time = $s_time and day='Wednesday'";
									$res11 = mysqli_query($conn,$sql11);
									if(mysqli_num_rows($res11)){
										$row11 = mysqli_fetch_assoc($res11);
										$class = $row11["class_id"];
										$classroom = $row11["classroom_id"];
										$sql_class = "SELECT * from class where id = $class";
										$res12 = mysqli_query($conn,$sql_class);
										$row12 = mysqli_fetch_assoc($res12);
										$clasName = $row12["name"];
										$sql_ss = "SELECT * from class_room where id = $classroom";
										$res13 = mysqli_query($conn,$sql_ss);
										$row13 = mysqli_fetch_assoc($res13);
										$classRoom_name= $row13["name"];
										?>
										
										<?php echo($name);?><br>
										<?php echo($clasName);?> <br>
										<?php echo($classRoom_name);?> <br>
									
									<?php
									}
								}
							?>
    					</td>
						<td bgcolor="#f39037" style="color:white;">
							<?php 
								$sql = "SELECT * FROM teacher where id = $id";
								$res = mysqli_query($conn,$sql);
								while($row = mysqli_fetch_assoc($res)){
									$name = $row["full_name"];
									$sql11 = "SELECT * FROM timetable where teacher_id = $id and start_time = $s_time and day='Thursday'";
									$res11 = mysqli_query($conn,$sql11);
									if(mysqli_num_rows($res11)){
										$row11 = mysqli_fetch_assoc($res11);
										$class = $row11["class_id"];
										$classroom = $row11["classroom_id"];
										$sql_class = "SELECT * from class where id = $class";
										$res12 = mysqli_query($conn,$sql_class);
										$row12 = mysqli_fetch_assoc($res12);
										$clasName = $row12["name"];
										$sql_ss = "SELECT * from class_room where id = $classroom";
										$res13 = mysqli_query($conn,$sql_ss);
										$row13 = mysqli_fetch_assoc($res13);
										$classRoom_name= $row13["name"];
										?>
										
										<?php echo($name);?><br>
										<?php echo($clasName);?> <br>
										<?php echo($classRoom_name);?> <br>
									
									<?php
									}
								}
							?>
    					</td>
						<td bgcolor="#7e5c3e" style="color:white;">
							<?php 
								$sql = "SELECT * FROM teacher where id = $id";
								$res = mysqli_query($conn,$sql);
								while($row = mysqli_fetch_assoc($res)){
									$name = $row["full_name"];
									$sql11 = "SELECT * FROM timetable where teacher_id = $id and start_time = $s_time and day='Friday'";
									$res11 = mysqli_query($conn,$sql11);
									if(mysqli_num_rows($res11)){
										$row11 = mysqli_fetch_assoc($res11);
										$class = $row11["class_id"];
										$classroom = $row11["classroom_id"];
										$sql_class = "SELECT * from class where id = $class";
										$res12 = mysqli_query($conn,$sql_class);
										$row12 = mysqli_fetch_assoc($res12);
										$clasName = $row12["name"];
										$sql_ss = "SELECT * from class_room where id = $classroom";
										$res13 = mysqli_query($conn,$sql_ss);
										$row13 = mysqli_fetch_assoc($res13);
										$classRoom_name= $row13["name"];
										?>
										
										<?php echo($name);?><br>
										<?php echo($clasName);?> <br>
										<?php echo($classRoom_name);?> <br>
									<?php
									}
								}
							?>
    					</td>
						<td bgcolor="#3e447e" style="color:white;">
							<?php 
								$sql = "SELECT * FROM teacher where id = $id";
								$res = mysqli_query($conn,$sql);
								while($row = mysqli_fetch_assoc($res)){
									$name = $row["full_name"];
									$sql11 = "SELECT * FROM timetable where teacher_id = $id and start_time = $s_time and day='Saturday'";
									$res11 = mysqli_query($conn,$sql11);
									if(mysqli_num_rows($res11)){
										$row11 = mysqli_fetch_assoc($res11);
										$class = $row11["class_id"];
										$classroom = $row11["classroom_id"];
										$sql_class = "SELECT * from class where id = $class";
										$res12 = mysqli_query($conn,$sql_class);
										$row12 = mysqli_fetch_assoc($res12);
										$clasName = $row12["name"];
										$sql_ss = "SELECT * from class_room where id = $classroom";
										$res13 = mysqli_query($conn,$sql_ss);
										$row13 = mysqli_fetch_assoc($res13);
										$classRoom_name= $row13["name"];
										?>
										
										<?php echo($name);?><br>
										<?php echo($clasName);?> <br>
										<?php echo($classRoom_name);?> <br>
									
									<?php
									}
								}
							?>
    					</td>
						<td bgcolor="#638e3d" style="color:white;">
							<?php 
								$sql = "SELECT * FROM teacher where id = $id";
								$res = mysqli_query($conn,$sql);
								while($row = mysqli_fetch_assoc($res)){
									$name = $row["full_name"];
									$sql11 = "SELECT * FROM timetable where teacher_id = $id and start_time = $s_time and day='Sunday'";
									$res11 = mysqli_query($conn,$sql11);
									if(mysqli_num_rows($res11)){
										$row11 = mysqli_fetch_assoc($res11);
										$class = $row11["class_id"];
										$classroom = $row11["classroom_id"];
										$sql_class = "SELECT * from class where id = $class";
										$res12 = mysqli_query($conn,$sql_class);
										$row12 = mysqli_fetch_assoc($res12);
										$clasName = $row12["name"];
										$sql_ss = "SELECT * from class_room where id = $classroom";
										$res13 = mysqli_query($conn,$sql_ss);
										$row13 = mysqli_fetch_assoc($res13);
										$classRoom_name= $row13["name"];
										?>
										
										<?php echo($name);?><br>
										<?php echo($clasName);?> <br>
										<?php echo($classRoom_name);?> <br>
									
									<?php
									}
								}
							?>
    					</td>
					</tr>
<?php 
} 
?>                     
				</tbody>
			</table>
    	</div>
	</div>
</div>