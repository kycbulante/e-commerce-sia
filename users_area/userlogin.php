<?php
 include('../includes/connect.php');
 include('../functions/commonfunctions.php');
 @session_start();
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--bootstrap css -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!--font-awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">

    <style>
        html{
        /* height:100%; */
        overflow-x:hidden;
        }
    </style>
</head>
<body>
    
    <div class="container-fluid my-3">
        <h2 class="text-center">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
                <!--username-->
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-outline mb-4">
                    <label for="user_username" class="form-label">Username</label>
                    <input type="text" id="user_username" class="form-control" placeholder="enter username" autocomplete="off" require="required" name="user_username">
                </div>
                
                <!--password-->
                <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" id="user_password" class="form-control" placeholder="enter password" autocomplete="off" require="required" name="user_password">
                </div>
            
                <div class="text-center mt-4 pt-2">
                    <input type="submit" value="login" class="bg-info py-2 px-3 border-0" name="user_login">
                    <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="userregistration.php" class="text-danger">Register</a></p>
                </div>
            </form>
        </div>
        </div>
    </div>

    <?php
    if(isset($_POST['user_login'])){
        $user_username=$_POST['user_username'];
        $user_password=$_POST['user_password'];
        
        $select_query="Select * from `user_table` where username='$user_username'";
        $result=mysqli_query($con, $select_query);
        $row_count=mysqli_num_rows($result);
        $row_data=mysqli_fetch_assoc($result);
        $user_ip=getIPAddress();

        //cart item
        $select_query_cart="Select * from `cart_details` where ip_address='$user_ip'";
        $select_cart=mysqli_query($con,$select_query_cart);
        $row_count_cart=mysqli_num_rows($select_cart);
        if($row_count>0){
            $_SESSION['username']=$user_username;
            if(password_verify($user_password, $row_data['user_password'])){
                // echo "<script>alert('login successful')</script>";
                if($row_count==1 and $row_count_cart==0){
                    $_SESSION['username']=$user_username;
                    echo "<script>alert('login successful1')</script>";
                    echo "<script>window.open('profile.php','_self')</script>";
                }else{
                    $_SESSION['username']=$user_username;
                    echo "<script>alert('login successful2')</script>";
                    echo "<script>window.open('payment.php','_self')</script>";
                }
            }else{
                echo "<script>alert('invalid credentials')</script>";
            }
        }
        else{
            echo "<script>alert('invalid credentials')</script>";
        }
    }
    ?>
    
</body>
</html>