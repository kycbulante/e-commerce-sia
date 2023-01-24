<?php
include('../includes/connect.php');
include('../functions/commonfunctions.php');
session_start();
if(!isset($_SESSION['admin_name'])){
    header("location:adminlogin.php");
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <!--font-awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="stylesheet" href="style.css">
    <style>
        .admin-image{
    width: 100px;
    object-fit: contain;
}
.product_img{
    width:100px;
    object-fit: contain;
}
    </style>
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                    <?php 
            if(!isset($_SESSION['admin_name'])){
                echo "<li class='nav-item'>
                <a class='nav-link' href='.#'>Welcome hatdog</a>
                </li>";
            }else{
                echo "<li class='nav-item'>
                <a class='nav-link' href='#'>Welcome ".$_SESSION['admin_name']."</a>
                </li>";
            }
            if(!isset($_SESSION['admin_name'])){
                echo "<li class='nav-item'>
                <a class='nav-link' href='adminlogin.php'>Login</a>
                </li>";
            }else{
                echo "<li class='nav-item'>
                <a class='nav-link' href='adminlogout.php'>Logout</a>
                </li>";
            }
            ?>
                    </ul>
                </nav>
            </div>
        </nav>


        <!-- second child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Admin</h3>
        </div>

        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center" >
                <div class="px-5">
                    <a href="#"><img src="../images/bp1.jpg" alt="" class="admin-image"></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>

                <div class="button text-center">
                    <button class="my-3"><a href="insertproduct.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
                    <button><a href="index.php?viewproducts" class="nav-link text-light bg-info my-1">View Products</a></button>
                    <button><a href="index.php?insertcategory" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
                    <button><a href="index.php?viewcategory" class="nav-link text-light bg-info my-1">View Categories</a></button>
                    <button><a href="index.php?insertbrand" class="nav-link text-light bg-info my-1">Insert Brands</a></button>
                    <button><a href="index.php?viewbrand" class="nav-link text-light bg-info my-1">View Brands</a></button>
                    <button><a href="index.php?allorder" class="nav-link text-light bg-info my-1">All Orders</a></button>
                    <button><a href="index.php?allpayment" class="nav-link text-light bg-info my-1">All Payments</a></button>
                    <button><a href="index.php?alluser" class="nav-link text-light bg-info my-1">List Users</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">Logout</a></button>
                </div>
            </div>
        </div>

        <!-- fourth child -->
        <div class="container my-3">
            <?php
            if(isset($_GET['insertcategory'])){
                include('insertcategory.php');
            }
            if(isset($_GET['insertbrand'])){
                include('insertbrand.php');
            }
            if(isset($_GET['viewproducts'])){
                include('viewproducts.php');
            }
            if(isset($_GET['editproducts'])){
                include('editproducts.php');
            }
            if(isset($_GET['deleteproducts'])){
                include('deleteproducts.php');
            }
            if(isset($_GET['viewcategory'])){
                include('viewcategory.php');
            }
            if(isset($_GET['viewbrand'])){
                include('viewbrand.php');
            }
            if(isset($_GET['editcategory'])){
                include('editcategory.php');
            }
            if(isset($_GET['editbrand'])){
                include('editbrand.php');
            }
            if(isset($_GET['deletecategory'])){
                include('deletecategory.php');
            }
            if(isset($_GET['deletebrand'])){
                include('deletebrand.php');
            }
            if(isset($_GET['allorder'])){
                include('allorder.php');
            }
            if(isset($_GET['deleteorder'])){
                include('deleteorder.php');
            }
            if(isset($_GET['allpayment'])){
                include('allpayment.php');
            }
            if(isset($_GET['deletepayment'])){
                include('deletepayment.php');
            }
            if(isset($_GET['alluser'])){
                include('alluser.php');
            }
            if(isset($_GET['deleteuser'])){
                include('deleteuser.php');
            }
            ?>
        </div>

        <!--last child-->
        <?php include("../includes/footer.php")
    ?>
            </div>

        </div>



    
<!-- bootstrap js link -->
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>