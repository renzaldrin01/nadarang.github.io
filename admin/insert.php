<?php
//insert.php
$connect = mysqli_connect("localhost", "root", "", "db_web");
if(isset($_POST["item_code"]))
{
  session_start();
 $product_id = $_SESSION["id"];
 $item_code = $_POST["item_code"];
 $item_desc = $_POST["item_desc"];
 $query = '';
 for($count = 0; $count<count($item_code); $count++)
 {
  $item_code_clean = mysqli_real_escape_string($connect, $item_code[$count]);
  $item_desc_clean = mysqli_real_escape_string($connect, $item_desc[$count]);
  if( $item_code_clean != '' && $item_desc_clean != '' )
  {

    $result = mysqli_query($connect, "SELECT * FROM product_specs where title = '$item_code_clean'");

   if (mysqli_num_rows($result) > 0) {
             echo "Specification Aldready exist";
    }
    else{
   $query .= '
   INSERT INTO product_specs(title, description, product_id) 
   VALUES("'.$item_code_clean.'", "'.$item_desc_clean.'","'.$product_id.'"); 
   ';
 }
  }
 }
 if($query != '')
 {
  if(mysqli_multi_query($connect, $query))
  {
    
   echo 'Item Data Inserted';
  }
  else
  {
   echo 'Error';
  }
 }
 else
 {
  echo 'All Fields are Required';
 }
}
?>
