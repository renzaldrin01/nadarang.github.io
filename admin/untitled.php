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
          <li style="cursor: pointer;"><a class="active" href="dashboard.php">Dashboard<span class="sub_icon glyphicon glyphicon-home" ></span></a></li>
          <li style="cursor: pointer;"><a href="product.php">Products<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
          <li style="cursor: pointer;"><a href="proposals.php">Proposals<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
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
              <p class="well lead"></p>
              <p class="well lead"></p> 
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
     