<?php


$servername = "avl.cs.unca.edu";
$username = "ewarren1";
$password = "sql4you";
$dbname = "ewarren1DBCSCI481";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

//$idProduct = $_POST['idProduct']; '$idProduct', product_inventory_id,
$product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
$product_price = mysqli_real_escape_string($conn, $_POST['product_price']);
$quanity_in_stock = mysqli_real_escape_string($conn, $_POST['quanity_in_stock']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$product_status= mysqli_real_escape_string($conn, $_POST['product_status']);
if(isset($_REQUEST["destination"])){
    header("Location: {$_REQUEST["destination"]}");
}else if(isset($_SERVER["HTTP_REFERER"])){
    header("Location: {$_SERVER["HTTP_REFERER"]}");
}
$sql = "INSERT INTO Product(`product_name`, `product_price`, `quanity_in_stock`, `product_status`,
`product_description`, `product_inventory_id`)
            VALUES('$product_name', '$product_price', '$quanity_in_stock',
'$product_status', '$description', DEFAULT)";

echo $sql;

if(!mysqli_query($conn, $sql)) {
    echo "An error occured when inserting the product";
    echo("Error description: " . mysqli_error($conn));
} else {
    echo "Product inserted successfully.";
}

mysqli_close($conn);

?>