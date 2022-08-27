<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:../index.php');
    exit;
}
?>
 <div class="modal msk-fade" id="edit_examMark" tabindex="-1" role="dialog" aria-labelledby="modalInsertform" aria-hidden="true">  
  	<div class="modal-dialog ">
    	
    	<div class="container msk-modal-content">
      		<div class="row ">	
           		<div class="col-md-4">
            		<div class="panel panel-primary">
        				<div class="panel-heading">               
        					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
          					<h3 class="panel-title">Edit Exam Marks</h3>
   						</div>
            			 <form role="form" action="../index.php" method="post" id="formExam">
            				<div class="panel-body"> 
                                <div class="form-group " id="divExamSubject">
                                    <table id="table_student_exam" class="table">
                                        <thead>
                                            <th>Subject</th>
                                            <th>Marks</th>
                                        </thead>
                                        <tbody class="tBody">
<?php
include_once('../controller/config.php');
$grade_id=$_GET['grade'];
$exam_id=$_GET['exam'];
$my_index=$_GET['my_index'];
$std_index=$_GET['std_index'];
$current_year=date('Y');
	
$sql="SELECT * FROM teacher WHERE index_number='$my_index'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);	  	  
$teacher_id=$row['id'];	

$sql1="SELECT * FROM subject_routing where teacher_id='$teacher_id'";
$result1=mysqli_query($conn,$sql1);


?> 			
		<tr>
			<?php 
			$sqls = "SELECT * FROM student_exam WHERE index_number='$std_index'";
			$results = mysqli_query($conn,$sqls);
			$row = mysqli_fetch_array($results);
			$subject_id = $row['subject_id']; ?>
        	<input type="hidden" name="subject_id" id="eSubject_id_<?php echo $count; ?>" value="<?php echo $subject_id; ?>">
            <input type="hidden" name="grade" value="<?php echo $grade_id; ?>"/>
            <input type="hidden" name="exam_id" value="<?php echo $exam_id; ?>"/>
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
			<?php $sqls = "SELECT * FROM student WHERE index_number='$std_index'";
			$results = mysqli_query($conn,$sqls);
			$row2 = mysqli_fetch_assoc($results); ?>
        	<td id="eSubject_td_<?php echo $count; ?>"><?php echo $row2['full_name']; ?></td>

            <td id="eMark_td_<?php echo $count; ?>"><input type="text" name="exam_mark" value="<?php echo $row['marks']; ?>" id="exam_mark_<?php echo $count; ?>"></td>
        </tr>

                                        </tbody>
                                    </table>
                            	</div> 
            				</div>
            				<div class="panel-footer bg-blue-active">
                            	<input type="hidden" name="current_page" value="<?php echo $current_page; ?>"/>
                            	<input type="hidden" name="std_index" value="<?php echo $std_index; ?>"/>
                                <input type="hidden" name="my_index" value="<?php echo $my_index; ?>"/>
            					<input type="hidden" name="do" value="update_student_exam_mark"/>
                    			<button type="submit" class="btn btn-info btnS" id="btnSubmit3" style="width:100%;">Update</button>
             				</div>
             			</form>      
      				</div>
         		</div>
            </div>
        </div>
  	</div>
</div>