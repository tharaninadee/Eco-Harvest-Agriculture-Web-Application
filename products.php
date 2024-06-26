<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crops-Services</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/header.css"> 
    <link rel="stylesheet" href="css/index.css"> 
    <link rel="stylesheet" href="css/products.css"> 
</head>
<body>
    <!-- Header Section -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light sticky-top">
            <div class="container">
                <a class="navbar-brand" href="index.html"><img src="images/EcoHarvestLogo.png" alt="Company Logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavMobile" aria-controls="navbarNavMobile" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavMobile">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="services.php">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="blogpage.html">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contactus.html">Contact Us</a>
                        </li>
                    </ul>
                    <form action="search_process.php" method="GET" class="form-inline my-2 my-lg-0 ml-3">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="query">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                    <div class="dropdown ml-3">
                        <button type="button" class="btn btn-success dropdown-toggle" id="extendedMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Menu
                        </button>
                        <div class="dropdown-menu" aria-labelledby="extendedMenu">
                            <a class="dropdown-item" href="login.html">Login</a>
                            <a class="dropdown-item" href="register.html">Be a Member</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content Section -->
    <div class="container">
        <h2>Crops</h2>
        <div class="category-links">
            <div class="row">
                <!-- Category Links -->
                <div class="category-col">
                    <a href="?category=vegetables" class="category-link">
                        <img src="images/vegetablesicon.png" alt="Vegetables" class="category-icon">
                        <br>
                        <span>Vegetables</span>
                    </a>
                </div>
                <div class="category-col">
                    <a href="?category=fruits" class="category-link">
                        <img src="images/fruiticon.png" alt="Fruits" class="category-icon">
                        <br>
                        <span>Fruits</span>
                    </a>
                </div>
                <div class="category-col">
                    <a href="?category=grains" class="category-link">
                        <img src="images/grains.png" alt="Grain" class="category-icon">
                        <br>
                        <span>Grains</span>
                    </a>
                </div>
                <div class="category-col">
                    <a href="?category=condiments" class="category-link">
                        <img src="images/condiments.png" alt="Condiment" class="category-icon">
                        <br>
                        <span>Condiments</span>
                    </a>
                </div>
                <div class="category-col">
                    <a href="?category=flowers" class="category-link">
                        <img src="images/flowericon.png" alt="Flowers" class="category-icon">
                        <br>
                        <span>Flowers</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="product-list row">
            <?php
            // Include the database connection file
            include('db/db_connect.php'); 

            // Get the selected category or default to 'vegetables'
            $category = isset($_GET['category']) ? $_GET['category'] : 'vegetables';

            // SQL query to fetch products of the selected category
            $sql = "SELECT * FROM products WHERE product_category = '$category'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Display product information
                    echo '<div class="col-md-4">';
                    echo '<div class="product-card">';
                    echo '<img class="product-image" src="' . $row['image_path'] . '" alt="' . $row['product_name'] . '">';
                    echo '<h3>' . $row['product_name'] . '</h3>';
                    echo '<p>' . $row['product_description'] . '</p>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<h2>No products found.</h2>';
            }

            // Close the database connection
            $conn->close();
            ?>
        </div>
    </div>

    <!-- Footer Section -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-logo">
                        <img src="images/EcoHarvestLogo.png" alt="Company Logo">
                    </div>
                    <p>At Eco Harvest, we're dedicated to sustainable farming and a greener future. Join us in nurturing the earth for generations to come.</p>
                    <div class="social-media">
                        <a href="#"><img src="images/social1.jpg" alt="Facebook"></a>
                        <a href="#"><img src="images/social2.jpg" alt="Twitter"></a>
                        <a href="#"><img src="images/social3.png" alt="Instagram"></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <h3>Useful Links</h3>
                    <ul class="footer-links">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="services.php">Services</a></li>
                        <li><a href="blogpage.html">Blog</a></li>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="contactus.html">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>Contact Us</h3>
                    <p>Email: info.ecoharvest.lk</p>
                    <p>Phone: (777) 456-7890</p><br>
                    <p>Address: Colombo, Sri Lanka</p>
                </div>
            </div>
        </div>

        <div class="container">
            <p>&copy; 2023 Eco Harvest. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
