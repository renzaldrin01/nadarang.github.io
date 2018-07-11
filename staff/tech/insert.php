<?php  
session_start();
$product_id = $_SESSION["id"];
$connect = mysqli_connect("localhost", "root", "", "db_web");
$sql = "INSERT INTO product_specs(title, description, product_id) VALUES('".$_POST["title"]."', '".$_POST["description"]."' ,'".$product_id."')";  
if(mysqli_query($connect, $sql))  
{  
     echo 'Data Inserted';  
}  
 ?>