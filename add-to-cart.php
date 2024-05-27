<?php
// add-to-cart.php
header('Content-Type: application/json');

// Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "it28-ecommerce";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Connection failed: " . $conn->connect_error]));
}

// Get the product details from the POST request
$product_id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$price = $_POST['price'];
$rrp = $_POST['rrp'];
$quantity = $_POST['quantity'];
$img = $_POST['img'];
$date_added = date('Y-m-d H:i:s');

// Insert the product into the purchases table
$sql = "INSERT INTO purchases (id, title, description, price, rrp, quantity, img, date_added) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("issddiss", $product_id, $title, $description, $price, $rrp, $quantity, $img, $date_added);


if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Product added to purchases"]);
} else {
    echo json_encode(["status" => "error", "message" => "Error: " . $stmt->error]);
}

$stmt->close();
$conn->close();
?>
