<?php



$servername = "avl.cs.unca.edu";
$username = "ewarren1";
$password = "sql4you";
$dbname = "ewarren1DBCSCI481";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

$first = mysqli_real_escape_string($conn, $_POST['customer_first']); 
$middle = mysqli_real_escape_string($conn, $_POST['customer_middle']);
$last = mysqli_real_escape_string($conn, $_POST['customer_last']);
$address = mysqli_real_escape_string($conn, $_POST['customer_address']);
$ZIP = mysqli_real_escape_string($conn, $_POST['customer_ZIP']);
$state= mysqli_real_escape_string($conn, $_POST['customer_state']);
$phoneNumber= mysqli_real_escape_string($conn, $_POST['customer_phoneNumber']);
$cellNumber= mysqli_real_escape_string($conn, $_POST['customer_cellNumber']);

if(isset($_REQUEST["destination"])){
    header("Location: {$_REQUEST["destination"]}");
}else if(isset($_SERVER["HTTP_REFERER"])){
    header("Location: {$_SERVER["HTTP_REFERER"]}");
}

$sql = "INSERT INTO Customer(customer_first_name, customer_middle_name, customer_last_name, customer_address
, customer_ZIP, customer_State, customer_phone_num, customer_cell_phone, customer_id)
                 VALUES('$first', '$middle', '$last',
'$address', '$ZIP', '$state','$phoneNumber','$cellNumber', null)";

if(!mysqli_query($conn, $sql)) {
    echo "An error occured when inserting the product";
    echo("Error description: " .mysqli_error($conn));
} else {
    echo "Customer inserted successfully.";
}

mysqli_close($conn);

?>