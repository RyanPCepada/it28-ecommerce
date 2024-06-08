<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArsyArts - Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome CSS -->
    <style>
        /* Define a class for the grid */
        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); /* Responsive grid with minimum item width of 250px */
            gap: 10px; /* Gap between grid items */
            padding: 20px; /* Add padding around the grid container */
            width: 100%; /* Set width to 100% */
        }

        /* Style for individual cards */
        .card {
            width: 100% !important; /* Ensure cards take full width of their container */
            transition: transform 0.3s ease, box-shadow 0.3s ease; /* Add smooth transitions */
            background-color: #d5ffd7;
        }

        .card:hover {
            background-color: rgb(185, 243, 186);
            transform: translateY(-10px); /* Move the card up when hovered */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Add shadow effect */
        }

        .card-img-top {
            width: 100%; /* Ensure the image fills its container */
            height: auto; /* Maintain aspect ratio */
            object-fit: cover; /* Ensure the image covers the entire container */
        }

        /* Full width for purchased items section */
        #purchased {
            width: 100%; /* Full width */
            position: relative; /* Not fixed */
            top: 0; /* Reset top */
            right: 0; /* Reset right */
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 10px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 999;
            margin-top: 20px; /* Adjust as needed */
            overflow-y: auto; /* Enable vertical scrollbar */
            /*max-height: 400px;  Limit max height */
        }

        /* Style for the "Buy now" button */
        .btn-buy-now {
            margin-top: 10px;
            margin-top: auto;
        }
    </style>
</head>


<nav class="navbar navbar-expand-lg navbar-light bg-success">
    <a class="navbar-brand text-light" href="#">
        <img src="icons/ARSYARTS_LOGO.png"
            height="40" class="d-inline-block align-top" alt="">
        <strong>ArsyArts</strong>
    </a>
    <!-- Cart button for mobile mode -->
    <button class="btn text-light d-lg-none" data-toggle="modal" data-target="#cartModal">
        <i class="fas fa-shopping-cart" style="font-size: 30px;"></i>
        <span id="cartCountMobile" class="badge badge-pill badge-warning">0</span> <!-- Cart count badge for mobile -->
    </button>
    <!-- Hamburger menu for mobile mode -->
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
            <!-- Cart button for windows mode -->
            <li class="nav-item d-none d-lg-block">
                <button class="btn text-light" data-toggle="modal" data-target="#cartModal">
                    <i class="fas fa-shopping-cart" style="font-size: 30px;"></i>
                    <span id="cartCountDesktop" class="badge badge-pill badge-warning">0</span> <!-- Cart count badge for desktop -->
                </button>
            </li>
        </ul>
        <!-- Search form for windows mode -->
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
        </form>
        <li class="nav-item">
            <a class="nav-link text-light" href="logout.php">Log out</a>
        </li>
    </div>
</nav>



