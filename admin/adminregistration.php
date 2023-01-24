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
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <!--font-awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Registration</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/bp1.jpg" alt="admin registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">username</label>
                        <input type="text" id="username" name="username" placeholder="entername" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">email</label>
                        <input type="email" id="email" name="email" placeholder="enter email" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">password</label>
                        <input type="password" id="password" name="password" placeholder="enter password" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="confpassword" class="form-label">confirm password</label>
                        <input type="confpassword" id="confpassword" name="confpassword" placeholder="confirm password" required="required" class="form-control">
                    </div>
                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0" name="adminregistration" value="register">
                        <p class="small fw-bold mt-2 pt-1">Have an account? <a href="adminlogin.php" class="link-danger">Login</a></p>
                    </div>
                </form>
            </div>
    </div>



    <?php 
if(isset($_POST['adminregistration'])){
$user_username=$_POST['username'];
$user_email=$_POST['email'];
$user_password=$_POST['password'];
$hash_password=password_hash($user_password, PASSWORD_DEFAULT);
$conf_user_password=$_POST['confpassword'];

$select_query="Select * from `admin_table` where admin_name= '$user_username' or admin_email='$user_email'";
$result=mysqli_query($con1,$select_query);
$rows_count=mysqli_num_rows($result);
if($rows_count>0){
    echo"<script>alert('username and email exists')</script>";
}else if($user_password!=$conf_user_password){
    echo"<script>alert('passwords do not match')</script>";
}else{
    $insert_query="insert into `admin_table` (admin_name, admin_email, admin_password) 
    values ('$user_username','$user_email','$hash_password')";
    $sql_execute=mysqli_query($con1,$insert_query);

    if($sql_execute){
        echo"<script>alert('data inserted successfully')</script>";
    }else{
        die(mysqli_error($con1));
    }
}
}


?>
</body>
</html>