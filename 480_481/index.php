<!DOCTYPE html>
<html lang="en">
<head>
  <title>FOSPOS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
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
   	<div class="column">	
   	<h2>New Inventory Form</h2>
        <form method = "post" action="scripts/insertproduct.php" >
       <input type="hidden" name="destination" value="<?php echo $_SERVER["REQUEST_URI"]; ?>"/>   	
        	<div class="form-group">
          		<label for="product_name">Product Name:</label>
          		<input type="text" class="form-control" name="product_name">
        	</div>
            <div class="form-group">
              <label for="product_price">Product Price:</label>
              <input type="number" placeholder="1.00" step="0.01" 
              min="0" max="1000000" class="form-control" name="product_price">
            </div>
            <div class="form-group">
          		<label for="quanity_in_stock">Quanity:</label>
          		<input type="number" class="form-control" name="quanity_in_stock">
        	</div>
            <div class="form-group">
              <label for="product_description">Description:</label>
              <input type="text" class="form-control" name="description">
            </div>
            <div class="form-group">
              <label for="product_status">Status:</label>
              <input type="text" class="form-control" name="product_status">
            </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>   
	</div>
</div>

<div class="d-flex justify-content-center align-items-center container ">  
   	<div class="column">	
   	<h2>Update Inventory Form</h2>
        <form method = "post" action="scripts/updateproduct.php" >
          <input type="hidden" name="destination" value="<?php echo $_SERVER["REQUEST_URI"]; ?>"/> 
        	<div class="form-group">
          		<label for="productID">Product ID:</label>
          		<input type="number" class="form-control" name="productID">
        	</div>
        	<div class="form-group">
          		<label for="product_name">Product Name:</label>
          		<input type="text" class="form-control" name="product_name">
        	</div>
            <div class="form-group">
              <label for="product_price">Product Price:</label>
              <input type="number" placeholder="1.00" step="0.01" 
              min="0" max="1000000" class="form-control" name="product_price">
            </div>
            <div class="form-group">
          		<label for="quanity_in_stock">Quanity:</label>
          		<input type="number" class="form-control" name="quanity_in_stock">
        	</div>
            <div class="form-group">
              <label for="product_description">Description:</label>
              <input type="text" class="form-control" name="description">
            </div>
            <div class="form-group">
              <label for="product_status">Status:</label>
              <input type="text" class="form-control" name="product_status">
            </div>
          <button type="submit" class="btn btn-primary">Update</button>
        </form>   
	</div>
</div>

<footer class="container-fluid text-center">
  <p>FOSPOS Evan Warren UNCA </p>  
</footer>

</body>
</html>
