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
           		<div class="col-md-6 ">
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
									<th>Class</th>
                                </thead>
                        		<tbody>
<?php 
include_once('../controller/config.php');
echo "hhjasdsa";
if(isset($_GET["do"])&&($_GET["do"]=="view_subject")){
$id=$_GET['id'];

$index=$_GET['index'];

$sql="SELECT * FROM student where class_id = '$id'";

$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
	$sql1 = "SELECT teacher.full_name as tname from teacher 
		inner join grade on grade.id_teacher = teacher.id 
		inner join class on grade.id_class = class.id
		where class.id = '$id'";
	$result1=mysqli_query($conn,$sql1);
	$row1=mysqli_fetch_assoc($result1);
	$tname=$row1['tname'];

?>

                                    <tr>
                                        <td><input type="checkbox" name="checkbox[]" id="checkbox2" value="<?php echo $row["sr_id"]; ?>"> </td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $tname; ?></td>

                                    </tr>
<?php } } ?>                            
                        		</tbody>
                			</table>
            			</div>
            			<div class="panel-footer bg-blue-active">
                        	<input type="hidden" id="index1" value="<?php echo $index; ?>" >
                        	<input type="hidden" id="grade1" value="<?php echo $id; ?>" >
                    		<button type="button" class="btn btn-info " id="btnSubmit1" onClick="upgradeGrade(this)" style="width:100%;" ><span class="glyphicon glyphicon-ok-sign"></span>Submit</button>
             			</div>
      				</div>
         		</div>
            </div>
        </div>
  	</div>
</div>