
<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<form method="POST" action="search.php">
	<div class="container">
   <br />
   <div class="form-group">
    <div class="input-group">
   
    </div>
   </div>
   <br />
   <div id="result"></div>
  </div>
</form>

</body>
</html>
 <?php
//fetch.php
$conn = mysqli_connect("localhost", "root", "", "db_web");
$output = $qty = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
  $query = "
  SELECT * FROM products WHERE product_name LIKE '%".$search."%' ORDER BY product_name
 ";

}
else
{
  $query = "
  SELECT * FROM products ORDER BY product_name
 ";

}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
  $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
    <th>Product Name</th>
     <th>Distributors Price</th>
     <th>Trade Price</th>
     <th><center>Add To List</center></th>

    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  
  $output .= '
   <tr>
    <td>'.$row["product_name"].'</td>
    <td>'.$row["product_dp"].'</td>
    <td>'.$row["product_tp"].'</td>
    <td><center><button type="submit"  id="btnAdd" name="btnAdd" value="' . $row['product_id'] . '"  class="btn btn-warning btn-sm" style="background-color: #4CAF50;" onclick="add();">+</button></center></td>
   </tr>
  ';
  
 }
 $output .= '
  </table>
 ';
 echo $output;


}
else
{
 echo 'No Product Match.';
}


?>
			





