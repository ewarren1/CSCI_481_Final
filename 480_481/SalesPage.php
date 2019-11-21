
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


	<div class="d-flex justify-content-center align-items-center container ">  
   	<div class="row ">	
   	<h2>Sales Form </h2>
        <form method = "post" action="scripts/salesscript.php">
        	<div class="form-group">
          		<label for="customer_ID">Customer ID:</label>
          		<input type="number" class="form-control" name="customer_ID">
        	</div>
            <div class="form-group">
              <label for="productID">Product ID:</label>
              <input type="number" class="form-control" name="productID">
            </div>
            <div class="form-group">
          		<label for="amountSold">Amount Sold:</label>
          		<input type="number" class="form-control" name="amountSold">
        	</div>
            <div class="form-group">
              <label for="address">Order Date:</label>
              <input type="date" class="form-control" name="dateOfOrder">
            </div>
            <div class="input-group mb-3">
            	  <div class="input-group-append">
                    <label class="input-group-text" for="paymentSelect">Payment Options</label>
                  </div>
                      <select class="custom-select" name="paymentSelect">
                        <option selected>Choose...</option>
                        <option value="1">Cash</option>
                        <option value="2">Check</option>
                        <option value="3">No Credit/Debit</option>
                      </select>
            </div>	
        	<div class="form-group">
          		<label for="total">Total:</label>
          		<input type="double" class="form-control" name="total">
        	</div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>   
	</div>
</div>
	
	<footer class="container-fluid text-center">
		<p>FOSPOS Evan Warren UNCA</p>
	</footer>
	
	<br></br>

</body>
</html>

