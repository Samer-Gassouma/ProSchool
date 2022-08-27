<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:../index.php');
    exit;
}
?>
<div class="col-md-10">
	<div class="box">
    	<div class="box-header">
<?php 
include_once('../controller/config.php');
if(isset($_GET["do"])&&($_GET["do"]=="show_Timetable")){
$id=$_GET['grade'];	

$sql="select * from class where id='$id'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

?>                
            <h3 class="box-title">Timetable - <?php echo $id; ?></h3>
<?php } ?>
		</div>
        <div class="box-body table-responsive">
        	<table id="example1" class="table table-bordered table-striped">
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
$name=$_GET['grade'];	
$sql="select * from class where name='$name'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$id=$row['id'];
$my_school = $row['Id_School'];


$sql2="SELECT 
	    *
	   FROM
          timetable
       WHERE
	   class_id	='$id'  
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
include_once('../controller/config.php');
$id=$_GET['grade'];	
$cid = "SELECT * FROM class WHERE name='$id'";
$resultcid = mysqli_query($conn,$cid);
$rowcid = mysqli_fetch_assoc($resultcid);
$cid = $rowcid['id'];

$sql="select *
      from timetable
	  inner join class
	  on timetable.class_id=class.id
	  inner join teacher
	  on timetable.teacher_id=teacher.id
	  inner join class_room
	  on timetable.classroom_id=class_room.id
      where timetable.start_time='$s_time' and timetable.end_time='$e_time' and timetable.class_id='$cid' and timetable.day='Sunday' and timetable.Id_School='$my_school'";
	  
$result=mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) { // 1#
	while($row=mysqli_fetch_assoc($result)){ // while loop 1#
		$tname  = "SELECT * FROM teacher WHERE id='".$row['teacher_id']."'";
		$tname_result = mysqli_query($conn,$tname);
		$tname_row = mysqli_fetch_assoc($tname_result);
		$tname = $tname_row['full_name'];
		$room = "SELECT * FROM class_room WHERE id='".$row['classroom_id']."'";
		$room_result = mysqli_query($conn,$room);
		$room_row = mysqli_fetch_assoc($room_result);
		$room = $room_row['name'];
?>    	
                      
					   		<?php echo $id; ?><br>
							<?php echo $room; ?><br>
                            <?php echo $tname; ?><br>
                       	
  	 
                       	
							   <?php }} ?>
	
						</td>

						<td bgcolor="#d7cb40" style="color:white;">
						<?php 
include_once('../controller/config.php');
$id=$_GET['grade'];	
$cid = "SELECT * FROM class WHERE name='$id'";
$resultcid = mysqli_query($conn,$cid);
$rowcid = mysqli_fetch_assoc($resultcid);
$cid = $rowcid['id'];
$sql="select *
      from timetable
	  inner join class
	  on timetable.class_id=class.id
	  inner join teacher
	  on timetable.teacher_id=teacher.id
	  inner join class_room
	  on timetable.classroom_id=class_room.id
      where timetable.start_time='$s_time' and timetable.end_time='$e_time' and timetable.class_id='$cid' and timetable.day='Monday' and timetable.Id_School='$my_school'";
	  
$result=mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) { // 1#
	while($row=mysqli_fetch_assoc($result)){ // while loop 1#
		$tname  = "SELECT * FROM teacher WHERE id='".$row['teacher_id']."' ";
		$tname_result = mysqli_query($conn,$tname);
		$tname_row = mysqli_fetch_assoc($tname_result);
		$tname = $tname_row['full_name'];
		$class = "SELECT * FROM class WHERE id='".$row['class_id']."' ";
		$class_result = mysqli_query($conn,$class);
		$class_row = mysqli_fetch_assoc($class_result);
		$class = $class_row['name'];
		$room = "SELECT * FROM class_room WHERE id='".$row['classroom_id']."' ";
		$room_result = mysqli_query($conn,$room);
		$room_row = mysqli_fetch_assoc($room_result);
		$room = $room_row['name'];
?>    	
                      
					  <?php echo $id; ?><br>
							<?php echo $room; ?><br>
                            <?php echo $tname; ?><br>
                       	
  	 
                       	
							   <?php }} ?>
						</td>
						<td bgcolor="#40b9d7" style="color:white;">
						<?php 
