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

$year=$_GET["year"];
$month=$_GET["month"];  
  
$month_name=array('January','February','March','April','May','June','July','August','September','Octomber','November','December');
$month1=$month_name[$month];    
 
?>       
        	<h3 class="box-title">Attendance - <?php echo $month1." ".$year;  ?> </h3>
        </div>
        <div class="box-body table-responsive">
        	<div class="row">
            	<div class=" col-md-7">
					<table id="example3" class="table table-bordered table-striped">
                    	<thead>
                        	<th class="col-md-1">ID</th>
                            <th class="col-md-2">Date</th>
                            <th class="col-md-1">Month</th>
                            <th class="col-md-1">Year</th>
                            <th class="col-md-1">Status</th>
                       	</thead>
                        <tbody>
<?php
include_once('../controller/config.php');
$index=$_GET["my_index"];
$year=$_GET["year"];
$month=$_GET["month"];

$month_name=array('January','February','March','April','May','June','July','August','September','Octomber','November','December');
$month1=$month_name[$month];

$prefix="";
$prefix1="";
$status5="";
$st="";
$date_no2="";
$sql="select * from teacher_attendance where index_number='$index' and year='$year' and month='$month1' ";
$result=mysqli_query($conn,$sql);
$count = 0;
if(mysqli_num_rows($result) > 0) {
	while($row=mysqli_fetch_assoc($result)){
		$count++;

		$status2=$row['_status2'];
		$date=$row['date'];
		
		$date_no =(explode('-',$date,4));
		$date_no1 =$date_no[2];
		
		$intime=$row['time'];
		
		if($status2=='Absent'){
			
			$st="Absent";
		}
		
		if($status2=='Present'){
			$st="Present";
		}
		
		$status5.=$prefix.$status2;
		$prefix=',';
		
		$date_no2.=$prefix1.$date_no1;
		$prefix1=',';		
		
?>   
                           	<tr>
                                <td><?php echo $count; ?></td>
                                <td id="td_date_<?php echo $count; ?>"><?php echo $date; ?></td>
								<td id="td_month_<?php echo $count; ?>"><?php echo $month1; ?></td>
								<td id="td_year_<?php echo $count; ?>"><?php echo $year; ?></td>
								<td id="td_status_<?php echo $count; ?>"><?php echo $st; ?></td>
                        	</tr>
<?php } ?>
                    	</tbody>
					</table>
                </div>   
                <div id="calendar-container" class="col-md-5">
                	<div id="calendar-header">
                    	<center><h3><span id="calendar_month_year"></span></h3></center>
                    </div>
                    <div id="calendar_dates">
                    	<input type="hidden" id="date_no2" value="<?php echo $date_no2; ?>">
                        <input type="hidden" id="status5" value="<?php echo $status5; ?>">  
                    </div><br><br>

<?php  

echo '<div style="float:left; width:100px; ">
      	<div style="background-color:#FF0033; width:15px; height:15px; float:left; margin-right:2px;"> </div> <span style="text-align:left;">  - Absent </span><br> 
        <div style="background-color:#00FF66; width:15px; height:15px; float:left; margin-right:2px;"> </div> <span style="text-align:left;">  - Present </span><br> 
        <div style="background-color:#FFCC33; width:15px; height:15px; float:left; margin-right:2px;"> </div> <span style="text-align:left;">  - Not Held  </span><br> 
      </div>';

}

?> 
                
        	</div>
    	</div>
	</div>
</div> 