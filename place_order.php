<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArsyArts - Place Order</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #18191A;
            /* Dark background similar to Facebook */
            color: #E4E6EB;
            /* Light text color for contrast */
        }

        /* Add custom styles for dark toggle button */
        .navbar-toggler {
            border-color: #666 !important;
            /* Dark border */
            background-color: #333 !important;
            /* Dark background */
        }
        
        /* Add custom styles for the toggle button icon */
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3e%3cpath stroke='rgba(255, 255, 255, 0.5)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e") !important;
            /* Light toggle button icon */
        }

        .divider1 {
            height: 7px;
            background-color: black;
            /* Dark gray */
            margin-top: 0px;
            /* Adjust margin as needed */
            margin-bottom: 0px;
            /* Adjust margin as needed */
        }

        .divider2 {
            height: 7px;
            background-color: black; /* Dark gray */
            margin-top: 20px; /* Adjust margin as needed */
            margin-bottom: 20px; /* Adjust margin as needed */
        }

        .divider3 {
            height: 7px;
            background-color: black; /* Dark gray */
            margin-top: 20px; /* Adjust margin as needed */
            margin-bottom: 0px; /* Adjust margin as needed */
        }

        /* Add custom styles for dark input fields */
        input[type="text"],
        input[type="number"],
        input[type="date"],
        select.form-control {
            background-color: #333 !important;
            /* Dark background */
            color: #fff !important;
            /* Light text */
            border-color: #666 !important;
            /* Dark border */
        }

        .cancel-arrow {
            align-self: left;
            margin-left: -45%;
        }
        .address {
    display: none;
}

    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <a class="navbar-brand text-light" href="#">
        <img src="icons/ARSYARTS_LOGO.png" height="40" class="d-inline-block align-top" alt="">
        <strong>ArsyArts</strong>
    </a>
    <button class="btn text-light d-lg-none">
        <i class="fas fa-shopping-cart" style="font-size: 30px;"></i>
        <span id="cartCountMobile" class="badge badge-pill badge-warning">0</span>
    </button>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item active">
                <a class="nav-link text-light" href="home.php">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link text-light" href="purchases.php">Purchases</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
        </form>
        <li class="nav-item">
            <a class="nav-link text-light" href="logout.php">Log out</a>
        </li>
    </div>
</nav>

<div class="divider1"></div>

<button type="button" class="btn btn-transparent cancel-arrow btn-block text-light" onclick="window.history.back();">
    <i class="fas fa-arrow-left"></i>
</button>


