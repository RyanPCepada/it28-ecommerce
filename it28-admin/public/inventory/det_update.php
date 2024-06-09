<?php
// Include config file
require_once "../../db/config.php";

// Define variables and initialize with empty values
$quality = $description = $starting_price = $duration = "";
$quality_err = $description_err = $starting_price_err = $duration_err = "";

// Check existence of id parameter before processing further
if (isset($_GET["details_id"]) && !empty(trim($_GET["details_id"]))) {
    // Get URL parameter
    $details_id = trim($_GET["details_id"]);

    // Prepare a select statement
    $sql = "SELECT * FROM details WHERE details_id = :details_id";

    if ($stmt = $pdo->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":details_id", $details_id);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            if ($stmt->rowCount() == 1) {
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                // Retrieve individual field values
                $quality = $row["quality"];
                $description = $row["description"];
                $starting_price = $row["starting_price"];
                $duration = $row["duration"];
            } else {
                // URL doesn't contain valid id. Redirect to error page
                header("location: ../public/error.php");
                exit();
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    // Close statement
    unset($stmt);
} else {
    // URL doesn't contain id parameter. Redirect to error page
    header("location: ../public/error.php");
    exit();
}

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

    // Validate price
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

    // Check input errors before updating in database
    if (empty($quality_err) && empty($description_err) && empty($price_err) && empty($duration_err)) {
        // Prepare an update statement
        $sql = "UPDATE details SET quality = :quality, description = :description, starting_price = :starting_price, duration = :duration WHERE details_id = :details_id";

        if ($stmt = $pdo->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":quality", $quality);
            $stmt->bindParam(":description", $description);
            $stmt->bindParam(":starting_price", $starting_price);
            $stmt->bindParam(":duration", $duration);
            $stmt->bindParam(":details_id", $details_id);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Records updated successfully. Redirect to landing page
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
    <title>ArsyArts - Update Detail</title>
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
                <h2 class="mt-5">Update Detail</h2>
                <p>Please edit the input values and submit to update the details record.</p>
                <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
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
                    <input type="hidden" name="details_id" value="<?php echo $details_id; ?>"/>
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="../portraits.php" class="btn btn-secondary ml-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
