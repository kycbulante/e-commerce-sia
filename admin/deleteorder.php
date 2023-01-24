<?php
if(isset($_GET['deleteorder'])){
    $delete_order=$_GET['deleteorder'];
    echo $delete_order;

    $delete_query="Delete from `user_order` where order_id=$delete_order";
    $result=mysqli_query($con,$delete_query);
    if($result){
        echo "<script>alert('order deleted')</script>";
        echo "<script>window.open('./index.php?allorder','_self')</script>";
    }
}
?>