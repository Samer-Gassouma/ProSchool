<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:../index.php');
    exit;
}
?>
<div class="col-md-12">
	<div class="box">
    	<div class="box-header">
<?php
include_once('../controller/config.php');

$exam=$_GET['exam'];
$year=$_GET['year'];
	
$sql="SELECT * FROM exam WHERE id='$exam'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['name'];

?>          
        	<center><h2 class="box-title"><?php echo $year; ?> - <?php echo $name; ?> Exam</h2></center>
        </div>
        <div class="box-body table-responsive">
             <div class="row">
        		<div class=" col-md-5">
                       <h4 class="box-title">Exam Marks </h4><br>  
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <th width="1">ID</th>
                            <th width="120">Subject</th>
                            <th width="100">Marks</th>
                            <th width="100">class</th>
                        </thead>
                        <tbody>
<?php
include_once('../controller/config.php');
$index=$_GET['index'];
$exam=$_GET['exam'];
$year=$_GET['year'];
$prefix="";
$prefix1="";
$subject='';
$marks='';
$mark_range='';
$mark_grade='';
        
$sql1="SELECT * FROM student WHERE index_number='$index'";
$result1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_assoc($result1);
$id=$row1['class_id'];
		
$sql="select *
      from student_exam 
      where index_number='$index' and exam_id='$exam'";
                  
$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){
    
	while($row=mysqli_fetch_assoc($result)){
		$s_id = $row['index_number'];
        $sname = "SELECT * FROM student WHERE index_number='$s_id'";
        $sname_result = mysqli_query($conn,$sname);
        $sname_row = mysqli_fetch_assoc($sname_result);
        $s_name = $sname_row['full_name'];

        $subject_id = $row['subject_id'];
        $subject_sql = "SELECT * FROM subject WHERE id='$subject_id'";
        $subject_result = mysqli_query($conn,$subject_sql);
        $subject_row = mysqli_fetch_assoc($subject_result);
        $subjectc = $subject_row['name'];

        $class=$row['class_id'];
        $class_sql="SELECT * FROM class WHERE id='$class'";
        $class_result=mysqli_query($conn,$class_sql);
        $class_row=mysqli_fetch_assoc($class_result);
        $class_name=$class_row['name'];


         
		$marks.=$prefix1.'"'.$row['marks'].'"'; 
		$prefix1=',';

		$marks1=$row['marks'];
                
	
?>   
                            <tr>
                                <td><?php echo $s_name; ?></td>
                                <td><?php echo $subjectc; ?></td>
                                <td><?php echo $row['marks']; ?></td>
                                <td><?php echo $class_name; ?></td>
                               
                            </tr>
<?php } } ?>
                        </tbody>
                    </table>	
                </div>
        		<div class=" col-md-7">
                	<h4 class="box-title">Graph </h4>
					<div style="" class="text-right">
                        <input type="hidden" id="chartLable" value="<?php echo htmlspecialchars($subject, ENT_QUOTES, 'UTF-8'); ?>">
                        <input type="hidden" id="chartData" value="<?php echo htmlspecialchars($marks, ENT_QUOTES, 'UTF-8'); ?>">
                        <input type="button" class="btn btn-xs bg-blue-active" value="Bar Chart" onClick="showBarChart('<?php echo htmlspecialchars($subject, ENT_QUOTES, 'UTF-8'); ?>','<?php echo htmlspecialchars($marks, ENT_QUOTES, 'UTF-8'); ?>')">
                        <input type="button" class="btn btn-xs bg-lime-active" value="Pie Chart" onClick="showPieChart('<?php echo htmlspecialchars($subject, ENT_QUOTES, 'UTF-8'); ?>','<?php echo htmlspecialchars($marks, ENT_QUOTES, 'UTF-8'); ?>')"> 
                        <input type="button" class="btn btn-xs bg-orange-active" value="Doughnut Chart" onClick="showDoughnutChart('<?php echo htmlspecialchars($subject, ENT_QUOTES, 'UTF-8'); ?>','<?php echo htmlspecialchars($marks, ENT_QUOTES, 'UTF-8'); ?>')">
                        <input type="button" class="btn btn-xs bg-fuchsia" value="Line Chart" onClick="showLineChart('<?php echo htmlspecialchars($subject, ENT_QUOTES, 'UTF-8'); ?>','<?php echo htmlspecialchars($marks, ENT_QUOTES, 'UTF-8'); ?>')">
    					 
                        <canvas id="barChart" width="800" height="450"></canvas>
                        <canvas id="lineChart" width="800" height="450"></canvas>
                        <canvas id="pieChart" width="800" height="450"></canvas>
                        <canvas id="doughnutChart" width="800" height="450"></canvas>
                    </div>
                </div>
        	</div>
     	</div>
	</div>
</div> 