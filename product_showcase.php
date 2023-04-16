<html>
	<head>
	</head>
	<body>
		<div class="alert alert-primary" role="alert">
			Product info
		</div>
		<div class="table-responsive">
			<table id="products_table_id" class="table table-info table-stripe table-hover table-bordered">                     
		        <thead class="thead-dark">
		            <tr>
		              <th>ID</th>
		              <th>Name</th>
		              <th>Description</th>
		              <th>Stock</th>
		              <th>Owner</th>
		            </tr>
		        </thead>
		        <tbody>
					<?php 

						$host = "localhost";
						$user = "root";
						$password = "";
						$db_name = "login";

						$con = mysqli_connect($host, $user, $password, $db_name);

						$sql = "select *from product_info";  
						$result = mysqli_query($con, $sql);  
						//$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
						$count = mysqli_num_rows($result);

						if ($result->num_rows > 0) {
						    while($row = $result->fetch_assoc()) {
						    	if ($row["product_id"] == $_GET['products_id']) {
								        echo '<tr>
						                  <td scope="row">' . $row["product_id"]. '</td>
						                  <td>' . $row["product_name"] .'</td>
						                  <td> '.$row["product_desc"] .'</td>
  						                  <td> '.$row["product_stock"] .'</td>
						                  <td> '.$row["product_owner"] .'</td>
						                </tr>';
						    	}
						    }
						}
						else {
						    //echo "0 results";
						} 
					?>
		       </tbody>
			</table>
		</div>

	</body>
</html>