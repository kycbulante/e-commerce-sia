<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3 class="text-center text-success">All orders</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
            <?php
            $get_order="Select * from `user_order`";
            $result=mysqli_query($con,$get_order);
            $row_count=mysqli_num_rows($result);
            echo "<tr>
            <th>Sl no</th>
            <th>Due Amount</th>
            <th>Invoice number</th>
            <th>Total Products</th>
            <th>Order Date</th>
            <th>Status</th>
            <th>delete</th>
        </tr>
    </thead>
    <tbody class='bg-secondary text-light'>";

    if($row_count==0){
        echo "<h2 class='bg-danger text-center mt-5'>no orders</h2>";
    }else{
        $number=0;
        while ($row_data=mysqli_fetch_assoc($result)) {
            $order_id=$row_data['order_id'];
            $user_id=$row_data['user_id'];
            $amount=$row_data['amount'];
            $invoice_number=$row_data['invoice_number'];
            $total_products=$row_data['total_products'];
            $order_date=$row_data['order_date'];
            $order_status=$row_data['order_status'];
            $number++;
            ?>
            <tr>
            <td><?php echo $number; ?></td>
            <td><?php echo $amount; ?></td>
            <td> <?php echo $invoice_number; ?></td>
            <td><?php echo $total_products; ?></td>
            <td><?php echo $order_date; ?></td>
            <td><?php echo $order_status; ?></td>
            <td><a href='index.php?deleteorder=<?php echo $order_id?>' class='text-light' type="button" class="text-light" data-toggle="modal" data-target="#exampleModal"> <i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php
        }
            }
            ?>
            
            <!-- <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr> -->
        </tbody>
    </table>


    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        <h4>are u sure u want to delete this?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?allorder" class="text-light text-decoration-none">no</a></button>
        <button type="button" class="btn btn-primary"><a href="./index.php?deleteorder=<?php echo $order_id?>" class="text-light text-decoration-none">yes</a></button>
      </div>
    </div>
  </div>
</div>
</body>
</html>