<?php
if(isset($_GET['deletebrand'])){
    $delete_brand=$_GET['deletebrand'];
    echo $delete_brand;

    $delete_query="Delete from `brands` where brand_id=$delete_brand";
    $result=mysqli_query($con,$delete_query);
    if($result){
        echo "<script>alert('brand deleted')</script>";
        echo "<script>window.open('./index.php?viewbrand','_self')</script>";
    }
}
?>