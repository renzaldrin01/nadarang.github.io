<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);
include '../include/controller.php';
$session_username = $_SESSION['user_name'];
$session_role = $_SESSION['role'];
if(empty($_SESSION['user_name'])){
    echo "<script>window.location.href = '../login.php'</script>";
}
$connections = mysqli_connect("localhost","root","","db_web");

    if(mysqli_connect_errno()){
        echo "Failed to connect to Mysql: " . mysqli_connect_errno();
    }
   
?>

      <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
      <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
      <!------ Include the above in your HEAD tag ---------->
      <link rel="stylesheet" type="text/css" href="sidebar.css">
      <div id="wrapper" class="active">
      <script src="js/jquery.dataTables.min.js"></script>
      <!-- Sidebar -->
            <!-- Sidebar -->
      <div id="sidebar-wrapper">
      <ul id="sidebar_menu" class="sidebar-nav">
           <li class="sidebar-brand"><a id="menu-toggle" href="#">Menu<span id="main_icon" class="glyphicon glyphicon-align-justify"></span></a></li>
      </ul>
        <ul class="sidebar-nav" id="sidebar">     
          <li style="cursor: pointer;"><a href="dashboard.php">Dashboard<span class="sub_icon glyphicon glyphicon-home" ></span></a></li>
          <li style="cursor: pointer;"><a href="product.php">Products<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
          <li style="cursor: pointer;"><a class="active" href="proposals.php">Proposals<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
          <li style="cursor: pointer;"><a href="#accounts">Accounts<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
          <li style="cursor: pointer;"><a><span></span></a></li>
          <li style="cursor: pointer;"><a href="logout.php">Log out<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
        </ul>
      </div>
          
      <!-- Page content -->
      <div id="page-content-wrapper">
        <!-- Keep all page content within the page-content inset div! -->
        <div class="page-content inset">
          <div class="row">
              <div class="col-md-12" style="width: 70%; margin-left: 15%;">
                <br>
              
<body>
    <form method="POST" action="proposals.php">
        <div class="container">

            <br />

            <?php
   error_reporting(E_ALL & ~E_NOTICE);
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_web";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $session = $_SESSION["user_name"];
    $output="";

    //invi table
  


