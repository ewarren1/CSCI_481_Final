<?php




$servername = "avl.cs.unca.edu";
$username = "ewarren1";
$password = "sql4you";
$dbname = "ewarren1DBCSCI481";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);


$customer_ID = mysqli_real_escape_string($conn, $_POST['customer_ID']);
$productID = mysqli_real_escape_string($conn, $_POST['productID']);
$amountSold = mysqli_real_escape_string($conn, $_POST['amountSold']);
$dateOfOrder = mysqli_real_escape_string($conn, $_POST['dateOfOrder']);
$paymentSelect= mysqli_real_escape_string($conn, $_POST['paymentSelect']);
$total= mysqli_real_escape_string($conn, $_POST['total']);
//order_ID, order_Quantity, order_date, Customer_customer_id, Payment_Type_idPayment_Type, order_Total_Cost, Product_product_inventory_id
$sql = "INSERT INTO ewarren1DBCSCI481.Order(`order_ID`, `order_Quantity`, `order_date`, `Customer_customer_id`, `Payment_Type_idPayment_Type`, `order_Total_Cost`, `Product_product_inventory_id`)
                VALUES (DEFAULT, '$amountSold', '$dateOfOrder', '$customer_ID', '$paymentSelect', '$total', '$productID')";

if(isset($_REQUEST["destination"])){
    header("Location: {$_REQUEST["destination"]}");
}else if(isset($_SERVER["HTTP_REFERER"])){
    header("Location: {$_SERVER["HTTP_REFERER"]}");
}

mysqli_query($conn, $sql);
//if(!mysqli_errno($conn) !=0 ) {
//    echo "An error occured when inserting the product";
//    echo("Error description: " . mysqli_error($conn));
//} else {
//    echo "Product inserted successfully.";
//}

mysqli_close($conn);


?>