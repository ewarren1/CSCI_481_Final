<!DOCTYPE html>
<html lang="en">
<head>
<title>FOSPOS</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style>
/* Remove the navbar's default rounded borders and increase the bottom margin */
.navbar {
	margin-bottom: 50px;
	border-radius: 0;
}

/* Remove the jumbotron's default bottom margin */
.jumbotron {
	margin-bottom: 0;
}

form {
 margin: 0;
}

/* Add a gray background color and some padding to the footer */
footer {
	background-color: #f2f2f2;
	padding: 25px;
}
</style>
</head>
<body>

	<div class="jumbotron">
		<div class="container text-center">
			<h1>Welcome</h1>
			<p>FOSPOS</p>
		</div>
	</div>

	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target="#myNavbar">
					<span class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>

			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li class="active"><a href="index.php">Home</a></li>
                    <li class="active"><a href="SalesPage.php">Sales</a></li>
                    <li class="active"><a href="Customer.php">Customers</a></li>
                    <li class="active"><a href="Reports.php">Products</a></li>
				</ul>
			</div>
		</div>
	</nav>
	
	<div class="container">
  <h2>Item List</h2>
  <table class="table table-bordered">
    <tr>
		<th>ID</th>
		<th>Name</th>
		<th>Quantity</th>
		<th>Price</th>
	</tr>
	
	<?php
	
			$servername = "avl.cs.unca.edu";
			$username = "ewarren1";
			$password = "sql4you";
			$dbname = "ewarren1DBCSCI481";
			
			// Create connection
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			
			$sql = "SELECT product_inventory_id, product_name, product_price, quanity_in_stock FROM Product";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
			        echo "<tr><td>" . $row["product_inventory_id"]. "</td><td>" . $row["product_name"]. "</td><td>" . $row["quanity_in_stock"]. "</td><td>". $row["product_price"]. "</td></tr>";
			    }
			    echo "</table>";
			} else {
			    echo "0 Results";
			}
			
		//	$conn->close();
			
			?>
  </table>
</div><br></br>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
        <footer class="container-fluid text-center">
          <p>FOSPOS Evan Warren UNCA </p>  
        </footer>
    

<script src="javascript/pie_chart.js"></script>


</body>
</html>
