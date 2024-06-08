<?php
// Process delete operation after confirmation
if(isset($_POST["r_id"]) && !empty($_POST["r_id"])){
    // Include config file
    require_once "../../db/config.php";

    // Prepare a delete statement
    $sql = "DELETE FROM realistic WHERE r_id = :r_id";
    
    if($stmt = $pdo->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":r_id", $param_r_id);
        
        // Set parameters
        $param_r_id = trim($_POST["r_id"]);
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            // Records deleted successfully. Redirect to landing page
            header("location: ../portraits.php");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    unset($stmt);
    
    // Close connection
    unset($pdo);
} else{
    // Check existence of id parameter
    if(empty(trim($_GET["r_id"]))){
        // URL doesn't contain r_id parameter. Redirect to error page
        header("location: ../public/error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArsyArts - Delete Portrait</title>
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
                    <h2 class="mt-5 mb-3">Delete Portrait</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger">
                            <input type="hidden" name="r_id" value="<?php echo trim($_GET["r_id"]); ?>"/>
                            <p>Are you sure you want to delete this portrait?</p>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="../portraits.php" class="btn btn-secondary">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
