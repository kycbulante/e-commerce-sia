<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_GET['deleteuser'])){
        $user_id=$_GET['deleteuser'];
        // echo $delete_id;
        $delete_user="Delete from `user_table` where user_id=$user_id";
        $result_user=mysqli_query($con,$delete_user);
        if($result_user){
            echo "<script>alert('user deleted')</script>";
            echo "<script>window.open('./index.php?alluser','_self')</script>";
        }
    }
    ?>
</body>
</html>