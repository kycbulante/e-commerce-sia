<!-- connect file -->
<?php
include('../includes/connect.php');
//include('../functions/commonfunctions.php');
session_start();

if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    // echo $order_id;
    $select_data="Select * from `user_order` where order_id=$order_id";
    $result=mysqli_query($con,$select_data);
    $row_fetch=mysqli_fetch_assoc($result);
    $invoice_number=$row_fetch['invoice_number'];
    $amount=$row_fetch['amount'];
}

if(isset($_POST['confirm_payment'])){
    $invoice_number=$_POST['amount'];
    $payment_mode=$_POST['payment_mode'];
    $insert_query="Insert `user_payments` (order_id,invoice_number, amount, payment_mode)
    values ($order_id,$invoice_number, $amount,'$payment_mode')";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo"<h3 class='text-center text-light'>payment successful</h3>";
        echo"<script>window.open('profile.php?myorders.php','_self')</script>";
    }
    $update_orders="Update `user_order` set order_status='Complete' where order_id=$order_id";
    $result_orders=mysqli_query($con,$update_orders);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!--font-awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">

</head>
<body class="bg-secondary">
    <div class="container my-5">
    <h1 class="text-center text-light">ComfirmPayment</h1>
        <form action=""method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo$invoice_number ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-light">Amount</label>
                <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo$amount ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <select name="payment_mode" class="form-select w-50 m-auto">
                    <option >Select payment mode</option>
                    <option >BPI</option>
                    <option >BDO</option>
                    <option >Paypal</option>
                    <option >COD</option>
                    <option >pay offline</option>


                </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" class="bg-info py-2 px-3 border-0" value ="confirm" name="confirm_payment">
            </div>
        </form>
    </div>
</body>
</html>
