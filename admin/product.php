<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);
include '../include/controller.php';
$session_username = $_SESSION['user_name'];
$session_role = $_SESSION['role'];
if(empty($_SESSION['user_name'])){
    header("location:../login.php");
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
  <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style/css/bootstrap.min.css">
        <link rel="stylesheet" href="style/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="style/css/loader.css">
        <script src="style/js/jquery-1.12.4.js"></script>
        <link rel="stylesheet" type="text/css" href="dashboard/vendor/font-awesome/css/font-awesome.min.css">
         <script>
            $(document).ready(function() {
                $('#example').DataTable({
                });
            });

        </script>
        <link rel="stylesheet" href="style/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="style/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="style/css/responsive.bootstrap.min.css">
        <script src="style/js/bootstrap.min.js"></script>
        <script src="style/js/jquery.dataTables.min.js"></script>

<div id="wrapper" class="active">
      <!-- Sidebar -->  

      
            <!-- Sidebar -->
      <div id="sidebar-wrapper">
      <ul id="sidebar_menu" class="sidebar-nav">
           <li class="sidebar-brand"><a id="menu-toggle" href="#">Menu<span id="main_icon" class="glyphicon glyphicon-align-justify"></span></a></li>
      </ul>
        <ul class="sidebar-nav" id="sidebar">     
          <li style="cursor: pointer;"><a href="dashboard.php">Dashboard<span class="sub_icon glyphicon glyphicon-home" ></span></a></li>
          <li style="cursor: pointer;"><a class="active" href="product.php">Products<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
          <li style="cursor: pointer;"><a href="proposals.php">Proposals<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
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
 <body onload="myFunction()" style="margin:0;">

        <div class="container">
            <div class="dropdown">
                <a href="#add" data-toggle="modal"><button type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-plus' aria-hidden='true'></span> Item</button></a>
            </div><br>


            <table id="example" class="display nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Distributors Price</th>
                        <th>Trade Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Item Name</th>
                        <th>Distributors Price</th>
                        <th>Trade Price</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php 
               
                    $result = mysqli_query($connections, "SELECT * FROM products ORDER BY product_name ASC");
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_array($result)) {
                            $id = $row['product_id'];
                            $product_name = $row['product_name'];
                            $product_dp = $row['product_dp'];
                            $product_tp = $row['product_tp'];
                            $product_desc  = $row['product_desc'];
                           

                            echo "<tr>
            <td>$product_name</td>
            <td>$product_dp</td>
            <td>$product_tp</td>
            ";
                    ?>
                    <td>
                       
                        <div class='btn-group' role='group' aria-label='...'>
                            <a href="#edit<?php echo $id;?>" data-toggle="modal"><button type='button' class='btn btn-warning btn-sm'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button></a>
                            <a href="#delete<?php echo $id;?>" data-toggle="modal"><button type='button' class='btn btn-danger btn-sm' ><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button></a>
                             <a href="#view<?php echo $id;?>" data-toggle="modal"><button type='button' class='btn btn-primary btn-sm'><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span></button></a>
                        </div>
                    </td>



                    <!--In Stock/s Modal -->
  
               

        <!--View Modal -->
        <div id="view<?php echo $id; ?>" class="modal fade" role="dialog">
                <form method="post" class="form-horizontal" role="form">            
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <center><h3 class="modal-title">Technical Specification</h3></center>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="edit_item_id" value="<?php echo $id; ?>">
                   
                        <?php  
                        include('../connections.php');
                        $resultss = mysqli_query($connections, "SELECT * FROM product_specs where product_id = '$id'");
                        if(mysqli_num_rows($resultss) > 0){

                                while($row = mysqli_fetch_array($resultss)){
                                     $title = $row['title'];
                                     $description = $row['description'];

                                     echo '<center><p><b>'.$title.'</b></p>'.'  '.$description.'</center>'; 
                                     echo '<br>'; 

                                }
                            }
                            else{
                                echo '<center><p>Does not have a Technical Specification</p></center>';
                            }


                        ?>
                        <div class="modal-footer">
                             <button type="submit" class="btn btn-primary" name="add_specs"><span class="glyphicon glyphicon-plus"></span> Add</button>
                             <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Close</button>
                            
                        </div>
                    </div>
                </div></form>
            </div>
        </div>




        <div id="changepass" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <form action="" method="post">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Change Password</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name">Current:</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="current_password" required placeholder="Current Password" autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name">New:</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="new_password" required placeholder="New Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name">Repeat:</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="repeat_password" required placeholder="Repeat Password">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" name="change_pass">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!--Edit Item Modal -->
        <div id="edit<?php echo $id; ?>" class="modal fade" role="dialog">
            <form method="post" class="form-horizontal" role="form">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit Item</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="edit_item_id" value="<?php echo $id; ?>">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="item_name">Product Name:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="item_name" name="product_name" value="<?php echo $product_name; ?>" placeholder="Item Name" required autofocus>
                                </div>
                                <label class="control-label col-sm-2" for="item_code">Trade Price:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="item_code" name="product_tp" value="<?php echo $product_tp; ?>" placeholder="Item Code" required>
                                </div>
                            </div>
                            <br><br>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="item_description">Description:</label>
                                <div class="col-sm-4">
                                    <textarea cclass="form-control" id="item_description" name="product_desc" placeholder="Description" required style="width: 100%;"><?php echo $product_desc; ?></textarea>
                                </div>
                                <label class="control-label col-sm-2" for="item_category">Distributors Price:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="item_category" name="product_dp" value="<?php echo $product_dp; ?>" placeholder="Distributors Price" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="update_item"><span class="glyphicon glyphicon-edit"></span> Edit</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                        </div>
                    </div>
                </div>
        </div>
        </form>
        </div>

        <!--Delete Modal -->
        <div id="delete<?php echo $id; ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <form method="post">
                    <!-- Modal content-->
                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Delete</h4>
                        </div>

                        <div class="modal-body">
                            <input type="hidden" name="delete_id" value="<?php echo $id; ?>">
                            <p>
                                <div class="alert alert-danger">Are you Sure you want Archive <strong><?php echo $product_name ; ?>?</strong></p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> YES</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> NO</button>
                            </div>
                        </div>
                </form>
                </div>
            </div>
        </div>
        </tr>


        <?php
                        }
                        if(isset($_POST['change_pass'])){
                            $sql = "SELECT password FROM tbl_user WHERE username='$session_username'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    if($row['password'] != $current_password){
                                        echo "<script>window.alert('Invalid Password');</script>";
                                        $passwordErr = '<div class="alert alert-warning">
                        <strong>Password!</strong> Invalid.
                        </div>';
                                    } elseif($new_password != $repeat_password) {
                                        echo "<script>window.alert('Password Not Match!');</script>";
                                        $passwordErr = '<div class="alert alert-warning">
                        <strong>Password!</strong> Not Match.
                        </div>';
                                    } else{
                                        $sql = "UPDATE tbl_user SET password='$new_password' WHERE username='$session_username'";

                                        if ($conn->query($sql) === TRUE) {
                                            echo "<script>window.alert('Password Successfully Updated');</script>";
                                        } else {
                                            echo "Error updating record: " . $conn->error;
                                        }
                                    }    
                                }
                            } else {
                                $usernameErr = '<div class="alert alert-danger">
          <strong>Username</strong> Not Found.
          </div>';
                                $username = "";
                            }
                        }
                        

                        // Adding technical Skills
                         if(isset($_POST['add_specs'])){
                            $edit_item_id = $_POST['edit_item_id'];
                            $result = mysqli_query($connections, "SELECT * FROM products where product_id=$edit_item_id");
                            if(mysqli_num_rows($result) > 0){

                                while($row = mysqli_fetch_array($result)){
                                     $iddd = $row['product_id'];
                                 $product_name = $row['product_name'];
                                }
                            }
                            session_start();
                            $_SESSION["id"] = $iddd;
                            $_SESSION["name"] = $product_name;
                            echo "<script>window.location.href='tech/index.php';</script>";
                         }
                        

                        //Update Items
                        if(isset($_POST['update_item'])){
                            $edit_item_id = $_POST['edit_item_id'];
                            $product_name = $_POST['product_name'];
                            $product_qty = $_POST['product_qty'];
                            $product_dp = $_POST['product_dp'];
                            $product_tp = $_POST['product_tp'];
                            $product_desc = $_POST['product_desc'];

                        $sql = "UPDATE products SET 
                                product_name='$product_name',
                                product_qty='$product_qty',
                                product_dp='$product_dp',
                                product_tp='$product_tp',
                                product_desc='$product_desc'
                                WHERE product_id='$edit_item_id' ";
                            if ($connections->query($sql) === TRUE) {
                                echo '<script>window.location.href="product.php"</script>';
                            } else {
                                echo "Error updating record: " . $connections->error;
                            }
                        }

                        if(isset($_POST['delete'])){
                            // sql to delete a record
                            $delete_id = $_POST['delete_id'];
                            $sql = "DELETE FROM products WHERE product_id='$delete_id' ";
                            if ($connections->query($sql) === TRUE) {
                                $sql = "DELETE FROM products WHERE product_id='$delete_id' ";
                                if ($connections->query($sql) === TRUE) {
                                    $sql = "DELETE FROM products WHERE product_id='$delete_id' ";
                                    echo '<script>window.location.href="product.php"</script>';
                                } else {
                                    echo "Error deleting record: " . $connections->error;
                                }
                            } else {
                                echo "Error deleting record: " . $connections->error;
                            }
                        }
                    }
                    $connections = mysqli_connect("localhost","root","","db_web");
                        if(mysqli_connect_errno()){
                            echo "Failed to connect to Mysql: " . mysqli_connect_errno();
                        }
                    //Add Item        
                    if(isset($_POST['add_item'])){
                        $product_name = $_POST['product_name'];
                        $product_qty = $_POST['product_qty'];
                        $product_dp = $_POST['product_dp'];
                        $product_tp = $_POST['product_tp'];
                        $product_desc = $_POST['product_desc'];
                        mysqli_query($connections ,"INSERT INTO products 
            (product_name,
            product_qty,
            product_dp,
            product_tp,
            product_desc)
            VALUES (
            '$product_name',
            '$product_qty',
            '$product_dp',
            '$product_tp',
            '$product_desc'
            )");
                        echo "<script>window.location.href='product.php'</script>";
                    }

                     if(isset($_POST['update_item'])){
                            $edit_item_id = $_POST['edit_item_id'];
                            $product_name = $_POST['product_name'];
                            $product_qty = $_POST['product_qty'];
                            $product_dp = $_POST['product_dp'];
                            $product_tp = $_POST['product_tp'];
                            $product_desc = $_POST['product_desc'];

                        $sql = "UPDATE products SET 
                                product_name='$product_name',
                                product_qty='$product_qty',
                                product_dp='$product_dp',
                                product_tp='$product_tp',
                                product_desc='$product_desc'
                                WHERE product_id='$edit_item_id' ";
                            if ($connections->query($sql) === TRUE) {
                                echo '<script>window.location.href="product.php"</script>';
                            } else {
                                echo "Error updating record: " . $connections->error;
                            }
                        }
                    


?>  
            </tbody>
            </table>
            </div>
          

            <!--Add Item Modal -->
            <div id="add" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add Item</h4>
                        </div>
                        <div class="modal-body">
                            <form method="post" class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="item_name">Product Name:</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="item_name" name="product_name" placeholder="Product Name" autofocus required>
                                    </div>
                                    <label class="control-label col-sm-2" for="item_code">Quantity Type:</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="item_code" name="product_qty" placeholder="Quantity Type" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="item_category">Distributors Price:</label>
                                    <div class="col-sm-4">
                                        <input type="number" min="1" step="any" class="form-control" id="item_category" name="product_dp" placeholder="Distributors Price" required>
                                    </div>
                                    <label class="control-label col-sm-2" for="item_critical_lvl">Trade Price:</label>
                                    <div class="col-sm-4">
                                        <input type="number" min="1" step="any" class="form-control" id="item_critical_lvl" name="product_tp" placeholder="Trade Price" required>
                                    </div>
                                </div>
                             <div class="form-group">
                                    <label class="control-label col-sm-2" for="item_sub_category">Description:</label>
                                <div class="col-sm-10">
                                        <textarea class="form-control" id="item_description" name="product_desc" required></textarea>
                                </div>
                             </div>
                        </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" name="add_item"><span class="glyphicon glyphicon-plus"></span> Add</button>
                                <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                             </div>
                         </div>
                    </form>
                </div>
            </div>
            </div>

            <!--Logout Modal -->
            <div id="logout" class="modal fade" role="dialog">
                <div class="modal-dialog modal-md">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Logout</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="delete_id" value="<?php echo $id; ?>">
                            <p>
                                <div class="alert alert-danger">Are you Sure you want to logout <strong><?php echo $_SESSION['user_name']; ?>?</strong></p>
                            </div>
                            <div class="modal-footer">
                                <a href="logout.php"><button type="button" class="btn btn-danger">YES </button></a>
                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
    
                </body>

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


<script>
$(document).ready(function(){
 var count = 1;
 $('#adds').click(function(){
  count = count + 1;
  var html_code = "<tr id='row"+count+"'>";
  html_code +='<td style="background-color:darkgray;"></td>'
   html_code += "<td contenteditable='true' class='item_code'></td>";
   html_code += "<td contenteditable='true' class='item_desc'></td>";
   html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
   html_code += "</tr>";  
   $('#crud_table').append(html_code);
 });
 
 $(document).on('click', '.remove', function(){
  var delete_row = $(this).data("row");
  $('#' + delete_row).remove();
  var id=$(this).data("id3");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"delete.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
$("#tblid").load("product.php #tblid");
 });
 
 $('#save').click(function(){
  var item_code = [];
  var item_desc = [];
  
  $('.item_code').each(function(){
   item_code.push($(this).text());
  });
  $('.item_desc').each(function(){
   item_desc.push($(this).text());
  });
  
  $.ajax({
   url:"insert.php",
   method:"POST",
   data:{item_code:item_code, item_desc:item_desc},
   success:function(data){
    alert(data);
    $("td[contentEditable='true']").text("");
    window.location.href='inventory.php';

    for(var i=2; i<= count; i++)
    {
     $('tr#'+i+'').remove();
    }
    fetch_item_data();
   }
  });
 });
      
 
 fetch_item_data();
 
});
</script>
     