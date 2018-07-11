<?php  

$connections = mysqli_connect("localhost","root","","db_web");

	if(mysqli_connect_errno()){
		echo "Failed to connect to Mysql: " . mysqli_connect_errno();
	}
?>