<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    
    header('location:../index.php');
    exit;
}

?>

<?php include_once('head.php'); ?>
<?php include_once('header_admin.php'); ?>
<?php include_once('sidebar.php'); ?>
<?php include_once('alert.php'); ?>
<?php include_once('Loader.php'); ?>


<style>

.form-control-feedback {
  
   pointer-events: auto;
  
}

.set-width-tooltip + .tooltip > .tooltip-inner { 
     min-width:180px;
}
.msk-fade {  
      
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.5s;
    animation-name: animatetop;
    animation-duration: 0.5s;
	

}

.modal-content1 {
  height: auto;
  min-height: 100%;
  border-radius: 0;
  position: absolute;
  left: 25%; 
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

.cal-table{
	
width:100%;
padding:0;
margin:0;	
}

#calendar_dates{
	padding:10px;
	margin-left:10px;
	width:95%;	
	
}

.tHead{
	
	height:40px;
	background-color:#8e1c82;
	color:#FFF;
	text-align:center;
	border:1px solid #FFF;
	width:70px;
}

.cal-tr{
	height:50px;
	
}

.td_no_number{
	border:1px solid white;
	width:70px;
	background-color:#979045;
	padding:0;
}



.cal-number-td{
	border:1px solid white;
	width:70px;
	background-color:#677be2;
	color:white;
	
		
}

.h5{
	color:#FFF;
	display: inline-block;
	background:#636;
	width:15px;
	height:15px;	
	font-size:11px;
	font-weight:bold;
	font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
	text-align:center;
	float:right;
	padding-top:1px;
	margin-bottom:50%;
	
}
.div-event-c{
	margin-top:65%;
	height:17px;
	
}

#cal_month{
	width:20%;
	border-radius:5%;
	
	padding:0;
}
#cal_year{
	width:15%;
	border-radius:5%;
	margin-left:5px;
	padding:0;
}

#btnShow{
	
	margin-left:5px;
	
}
</style>

<?php
include_once('../controller/config.php');

$my_index= $_SESSION["index_number"];
$my_school= "SELECT * FROM `admin` WHERE `index_number` = '$my_index'";
$my_school_result= mysqli_query($conn,$my_school);
$my_school_row= mysqli_fetch_assoc($my_school_result);
$my_school= $my_school_row['id'];

$sql="SELECT * FROM admin WHERE index_number='$my_index'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['full_name'];

?>  


<div class="content-wrapper">
    <section class="content-header">
    	<h4><?php echo $name; ?>,<strong><span style="color:#cf4ed4;"> Welcome back! </span></strong></h4>
        <ol class="breadcrumb">
        	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Dashboard</a></li>
    	</ol>
	</section>
    


    <section class="content">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><ion-icon name="people-outline"></ion-icon></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Student</span>
<?php
include_once('../controller/config.php');



$sql1="SELECT count(id) FROM student WHERE _status='' AND id_school = $my_school";
$total_count1=0;

$result1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_assoc($result1);
$total_count1=$row1['count(id)'];

?>               
              <span class="info-box-number"><?php echo $total_count1; ?></span>
            </div>
            
          </div>
          
        </div>
        
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><ion-icon name="person-outline"></ion-icon></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Teacher</span>
<?php
include_once('../controller/config.php');

$sql2="SELECT count(id) FROM teacher WHERE $my_school = Id_school";
$total_count2=0;

$result2=mysqli_query($conn,$sql2);
$row2=mysqli_fetch_assoc($result2);
$total_count2=$row2['count(id)'];

?> 
              <span class="info-box-number"><?php echo $total_count2; ?></span>
            </div>
            
          </div>
          
        </div>
       

		<div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><ion-icon name="grid-outline"></ion-icon></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Classes</span>
				<?php
				include_once('../controller/config.php');

				$sql2="SELECT count(id) FROM class WHERE Id_school = $my_school";
				$total_count2=0;

				$result2=mysqli_query($conn,$sql2);
				$row2=mysqli_fetch_assoc($result2);
				$total_count3=$row2['count(id)'];

				?> 
			<span class="info-box-number"><?php echo $total_count3; ?></span>
            </div>
            
          </div>
          
        </div>
       
      
	    
	