include_once('../controller/config.php');
$id=$_GET['grade'];	
$cid = "SELECT * FROM class WHERE name='$id'";
$resultcid = mysqli_query($conn,$cid);
$rowcid = mysqli_fetch_assoc($resultcid);
$cid = $rowcid['id'];
$sql="select *
      from timetable
	  inner join class
	  on timetable.class_id=class.id
	  inner join teacher
	  on timetable.teacher_id=teacher.id
	  inner join class_room
	  on timetable.classroom_id=class_room.id
      where timetable.start_time='$s_time' and timetable.end_time='$e_time' and timetable.class_id='$cid' and timetable.day='Tuesday' and timetable.Id_School='$my_school'";
	  
$result=mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) { // 1#
	while($row=mysqli_fetch_assoc($result)){ // while loop 1#
		$tname  = "SELECT * FROM teacher WHERE id='".$row['teacher_id']."' ";
		$tname_result = mysqli_query($conn,$tname);
		$tname_row = mysqli_fetch_assoc($tname_result);
		$tname = $tname_row['full_name'];
		$class = "SELECT * FROM class WHERE id='".$row['class_id']."' ";
		$class_result = mysqli_query($conn,$class);
		$class_row = mysqli_fetch_assoc($class_result);
		$class = $class_row['name'];
		$room = "SELECT * FROM class_room WHERE id='".$row['classroom_id']."' ";
		$room_result = mysqli_query($conn,$room);
		$room_row = mysqli_fetch_assoc($room_result);
		$room = $room_row['name'];
?>    	
                      
					  <?php echo $id; ?><br>
							<?php echo $room; ?><br>
                            <?php echo $tname; ?><br>
                       	
  	 
							   <?php }} ?>
    					</td>

						<td bgcolor="#f39037" style="color:white;">
						<?php 
include_once('../controller/config.php');
$id=$_GET['grade'];	
$cid = "SELECT * FROM class WHERE name='$id'";
$resultcid = mysqli_query($conn,$cid);
$rowcid = mysqli_fetch_assoc($resultcid);
$cid = $rowcid['id'];
$sql="select *
      from timetable
	  inner join class
	  on timetable.class_id=class.id
	  inner join teacher
	  on timetable.teacher_id=teacher.id
	  inner join class_room
	  on timetable.classroom_id=class_room.id
      where timetable.start_time='$s_time' and timetable.end_time='$e_time' and timetable.class_id='$cid' and timetable.day='Wednesday' and timetable.Id_School='$my_school'";
	  
$result=mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) { // 1#
	while($row=mysqli_fetch_assoc($result)){ // while loop 1#
		$tname  = "SELECT * FROM teacher WHERE id='".$row['teacher_id']."' ";
		$tname_result = mysqli_query($conn,$tname);
		$tname_row = mysqli_fetch_assoc($tname_result);
		$tname = $tname_row['full_name'];
		$class = "SELECT * FROM class WHERE id='".$row['class_id']."' ";
		$class_result = mysqli_query($conn,$class);
		$class_row = mysqli_fetch_assoc($class_result);
		$class = $class_row['name'];
		$room = "SELECT * FROM class_room WHERE id='".$row['classroom_id']."' ";
		$room_result = mysqli_query($conn,$room);
		$room_row = mysqli_fetch_assoc($room_result);
		$room = $room_row['name'];
?>    	
                      
					  <?php echo $id; ?><br>
							<?php echo $room; ?><br>
                            <?php echo $tname; ?><br>
                       	
  	 
                       	
							   <?php }} ?>
    					</td>
						<td bgcolor="#7e5c3e" style="color:white;">
						<?php 
include_once('../controller/config.php');
$id=$_GET['grade'];	
$cid = "SELECT * FROM class WHERE name='$id'";
$resultcid = mysqli_query($conn,$cid);
$rowcid = mysqli_fetch_assoc($resultcid);
$cid = $rowcid['id'];
$sql="select *
      from timetable
	  inner join class
	  on timetable.class_id=class.id
	  inner join teacher
	  on timetable.teacher_id=teacher.id
	  inner join class_room
	  on timetable.classroom_id=class_room.id
      where timetable.start_time='$s_time' and timetable.end_time='$e_time' and timetable.class_id='$cid' and timetable.day='Thursday' and timetable.Id_School='$my_school'";
	  