<body>

    <h4 class="section-label text-dark" style="display: inline-block; background-color: lightgray; border: solid 0px gray; border-radius: 5px; padding: 10px; margin-top: 20px; margin-left: 20px; margin-bottom: 0px;">
        Semi-Hyperrealistic <i class="fas fa-paint-brush"></i>
    </h4>
    <div id="semiHyperrealisticPortraits" class="card-grid"></div>
    <h4 class="section-label text-secondary" style="display: inline-block; background-color: lightgray; border: solid 0px gray; border-radius: 5px; padding: 10px; margin-top: 20px; margin-left: 20px; margin-bottom: 0px;">
        Realistic <i class="fas fa-paint-brush"></i>
    </h4>
    <div id="realisticPortraits" class="card-grid"></div>

    <!-- Cart Modal -->
    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalLabel">Cart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="cartContents">
                    <!-- Cart items will be displayed here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="checkout()">Buy now</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add these scripts at the end of the body tag for better performance -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
    <script>
        // Fetch data from the semi_hyperrealistic table
        fetch('./portraits/shr-portraits-api.php')
            .then(response => response.json())
            .then(data => {
                const semiHyperrealisticPortraitsContainer = document.getElementById('semiHyperrealisticPortraits');
                data.forEach(portrait => {
                    const cardHTML = `
                        <div class="card m-2" style="width: 20rem;">
                            <img class="card-img-top" src="${portrait.img}">
                            <div class="card-body">
                                <h5 class="card-title">${portrait.title}</h5>
                                <p class="card-text">${portrait.description}</p>
                                <p class="card-text">Price: ₱${portrait.price}</p>
                                <button class="btn btn-success" onclick="addToCart(${portrait.id},'${portrait.description}','${portrait.img}')">
                                    <i class="fas fa-cart-plus"></i> Add to Cart
                                </button>
                                <span class="btn-buy-now">
                                    <button class="btn btn-primary" onclick="checkout()">Buy now</button>
                                </span>
                            </div>
                        </div>
                    `;
                    semiHyperrealisticPortraitsContainer.innerHTML += cardHTML;
                });
            })
            .catch(error => console.error('Error:', error));

        // Fetch data from the realistic table
        fetch('./portraits/r-portraits-api.php')
            .then(response => response.json())
            .then(data => {
                const realisticPortraitsContainer = document.getElementById('realisticPortraits');
                data.forEach(portrait => {
                    const cardHTML = `
                        <div class="card m-2" style="width: 20rem;">
                            <img class="card-img-top" src="${portrait.img}">
                            <div class="card-body">
                                <h5 class="card-title">${portrait.title}</h5>
                                <p class="card-text">${portrait.description}</p>
                                <p class="card-text">Price: ₱${portrait.price}</p>
                                <button class="btn btn-success" onclick="addToCart(${portrait.id},'${portrait.description}','${portrait.img}')">
                                    <i class="fas fa-cart-plus"></i> Add to Cart
                                </button>
                                <span class="btn-buy-now">
                                    <button class="btn btn-primary" onclick="checkout()">Buy now</button>
                                </span>
                            </div>
                        </div>
                    `;
                    realisticPortraitsContainer.innerHTML += cardHTML;
                });
            })
            .catch(error => console.error('Error:', error));
            
        // Initialize cart object
        let cart = {};

        // Function to update the cart count
        function updateCartCount() {
            const cartCount = Object.keys(cart).length; // Count the number of items in the cart
            document.getElementById('cartCountMobile').textContent = cartCount; // Update the cart count for mobile
            document.getElementById('cartCountDesktop').textContent = cartCount; // Update the cart count for desktop
        }

        // Function to add a portrait to the cart
        function addToCart(portraitId, description, img) {
            // Get the portrait details from the DOM
            const portraitCard = document.querySelector(`[onclick="addToCart(${portraitId},'${description}','${img}')"]`).closest('.card');
            const title = portraitCard.querySelector('.card-title').textContent;
            const priceText = portraitCard.querySelector('.card-body').innerHTML.match(/Price: ₱(\d+\.?\d*)/);
            const price = priceText ? parseFloat(priceText[1]) : 0;
            const quantity = 1; // Default to 1 for simplicity
    
            // Add the portrait to the cart
            if (cart[portraitId]) {
                cart[portraitId].quantity++;
            } else {
                cart[portraitId] = { title, price, quantity, description, img };
            }
    
            // Update the cart count
            updateCartCount();

            // Display the updated cart
            displayCart();
        }
    
        // Function to display the cart with the items added and deduct the values from the quantity data field
        function displayCart() {
            const cartContents = document.getElementById('cartContents');
            let cartHTML = '';
            // Iterate over the cart items and display them
            for (const [portraitId, portraitDetails] of Object.entries(cart)) {
                cartHTML += `
                    <div class="portrait mb-3">
                        <img src="${portraitDetails.img}" alt="${portraitDetails.title}" class="portrait-image" style="width: 100px; height: 100px;">
                        <div class="portrait-details">
                            <p class="portrait-title"><strong>${portraitDetails.title}</strong></p>
                            <p class="portrait-description">${portraitDetails.description}</p>
                            <p class="portrait-price">₱${portraitDetails.price.toFixed(2)}</p>
                            <p class="portrait-quantity">Quantity: ${portraitDetails.quantity}</p>
                        </div>
                    </div>
                `;
            }
            // Update the cart display
            cartContents.innerHTML = cartHTML;
        }

        // Function to handle checkout
        function checkout() {
            // Send a POST request to the server with the cart data
            fetch('checkout.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(cart)
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    // Clear the cart if the data is successfully stored
                    cart = {};
                    updateCartCount(); // Update the cart count
                    displayCart(); // Update the cart display

                    // Display a confirmation message
                    alert('Your purchase was successful!');

                    // Optionally, display a modal instead of an alert
                    // $('#confirmationModal').modal('show');

                    // Optionally, send an order confirmation email or handle payment here

                } else {
                    console.error("Error during checkout:", data.message);
                }
            })
            .catch(error => console.error('Error:', error));
        }

        // Function to redirect to the order summary page
        function redirectToOrderSummary() {
            window.location.href = 'order-summary.php'; // Replace with the actual URL of your order summary page
        }
    </script>
</body>
</html>
