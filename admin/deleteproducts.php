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
    if(isset($_GET['deleteproducts'])){
        $delete_id=$_GET['deleteproducts'];
        // echo $delete_id;
        $delete_product="Delete from `products` where product_id=$delete_id";
        $result_product=mysqli_query($con,$delete_product);
        if($result_product){
            echo "<script>alert('Product deleted')</script>";
            echo "<script>window.open('./index.php','_self')</script>";
        }
    }
    ?>
</body>
</html>