<?php
include_once('../controller/config.php');
$current_year=date("Y");

?>            
          
        	<div class="col-md-8">
                <div id="calendar-container">
                	<div id="calendar-header">
                    	<center><h4><span id="calendar_month_year"></span> <?php echo $current_year; ?> </h4></center>
        			</div>
                    <input type="hidden" id="my_index" value="<?php echo $my_index; ?>">  
                    <input type="hidden" id="my_type" value="<?php echo $my_type; ?>">                         
                 </div>
                 <div class="row1" id="row">
                        
                 </div>
       		</div>
        
	
    	<div id="cEvent">
    
    	</div>  
    
<script>

var m2 = 0;

function ShowEvents(status,my_index,my_type,my_school){
	
	var d = new Date();    //new Date('2017','08','25');
	var month_name = ['January','February','March','April','May','June','July','August','September','Octomber','November','December'];	
		
	var m1 = d.getMonth(); //0-11
	var y1 = d.getFullYear(); //2017
		
	if(status == 'K'){
		var m3 = m1;
	}
		
	if(status == 'N'){
		m2++;
		var m3 = m1 + m2;
	}
				
	if(status == 'P'){
		m2--;
		var m3 = m1 + m2;
	}
				
	if(m3 == 0){
		$('#btn1').css('pointer-events', 'none');
	}
				
	if(m3 == 11){
		$('#btn2').css('pointer-events', 'none');
	}
	
	var current_date = d.getDate();
		
	var xhttp = new XMLHttpRequest();//MSK-00105-Ajax Start  
		xhttp.onreadystatechange = function() {
				
			if (this.readyState == 4 && this.status == 200){
					//MSK-00107 
				document.getElementById('row').innerHTML = this.responseText;//MSK-000132
				
				var start_date = $('#start_date').val().split(',');
				var end_date = $('#end_date').val().split(',');
				var color = $('#color').val().split(',');
				var event_id = $('#event_id').val().split(',');
			
				var month = m3; //0-11
				var year = y1; //2017 
				var first_date = month_name[month] + " " + 1 + " " + year;
				
				var tmp = new Date(first_date).toDateString();
				
				
				var first_day = tmp.substring(0,3); //Thu
				var day_name = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
				var day_no = day_name.indexOf(first_day);  //4
				var days = new Date(year, month+1, 0).getDate(); //31
				
				
				var calendar = get_calendar(day_no,days);
				
				document.getElementById("calendar_month_year").innerHTML = month_name[month];
				document.getElementById("calendar_dates").appendChild(calendar);
				$("#td_"+current_date).css("background-color", "#319a5b");
				 
				var count1 = start_date.length;
				var k=0;
				for(var i=0; i<count1; i++){
					var s_date = parseInt(start_date[i], 10);
					var e_date = parseInt(end_date[i], 10);
					
					var count = e_date - s_date;
				
					for(var j=0; j<=count; j++){
					
						k = s_date+j;
						
						$("#td_"+k).append('<div class="div-event-c" style="background-color:'+color[i]+'"><a id="event_"+'+[i]+' style="color:white;" href="#" onclick="showEvent('+event_id[i]+')"><i class="fa fa-calendar" aria-hidden="true"></i></a></div>');
													
					}
					
					
				}

			}
				
		};	
		
		xhttp.open("GET", "all_events1.php?year=" + y1 + "&month="+m3 + "&my_type="+my_type + "&my_index="+my_index, true);	
		xhttp.send();//MSK-00105-Ajax End
						
};

</script>

	<div id="showEvent">
    
    </div>
    
<script>

function showEvent(event_id,school_id){
	
	var xhttp = new XMLHttpRequest();//MSK-00105-Ajax Start  
		xhttp.onreadystatechange = function() {
				
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById('showEvent').innerHTML = this.responseText;//MSK-000132
				$('#modalviewEvent').modal('show');
			}
				
		};	
		
		xhttp.open("GET", "show_events1.php?event_id="+event_id, true);												
		xhttp.send();//MSK-00105-Ajax End
};

