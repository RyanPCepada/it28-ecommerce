<!-- <php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}
?> -->
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArsyArts - Portraits</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body{ font: 14px sans-serif; text-align: center; }
     
        table tr td:last-child{
            width: 120px;
        }
    </style>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button><img src="icons/ARSYARTS_LOGO.png"
        height="40" class="d-inline-block align-top" alt="">
  <a class="navbar-brand" href="dashboard.php"> Admin</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php">Dashboard </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="portraits.php">Portraits<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="customers.php">Customers</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
     <!--<a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>-->
        <a href="../public/user/logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    </form>
  </div>
</nav>
<body>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Semi-Hyperrealistic Portraits</h2>
                        <a href="./inventory/shr_create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Add New Portrait</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "../db/config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM semi_hyperrealistic";
                    if($result = $pdo->query($sql)){
                        $totalRows = $result->rowCount();

                        if($result->rowCount() > 0){
                            // Define the table template
                            $tableTemplate = '
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th> <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                            </th>
                                            <th class="text-center" colspan="8"><h6>Showing ' . $totalRows . ' / ' . $totalRows . ' Records</h6></th>

                                            </tr>
                                        </thead>                               
                                    </table>
                                
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Quality</th>
                                                <th>Description</th>
                                                <th>Price</th>
                                                <th>Image</th>
                                                <th>Date Added</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{rows}}
                                        </tbody>
                                    </table>
                    
                            ';
                    
                            // Define the row template
                            $rowTemplate = '
                                <tr>
                                    <td>{{shr_id}}</td>
                                    <td>{{title}}</td>
                                    <td>{{description}}</td>
                                    <td>{{price}}</td>
                                    <td>{{img}}</td>
                                    <td>{{date_added}}</td>
                                    <td>
                                        <a href="../public/inventory/shr_read.php?shr_id={{shr_id}}" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>
                                        <a href="../public/inventory/shr_update.php?shr_id={{shr_id}}" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>
                                        <a href="../public/inventory/shr_delete.php?shr_id={{shr_id}}" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>
                                    </td>
                                </tr>
                            ';
                    
                            // Populate the rows using the row template
                            $rows = '';
                            while ($row = $result->fetch()) {
                                $rowHtml = str_replace(
                                    array('{{shr_id}}', '{{title}}', '{{description}}', '{{price}}', '{{img}}', '{{date_added}}'),
                                    array($row['shr_id'], $row['title'], $row['description'], $row['price'], $row['img'], $row['date_added']),
                                    $rowTemplate
                                );
                                $rows .= $rowHtml;
                            }
                    
                            // Replace the rows placeholder in the table template with the actual rows
                            echo str_replace('{{rows}}', $rows, $tableTemplate);
                            
                            // Free result set
                            unset($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                    
                    ?>
                </div>
            </div>        
        </div>





        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Realistic Portraits</h2>
                        <a href="./inventory/r_create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Add New Portrait</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "../db/config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM realistic";
                    if($result = $pdo->query($sql)){
                        $totalRows = $result->rowCount();

                        if($result->rowCount() > 0){
                            // Define the table template
                            $tableTemplate = '
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th> <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                            </th>
                                            <th class="text-center" colspan="8"><h6>Showing ' . $totalRows . ' / ' . $totalRows . ' Records</h6></th>

                                            </tr>
                                        </thead>                               
                                    </table>
                                
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Quality</th>
                                                <th>Description</th>
                                                <th>Price</th>
                                                <th>Image</th>
                                                <th>Date Added</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{rows}}
                                        </tbody>
                                    </table>
                    
                            ';
                    
                            // Define the row template
                            $rowTemplate = '
                                <tr>
                                    <td>{{r_id}}</td>
                                    <td>{{title}}</td>
                                    <td>{{description}}</td>
                                    <td>{{price}}</td>
                                    <td>{{img}}</td>
                                    <td>{{date_added}}</td>
                                    <td>
                                        <a href="../public/inventory/r_read.php?r_id={{r_id}}" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>
                                        <a href="../public/inventory/r_update.php?r_id={{r_id}}" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>
                                        <a href="../public/inventory/r_delete.php?r_id={{r_id}}" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>
                                    </td>
                                </tr>
                            ';
                    
                            // Populate the rows using the row template
                            $rows = '';
                            while ($row = $result->fetch()) {
                                $rowHtml = str_replace(
                                    array('{{r_id}}', '{{title}}', '{{description}}', '{{price}}', '{{img}}', '{{date_added}}'),
                                    array($row['r_id'], $row['title'], $row['description'], $row['price'], $row['img'], $row['date_added']),
                                    $rowTemplate
                                );
                                $rows .= $rowHtml;
                            }
                    
                            // Replace the rows placeholder in the table template with the actual rows
                            echo str_replace('{{rows}}', $rows, $tableTemplate);
                            
                            // Free result set
                            unset($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                    
                    ?>
                </div>
            </div>        
        </div>






        <!-- Add this code after the Realistic Portraits table -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Portrait Quality Details</h2>
                        <a href="./inventory/det_create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Add New Quality</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "../db/config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM details";
                    if($result = $pdo->query($sql)){
                        $totalRows = $result->rowCount();

                        if($result->rowCount() > 0){
                            // Define the table template
                            $tableTemplate = '
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th> <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                            </th>
                                            <th class="text-center" colspan="8"><h6>Showing ' . $totalRows . ' / ' . $totalRows . ' Records</h6></th>

                                            </tr>
                                        </thead>                               
                                    </table>
                                
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Quality</th>
                                                <th>Description</th>
                                                <th>Starting Price</th>
                                                <th>Duration</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{rows}}
                                        </tbody>
                                    </table>
                    
                            ';
                    
                            // Define the row template
                            $rowTemplate = '
                                <tr>
                                    <td>{{details_id}}</td>
                                    <td>{{quality}}</td>
                                    <td>{{description}}</td>
                                    <td>{{starting_price}}</td>
                                    <td>{{duration}}</td>
                                    <td>
                                        <a href="../public/inventory/det_read.php?details_id={{details_id}}" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>
                                        <a href="../public/inventory/det_update.php?details_id={{details_id}}" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>
                                        <a href="../public/inventory/det_delete.php?details_id={{details_id}}" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>
                                    </td>
                                </tr>
                            ';
                    
                            // Populate the rows using the row template
                            $rows = '';
                            while ($row = $result->fetch()) {
                                $rowHtml = str_replace(
                                    array('{{details_id}}', '{{quality}}', '{{description}}', '{{starting_price}}', '{{duration}}'),
                                    array($row['details_id'], $row['quality'], $row['description'], $row['starting_price'], $row['duration']),
                                    $rowTemplate
                                );
                                $rows .= $rowHtml;
                            }
                    
                            // Replace the rows placeholder in the table template with the actual rows
                            echo str_replace('{{rows}}', $rows, $tableTemplate);
                            
                            // Free result set
                            unset($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                    
                    ?>
                </div>
            </div>        
        </div>




    </div>

</body>
</html>
