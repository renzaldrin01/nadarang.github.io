<?php
//session_start();
error_reporting(E_ALL & ~E_NOTICE);
include '../include/controller.php';
$session_username = $_SESSION['user_name'];
$session_role = $_SESSION['role'];
if(empty($_SESSION['user_name'])){
    header("location:login.php");
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
          <li style="cursor: pointer;" class="active"><a>Dashboard<span class="sub_icon glyphicon glyphicon-home" ></span></a></li>
          <li style="cursor: pointer;"><a>Products<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
          <li style="cursor: pointer;"><a>Proposals<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
          <li style="cursor: pointer;"><a>Accounts<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
          <li style="cursor: pointer;"><a><span></span></a></li>
          <li style="cursor: pointer;"><a href="logout.php">Log out<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
        </ul>
      </div>
          
      <!-- Page content -->
      <div id="page-content-wrapper">
        <!-- Keep all page content within the page-content inset div! -->
        <div class="page-content inset">
          <div class="row">
              <div class="col-md-12">
                <br>
              <p class="well lead">
<form id="myform" method="POST" action="dashboard.php">
   
   <?php
   error_reporting(E_ALL & ~E_NOTICE);
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_web";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    echo '<h4 id="demo">Proposal List:</h4></br>';
    
   $filter=$_POST["filterProp"];
   if ($_SERVER["REQUEST_METHOD"]=='POST') {
     if ($filter==2) {
        echo '
      <h5>Filter Proposals by:
    <select id="filter" name="filterProp" onchange="change()">
      <option value="1">All</option>
      <option value="2" selected>Ok for Sending</option>
      <option value="3">For Approval</option>
    </select>
   </h5>
   <input type="submit" id="btnko" style="display: none;">
      ';
      }elseif ($filter==3) {
        echo '
      <h5>Filter Proposals by:
    <select id="filter" name="filterProp" onchange="change()">
      <option value="1">All</option>
      <option value="2">Ok for Sending</option>
      <option value="3" selected>For Approval</option>
    </select>
   </h5>
   <input type="submit" id="btnko" style="display: none;">
      ';
      }else{
        echo '
      <h5>Filter Proposals by:
    <select id="filter" name="filterProp" onchange="change()">
      <option value="1" selected>All</option>
      <option value="2">Ok for Sending</option>
      <option value="3">For Approval</option>
    </select>
   </h5>
   <input type="submit" id="btnko" style="display: none;">
      ';
      }
   }else{
    echo '
      <h5>Filter Proposals by:
    <select id="filter" name="filterProp" onchange="change()">
      <option value="1">All</option>
      <option value="2">Ok for Sending</option>
      <option value="3">For Approval</option>
    </select>
   </h5>
   <input type="submit" id="btnko" style="display: none;">
      ';
   }
    $overall=0;

$output="";

    if ($filter==2) {
      $check_user = mysqli_query($conn, "SELECT * FROM proposals INNER JOIN date_of_proposals ON (proposals.proposal_id=date_of_proposals.proposal_id) WHERE proposals.status='Ok for Sending' ORDER BY proposal_date DESC, product_name ASC");//session
    }elseif ($filter==3) {
      $check_user = mysqli_query($conn, "SELECT * FROM proposals INNER JOIN date_of_proposals ON (proposals.proposal_id=date_of_proposals.proposal_id) WHERE proposals.status='For Approval by Manager' ORDER BY proposal_date DESC, product_name ASC");//session
    }else{
      $check_user = mysqli_query($conn, "SELECT * FROM proposals INNER JOIN date_of_proposals ON (proposals.proposal_id=date_of_proposals.proposal_id) ORDER BY proposal_date DESC, product_name ASC");//session
    }
    $check_user_row = mysqli_num_rows($check_user);

    if($check_user_row > 0){
      
        $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
    <th>Product Name</th>
    <th>Account Name</th>
     <th>Status</th>
     <th>Date Updated</th>
     <th><center>Edit</center></th>

    </tr>
 ';
 while($row = mysqli_fetch_array($check_user))
 {
  $output .= '
   <tr>
    <td>'.$row["product_name"].'</td>
    <td>'.$row["product_name"].'&nbsp;'.$row["qty_type"].'</td>
    <td>'.$row["status"].'</td>
    <td>'.date('F d, Y', strtotime($row["proposal_date"])).'</td>
    <td><center><button type="submit" name="btnView" value="'.$row["proposal_id"].'" style="background-color: blue; color: white; width:30px; height:30px;" class="glyphicon glyphicon-eye-open" ></button></center></td>
   </tr>
  ';
 }
 $output .= '
  </table>
 ';
 echo $output;
    }

if (isset($_POST["btnView"])) {
  $vBtn=$_POST["btnView"];
  $sql=mysqli_query($conn, "SELECT * FROM date_of_proposals WHERE proposal_id=$vBtn");//session
  while ($row = mysqli_fetch_array($sql)) {
  echo '<b>'.date('F d, Y', strtotime($row["proposal_date"])).'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row["description"]; 
  }
}
if (isset($_POST["btnMore"])) {
  echo '<script>window.location.href = "showproduct.php";</script>';
}
  ?>

   <div id="result"></div>
  </div>
  </form></p>
              <p class="well lead">Click on the Menu to Toggle Sidebar . Hope you enjoy it!</p> 
            </div>
          </div>
        </div>
      </div>

<script type="text/javascript"> 

  $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
});


</script>  
     