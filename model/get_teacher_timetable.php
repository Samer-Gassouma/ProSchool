		<option>Select Teacher</option>
        
<?php

include_once('../controller/config.php');
$subject_id=$_GET['subject'];
$grade_id=$_GET['grade'];
$my_school = $_GET['my_school'];

$sql="select subject_routing.teacher_id as t_id,teacher.i_name as t_name
from subject_routing
inner join teacher
on subject_routing.teacher_id=teacher.id 
where subject_routing.subject_id=$subject_id and subject_routing.subject_routing=$grade_id and subject_routing.id_school=$my_school";

$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){
	while($row=mysqli_fetch_assoc($result)){
		
		
?>
        <option value="<?php echo $row["t_id"]; ?>"><?php echo $row['t_name']; ?></option>
<?php } } ?>