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

<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
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
.form-group{
    width: 25%;
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
	
	
	
<div class="d-flex justify-content-right align-items-right container" >
      <h2>Customer Look-up Table</h2>
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for first names..">
      
          <table id="myTable"class="table table-bordered" style="height:80px; overflow: auto">
          	
            <tr>
        		<th>Customer ID</th>
        		<th>First Name</th>
        		<th>Last Name</th>
        	</tr>
	
	<?php
	
			$servername = "avl.cs.unca.edu";
			$username = "ewarren1";
			$password = "sql4you";
			$dbname = "ewarren1DBCSCI481";
			
			// Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
			
			$sql = "SELECT customer_id, customer_first_name, customer_last_name FROM Customer";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
			        echo "<tr><td>" . $row["customer_id"]. "</td><td>" . $row["customer_first_name"]. "</td><td>" . $row["customer_last_name"]. "</td></tr>";
			    }
			    echo "</table>";
			} else {
			    echo "0 Results";
			}
			
			
	?>
  </table>
</div><br></br>	
<div class="d-flex justify-content-center align-items-center container ">  
   	<div class="col ">	
   	<h2>Customer Form </h2>
        <form method = "post" action="scripts/customerscript.php">
        	<div class="form-group">
          		<label for="first">First:</label>
          		<input type="text" class="form-control" name="customer_first">
        	</div>
            <div class="form-group">
              <label for="middle">Middle:</label>
              <input type="text" class="form-control" name="customer_middle">
            </div>
            <div class="form-group">
          		<label for="last">Last:</label>
          		<input type="text" class="form-control" name="customer_last">
        	</div>
            <div class="form-group">
              <label for="address">Address:</label>
              <input type="text" class="form-control" name="customer_address">
            </div>
            <div class="form-group">
          		<label for="ZIP">ZIP:</label>
          		<input type="number" class="form-control" name="customer_ZIP">
        	</div>
            <div class="form-group">
          		<label for="state">State:</label>
          		<input type="text" class="form-control" name="customer_state">
        	</div>
            <div class="form-group">
              <label for="phoneNumber">Phone Number:</label>
              <input type="text" class="form-control" name="customer_phoneNumber">
            </div>
            <div class="form-group">
          		<label for="cellNumber">Cell Number</label>
          		<input type="text" class="form-control" name="customer_cellNumber">
        	</div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>   
	</div>
</div>	
	
	<div class="d-flex justify-content-center align-items-center container ">  
   	<div class="col ">	
   	<h2>Customer Update Form </h2>
        <form method = "post" action="scripts/customerupdate.php">
        	<div class="form-group">
          		<label for="customerID">Customer ID</label>
          		<input type="number" class="form-control" name="customer_ID">
        	</div>
        	<div class="form-group">
          		<label for="first">First:</label>
          		<input type="text" class="form-control" name="customer_first">
        	</div>
            <div class="form-group">
              <label for="middle">Middle:</label>
              <input type="text" class="form-control" name="customer_middle">
            </div>
            <div class="form-group">
          		<label for="last">Last:</label>
          		<input type="text" class="form-control" name="customer_last">
        	</div>
            <div class="form-group">
              <label for="address">Address:</label>
              <input type="text" class="form-control" name="customer_address">
            </div>
            <div class="form-group">
          		<label for="ZIP">ZIP:</label>
          		<input type="number" class="form-control" name="customer_ZIP">
        	</div>
            <div class="form-group">
          		<label for="state">State:</label>
          		<input type="text" class="form-control" name="customer_state">
        	</div>
            <div class="form-group">
              <label for="phoneNumber">Phone Number:</label>
              <input type="text" class="form-control" name="customer_phoneNumber">
            </div>
            <div class="form-group">
          		<label for="cellNumber">Cell Number</label>
          		<input type="text" class="form-control" name="customer_cellNumber">
        	</div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>   
	</div>
</div>	
	
	
	
	
	
	
	
	<footer class="container-fluid text-center">
  <p>FOSPOS Evan Warren UNCA </p>  
</footer>

</body>
</html>
