<?php  
	$connect = mysqli_connect("localhost", "root", "", "db_web");
	$sql = "DELETE FROM product_specs WHERE specs_id = '".$_POST["id"]."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'Data Deleted';  
	}  
 ?>