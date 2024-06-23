<?php
SESSION_START();
include "lib/connection.php";

$id = isset($_SESSION['userid']) ? $_SESSION['userid'] : null;

if ($id) {
    $sql = "SELECT * FROM cart WHERE userid='$id'";
    $result = $conn->query($sql);
} else {
    // Handle the case when userid is not set
    $result = null;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Eco-Friendly Marketplace</title>
    <meta charset="UTF-8">
    <meta name="description" content="test">
    <meta name="keywords" content="HTML, CSS, BOOTSTRAP">
    <meta name="author" content="Anik">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@700&display=swap" rel="stylesheet">
    <!--font-family: 'Raleway', sans-serif;-->
    <link rel="favicon" type="text/css" href="#favicon">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">

    <style>
        .small-image {
            width: 100px; /* Adjust the width as needed */
            height: auto; /* Keeps the aspect ratio */
        }
        .header-text {
            display: inline-block;
            vertical-align: middle;
            padding-left: 10px;
            font-size: 24px;
            font-family: 'Raleway', sans-serif;
            font-weight: bold;
        }
        .cart-image {
            width: 30px; /* Adjust the width as needed */
            height: auto; /* Keeps the aspect ratio */
        }
    </style>
</head>

<body>

<!--header start--->
<header>
    <div class="container">
        <div class="header-top">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-left">
                    <img src="img/logo9.png" class="small-image">
                    <span class="header-text">Eco-Friendly Marketplace</span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="line"></div>
<!--header end--->

<!--nav start--->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Clothing.php">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Tips.php">Tips</a>
                </li>
            </ul>
            <form class="form-inline" action="search(1).php" method="post">
                <!--<a href=""><img src="img/search.png"></a>-->
                <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="name">
                <button class="btn btn-outline-dark" type="submit" style="margin-left:7px;margin-right:7px;"><img src="img/search.png" style="width: 20px; height: auto;"></button>
            </form>
            <?php
            $total = 0;
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $total++;
                }
            }
            ?>
            <a href="cart(1).php"><img src="img/cart.png" class="cart-image"><?php echo $total ?></a>
            <?php
            if (isset($_SESSION['auth'])) {
                if ($_SESSION['auth'] == 1) {
                    echo $_SESSION['username']; ?>
                    <a href="profile.php">(My Orders)</a>
                    <a href="logout.php">(logout)</a>
                    <?php
                }
            } else {
                ?>
                <a href="login.php">Login</a>
                <a href="Register.php">Signup</a>
                <?php
            }
            ?>
        </div>
    </div>
</nav>
<!--nav end--->
</body>
</html>
