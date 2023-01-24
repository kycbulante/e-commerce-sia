<?php
 include('../includes/connect.php');
 include('../functions/commonfunctions.php');
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

</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <!--username-->
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-outline mb-4">
                    <label for="user_username" class="form-label">Username</label>
                    <input type="text" id="user_username" class="form-control" placeholder="enter username" autocomplete="off" require="required" name="user_username">
                </div>
                <!--email-->
                <div class="form-outline mb-4">
                    <label for="user_email" class="form-label">Email</label>
                    <input type="email" id="user_email" class="form-control" placeholder="enter email" autocomplete="off" require="required" name="user_email">
                </div>
                <!-- image
                <div class="form-outline mb-4">
                    <label for="user_image" class="form-label">Username</label>
                    <input type="file" id="user_image" class="form-control" placeholder="enter iamge" autocomplete="off" require="required" name="user_image">
                </div>-->
                <!--password-->
                <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" id="user_password" class="form-control" placeholder="enter password" autocomplete="off" require="required" name="user_password">
                </div>
                 <!--confirm password-->
                 <div class="form-outline mb-4">
                    <label for="conf_user_password" class="form-label">Confirm Password</label>
                    <input type="password" id="conf_user_password" class="form-control" placeholder="enter password" autocomplete="off" require="required" name="conf_user_password">
                </div>
                 <!--address-->
                 <div class="form-outline mb-4">
                    <label for="user_address" class="form-label">Address</label>
                    <input type="text" id="user_address" class="form-control" placeholder="enter address" autocomplete="off" require="required" name="user_address">
                </div>
                 <!--contact-->
                 <div class="form-outline mb-4">
                    <label for="user_contact" class="form-label">Contact</label>
                    <input type="text" id="user_contact" class="form-control" placeholder="enter contact" autocomplete="off" require="required" name="user_contact">
                </div>
                <div class="text-center mt-4 pt-2">
                    <input type="submit" value="register" class="bg-info py-2 px-3 border-0" name="user_register">
                    <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="userlogin.php" class="text-danger">Login</a></p>
                </div>
            </form>
        </div>
        </div>
    </div>
    
</body>
</html>


<?php 
if(isset($_POST['user_register'])){
$user_username=$_POST['user_username'];
$user_email=$_POST['user_email'];
$user_password=$_POST['user_password'];
$hash_password=password_hash($user_password, PASSWORD_DEFAULT);
$conf_user_password=$_POST['conf_user_password'];
$user_address=$_POST['user_address'];
$user_contact=$_POST['user_contact'];
$user_ip=getIPAddress();

//select query
$select_query="Select * from `user_table` where username='$user_username' or user_email = '$user_email' or user_address = '$user_address'";
$results=mysqli_query($con, $select_query);
$rows_count=mysqli_num_rows($results);
if($rows_count>0){
    echo"<script>alert('username, email address, contact number may already exists')</script>";
}else if($user_password!=$conf_user_password){
    echo"<script>alert('passwords do not match')</script>";  
}else{

//insert query
$insert_query ="insert into `user_table` (username, user_email, user_password, user_ip, user_address, user_mobile) 
values ('$user_username', '$user_email', '$hash_password', '$user_ip','$user_address', '$user_contact')";
$sql_execute=mysqli_query($con,$insert_query);

if($sql_execute){
    echo"<script>alert('data inserted successfully')</script>";
}else{
    die(mysqli_error($con));
}
} 
$select_cart_items="Select * from `cart_details` where ip_address='$user_ip'";
$result_cart=mysqli_query($con, $select_cart_items);
$rows_count=mysqli_num_rows($result_cart);
if($rows_count>0){
    $_SESSION['username']=$user_username;
    echo"<script>alert('You have items in your cart')</script>";  
    echo"<script>window.open('checkout.php','_self')</script>";  
}else{
    echo"<script>window.open('index.php','_self')</script>"; 
}

}

?>