<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:../index.php');
    exit;
}

include_once('../controller/config.php');

$month=$_GET['month'];
$year=$_GET['year'];
$my_index=$_GET['my_index'];
$my_type=$_GET['my_type'];
if ($my_type=='Admin') {
	$sqls = "SELECT * FROM admin WHERE index_number=$my_index";
	$results = mysqli_query($conn,$sqls);
	$rows = mysqli_fetch_assoc($results);
	$id=$rows['id'];
}
else if ($my_type=='Student') {
	$sqls = "SELECT * FROM student WHERE index_number='$my_index'";
	$results = mysqli_query($conn,$sqls);
	$rows = mysqli_fetch_assoc($results);
	$id=$rows['Id_School'];
}else{
	$sqls = "SELECT * FROM teacher WHERE index_number='$my_index'";
	$results = mysqli_query($conn,$sqls);
	$rows = mysqli_fetch_assoc($results);
	$id=$rows['Id_School'];
}

$count = 0;
$prefix="";
$prefix1="";
$prefix2="";
$prefix3="";
$s_date="";
$e_date="";
$color1="";
$id1="";

$sql="SELECT * FROM events WHERE  Id_School ='$id'";

$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
	$count++;
	$id=$row['id'];
	$start_date=$row['start_date_time'];
	$end_date=$row['end_date_time'];
	$color=$row['color'];
		
	$dt1 = new DateTime($start_date);
	$dt2 = new DateTime($end_date);
		
	$start_date = $dt1->format('d');
	$end_date = $dt2->format('d');
		
	$s_date.=$prefix.$start_date;
	$prefix=',';
		
	$e_date.=$prefix1.$end_date;
	$prefix1=',';
		
	$color1.=$prefix2.$color;
	$prefix2=',';
		
	$id1.=$prefix3.$id;
	$prefix3=',';
		
}
?>
        
<div id="calendar_dates">
                                
</div>
                
<input type="hidden" id="start_date" value="<?php echo $s_date; ?>">
<input type="hidden" id="end_date" value="<?php echo $e_date; ?>">
<input type="hidden" id="color" value="<?php echo $color1; ?>">
<input type="hidden" id="event_id" value="<?php echo $id1; ?>"> 
<input type="hidden" id="school_id" value="<?php echo $school_id; ?>">


