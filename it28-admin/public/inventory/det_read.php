<?php
// Check existence of id parameter before processing further
if(isset($_GET["details_id"]) && !empty(trim($_GET["details_id"]))){
    // Include config file
    require_once "../../db/config.php";

    // Prepare a select statement
    $sql = "SELECT * FROM details WHERE details_id = :details_id";
    
    if($stmt = $pdo->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":details_id", $param_details_id);
        
        // Set parameters
        $param_details_id = trim($_GET["details_id"]);
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            if($stmt->rowCount() == 1){
                // Fetch result row as an associative array
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                // Retrieve individual field values
                $quality = $row["quality"];
                $description = $row["description"];
                $price = $row["price"];
                $duration = $row["duration"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: ../public/error.php");
                exit();
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    unset($stmt);
    
    // Close connection
    unset($pdo);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: ../public/error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArsyArts - View Detail</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 15px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">View Detail Record</h1>
                    <div class="form-group">
                        <label>Quality</label>
                        <p><b><?php echo htmlspecialchars($quality); ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <p><b><?php echo htmlspecialchars($description); ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <p><b><?php echo htmlspecialchars($price); ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Duration</label>
                        <p><b><?php echo htmlspecialchars($duration); ?></b></p>
                    </div>
                    <p><a href="../portraits.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
