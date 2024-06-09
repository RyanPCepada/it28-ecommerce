<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArsyArts - Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #18191A; /* Dark background similar to Facebook */
            color: #E4E6EB; /* Light text color for contrast */
        }
        .navbar-toggler {
            border-color: #666 !important; /* Dark border */
            background-color: #333 !important; /* Dark background */
            color: #fff !important; /* Light text color */
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3e%3cpath stroke='rgba(255, 255, 255, 0.5)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e") !important; /* Light toggle button icon */
        }

        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 10px;
            padding: 20px;
            width: 100%;
        }
        .card-img-only {
            width: 100% !important;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background-color: lightgray;
        }
        .card-img-only:hover {
            background-color: lightgray;
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .carousel-item {
            position: relative;
            height: 536px; /* Set a fixed height for the carousel */
            margin-top: 10px;
            background-color: lightgray; /* Black background for the carousel */
        }
        .carousel-item img {
            max-height: 100%;
            max-width: 93%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .carousel-caption {
            position: absolute;
            bottom: 2px;
            left: 50%;
            transform: translateX(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 5px;
            border-radius: 5px;
            width: 80%;
            text-align: center;
            font-family: 'Lucida Calligraphy', cursive; /* Use Lucida Calligraphy font for the description */
        }

        @media (max-width: 768px) {
            .card-grid {
                display: none;
            }
            .carousel {
                display: block;
            }
        }
        @media (min-width: 769px) {
            .carousel {
                display: none;
            }
        }
        .divider1 {
            height: 7px;
            background-color: black; /* Dark gray */
            margin-top: 0px; /* Adjust margin as needed */
            margin-bottom: 0px; /* Adjust margin as needed */
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

        .details-section {
            display: none;
            padding: 10px;
            /* background-color: #1C1D1E; */
            background-color: #1E1F20;
            /* background-color: #212223; */
            color: lightgray;
            margin: 10px;
            margin-top: 2px;
            margin-bottom: 0px;
            border: solid 1px #444;
            border-radius: 10px;
        }
        .modal-dark .modal-content {
            background-color: #1E1F20; /* Dark background color */
            color: #E4E6EB; /* Light text color for contrast */
            width: 100%;
        }

        .modal-dark .modal-content input[type="file"],
        .modal-dark .modal-content input[type="text"], /* Add this line to include text input fields */
        .modal-dark .modal-content select,
        .modal-dark .modal-content .form-check-input {
            background-color: #2C2D2E; /* Darker background color for input fields */
            color: #E4E6EB; /* Light text color for input fields */
            border-color: #55595e; /* Border color for input fields */
        }


        .modal-dark .modal-content input[type="file"]::-webkit-file-upload-button {
            background-color: #2C2D2E; /* Darker background color for file upload button */
            color: #E4E6EB; /* Light text color for file upload button */
            border: 1px solid #55595e; /* Border for file upload button */
        }

        .modal-dark .modal-content .btn-primary,
        .modal-dark .modal-content .btn-secondary {
            background-color: #007bff; /* Primary and secondary button background color */
            border-color: #007bff; /* Primary and secondary button border color */
            color: #E4E6EB; /* Light text color for buttons */
        }

        .modal-dark .modal-content .btn-primary:hover,
        .modal-dark .modal-content .btn-secondary:hover {
            background-color: #0056b3; /* Darker background color on hover for buttons */
            border-color: #0056b3; /* Darker border color on hover for buttons */
            color: #E4E6EB; /* Light text color for buttons */
        }
        .modal-dark .modal-content input[type="date"] {
            background-color: #2C2D2E; /* Darker background color for date picker */
            color: #E4E6EB; /* Light text color for date picker */
            border-color: #55595e; /* Border color for date picker */
        }
        .quantity-box {
            display: flex;
            align-items: center;
            background-color: #2C2D2E; /* Darker background color */
            border: 1px solid #55595e; /* Border color */
            border-radius: 5px;
            padding: 0 10px; /* Add padding to give space around the input */
        }

        .quantity-controls {
            cursor: pointer;
            color: #E4E6EB; /* Light text color */
            padding: 5px;
        }

        .quantity-input {
            flex: 1; /* Allow the input to expand to fill remaining space */
            background: none; /* Remove background */
            border: none; /* Remove border */
            color: #E4E6EB; /* Light text color */
            font-size: 16px; /* Adjust font size */
            text-align: center; /* Center text */
            outline: none; /* Remove focus outline */
        }

        .dark-mode {
            background-color: #333;
            color: #fff;
        }

        .dark-mode .modal-header,
        .dark-mode .modal-footer {
            border-color: #444;
        }

        .dark-mode .modal-title,
        .dark-mode .modal-body,
        .dark-mode .modal-footer button {
            color: #fff;
        }

        .dark-mode .close {
            color: #fff;
        }

        .dark-mode .close:hover,
        .dark-mode .close:focus {
            color: #fff;
        }

        /* Override Bootstrap modal-dialog class to center modal vertically */
        .modal-dialog {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: calc(100% - 1rem);
        }

        @media (min-width: 576px) {
            .modal-dialog {
                max-width: 500px; /* Adjust this value based on your preference */
            }
        }
    </style>
</head>

<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <a class="navbar-brand text-light" href="#">
        <img src="icons/ARSYARTS_LOGO.png" height="40" class="d-inline-block align-top" alt="">
        <strong>ArsyArts</strong>
    </a>
    <button class="btn text-light d-lg-none" data-toggle="modal" data-target="#cartModal">
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
            <li class="nav-item d-none d-lg-block">
                <button class="btn text-light" data-toggle="modal" data-target="#cartModal">
                    <i class="fas fa-shopping-cart" style="font-size: 30px;"></i>
                    <span id="cartCountDesktop" class="badge badge-pill badge-warning">0</span>
                </button>
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

<body>
    <div class="row col-md-12" style="margin-top: 10px;">
        <div class="col-12">
            <h4 class="section-label text-light">
                Semi-Hyperrealistic <i class="fas fa-paint-brush"></i>
            </h4>
            <button class="btn btn-primary btn-order" onclick="fetchDetails('Semi-Hyperrealistic')"
                data-toggle="modal" data-target="#viewDetailsModal">View Details</button>
            <button class="btn btn-success btn-order" onclick="toPlaceOrder('Semi-Hyperrealistic')">Order Now</button>
        </div>
    </div>
    
    <div class="text-muted" id="semiHyperrealisticPortraitsDescription" style="margin-left: 10px;"></div>
    <div id="semiHyperrealisticPortraitsCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner"></div>
        <a class="carousel-control-prev" href="#semiHyperrealisticPortraitsCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#semiHyperrealisticPortraitsCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div id="semiHyperrealisticPortraits" class="card-grid"></div>


    <div class="divider2"></div>

    <div class="row col-md-12" style="margin-top: 10px;">
        <div class="col-12">
            <h4 class="section-label text-light">
                Realistic <i class="fas fa-paint-brush"></i>
            </h4>
            <button class="btn btn-primary btn-order" onclick="fetchDetails('Realistic')"
                data-toggle="modal" data-target="#viewDetailsModal">View Details</button>
            <button class="btn btn-success btn-order" onclick="toPlaceOrder('Realistic')">Order Now</button>
        </div>
    </div>
    
    <div class="text-muted" id="realisticPortraitsDescription" style="margin-left: 10px;"></div>
    <div id="realisticPortraitsCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner"></div>
        <a class="carousel-control-prev" href="#realisticPortraitsCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#realisticPortraitsCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div id="realisticPortraits" class="card-grid"></div>

    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalLabel">Cart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="cartContents"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="checkout()">Buy Now</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!--VIEW DETAILS MODAL -->
    <div class="modal fade" id="viewDetailsModal" tabindex="-1" aria-labelledby="viewDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content dark-mode">
                <div class="modal-header">
                    <?php
                        $type = isset($_GET['type']) ? $_GET['type'] : '';
                    ?>
                    <h5 class="modal-title text-light" id="viewDetailsModalLabel"><?php echo $type; ?> Details</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="viewDetailsContents">
                    
                    <h1>Wapa juy detalye pasensyahe sa jud.</h1>
                    
                    <!-- Add View Pricelist link -->
                    <a href="pricelist.php" class="text-primary" style="text-decoration: underline;">View Pricelist</a>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="toPlaceOrderFromModal()">Order Now</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--END VIEW DETAILS MODAL -->

    <div class="divider3"></div>
    

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        fetch('./portraits/shr-portraits-api.php')
            .then(response => response.json())
            .then(data => {
                const semiHyperrealisticPortraitsContainer = document.getElementById('semiHyperrealisticPortraits');
                const semiHyperrealisticPortraitsCarouselInner = document.querySelector('#semiHyperrealisticPortraitsCarousel .carousel-inner');
                data.forEach((portrait, index) => {
                    const cardHTML = `
                        <div class="card-img-only m-2">
                            <img class="card-img-top" src="${portrait.img}">
                        </div>
                    `;
                    semiHyperrealisticPortraitsContainer.innerHTML += cardHTML;

                    const carouselItemHTML = `
                        <div class="carousel-item ${index === 0 ? 'active' : ''}">
                            <img src="${portrait.img}" class="d-block w-100" alt="${portrait.title}">
                            <div class="carousel-caption">${portrait.description}</div>
                        </div>
                    `;
                    semiHyperrealisticPortraitsCarouselInner.innerHTML += carouselItemHTML;
                });
            })
            .catch(error => console.error('Error:', error));

        fetch('./portraits/r-portraits-api.php')
            .then(response => response.json())
            .then(data => {
                const realisticPortraitsContainer = document.getElementById('realisticPortraits');
                const realisticPortraitsCarouselInner = document.querySelector('#realisticPortraitsCarousel .carousel-inner');
                data.forEach((portrait, index) => {
                    const cardHTML = `
                        <div class="card-img-only m-2">
                            <img class="card-img-top" src="${portrait.img}">
                        </div>
                    `;
                    realisticPortraitsContainer.innerHTML += cardHTML;

                    const carouselItemHTML = `
                        <div class="carousel-item ${index === 0 ? 'active' : ''}">
                            <img src="${portrait.img}" class="d-block w-100" alt="${portrait.title}">
                            <div class="carousel-caption">${portrait.description}</div>
                        </div>
                    `;
                    realisticPortraitsCarouselInner.innerHTML += carouselItemHTML;
                });
            })
            .catch(error => console.error('Error:', error));

        let cart = {};

        function updateCartCount() {
            const cartCount = Object.keys(cart).length;
            document.getElementById('cartCountMobile').textContent = cartCount;
            document.getElementById('cartCountDesktop').textContent = cartCount;
        }

        function addToCart(portraitId, description, img) {
            const portraitCard = document.querySelector(`[onclick="addToCart(${portraitId},'${description}','${img}')"]`).closest('.card');
            const title = portraitCard.querySelector('.card-title').textContent;
            const priceText = portraitCard.querySelector('.card-body').innerHTML.match(/Price: ₱(\d+\.?\d*)/);
            const price = priceText ? parseFloat(priceText[1]) : 0;
            const quantity = 1;

            if (cart[portraitId]) {
                cart[portraitId].quantity++;
            } else {
                cart[portraitId] = { title, price, quantity, description, img };
            }

            updateCartCount();
            displayCart();
        }

        function displayCart() {
            const cartContents = document.getElementById('cartContents');
            let cartHTML = '';
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
            cartContents.innerHTML = cartHTML;
        }

        function toggleDetails(type) {
            const detailsSection = document.getElementById(`${type}Details`);
            if (detailsSection.style.display === "none") {
                detailsSection.style.display = "block";
            } else {
                detailsSection.style.display = "none";
            }
        }

        function checkout() {
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
                    cart = {};
                    updateCartCount();
                    displayCart();
                    alert('Your purchase was successful!');
                } else {
                    console.error("Error during checkout:", data.message);
                }
            })
            .catch(error => console.error('Error:', error));
        }

        function checkout() {
            // Your existing checkout function content here
            $('#orderModal').modal('show'); // Show the modal when "Order now" is clicked
        }

        function submitOrder() {
            // Handle the submission of the order form here
        }

        function toPlaceOrder(type) {
            window.location.href = 'place_order.php?type=' + type;
        }
        

        function fetchDetails(type) {
            // Open the view details modal
            $('#viewDetailsModal').modal('show');
            
            // Set the title of the modal
            document.getElementById('viewDetailsModalLabel').textContent = type + ' Details';
        }

        // Define a global variable to store the current type
        let currentType;

        function fetchDetails(type) {
            // Open the view details modal
            $('#viewDetailsModal').modal('show');
            
            // Set the title of the modal
            document.getElementById('viewDetailsModalLabel').textContent = type + ' Details';
            
            // Set the current type
            currentType = type;
        }

        function toPlaceOrderFromModal() {
            // Use the current type when "Order Now" button is clicked
            toPlaceOrder(currentType);
        }


        document.addEventListener('DOMContentLoaded', function() {
            const quantityInput = document.querySelector('.quantity-input');
            const incrementButton = document.querySelector('.increment');
            const decrementButton = document.querySelector('.decrement');
            
            incrementButton.addEventListener('click', function() {
            quantityInput.stepUp();
            });
            
            decrementButton.addEventListener('click', function() {
            quantityInput.stepDown();
            });
        });
    </script>
</body>
</html>
