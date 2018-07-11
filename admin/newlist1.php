<?php
//session_start();
error_reporting(E_ALL & ~E_NOTICE);
include 'include/controller.php';
/*$session_username = $_SESSION['user_name'];
$session_role = $_SESSION['role'];
if(empty($_SESSION['user_name'])){
    header("location:login.php");
}*/
$connections = mysqli_connect("localhost","root","","db_web");

    if(mysqli_connect_errno()){
        echo "Failed to connect to Mysql: " . mysqli_connect_errno();
    }
   $chk = "";
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Product Report Generator</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <!-- Loader -->
        <link rel="stylesheet" href="css/loader.css">
        <script src="js/jquery-1.12.4.js"></script>
        <link rel="stylesheet" type="text/css" href="dashboard/vendor/font-awesome/css/font-awesome.min.css">
        <script>
            $(document).ready(function() {
                $('#example').DataTable({

                });
            });
        </script>
        <link rel="stylesheet" href="css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="css/responsive.bootstrap.min.css">
        <script src="js/bootstrap.min.js"></script>

    </head>
    <bodyy onload="myFunction()" style="margin:0;">

        <div class="container">
            <h4>Products You Selected:</h4>



            <table id="example" class="Table table bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price per Unit</th>
                        <th>Discount</th>
                        <th>Vat Inc.</th>
                        <th>Total Price</th>
                        <th>Edit</th>

                    </tr>
                </thead>

                <tbody>
                    <?php 
               
                    $result = mysqli_query($connections, "SELECT * FROM dummy_proposals ORDER BY product_name ASC");
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_array($result)) {
                            $id = $row['product_id'];
                            $product_name = $row['product_name'];
                            $product_qty = $row['product_qty'];
                            $product_price = $row['product_price'];
                            $product_discount  = $row['product_discount'];
                            $product_vat = $row['product_vat'];
                            $price_total  = $row['price_total'];
                            $overall+=$row["price_total"];
                           

 echo "<tr>
            <td>$product_name</td>
            <td>$product_qty</td>
            <td>$product_price</td>
                           <input type='hidden'>

            <td>$product_discount</td>
            <td>$product_vat</td>
            <td>$price_total</td>
            ";  
                    ?>
                    <td>

                        <div class='btn-group' role='group' aria-label='...'>
                            <a href="#edit<?php echo $id;?>" data-toggle="modal"><button type='button' class='btn btn-warning btn-sm'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button></a>
                            <a href="#delete<?php echo $id;?>" data-toggle="modal"><button type='button' class='btn btn-danger btn-sm' ><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button></a>
                        </div>
                    </td>
                    </tr>


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
                                            <label class="control-label col-sm-2" for="item_code">Vat Inc.</label>


                                            <?php  
                                    include("connections.php");
                                      $results = mysqli_query($connections, "SELECT * FROM products where product_id='$id'");
        if (mysqli_num_rows($results) > 0){
            while($row = mysqli_fetch_array($results)){
                $product_tp = $row["product_tp"];
                $product_dp = $row["product_dp"];
                $product_desc = $row["product_desc"];
            }
        }
                                    if($product_vat == "Yes"){
                                        echo   ' <div class="col-sm-4">
                                        <input type="checkbox" name="chkVat" checked="checked"></div>';
                                    }
                                    else{
                                          echo '<div class="col-sm-4">
                                            <input type="checkbox" name="chkVat"></div>';
                                    }
                                    ?>

                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_name">Quantity:</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="item_name" name="product_qty" value="<?php echo $product_qty; ?>" placeholder="Item Name" required autofocus>
                                            </div>
                                            <label class="control-label col-sm-2" for="item_code">Trade Price:</label>
                                            <div class="col-sm-4">
                                                <p><input type="radio" id="item_code" name="rbtn" value="<?php echo $product_tp; ?>" placeholder="Trade Price" required checked="checked">&nbsp;&nbsp;
                                                    <?php echo $product_tp; ?>
                                                </p>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_description">Discount:</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="item_name" name="product_discount" value="<?php echo $product_discount; ?>" placeholder="Item Name" required autofocus>
                                            </div>
                                            <label class="control-label col-sm-2" for="item_category">Distributors Price:</label>
                                            <div class="col-sm-4">
                                                <input type="radio" id="item_category" name="rbtn" value="<?php echo $product_dp; ?>" placeholder="Distributors Price" required>&nbsp;&nbsp;
                                                <?php echo $product_dp; ?>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_description">Description:</label>
                                            <div class="col-sm-4" style="width: 100%;">
                                                <textarea cclass="form-control" id="item_description" name="product_desc" placeholder="Description" required style="width: 100%;"><?php echo $product_desc; ?></textarea>
                                            </div><br><br></div>
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


                        //Update Items
                        if(isset($_POST['update_item'])){
                            $edit_item_id = $_POST['edit_item_id'];
                            $product_name = $_POST['product_name'];
                            $product_qty = $_POST['product_qty'];
                            $product_price = $_POST['product_price'];
                            $product_discount = $_POST['product_discount'];
                            $product_vat = $_POST['product_vat'];
                            $product_price = $_POST['rbtn'];

                            if(!empty($_POST["chkVat"])){
                                $vat="Yes";
                                $dis=($product_price*$product_qty)*($product_discount/100);
                                $vatVal=(($product_price*$product_qty)-$product_discount)*0.12;
                                $total=(($product_price*$product_qty)-$dis)+$vatVal;
                                //echo $total."</br>";
                              }else{
                                $vat="No";
                                $dis=($product_price*$product_qty)*($product_discount/100);
                                $total=(($product_price*$product_qty)-$dis);
                                //echo $total;
                              }
                            $prop = "UPDATE dummy_proposals SET 
                                product_name='$product_name',
                                product_qty='$product_qty',
                                product_price='$product_price',
                                product_discount='$product_discount',
                                product_vat='$vat',
                                price_total = '$total'
                                WHERE product_id='$edit_item_id' ";
                            if ($connections->query($prop) === TRUE) {
                                echo '<script>window.location.href="newlist1.php"</script>';
                            } else {
                                echo "Error updating record: " . $connections->error;
                            }

                            echo "$price";
                        }

                        if(isset($_POST['delete'])){
                            // sql to delete a record
                            $delete_id = $_POST['delete_id'];
                             $results = mysqli_query($connections, "SELECT * FROM dummy_proposals where product_id='$delete_id'");
        if (mysqli_num_rows($results) > 0){
            while($row = mysqli_fetch_array($results)){
                $d = $row["proposal_id"];
            }
        }
    
  mysqli_query($connections, "DELETE FROM dummy_date WHERE proposal_id='$d'");//session
      mysqli_query($connections, "DELETE FROM dummy_proposals WHERE proposal_id='$d'");//session
  echo '<script>window.location.href = "newlist1.php";</script>';
                        }
                    }
                    $connections = mysqli_connect("localhost","root","","db_web");
                        if(mysqli_connect_errno()){
                            echo "Failed to connect to Mysql: " . mysqli_connect_errno();
                        }
               

?>

            </div>



            </body>
            </table>

            <form method="POST" action="newlist1.php">
                <?php 
echo '<h5><input type="text" name="txtTotal" value="'.$overall.'" style="float: right;"></h5></br></br>';
 echo '<input type="submit" name="btnGenerate" style="float: right;" value="Generate">'; 
 ?>
            </form>
            <?php 

if (isset($_POST["btnGenerate"])) {
    mysqli_query($connections, "INSERT INTO proposals (proposal_id, product_name, product_qty, product_price, product_discount, product_vat, qty_type, product_id, price_total) SELECT proposal_id, product_name, product_qty, product_price, product_discount, product_vat, qty_type, product_id, price_total FROM dummy_proposals");
        
        mysqli_query($connections, "INSERT INTO date_of_proposals (date_id, description, proposal_date, proposal_id) SELECT date_id, description, proposal_date, proposal_id FROM dummy_date");//INSERT INTO DATE

        echo "<script>window.location.href='pdftest.php';</script>";

}

 ?>

    </html>