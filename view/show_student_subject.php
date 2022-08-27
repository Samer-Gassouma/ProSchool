<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:../index.php');
    exit;
}
?>

<div class="modal msk-fade" id="modalViewSubject" tabindex="-1" role="dialog" aria-labelledby="tt3" aria-hidden="true" data-backdrop="static" data-keyboard="false">  
	<div class="modal-dialog ">
    	<div class="container  ">
      		<div class="row ">	
           		<div class="col-md-6">
            		<div class="panel panel-primary">
        				<div class="panel-heading">               	
                            <button type="button" onClick="showModalGrade()" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                            
          					<h3 class="panel-title">Add Student Subject</h3>
   						</div>
            			<div class="panel-body"> 
               				<table id="" class="table ">
                                <thead>
                                    <th></th>
                                    <th>Subject</th>
                                    <th>Teacher</th>
                                </thead>
                        		<tbody>
<?php 
include_once('../controller/config.php');
if(isset($_GET["do"])&&($_GET["do"]=="view_subject")){
$id=$_GET['id'];
$index=$_GET['index'];
$sql="select subject_routing.id as sr_id,subject.name as s_name,teacher.full_name as t_name
from subject_routing
inner join subject
on subject_routing.subject_id=subject.id
inner join teacher
on subject_routing.teacher_id=teacher.id
where subject_routing.class_id='$id'";

$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
?>
                                    <tr>
                                        <td><input type="checkbox" name="checkbox[]" id="checkbox" value="<?php echo $row["sr_id"]; ?>" data-id="<?php echo $index; ?>"></td>
                                        <td><?php echo $row['s_name']; ?></td>
                                        <td><?php echo $row['t_name']; ?></td>
                                    </tr>
<?php } } ?>                            
                        		</tbody>
                			</table>
            			</div>
            			<div class="panel-footer bg-blue-active">
                        	<input type="hidden" id="index1" value="<?php echo $index; ?>" >
                        	<input type="hidden" id="grade1" value="<?php echo $id; ?>" >
                    		<button type="button" class="btn btn-info " id="bt4nSubmit1"  class="close" onClick="showModalGrade()" style="width:100%;" data-id="<?php echo $id; ?>"><span class="glyphicon glyphicon-ok-sign"></span>Submit</button>
             			</div>
      				</div>
         		</div>
            </div>
        </div>
  	</div>
</div>
<script>
	function insertSubject(){
	//MSK-000131
	var Id = $("#checkbox").data("id");
	var grade = $("#btnSubmit1").data("id");
    var yourArray = new Array();
     
	$("#checkbox:checked").each(function(){
		
		yourArray.push($(this).val());
		
	});

	var xhttp = new XMLHttpRequest();//MSK-000132-Start Ajax 
  		xhttp.onreadystatechange = function() {
			
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById('modalViewSubject').innerHTML=this.responseText;//MSK-000133
				
				$('#modalSelectGrade').modal('hide');
				$('#modalViewSubject').modal('hide');
				$('#modalINV').modal('show');//MSK-000135
				$('#modalViewSubject').addClass('msk-set-height-inv');
				
			}
			
		};
		xhttp.open("GET", "student_first_payment.php?index=" + Id + "&grade="+grade + "&id="+JSON.stringify(yourArray), true);												
		xhttp.send();//MSK-000132-End Ajax
		
};
</script>