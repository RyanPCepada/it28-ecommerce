<?php
// display-purchases.php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "u593341949_db_cepada";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch purchased items from the purchases table
$sql = "SELECT * FROM purchases";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class='card' style='width: 18rem;'>
                <img class='card-img-top' src='" . $row["img"] . "'>
                <div class='card-body'>
                    <h5 class='card-title'>" . $row["title"] . "</h5><br>
                    Price: ₱" . $row["price"] . "<br>
                    <p class='card-text'>" . $row["description"] . "</p>
                    <p class='card-text'><br>Quantity: " . $row["quantity"] . "</p>
                </div>
              </div>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
