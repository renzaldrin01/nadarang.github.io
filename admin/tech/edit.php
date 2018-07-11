<?php  
	
	session_start();
	$connect = mysqli_connect("localhost", "root", "", "db_web");
	$id = $_POST["id"];  
	$text = $_POST["text"];  
	$column_name = $_POST["column_name"];  
	$sql = "UPDATE product_specs SET ".$column_name."='".$text."' WHERE specs_id='".$id."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'Data Updated';  
	}  
 ?>