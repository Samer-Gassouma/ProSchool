<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:../index.php');
    exit;
}
?>
<?php include_once('head.php'); ?>
<?php include_once('header_teacher.php'); ?>
<?php include_once('sidebar2.php'); ?>
<?php include_once('alert.php'); ?>
<?php include_once('../controller/config.php');?>
<body>
<div class='content-wrapper'>   
  <div >
 
<section class="content-header">
    	<h1>
			<i class="fa fa-user"></i>
        	Student
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
        	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Avertisssement</a></li>
        </ol>
	</section>

    <section class="content">
    <div class="panel-body " >
<link rel = "stylesheet" type="text/css" href="../dist/css/bootstrap.css" />		
<link rel = "stylesheet" type="text/css" href="../dist/css/style.css" />
<form action="advance.php" method="POST" onsubmit="return sdc()">
    
  <div class="form-group">
    
    <label for="exampleFormControlInput1">Title</label>
    <input type="text" name="title" class="form-control"  placeholder="Title" required>
  </div>
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.js"></script>
	<script type="text/javascript">
	$(function(){
		$('select').change(function(){ // when one changes
			$('select').val( $(this).val() ) // they all change
		})
	})
	</script>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Classes</label>
    <select name="class" id="class" class="form-control" required >
        <option>Select a Classes</option>
    <?php
    include_once('../controller/config.php');
      $sql = "SELECT * FROM subject_routing where teacher_id = $id";
      $result = mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)){
        while($row = mysqli_fetch_assoc($result)){
            $id_class = $row['class_id'];
            $sql1= "select name from class where '$id_class' = id";
            $result1 = mysqli_query($conn, $sql1);
            $row1 = mysqli_fetch_assoc($result1);
            $class = $row1['name'];
            
            ?> <option  value = <?php echo $id_class; ?>><?php echo $class; ?></option>"; ?><?php
        }
      }
      ?>
    </select>
    </div>


  <div class="form-group">
    <label for="exampleFormControlTextarea1">Avertisssement</label>
    <textarea name="teacher_text" class="form-control" id="teacher_text" rows="3" required></textarea>
  </div>
  <button type="submit"  id="btnSubmit" class="btn btn-primary">Submit</button>
  </div>

</form>
</div>
</div>
</section>
<script>
function sdc(){ 
      var classe = $('#class').val();
      var title = $('#title').val();	
      var teacher_text = $('#teacher_text').val();

    
      if(classe == 'Select a Classes'){
        return false;
        //MSK-00127-day 
        $("#btnSubmit").attr("disabled", true);
        $('#divDay').addClass('has-error has-feedback');
        $('#divDay').append('<span id="spanDay" class="glyphicon glyphicon-remove form-control-feedback set-width-tooltip" data-toggle="tooltip"    title="The Classe is required" ></span>');	
      
        $("#day").change(function() {
          //MSK-00128-day  
          $("#btnSubmit").attr("disabled", false);	
          $('#divDay').removeClass('has-error has-feedback');
          $('#spanDay').remove();
        
        });
    
      }else{
      
      }
      if(classe.selectedIndex >= "0"){
        alert("Please Select A class 😒")
        return false;
        $("#btnSubmit").attr("disabled", true);
        $('#divDay').addClass('has-error has-feedback');
        $('#divDay').append('<span id="spanDay" class="glyphicon glyphicon-remove form-control-feedback set-width-tooltip" data-toggle="tooltip"    title="The Classe is required" ></span>');	
      
        $("#day").change(function() {
          //MSK-00128-day  
          $("#btnSubmit").attr("disabled", false);	
          $('#divDay').removeClass('has-error has-feedback');
          $('#spanDay').remove();
        
        });
      }
      
    
      
      
      if(title == ''){
        return false;
        //MSK-00127-start time  
        $("#btnSubmit").attr("disabled", true);
        $('#divStartTime').addClass('has-error has-feedback');
        $('#divStartTime').append('<span id="spanStartTime" class="glyphicon glyphicon-remove form-control-feedback set-width-tooltip" data-toggle="tooltip"    title="The title is required" ></span>');	
      
        $("#start_time").keydown(function() {
          //MSK-00128-start time 
          $("#btnSubmit").attr("disabled", false);	
          $('#divStartTime').removeClass('has-error has-feedback');
          $('#spanStartTime').remove();
        
        });
    
      }else{
      
      }
    
      if(teacher_text == ''){
        //MSK-00127-end time  
        $("#btnSubmit").attr("disabled", true);
        $('#divEndTime').addClass('has-error has-feedback');
        $('#divEndTime').append('<span id="spanEndTime" class="glyphicon glyphicon-remove form-control-feedback set-width-tooltip" data-toggle="tooltip"    title="The Avertisssement is required" ></span>');	
      
        $("#end_time").keydown(function() {
          //MSK-00128-end time       
          $("#btnSubmit").attr("disabled", false);	
          $('#divEndTime').removeClass('has-error has-feedback');
          $('#spanEndTime').remove();
        
        });
    
      }else{
      
      }
    
      if(classe.selectedIndex >= "0" || title == '' || teacher_text == '' ){
        //MSK-000126- form validation failed
        $("#btnSubmit").attr("disabled", true);
        e.preventDefault();
        return false;
          
      }else{
        $("#btnSubmit").attr("disabled", false);
        //return true;
      }
      
  }
</script>
</body>

