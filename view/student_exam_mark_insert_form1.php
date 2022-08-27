<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:../index.php');
    exit;
}
echo "<script>alert('test')</script>";
?>
 <div class="modal msk-fade" id="inserteMark" tabindex="-1" role="dialog" aria-labelledby="modalInsertform" aria-hidden="true">  
  	<div class="modal-dialog ">
    	
    	<div class="container msk-modal-content">
      		<div class="row ">	
           		<div class="col-md-4">
            		<div class="panel panel-primary">
        				<div class="panel-heading">               
        					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
          					<h3 class="panel-title">Add Exam Marks</h3>
   						</div>
            			 <form role="form" action="../index.php" method="post" id="formExam">
            				<div class="panel-body"> 
                                <div class="form-group " id="divExamSubject">
                                    <table id="table_student_exam" class="table">
                                        <thead>
                                            <th class="col-md-2">Subject</th>
                                            <th class="col-md-1">Marks</th>
                                        </thead>
                                        <tbody class="tBody">
<?php
include_once('../controller/config.php');
$grade_id=$_GET['grade'];
$exam_id=$_GET['exam'];
$std_index=$_GET['std_index'];
$current_page=$_GET['page'];
$current_year=date('Y');
$count=0;

$sql="select * FROM student_exam WHERE index_number='$std_index' AND class_id='$grade_id' AND exam_id='$exam_id' AND year='$current_year'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);	  	  
		$s_id = "SELECT * FROM student WHERE index_number='.$std_index.'";
		$result_s_id=mysqli_query($conn,$s_id);
		
		$row_s_id=mysqli_fetch_assoc($result_s_id);
		if(mysqli_num_rows($result_s_id)>0){
			$s_id=$row_s_id['id'];
			$s_name = $row_s_id['full_name'];
		}

		$spq = "SELECT * FROM exam where id='$exam_id'";
		$result_spq=mysqli_query($conn,$spq);
		$row_spq=mysqli_fetch_assoc($result_spq);
		if(mysqli_num_rows($result_spq)>0){
			$subject_id=$row_spq['subject_id'];
		}
?> 		

        	<input type="hidden" name="subject_id" id="eSubject_id_<?php echo $count; ?>" value="<?php echo $subject_id; ?>">
            <input type="hidden" name="grade_id" value="<?php echo $grade_id; ?>"/>
            <input type="hidden" name="exam_id" value="<?php echo $exam_id; ?>"/>
			<?php 
				$sql="select * FROM student WHERE index_number='$std_index'";
				$result=mysqli_query($conn,$sql);
				$row=mysqli_fetch_assoc($result);
				$name=$row['full_name'];
				?>
        	<td id="eSubject_td_<?php echo $count; ?>"><?php echo $name; ?></td>
            <td id="eMark_td_<?php echo $count; ?>"><input type="text" name="exam_mark" id="exam_mark_<?php echo $count; ?>"></td>

                                        </tbody>
                                    </table>
                            	</div> 
            				</div>
            				<div class="panel-footer bg-blue-active">
                            	<input type="hidden" name="current_page" value="<?php echo $current_page; ?>"/>
                            	<input type="hidden" name="std_index" value="<?php echo $std_index; ?>"/>
            					<input type="hidden" name="do" value="add_student_exam_mark1"/>
                    			<button type="submit" class="btn btn-info btnS" id="btnSubmit3" style="width:100%;">Submit</button>
             				</div>
             			</form>      
      				</div>
         		</div>
            </div>
        </div>
  	</div>
</div>