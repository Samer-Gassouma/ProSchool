
  <aside class="main-sidebar">
    
    <section class="sidebar">
      
<?php
include_once('../controller/config.php');

$index=$_SESSION["index_number"];

$sql="SELECT * FROM teacher WHERE index_number='$index'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['full_name'];
$image=$row['image_name'];
$id = $row['id'];

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
          <a href="dashboard2.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="teacher_profile2.php">
            <i class="fa fa-flag"></i> <span>My Profile</span>
          </a>
        </li>
         <li>
          <a href="my_student.php">
            <i class="fa fa-graduation-cap"></i> <span>My Student</span>
          </a>
        </li>
        <li>
          <a href="Home_Work_Create.php">
            <i class="fa fa-book"></i> <span>HomeWork </span>
          </a>
        </li>
        <li>
          <a href="CreateCours.php">
            <i class="fa fa-book"></i> <span>My Cours</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-calendar-plus-o"></i>
            <span>Timetable</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="my_timetable2.php"><i class="fa fa-circle-o"></i> My Timetable</a></li>
            <li><a href="all_timetable2.php"><i class="fa fa-circle-o"></i>All Timetable</a></li>
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-calendar-check-o"></i>
            <span>Attendance</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="my_attendance2.php"><i class="fa fa-circle-o"></i> My Attendance</a></li>
            <li><a href="Student_Attendance.php"><i class="fa fa-circle-o"></i>Student Attendance</a></li>
          </ul>
        </li>
        <li>
          <a href="avertissement.php">
          <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <span>Avertissement</span>
          </a>
        </li>
        
         <li class="treeview">
          <a href="#">
            <i class="fa fa-certificate"></i>
            <span>Exam</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="my_student_exam_marks.php"><i class="fa fa-circle-o"></i> My Student Exam Marks</a></li>
          <!--  <li><a href="my_student_exam_marks_history.php"><i class="fa fa-circle-o"></i> My Student Exam Marks History</a></li> -->
            <li><a href="exam_timetable2.php"><i class="fa fa-circle-o"></i>Exam Timetable</a></li>
          </ul>
        </li>
        <li>
          <a href="all_events2.php">
            <i class="fa fa-calendar"></i> <span>All Events</span>
          </a>
        </li>
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-calendar"></i>
            <span>Events</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          	<li><a href="my_events2.php"><i class="fa fa-circle-o"></i> My Events</a></li>
          	<li><a href="all_events2.php"><i class="fa fa-circle-o"></i> All Events</a></li>
          </ul>
        </li>-->
      </ul>
    </section>
    
  </aside>