<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">

            <?php
                $type = isset($_GET['type']) ? $_GET['type'] : '';
            ?>

            <div class="row text-center align-items-center justify-content-center">
                <img src="icons/ICON_ORDER.gif" style="position: absolute; width: .8in; margin-left: 0px; margin-top: -69px;" alt="Order Icon">
            </div>

            <h2 class="text-center mb-4">Place Your Order<br><small class="text-center mb-4 text-muted" style="font-size: 16px; margin-top: -10px;"><?php echo $type; ?></small></h2>
            
            <form>
                <div class="form-group">
                    <label for="uploadReference">Upload Reference Photo:</label>
                    <small id="referenceHelp" class="form-text text-muted" style="margin-top: -10px;">Reference must be clear and not blurry.</small>
                    <img id="uploadedImage" class="mt-3" style="display: none; max-width: 100%;">
                    <input type="file" class="form-control-file" id="uploadReference" onchange="displayImage(this)" style="margin-top: 5px;">
                </div>
                <hr style="border-top: 1px solid gray;">
                <div class="form-group">
                    <label for="quantity">Heads:</label>
                    <input type="number" class="form-control" id="quantity" value="1">
                </div>
                <div class="form-group">
                    <label for="portraitSize">Size:</label>
                    <select class="form-control" id="portraitSize">
                        <option>A4</option>
                        <option>9"x12"</option>
                        <option>10"x13"</option>
                        <option>A3</option>
                        <option>A2</option>
                        <option>1 whole</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="portraitSize">Orientation:</label>
                    <select class="form-control" id="portraitOrientation">
                        <option>Portrait</option>
                        <option>Landscape</option>
                        <option>45&#176; Portrait</option>
                        <option>45&#176; Landscape</option>
                        <option>135&#176; Portrait</option>
                        <option>135&#176; Landscape</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="portraitSize">Paper/Board:</label>
                    <select class="form-control" id="portraitPaperOrBoard">
                        <option>Ordinary Paper</option>
                        <option>Oslo paper</option>
                        <option>Canson Paper (recommended)</option>
                        <option>Berkeley Board</option>
                        <option>Kelly Board</option>
                        <option>Ordinary Board</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="portraitSize">Pencil:</label>
                    <select class="form-control" id="portraitPencil">
                        <option>Graphite</option>
                        <option>Charcoal</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="portraitType">Portrait Type:</label>
                    <select class="form-control" id="portraitType">
                        <option>Head-to-shoulder</option>
                        <option>Half-body</option>
                        <option>Head-to-knee</option>
                        <option>Whole-body</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Include Background?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="includeBackground" id="backgroundYes" value="Yes">
                        <label class="form-check-label" for="backgroundYes">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="includeBackground" id="backgroundNo" value="No">
                        <label class="form-check-label" for="backgroundNo">
                            No
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="deadline">Deadline:</label>
                    <input type="date" class="form-control" id="deadline">
                </div>
                <div class="form-group">
                    <label for="paymentOption">Payment:</label>
                    <select class="form-control" id="paymentOption">
                        <option>Meet-up</option>
                        <option>Gcash</option>
                        <option>Palawan</option>
                        <option>Maya</option>
                        <option>Paypal</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pickupOption">Receiving Option:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="deliveryOption" id="pickup" value="pickup">
                        <label class="form-check-label" for="pickup">
                            Pick-up
                            <small class="form-text text-muted" id="addressText" style="display: none;">  |   Zone 2, Dicklum, Manolo, Fortich, Bukidnon</small>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="deliveryOption" id="delivery" value="delivery">
                        <label class="form-check-label" for="delivery" style="display: inline;">
                            Delivery
                            <input type="text" class="form-control" id="deliveryAddress" name="deliveryAddress" style="display: none; width: block; height: auto;" placeholder="Provide a delivery address here...">
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="portraitName">Please leave a portrait name:</label>
                    <input type="text" class="form-control" id="portraitName" required>
                </div>
                
                <hr style="border-top: 1px solid gray;">
                
                <button type="button" class="btn btn-success submit-button btn-block" onclick="submitOrder()">Place Order</button>
                <button type="button" class="btn btn-transparent cancel-button btn-block text-light" onclick="window.history.back();">Cancel</button>
                
            </form>
        </div>
    </div>
</div>

<div class="divider3"></div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    function displayImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('uploadedImage').src = e.target.result;
                document.getElementById('uploadedImage').style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function submitOrder() {
        // Show confirmation dialog
        var confirmed = confirm("Kadjot lang jud ha kay wala pani nahuman akong website. Natulog pa ang nagbuhat, salamat mwah!");
            
        // If confirmed, redirect to home.php
        if (confirmed) {
            window.location.href = "home.php";
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        const pickupOption = document.getElementById("pickup");
        const deliveryOption = document.getElementById("delivery");
        const addressText = document.getElementById("addressText");
        const deliveryAddress = document.getElementById("deliveryAddress");

        pickupOption.addEventListener("change", function() {
            if (this.checked) {
                addressText.style.display = "inline";
                deliveryAddress.style.display = "none";
            } else {
                addressText.style.display = "none";
            }
        });

        deliveryOption.addEventListener("change", function() {
            if (this.checked) {
                deliveryAddress.style.display = "inline";
                addressText.style.display = "none";
            } else {
                deliveryAddress.style.display = "none";
            }
        });
    });

</script>


</body>
</html>
