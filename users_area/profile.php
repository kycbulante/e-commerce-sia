<!-- connect file -->
<?php
include('../includes/connect.php');
include('../functions/commonfunctions.php');
session_start();
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KORYAN SHOP <?php echo $_SESSION['username']?></title>
    <!--bootstrap css -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!--font-awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!--navbar-->
        <div class="container-fluid p-0">
            <!--first child-->
            <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <!--search-->
        <form class="d-flex" action="../searchproduct.php" method="get">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
            <button class="btn btn-outline-dark" type="submit">Search</button>
        </form>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
            </li>
            <!--products tab-->
            <li class="nav-item">
            <a class="nav-link" href="displayall.php">Products</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="profile.php">My Account</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
            </li>
            <?php 
            if(!isset($_SESSION['username'])){
                echo "<li class='nav-item'>
                <a class='nav-link' href='.#'>Welcome hatdog</a>
                </li>";
            }else{
                echo "<li class='nav-item'>
                <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
                </li>";
            }
            if(!isset($_SESSION['username'])){
                echo "<li class='nav-item'>
                <a class='nav-link' href='./users_area/userlogin.php'>Login</a>
                </li>";
            }else{
                echo "<li class='nav-item'>
                <a class='nav-link' href='./users_area/logout.php'>Logout</a>
                </li>";
            }
            ?>
            <!--cart-->
            <li class="nav-item">
            <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup></a>
            </li>
            <!--displaying total price from cart-->
            <li class="nav-item">
            <a class="nav-link" href="#">Total Price: <?php total_cart_price();?></a>
            </li>
            
        </ul>
        </div>
    </div>
    </nav>

    <!--calling cart-->
    <?php
    cart();
    ?>


    <!--2nd child-->
    <!--3rd child-->
    <div class="bg-light">
        <h3 class="text-center">Koryan store</h3>
        <p class="text-center">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aperiam, temporibus?</p>
    </div>

    <!-- fourth child -->
    <div class="row">
        <div class="col-md-2">
            <ul class="navbar-nav bg-secondary text-center" style="height:100vh">
            <li class="nav-item bg-info">
            <a class="nav-link text-light" href="#">Your Profile</a>
            </li>
            <li class="nav-item bg-info">
            <a class="nav-link text-light" href="profile.php">Pendingorders</a>
            </li>
            <li class="nav-item bg-info">
            <a class="nav-link text-light" href="profile.php?edit_account">Edit Account</a>
            </li>
            <li class="nav-item bg-info">
            <a class="nav-link text-light" href="profile.php?my_orders">My Orders</a>
            </li>
            <li class="nav-item bg-info">
            <a class="nav-link text-light" href="profile.php?delete_account">Delete</a>
            </li>
            <li class="nav-item ">
            <a class="nav-link text-light" href="logout.php">Logout </a>
            </li>
            </ul>
        </div>
        <div class="col-md-10 text-center">
                <?php get_user_order_details();
                if(isset($_GET['edit_account'])){
                    include('editaccount.php');
                }
                if(isset($_GET['my_orders'])){
                    include('myorders.php');
                }
                if(isset($_GET['delete_account'])){
                    include('deleteaccount.php');
                }
                ?>
        </div>
    </div>

    <!--last child-->
    <!--footer-->
    <?php include("../includes/footer.php")
    ?>
</div>
    

<!--bootstrap js link-->
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>