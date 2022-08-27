<?php
include_once('../controller/config.php');


	$id=$_POST['id'];
	$name=$_POST['name']; 
	
	$sql="SELECT * FROM subject where name='$name'";	
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0){
		$row=mysqli_fetch_assoc($result);
		$id1=$row['id'];
		$name1=$row['name'];
		$msg += 3;
	}else{	
		$sql1 = "update subject set name='".$name."' where id='$id'";
		
		if(mysqli_query($conn,$sql1)){
			
			$msg+=1;
				
			$sql2="SELECT * FROM subject where id='$id'";	
			$result2=mysqli_query($conn,$sql2);
			$row2=mysqli_fetch_assoc($result2);//MSK-000143-U-5
				
			$id2=$row2['id'];
			$name2=$row2['name'];
				
		}else{
			$msg+=2;
			//MSK-000143-U-6 Connection problem		
		}
	
	}

header("Location: ../view/subject.php?msg=$msg&id=$id2&name=$name2");
?>