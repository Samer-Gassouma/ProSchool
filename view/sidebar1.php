
  <aside class="main-sidebar">
    
    <section class="sidebar">
      
<?php
include_once('../controller/config.php');

$index=$_SESSION["index_number"];

$sql="SELECT * FROM student WHERE index_number='$index'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['full_name'];
$image=$row['image_name'];

?>      
      
      <div class="user-panel">
      	<div class="pull-left image">
        	<img src="../<?php echo $image; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
        	<p><?php echo $name; ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="dashboard1.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="my_profile.php">
            <i class="fa fa-flag"></i> <span>My Profile</span>
          </a>
        </li>

        <li>
          <a href="all_teacher1.php">
          <i class="fa fa-book"></i> <span> All Teacher</span>
          </a>
        </li>
        <li>
          <a href="HomeWork1.php">
          <i class="fa fa-book"></i> <span>HomeWork</span>
          </a>
        </li>
        <li>
          <a href="all_timetable1.php">
          <i class="fa fa-book"></i><span>Timetable</span>
          </a>
        </li>
        
        <li>
          <a href="my_attendance.php">
          <i class="fa fa-calendar-check-o"></i><span>Attendance</span>
          </a>
        </li>
        <li>
          <a href="avertissement1.php">
          <i class="fa fa-exclamation-triangle"></i><span>Avertissement</span>
          </a>
        </li>

        <li>
          <a href="my_exam_marks.php">
          <i class="fa fa-certificate"></i><span>My Exam Marks</span>
          </a>
        </li>

       <!--  <li class="treeview">
          <a href="#">
            <i class="fa fa-calendar-check-o"></i>
            <span>Attendance</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="my_attendance.php"><i class="fa fa-circle-o"></i> My Attendance</a></li>
            <li><a href="my_attendance_history.php"><i class="fa fa-circle-o"></i> My Attendance History</a></li>
          </ul>
        </li>-->
         
        <!--<li class="treeview">
          <a href="#">
            <i class="fa fa-certificate"></i>
            <span>Exam</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="my_exam_marks.php"><i class="fa fa-circle-o"></i> My Exam Marks</a></li>
            <li><a href="my_exam_marks_history.php"><i class="fa fa-circle-o"></i> My Exam Marks History</a></li>
            <li><a href="my_exam_timetable.php"><i class="fa fa-circle-o"></i>My Exam Timetable</a></li>
          </ul>
        </li>-->
        <li>
          <a href="Courses.php">
          <i class="fa fa-book"></i><span>Courses</span>
          </a>
        </li>

      </ul>
    </section>
    
  </aside>