if (isset($_POST["btnAdd"])) 
{
  //echo "<script>confirm('gyagaga')</script>";
  $product=$_POST["btnAdd"];
  $sql = mysqli_query($conn, "SELECT * FROM dummy WHERE dummy_id='$product' AND session='$session'");//session
  $check_user_row = mysqli_num_rows($sql);

    if($check_user_row > 0){
      echo "<script>alert('You already selected this product.')</script>";
    }else{
      mysqli_query($conn, "INSERT INTO dummy (dummy_id, session) VALUES ('$product', '$session');");//session
    }
  }   
  if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    $check_user = mysqli_query($conn, "SELECT * FROM dummy");
    $check_user_row = mysqli_num_rows($check_user);
    if ($check_user_row > 0) {
      echo '<h4 id="demo">Products You Selected:</h4>';

$output="";

    $check_user = mysqli_query($conn, "SELECT * FROM products INNER JOIN dummy ON (products.product_id=dummy.dummy_id) WHERE session='$session' ORDER BY product_name");//session
    $check_user_row = mysqli_num_rows($check_user);

    if($check_user_row > 0){
      
        $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
    <th>Product Name</th>
    <th>Quantity</th>
     <th>Distributors Price</th>
     <th>Trade Price</th>
     <th>Add-on</th>
     <th>Discount</th>
     <th>VAT Inc.</th>
     <th><center>Delete on List</center></th>

    </tr>
 ';
 while($row = mysqli_fetch_array($check_user))
 {
  
  $output .= '
   <tr>
    <td><input type="hidden" name="txtName'.$row["product_id"].'" value="'.$row["product_name"].'">'.$row["product_name"].'</td>
    <td><input type="number" min="1" style="width: 50px;" name="txtQty'.$row["product_id"].'" value="1"><input type="hidden" name="txtType'.$row["product_id"].'" value="'.$row["product_qty"].'">'.$row["product_qty"].'</td>
    <td><input type="radio" name="rbtn'.$row["product_id"].'" value="'.$row["product_dp"].'" checked>'.$row["product_dp"].'</td>
    <td><input type="radio" name="rbtn'.$row["product_id"].'" value="'.$row["product_tp"].'">'.$row["product_tp"].'</td>
    <td><input type="number" step="any" min="0" style="width: 50px;" name="txtDiscount'.$row["product_id"].'" value="0">%</td>
    <td><input type="checkbox" name="chkDis'.$row["product_id"].'"></td>
    <td><input type="checkbox" name="chkVat'.$row["product_id"].'"></td>
    <td><center><button type="submit" class="btn btn-warning btn-sm" id="btnMin" name="btnMin" value="'.$row["product_id"].'" style="background-color: red;">-</button></center></td>
   </tr>
  ';
  
 }
 $output .= '
  </table>
 ';
 echo $output;
 echo '<input type="submit" name="btnNext" value="Next" style="float: right;">'; 
    }


    }else{
      echo '<h4 id="demo">Select a product.</h4>';
    }
  }else{
  /*$c = mysqli_query($conn, "SELECT COUNT(*) as total FROM dummy");
  $cr = mysqli_fetch_assoc($c);*/
  echo '<h4 id="demo">Products You Selected:</h4>';

$output="";

    $check_user = mysqli_query($conn, "SELECT * FROM products INNER JOIN dummy ON (products.product_id=dummy.dummy_id) WHERE session='$session' ORDER BY product_name");//session
    $check_user_row = mysqli_num_rows($check_user);

    if($check_user_row > 0){
      
        $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
    <th>Product Name</th>
    <th>Quantity</th>
     <th>Distributors Price</th>
     <th>Trade Price</th>
     <th>Add-on</th>
     <th>Discount</th>
     <th>VAT Inc.</th>
     <th><center>Delete on List</center></th>

    </tr>
 ';
 while($row = mysqli_fetch_array($check_user))
 {
  
  $output .= '
   <tr>
    <td><input type="hidden" name="txtName'.$row["product_id"].'" value="'.$row["product_name"].'">'.$row["product_name"].'</td>
    <td><input type="number" min="1" style="width: 50px;" name="txtQty'.$row["product_id"].'" value="1"><input type="hidden" name="txtType'.$row["product_id"].'" value="'.$row["product_qty"].'">'.$row["product_qty"].'</td>
    <td><input type="radio" name="rbtn'.$row["product_id"].'" value="'.$row["product_dp"].'" checked>'.$row["product_dp"].'</td>
    <td><input type="radio" name="rbtn'.$row["product_id"].'" value="'.$row["product_tp"].'">'.$row["product_tp"].'</td>
    <td><input type="number" step="any" min="0" style="width: 50px;" name="txtDiscount'.$row["product_id"].'" value="0">%</td>
    <td><input type="checkbox" name="chkDis'.$row["product_id"].'"></td>
    <td><input type="checkbox" name="chkVat'.$row["product_id"].'"></td>
    <td><center><button type="submit" class="btn btn-warning btn-sm" id="btnMin" name="btnMin" value="'.$row["product_id"].'" style="background-color: red;">-</button></center></td>
   </tr>
  ';
  
 }
 $output .= '
  </table>
 ';
 echo $output;
 echo '<input type="submit" name="btnNext" value="Next" style="float: right;">'; 
    }

if (isset($_POST["btnMin"])) {
  $vBtn=$_POST["btnMin"];
  mysqli_query($conn, "DELETE FROM dummy WHERE dummy_id=$vBtn");
  echo '<script>window.location.href = "proposals.php";</script>';
}
if (isset($_POST["btnNext"])) {
  $dummy = mysqli_query($conn, "SELECT * FROM dummy WHERE session='$session'");//session
    while ($row = mysqli_fetch_array($dummy)) {

      $id=$row["dummy_id"];
      $name=$_POST["txtName".$id];
      $qty=$_POST["txtQty".$id];
      $price=$_POST["rbtn".$id];
      $discount=$_POST["txtDiscount".$id];
      $qtype=$_POST["txtType".$id];
      $session = $_SESSION["user_name"];
      $status = "dummy";

      /*if ($discount <= 10) {
        $status = "Ok for Sending";
      }
      else{
        $status="For Approval";
      }*/

      if (!empty($_POST["chkDis".$id])) {
        $dist="Discount";
        if(!empty($_POST["chkVat".$id])){
          $vat="Yes";
          $dis=($price*$qty)*($discount/100);
          $vatVal=(($price*$qty)-$dis)*0.12;
          $total=(($price*$qty)-$dis)+$vatVal;
          //echo $total."</br>";
        }else{
          $vat="No";
          $dis=($price*$qty)*($discount/100);
          $total=(($price*$qty)-$dis);
          //echo $total;
        }

      }else{
        $dist="Add";
        if(!empty($_POST["chkVat".$id])){
          $vat="Yes";
          $dis=($price*$qty)*($discount/100);
          $vatVal=(($price*$qty)+$dis)*0.12;
          $total=(($price*$qty)+$dis)+$vatVal;
          //echo $total."</br>";
        }else{
          $vat="No";
          $dis=($price*$qty)*($discount/100);
          $total=(($price*$qty)+$dis);
          //echo $total;
        }                                                          
        
      }

        //echo $_POST["txtName".$id];
        mysqli_query($conn, "INSERT INTO proposals (product_name, product_qty, product_price, product_discount, product_add, product_vat, qty_type, product_id, price_total,status, session) VALUES ('$name', '$qty', '$price', '$discount', '$dist', '$vat', '$qtype', '$id', '$total', '$status', '$session')");
        
        $prop = mysqli_query($conn, "SELECT * FROM proposals WHERE product_id='$id' AND session='$session'");//session
        while ($row = mysqli_fetch_array($prop)) {
          $propid=$row["proposal_id"];
        }

        $date=date('Y-m-d');
        mysqli_query($conn, "INSERT INTO date_of_proposals (proposal_date, description, proposal_id) VALUES ('$date', 'CREATED', '$propid')");//INSERT INTO DATE
      
      //echo $_POST["rbtn".$id];
      
    }
  mysqli_query($conn, "DELETE FROM dummy WHERE session='$session'");//session
  echo '<script>window.location.href = "list.php";</script>';
}


}
if(isset($_POST["view"])){
echo '<script>window.location.href = "list.php";</script>';
}
  ?>
                <br />
                <br />
                <h4>Product List:</h4>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">Search</span>
                        <input type="text" name="search_text" id="search_text" placeholder="Search by Product Name" class="form-control" />
                    </div>
                </div>
                <div id="result"></div>
        </div>
    </form>
</body>

            </div>
          </div>
        </div>
      </div>

<script type="text/javascript"> 

  $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
});


$(document).ready(function() {

    load_data();

    function load_data(query) {
        $.ajax({
            url: "search.php",
            method: "POST",
            data: {
                query: query
            },
            success: function(data) {
                $('#result').html(data);
            }
        });
    }
    $('#search_text').keyup(function() {
        var search = $(this).val();
        if (search != '') {
            load_data(search);
        } else {
            load_data();
        }
    });
});
</script>  
     