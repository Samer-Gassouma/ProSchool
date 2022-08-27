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
        	Timetable
        	<small>Preview</small>
        </h1>
        <ol class="breadcrumb">
        	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">All Timetable</a></li>
    	</ol>
	</section>
    
	 
	<section class="content" > 
    	<div class="row" id="table1">
        	<div class="col-md-10">
                <div class="box">
                    <div class="box-header">
<?php
include_once('../controller/config.php');

$index=$_SESSION["index_number"];
$current_year=date('Y');

$my_school= "SELECT * FROM `student` WHERE `index_number` = '$index'";
$my_school_result= mysqli_query($conn,$my_school);
$my_school_row= mysqli_fetch_assoc($my_school_result);
$my_school= $my_school_row['Id_School'];
 

$sql1="SELECT * FROM class,student WHERE class.id=student.class_id  and student.index_number='$index' and student.Id_School = $my_school";
$result1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_assoc($result1);
$name=$row1['name'];
       
        
?>        
                    <h3 class="box-title">Timetable - <?php echo $name; ?> </h3>
                </div>
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead style="color:white; background-color:#666;">
                            <th class="col-md-1">Time</th>
                            <th class="col-md-1">Sunday</th>
                            <th class="col-md-1">Monday</th>
                            <th class="col-md-1">Tuesday</th>
                            <th class="col-md-1">Wednesday</th>
                            <th class="col-md-1">Thursday</th>
                            <th class="col-md-1">Friday</th>
                            <th class="col-md-1">Saturday</th>
                         </thead>
                         <tbody>
                 	
<?php
include_once('../controller/config.php');

$index=$_SESSION["index_number"];
$current_year=date('Y');


$sql1="SELECT * FROM student WHERE index_number='$index' and Id_School = $my_school";
$result1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_assoc($result1);
$grade=$row1['class_id'];


$sql2="SELECT 
	   DISTINCT start_time,end_time
       FROM
          timetable
       WHERE
          class_id='$grade' and timetable.Id_School = $my_school  
       ORDER BY
          start_time";
		  
$result2=mysqli_query($conn,$sql2);
while($row2=mysqli_fetch_assoc($result2)){
	
	$s_time=$row2['start_time'];
	$e_time=$row2['end_time'];
		
?>    
                 	<tr>
                    	<th  style="color:white; background-color:#666;">
                        	<?php echo $s_time." - ".$e_time; ?>		
                            
                        </th>
                         <td bgcolor="#d74340" style="color:white;">
<?php 
include_once('../controller/config.php');

$sql="select *
      from timetable
	  inner join class
	  on timetable.class_id=class.id
	  inner join teacher
	  on timetable.teacher_id=teacher.id
	  inner join class_room
	  on timetable.classroom_id=class_room.id
      where timetable.start_time='$s_time' and timetable.end_time='$e_time' and timetable.class_id='$grade' and timetable.day='Sunday' and timetable.Id_School='$my_school'";
	  
$result=mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) { // 1#
	while($row=mysqli_fetch_assoc($result)){ // while loop 1#
		
		$tname  = "SELECT * FROM teacher WHERE id='".$row['teacher_id']."' and Id_School='".$my_school."'";
		$results=mysqli_query($conn,$tname);
		if(mysqli_num_rows($results) > 0){
			$tname_result = mysqli_query($conn,$tname);
			$tname_row = mysqli_fetch_assoc($tname_result);
			$tname = $tname_row['full_name'];
			$class = "SELECT * FROM class WHERE id='".$row['class_id']."' and Id_School='".$my_school."'";
			$class_result = mysqli_query($conn,$class);
			$class_row = mysqli_fetch_assoc($class_result);
			$class = $class_row['name'];
			$room = "SELECT * FROM class_room WHERE id='".$row['classroom_id']."' and Id_School='".$row['Id_School']."'";
			$room_result = mysqli_query($conn,$room);
			$room_row = mysqli_fetch_assoc($room_result);
			$room = $room_row['name'];
			?>    	
			<?php echo $class; ?><br>
			<?php echo $room; ?><br>
			<?php echo $tname; ?><br>
		



<?php } ?>
                      
					   		
                       		
<?php } } ?>
	
                                </td>
                                <td bgcolor="#d7cb40" style="color:white;">
								<?php 
include_once('../controller/config.php');

$sql="select *
      from timetable
	  inner join class
	  on timetable.class_id=class.id
	  inner join teacher
	  on timetable.teacher_id=teacher.id
	  inner join class_room
	  on timetable.classroom_id=class_room.id
      where timetable.start_time='$s_time' and timetable.end_time='$e_time' and timetable.class_id='$grade' and timetable.day='Monday' and timetable.Id_School='$my_school'";
	  