$result=mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) { // 1#
	while($row=mysqli_fetch_assoc($result)){ // while loop 1#
		$tname  = "SELECT * FROM teacher WHERE id='".$row['teacher_id']."' ";
		$tname_result = mysqli_query($conn,$tname);
		$tname_row = mysqli_fetch_assoc($tname_result);
		$tname = $tname_row['full_name'];
		$class = "SELECT * FROM class WHERE id='".$row['class_id']."' ";
		$class_result = mysqli_query($conn,$class);
		$class_row = mysqli_fetch_assoc($class_result);
		$class = $class_row['name'];
		$room = "SELECT * FROM class_room WHERE id='".$row['classroom_id']."' ";
		$room_result = mysqli_query($conn,$room);
		$room_row = mysqli_fetch_assoc($room_result);
		$room = $room_row['name'];
?>    	
                      <?php echo $id; ?><br>
							<?php echo $room; ?><br>
                            <?php echo $tname; ?><br>
                       	
  	 
                       	
<?php }} ?>
    					</td>
						<td bgcolor="#3e447e" style="color:white;">
						<?php 
include_once('../controller/config.php');
$id=$_GET['grade'];	
$cid = "SELECT * FROM class WHERE name='$id'";
$resultcid = mysqli_query($conn,$cid);
$rowcid = mysqli_fetch_assoc($resultcid);
$cid = $rowcid['id'];
$sql="select *
      from timetable
	  inner join class
	  on timetable.class_id=class.id
	  inner join teacher
	  on timetable.teacher_id=teacher.id
	  inner join class_room
	  on timetable.classroom_id=class_room.id
      where timetable.start_time='$s_time' and timetable.end_time='$e_time' and timetable.class_id='$cid' and timetable.day='Friday' and timetable.Id_School='$my_school'";
	  
$result=mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) { // 1#
	while($row=mysqli_fetch_assoc($result)){ // while loop 1#
		$tname  = "SELECT * FROM teacher WHERE id='".$row['teacher_id']."' ";
		$tname_result = mysqli_query($conn,$tname);
		$tname_row = mysqli_fetch_assoc($tname_result);
		$tname = $tname_row['full_name'];
		$class = "SELECT * FROM class WHERE id='".$row['class_id']."' ";
		$class_result = mysqli_query($conn,$class);
		$class_row = mysqli_fetch_assoc($class_result);
		$class = $class_row['name'];
		$room = "SELECT * FROM class_room WHERE id='".$row['classroom_id']."' ";
		$room_result = mysqli_query($conn,$room);
		$room_row = mysqli_fetch_assoc($room_result);
		$room = $room_row['name'];
?>    	
                      
					  <?php echo $id; ?><br>
							<?php echo $room; ?><br>
                            <?php echo $tname; ?><br>
                       	
  	 
                       	
							   <?php }} ?>
    					</td>
						<td bgcolor="#638e3d" style="color:white;">
						<?php 
include_once('../controller/config.php');
$id=$_GET['grade'];	
$cid = "SELECT * FROM class WHERE name='$id'";
$resultcid = mysqli_query($conn,$cid);
$rowcid = mysqli_fetch_assoc($resultcid);
$cid = $rowcid['id'];
$sql="select *
      from timetable
	  inner join class
	  on timetable.class_id=class.id
	  inner join teacher
	  on timetable.teacher_id=teacher.id
	  inner join class_room
	  on timetable.classroom_id=class_room.id
      where timetable.start_time='$s_time' and timetable.end_time='$e_time' and timetable.class_id='$cid' and timetable.day='Saturday' and timetable.Id_School='$my_school'";
	  
$result=mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) { // 1#
	while($row=mysqli_fetch_assoc($result)){ // while loop 1#
		$tname  = "SELECT * FROM teacher WHERE id='".$row['teacher_id']."' ";
		$tname_result = mysqli_query($conn,$tname);
		$tname_row = mysqli_fetch_assoc($tname_result);
		$tname = $tname_row['full_name'];
		$class = "SELECT * FROM class WHERE id='".$row['class_id']."' ";
		$class_result = mysqli_query($conn,$class);
		$class_row = mysqli_fetch_assoc($class_result);
		$class = $class_row['name'];
		$room = "SELECT * FROM class_room WHERE id='".$row['classroom_id']."' ";
		$room_result = mysqli_query($conn,$room);
		$room_row = mysqli_fetch_assoc($room_result);
		$room = $room_row['name'];
?>    	
                      
					  <?php echo $id; ?><br>
							<?php echo $room; ?><br>
                            <?php echo $tname; ?><br>
  	 
                       	
							   <?php }} ?>
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