<?php
include_once('../controller/config.php');


	$id=$_POST['id'];
	$name=$_POST['name']; 
	echo("<script>console.log($name)</script>");
	
	$sql="SELECT * FROM avertissement_type where name='$name'";	
	$result=mysqli_query($conn,$sql);
	echo $sql;
	header("Location: ../view/add_avertissement.php?name='$sql'");
	exit();
	if($result){
		$row=mysqli_fetch_assoc($result);
		$id1=$row['id'];
		$name1=$row['type'];
		$msg += 3;
	}else{	
		$sql1 = "update avertissement_type set name='".$name."' where id='$id'";
		
		if(mysqli_query($conn,$sql1)){
			
			$msg+=1;
				
			$sql2="SELECT * FROM subject where id='$id'";	
			$result2=mysqli_query($conn,$sql2);
			$row2=mysqli_fetch_assoc($result2);//MSK-000143-U-5
				
			$id2=$row2['id'];
			$name2=$row2['type']; 	
				
		}else{
			$msg+=2;
			//MSK-000143-U-6 Connection problem		
		}
	
	}

header("Location: ../view/add_avertissement.php?msg=$msg&id=$id2&name=$name2");
?>