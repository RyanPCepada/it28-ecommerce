<?php
// Include config file
// require_once $_SERVER['DOCUMENT_ROOT'] . "/it28-ecommerce/it28-admin/db/config.php";
 
    // Include config file
    require_once "../../db/config.php";

// Define variables and initialize with empty values
$title = $description = $price = $img = "";
$title_err = $description_err = $price_err = $img_err = "";
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
               /* Fetch result row as an associative array. Since the result set
               contains only one row, we don't need to use while loop */
               $row = $stmt->fetch(PDO::FETCH_ASSOC);
           
               // Retrieve individual field values
               $title = $row["title"];
               $description = $row["description"];
               $price = $row["price"];
               $img = $row["img"];
           } else{
               // Product ID not found, redirect to error page
               header("location: ../public/error.php");
               exit();
           }
       } else{
           echo "Oops! Something went wrong. Please try again later.";
       }
   }
   
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate title
    $input_title = trim($_POST["title"]);
    if(empty($input_title)){
        $title_err = "Please enter a title.";
    } else{
        $title = $input_title;
    }
    
    // Validate description
    $input_description = trim($_POST["description"]);
    if(empty($input_description)){
        $description_err = "Please enter a description.";     
    } else{
        $description = $input_description;
    }
    
    // Validate price
    $input_price = trim($_POST["price"]);
    if(empty($input_price)){
        $price_err = "Please enter the price amount.";     
    } elseif(!ctype_digit($input_price)){
        $price_err = "Please enter a positive integer value.";
    } else{
        $price = $input_price;
    }
    
    // Validate image
    $input_img = trim($_POST["img"]);
    if(empty($input_img)){
        $img_err = "Please enter the image URL.";     
    } else{
        $img = $input_img;
    }
    
   // Check input errors before updating in database
    if (empty($title_err) && empty($description_err) && empty($price_err) && empty($img_err)) {
    // Prepare an update statement
    $sql = "UPDATE realistic SET title = :title, description = :description, price = :price, img = :img WHERE r_id = :r_id";

    if ($stmt = $pdo->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":price", $price);
        $stmt->bindParam(":img", $img);
        $stmt->bindParam(":r_id", $r_id); // Add parameter for the portrait_id

        // Set the portrait ID
        $r_id = $_POST["r_id"]; // Assuming you have a hidden input field named "r_id" in your form

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
    <title>ArsyArts - Update Portrait</title>
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
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the portrait record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control <?php echo (!empty($title_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $title; ?>">
                            <span class="invalid-feedback"><?php echo $title_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control <?php echo (!empty($description_err)) ? 'is-invalid' : ''; ?>"><?php echo $description; ?></textarea>
                            <span class="invalid-feedback"><?php echo $description_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" name="price" class="form-control <?php echo (!empty($price_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $price; ?>">
                            <span class="invalid-feedback"><?php echo $price_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Image URL</label>
                            <input type="text" name="img" class="form-control <?php echo (!empty($img_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $img; ?>">
                            <span class="invalid-feedback"><?php echo $img_err;?></span>
                        </div>
                        <input type="hidden" name="r_id" value="<?php echo $_GET["r_id"]; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../portraits.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
</div>
</body>
</html>
