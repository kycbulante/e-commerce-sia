<?php
if(isset($_GET['deletepayment'])){
    $delete_payment=$_GET['deletepayment'];
    echo $delete_payment;

    $delete_query="Delete from `user_payments` where payment_id=$delete_payment";
    $result=mysqli_query($con,$delete_query);
    if($result){
        echo "<script>alert('payment deleted')</script>";
        echo "<script>window.open('./index.php?allpayment','_self')</script>";
    }
}
?>