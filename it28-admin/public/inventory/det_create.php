<?php
// Include config file
require_once "../../db/config.php";

// Define variables and initialize with empty values
$quality = $description = $starting_price = $duration = "";
$quality_err = $description_err = $starting_price_err = $duration_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate quality
    $input_quality = trim($_POST["quality"]);
    if (empty($input_quality)) {
        $quality_err = "Please enter the quality.";
    } else {
        $quality = $input_quality;
    }

    // Validate description
    $input_description = trim($_POST["description"]);
    if (empty($input_description)) {
        $description_err = "Please enter a description.";
    } else {
        $description = $input_description;
    }

    // Validate starting_price
    $input_starting_price = trim($_POST["starting_price"]);
    if (empty($input_starting_price)) {
        $starting_price_err = "Please enter the starting price.";
    } elseif (!is_numeric($input_starting_price)) {
        $starting_price_err = "Please enter a valid starting price.";
    } else {
        $starting_price = $input_starting_price;
    }

    // Validate duration
    $input_duration = trim($_POST["duration"]);
    if (empty($input_duration)) {
        $duration_err = "Please enter the duration.";
    } else {
        $duration = $input_duration;
    }

    // Check input errors before inserting in database
    if (empty($description_err) && empty($quality_err) && empty($price_err) && empty($duration_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO details (quality, description, starting_price, duration) VALUES (:quality, :description, :starting_price, :duration)";

        if ($stmt = $pdo->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":quality", $quality);
            $stmt->bindParam(":description", $description);
            $stmt->bindParam(":starting_price", $starting_price);
            $stmt->bindParam(":duration", $duration);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Records created successfully. Redirect to landing page
                header("location: ../portraits.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        unset($stmt);
    }

    // Close connection
    unset($pdo);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArsyArts - Add Detail</title>
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
                <h2 class="mt-5">Add Portrait Quality Detail</h2>
                <p>Please fill this form and submit to add a new detail to the database.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label>Quality</label>
                        <input type="text" name="quality" class="form-control <?php echo (!empty($quality_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $quality; ?>">
                        <span class="invalid-feedback"><?php echo $quality_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control <?php echo (!empty($description_err)) ? 'is-invalid' : ''; ?>"><?php echo $description; ?></textarea>
                        <span class="invalid-feedback"><?php echo $description_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Starting Price</label>
                        <input type="text" name="starting_price" class="form-control <?php echo (!empty($starting_price_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $starting_price; ?>">
                        <span class="invalid-feedback"><?php echo $starting_price_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Duration</label>
                        <input type="text" name="duration" class="form-control <?php echo (!empty($duration_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $duration; ?>">
                        <span class="invalid-feedback"><?php echo $duration_err; ?></span>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="../portraits.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