function get_calendar(day_no,days){
	
	var table = document.createElement('table');
	var tr = document.createElement('tr');
	
	table.className = 'cal-table';
	
	
	for(var c=0; c<=6; c++){
		var th = document.createElement('th');
		th.innerHTML =  ['S','M','T','W','T','F','S'][c];
		tr.appendChild(th);
		th.className = "tHead";
		
		
	}
	
	table.appendChild(tr);
	
	//create 2nd row
	
	tr = document.createElement('tr');
	
	var c;
	for(c=0; c<=6; c++){
		
		if(c== day_no){
			break;
		}
		var td = document.createElement('td');
		td.innerHTML = "";
		tr.appendChild(td);
		td.className = "td_no_number";
		tr.className = 'cal-tr';
	}
	
	var count = 1;
	for(; c<=6; c++){
		var td = document.createElement('td');
		td.id = "td_"+count;
		td.className = 'cal-number-td';
		tr.appendChild(td);
		tr.className = 'cal-tr';
		
		var h5 = document.createElement('h5');
		h5.className = 'h5';
		td.appendChild(h5);
		h5.innerHTML = count;
		count++;
		
		
	}
	table.appendChild(tr);
	
	//rest of the date rows
	
	for(var r=3; r<=7; r++){
		tr = document.createElement('tr');
		for(var c=0; c<=6; c++){
			
			if(count > days){
				for(; c<=6; c++){
		
					var td = document.createElement('td');
					td.innerHTML = "";
					tr.appendChild(td);
					td.className = "td_no_number";
					tr.className = 'cal-tr';
				}
				
				table.appendChild(tr);
				return table;
			}
			
			var td = document.createElement('td');
			td.id = "td_"+count;
			td.className = 'cal-number-td';
			tr.appendChild(td);
			
			var h5 = document.createElement('h5');
			h5.className = 'h5';
			td.appendChild(h5);
			h5.innerHTML = count;
			count++;
			tr.className = 'cal-tr';
			
		}
		table.appendChild(tr);
		
		
	}
		
};	

</script>
    

<?php 

$my_index=$_SESSION['index_number'];
$my_type=$_SESSION['type'];
$my_school= "SELECT * FROM `admin` WHERE `index_number` = '$my_index'";
$my_school_result= mysqli_query($conn,$my_school);
$my_school_row= mysqli_fetch_assoc($my_school_result);
$my_school= $my_school_row['id'];

echo '<script>','ShowEvents("K",'.$my_index.',"'.$my_type.'","'.$my_school.'");','</script>';

?>

	
<script>
                    
function showLineChart(monthly_std_reg){	
 
	var monthly_std_reg1 = JSON.parse("[" + monthly_std_reg + "]");
 
	new Chart(document.getElementById("lineChart"), {
		type: 'line',
		data: {
		  labels: ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"],
		  datasets: [
			{
			  label: "New Student Registration",
			  borderColor: "#00c0ef",
			  fill: false,
			  data: monthly_std_reg1
			 
			}
		  ]
		},
		options: {
		  legend: { display: false },
		  title: {
			display: true,
			text: ''
		  },
		  scales: {
				yAxes: [{
					ticks: {
						beginAtZero:true
					}
				}]
			}
		}
	});

};
</script>

<?php
include_once('../controller/config.php');
$current_year=date("Y");
$prefix="";
$monthly_std_reg="";

$month=array("January","February","March","April","May","June","July","August","September","October","November","December");

for($i=0; $i<count($month); $i++){
	$sql="SELECT COUNT(id) FROM student WHERE reg_year='$current_year'AND Id_school = $my_school AND reg_month='$month[$i]' AND _status=''";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$monthly_std_reg.=$prefix.'"'.$row['COUNT(id)'].'"';
	$prefix=',';
	
}

echo "<script>showLineChart('$monthly_std_reg');</script>";

?>

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
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    
