 <?php  
 session_start();
 $iddd = $_SESSION["id"];
 $connect = mysqli_connect("localhost", "root", "", "db_web");  
 $output = '';  
 $sql = "SELECT * FROM product_specs WHERE product_id = '$iddd'";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="10%" style="display:none;">Id</th>  
                     <th width="40%">Specification Title</th>  
                     <th width="40%">Description</th>  
                     <th width="10%">Delete</th>  
                </tr>';  
 $rows = mysqli_num_rows($result);
 if($rows > 0)  
 {  
	  if($rows > 10)
	  {
		  $delete_records = $rows - 10;
		  $delete_sql = "DELETE FROM product_specs LIMIT $delete_records";
		  mysqli_query($connect, $delete_sql);
	  }
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td style="display:none;">'.$row["specs_id"].'</td>  
                     <td class="title" data-id1="'.$row["specs_id"].'" contenteditable>'.$row["title"].'</td>  
                     <td class="desc" data-id2="'.$row["specs_id"].'" contenteditable>'.$row["description"].'</td>  
                     <td><button type="button" name="delete_btn" data-id3="'.$row["specs_id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <tdstyle="display:none;"></td>  
                <td id="title" contenteditable></td>  
                <td id="description" contenteditable></td>  
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
      ';  
 }  
 else  
 {  
      $output .= '
				<tr>  
					<tdstyle="display:none;"></td>  
					<td id="title" contenteditable></td>  
					<td id="description" contenteditable></td>  
					<td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
			   </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>