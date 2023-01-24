<?php
 include('../includes/connect.php');
 include('../functions/commonfunctions.php');
 @session_start();
 if(isset($_SESSION['admin_name'])){
    header("location:index.php");
 }
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
        <h2 class="text-center mb-5">Admin Login</h2>
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
                        <label for="password" class="form-label">password</label>
                        <input type="password" id="password" name="password" placeholder="enter password" required="required" class="form-control">
                    </div>
                   
                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0" name="adminlogin" value="login">
                        <p class="small fw-bold mt-2 pt-1">Dont have an account? <a href="adminregistration.php" class="link-danger">Register</a></p>
                    </div>
                </form>
            </div>
    </div>

    <?php
    if(isset($_POST['adminlogin'])){
        $user_username=$_POST['username'];
        $user_password=$_POST['password'];
        
        $select_query="Select * from `admin_table` where admin_name='$user_username'";
        $result=mysqli_query($con1, $select_query);
        $row_count=mysqli_num_rows($result);
        $row_data=mysqli_fetch_assoc($result);
        if($row_count>0){
        $_SESSION['admin_name']=$user_username;
            if(password_verify($user_password, $row_data['admin_password'])){
                echo "<script>alert('login successful')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }else{
                echo "<script>alert('invalid credentials')</script>";
            }
        }
    }
        ?>
</body>
</html>