$result=mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) { // 1#
	while($row=mysqli_fetch_assoc($result)){ // while loop 1#
		
		$tname  = "SELECT * FROM teacher WHERE id='".$row['teacher_id']."' and Id_School='".$my_school."'";
		$results=mysqli_query($conn,$tname);
		if(mysqli_num_rows($results) > 0){
			$tname_result = mysqli_query($conn,$tname);
			$tname_row = mysqli_fetch_assoc($tname_result);
			$tname = $tname_row['full_name'];
			$class = "SELECT * FROM class WHERE id='".$row['class_id']."' and Id_School='".$my_school."'";
			$class_result = mysqli_query($conn,$class);
			$class_row = mysqli_fetch_assoc($class_result);
			$class = $class_row['name'];
			$room = "SELECT * FROM class_room WHERE id='".$row['classroom_id']."' and Id_School='".$row['Id_School']."'";
			$room_result = mysqli_query($conn,$room);
			$room_row = mysqli_fetch_assoc($room_result);
			$room = $room_row['name'];
			?>    	
			<?php echo $class; ?><br>
			<?php echo $room; ?><br>
			<?php echo $tname; ?><br>
		



<?php } ?>
                      
					   		
                       		
<?php } } ?>
                                </td>
                                <td bgcolor="#40b9d7" style="color:white;">
								<?php 
include_once('../controller/config.php');

$sql="select *
      from timetable
	  inner join class
	  on timetable.class_id=class.id
	  inner join teacher
	  on timetable.teacher_id=teacher.id
	  inner join class_room
	  on timetable.classroom_id=class_room.id
      where timetable.start_time='$s_time' and timetable.end_time='$e_time' and timetable.class_id='$grade' and timetable.day='Tuesday' and timetable.Id_School='$my_school'";
	  
$result=mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) { // 1#
	while($row=mysqli_fetch_assoc($result)){ // while loop 1#
		
		$tname  = "SELECT * FROM teacher WHERE id='".$row['teacher_id']."' and Id_School='".$my_school."'";
		$results=mysqli_query($conn,$tname);
		if(mysqli_num_rows($results) > 0){
			$tname_result = mysqli_query($conn,$tname);
			$tname_row = mysqli_fetch_assoc($tname_result);
			$tname = $tname_row['full_name'];
			$class = "SELECT * FROM class WHERE id='".$row['class_id']."' and Id_School='".$my_school."'";
			$class_result = mysqli_query($conn,$class);
			$class_row = mysqli_fetch_assoc($class_result);
			$class = $class_row['name'];
			$room = "SELECT * FROM class_room WHERE id='".$row['classroom_id']."' and Id_School='".$row['Id_School']."'";
			$room_result = mysqli_query($conn,$room);
			$room_row = mysqli_fetch_assoc($room_result);
			$room = $room_row['name'];
			?>    	
			<?php echo $class; ?><br>
			<?php echo $room; ?><br>
			<?php echo $tname; ?><br>
		



<?php } ?>
                      
					   		
                       		
<?php } } ?>
                                </td>
                                <td bgcolor="#3e447e" style="color:white;">
								<?php 
include_once('../controller/config.php');

$sql="select *
      from timetable
	  inner join class
	  on timetable.class_id=class.id
	  inner join teacher
	  on timetable.teacher_id=teacher.id
	  inner join class_room
	  on timetable.classroom_id=class_room.id
      where timetable.start_time='$s_time' and timetable.end_time='$e_time' and timetable.class_id='$grade' and timetable.day='Wednesday' and timetable.Id_School='$my_school'";
	  
$result=mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) { // 1#
	while($row=mysqli_fetch_assoc($result)){ // while loop 1#
		
		$tname  = "SELECT * FROM teacher WHERE id='".$row['teacher_id']."' and Id_School='".$my_school."'";
		$results=mysqli_query($conn,$tname);
		if(mysqli_num_rows($results) > 0){
			$tname_result = mysqli_query($conn,$tname);
			$tname_row = mysqli_fetch_assoc($tname_result);
			$tname = $tname_row['full_name'];
			$class = "SELECT * FROM class WHERE id='".$row['class_id']."' and Id_School='".$my_school."'";
			$class_result = mysqli_query($conn,$class);
			$class_row = mysqli_fetch_assoc($class_result);
			$class = $class_row['name'];
			$room = "SELECT * FROM class_room WHERE id='".$row['classroom_id']."' and Id_School='".$row['Id_School']."'";
			$room_result = mysqli_query($conn,$room);
			$room_row = mysqli_fetch_assoc($room_result);
			$room = $room_row['name'];
			?>    	
			<?php echo $class; ?><br>
			<?php echo $room; ?><br>
			<?php echo $tname; ?><br>
		



<?php } ?>
                      
					   		
                       		
<?php } } ?>
                                </td>
                                <td bgcolor="#3e447e" style="color:white;">
								<?php 
include_once('../controller/config.php');

$sql="select *
      from timetable
	  inner join class
	  on timetable.class_id=class.id
	  inner join teacher
	  on timetable.teacher_id=teacher.id
	  inner join class_room
	  on timetable.classroom_id=class_room.id
      where timetable.start_time='$s_time' and timetable.end_time='$e_time' and timetable.class_id='$grade' and timetable.day='Thursday' and timetable.Id_School='$my_school'";
	  
