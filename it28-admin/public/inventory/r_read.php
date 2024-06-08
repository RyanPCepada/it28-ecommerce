<?php
// Check existence of id parameter before processing further
if(isset($_GET["r_id"]) && !empty(trim($_GET["r_id"]))){
    // Include config file
    // require_once $_SERVER['DOCUMENT_ROOT'] . "/it28-ecommerce/it28-admin/db/config.php";

    // Include config file
    require_once "../../db/config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM realistic WHERE r_id = :r_id";
    
    if($stmt = $pdo->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":r_id", $param_r_id);
        
        // Set parameters
        $param_r_id = trim($_GET["r_id"]);
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            if($stmt->rowCount() == 1){
                // Fetch result row as an associative array
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                // Retrieve individual field values
                $portrait_name = $row["title"];
                $portrait_details = $row["description"];
                $portrait_price = $row["price"];
                $portrait_img = $row["img"];
                $date_added = $row["date_added"];
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
    <title>ArsyArts - View Portrait</title>
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
                    <h1 class="mt-5 mb-3">View Portrait Record</h1>
                    <div class="form-group">
                        <label>Portrait Name</label>
                        <p><b><?php echo htmlspecialchars($portrait_name); ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Portrait Details</label>
                        <p><b><?php echo htmlspecialchars($portrait_details); ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <p><b><?php echo htmlspecialchars($portrait_price); ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <p><b><?php echo htmlspecialchars($portrait_img); ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Date Added</label>
                        <p><b><?php echo htmlspecialchars($date_added); ?></b></p>
                    </div>
                    <p><a href="../portraits.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
