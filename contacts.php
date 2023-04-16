<html>
	<head>
	</head>
	<body>
		<div class="table-responsive">
			<table id="contacts_table" class="table table-info table-stripe table-hover table-bordered">                     
		        <thead class="thead-dark">
		            <tr>
		              <th>Username</th>
		              <th>Password</th>
		              <th>Role</th>
		            </tr>
		        </thead>
		        <tbody>
					<?php 

						$host = "localhost";
						$user = "root";
						$password = "";
						$db_name = "login";

						$con = mysqli_connect($host, $user, $password, $db_name);

						$sql = "select *from login_info";  
						$result = mysqli_query($con, $sql);  
						//$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
						$count = mysqli_num_rows($result);

						if ($result->num_rows > 0) {
						    while($row = $result->fetch_assoc()) {
						        echo '<tr>
						                  <td scope="row">' . $row["username"]. '</td>
						                  <td>' . $row["password"] .'</td>
						                  <td> '.$row["role"] .'</td>
						                </tr>';
						    }
						}
						else {
						    echo "0 results";
						} 
					?>
		       </tbody>
			</table>
		</div>

		<script>
		$('#contacts_table').DataTable();
		</script>
		
	</body>
</html>