$result=mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) { // 1#
	while($row=mysqli_fetch_assoc($result)){ // while loop 1#
		
		$tname  = "SELECT * FROM teacher WHERE id='".$row['teacher_id']."' and Id_School='".$my_school."'";
		$results=mysqli_query($conn,$tname);
		if(mysqli_num_rows($results) > 0){
			$tname_result = mysqli_query($conn,$tname);
			$tname_row = mysqli_fetch_assoc($tname_result);
			$tname = $tname_row['full_name'];
			$class = "SELECT * FROM class WHERE id='".$row['class_id']."' and Id_School='".$my_school."'";
			$class_result = mysqli_query($conn,$class);
			$class_row = mysqli_fetch_assoc($class_result);
			$class = $class_row['name'];
			$room = "SELECT * FROM class_room WHERE id='".$row['classroom_id']."' and Id_School='".$row['Id_School']."'";
			$room_result = mysqli_query($conn,$room);
			$room_row = mysqli_fetch_assoc($room_result);
			$room = $room_row['name'];
			?>    	
			<?php echo $class; ?><br>
			<?php echo $room; ?><br>
			<?php echo $tname; ?><br>
		



<?php } ?>
                      
					   		
                       		
<?php } } ?>
                                </td>
                                <td bgcolor="#3e447e" style="color:white;">
								<?php 
include_once('../controller/config.php');

$sql="select *
      from timetable
	  inner join class
	  on timetable.class_id=class.id
	  inner join teacher
	  on timetable.teacher_id=teacher.id
	  inner join class_room
	  on timetable.classroom_id=class_room.id
      where timetable.start_time='$s_time' and timetable.end_time='$e_time' and timetable.class_id='$grade' and timetable.day='Friday' and timetable.Id_School='$my_school'";
	  
$result=mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) { // 1#
	while($row=mysqli_fetch_assoc($result)){ // while loop 1#
		
		$tname  = "SELECT * FROM teacher WHERE id='".$row['teacher_id']."' and Id_School='".$my_school."'";
		$results=mysqli_query($conn,$tname);
		if(mysqli_num_rows($results) > 0){
			$tname_result = mysqli_query($conn,$tname);
			$tname_row = mysqli_fetch_assoc($tname_result);
			$tname = $tname_row['full_name'];
			$class = "SELECT * FROM class WHERE id='".$row['class_id']."' and Id_School='".$my_school."'";
			$class_result = mysqli_query($conn,$class);
			$class_row = mysqli_fetch_assoc($class_result);
			$class = $class_row['name'];
			$room = "SELECT * FROM class_room WHERE id='".$row['classroom_id']."' and Id_School='".$row['Id_School']."'";
			$room_result = mysqli_query($conn,$room);
			$room_row = mysqli_fetch_assoc($room_result);
			$room = $room_row['name'];
			?>    	
			<?php echo $class; ?><br>
			<?php echo $room; ?><br>
			<?php echo $tname; ?><br>
		



<?php } ?>
                      
					   		
                       		
<?php } } ?>
                                </td>
                                <td bgcolor="#638e3d" style="color:white;">
								<?php 
include_once('../controller/config.php');

$sql="select *
      from timetable
	  inner join class
	  on timetable.class_id=class.id
	  inner join teacher
	  on timetable.teacher_id=teacher.id
	  inner join class_room
	  on timetable.classroom_id=class_room.id
      where timetable.start_time='$s_time' and timetable.end_time='$e_time' and timetable.class_id='$grade' and timetable.day='Saturday' and timetable.Id_School='$my_school'";
	  
$result=mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) { // 1#
	while($row=mysqli_fetch_assoc($result)){ // while loop 1#
		
		$tname  = "SELECT * FROM teacher WHERE id='".$row['teacher_id']."' and Id_School='".$my_school."'";
		$results=mysqli_query($conn,$tname);
		if(mysqli_num_rows($results) > 0){
			$tname_result = mysqli_query($conn,$tname);
			$tname_row = mysqli_fetch_assoc($tname_result);
			$tname = $tname_row['full_name'];
			$class = "SELECT * FROM class WHERE id='".$row['class_id']."' and Id_School='".$my_school."'";
			$class_result = mysqli_query($conn,$class);
			$class_row = mysqli_fetch_assoc($class_result);
			$class = $class_row['name'];
			$room = "SELECT * FROM class_room WHERE id='".$row['classroom_id']."' and Id_School='".$row['Id_School']."'";
			$room_result = mysqli_query($conn,$room);
			$room_row = mysqli_fetch_assoc($room_result);
			$room = $room_row['name'];
			?>    	
			<?php echo $class; ?><br>
			<?php echo $room; ?><br>
			<?php echo $tname; ?><br>
		



<?php } ?>
                      
					   		
                       		
<?php } } ?>
                                    </td>
                                </tr>
<?php }   ?>
					
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
                            
   