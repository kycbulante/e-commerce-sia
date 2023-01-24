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
    $username=$_SESSION['username'];
    $get_user="Select * from `user_table` where username='$username'";
    $result=mysqli_query($con,$get_user);
    $row_fetch=mysqli_fetch_assoc($result);
    $user_id=$row_fetch['user_id'];
    echo $user_id;
    ?>
<h3 class="text-sucesss">All orders</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
    <tr>
        <th>Si no.</th>
        <th>amount</th>
        <th>total products</th>
        <th>invoice number</th>
        <th>date</th>
        <th>complete/incomplete</th>
        <th>status</th>
    </tr>
    </thead>
    <tbody class="bg-secondary tex-light">
        <?php
        $get_order_details="Select * from `user_order` where user_id=$user_id";
        $result_orders=mysqli_query($con,$get_order_details);
        $number=1;
        while($row_orders=mysqli_fetch_assoc($result_orders)){
            $order_id=$row_orders['order_id'];
            $amount=$row_orders['amount'];
            $total_products=$row_orders['total_products'];
            $invoice_number=$row_orders['invoice_number'];
            $order_status=$row_orders['order_status'];
            if($order_status=='pending'){
                $order_status='Incomplete';
            }else{
                $order_status='Complete';
            }
            $order_date=$row_orders['order_date'];
            echo "<tr>
            <td>$number</td>
            <td>$amount</td>
            <td>$total_products</td>
            <td>$invoice_number</td>
            <td>$order_date</td>
            <td> $order_status</td>";
            ?>
            <?php if($order_status=='Complete'){
                echo"<td>Paid</td>";
            }else{
                echo" <td><a href='confirmpayment.php?order_id=$order_id'class='text-light'>Confirm</a></td>
                </tr>";
            }
            $number++;
        }
        
        
        ?>
        
    </tbody>
</table>
</body>
</html>