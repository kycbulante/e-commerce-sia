<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3 class="text-center text-success">All categories</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
            <tr class="text-center">
                <th>Sino</th>
                <th>Cateory title</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php
            $select_cat="Select * from `categories` ";
            $result=mysqli_query($con,$select_cat);
            $number=0;
            while($row=mysqli_fetch_assoc($result)){
                $category_id=$row['category_id'];
                $category_title=$row['category_title'];
                $number++;
            
            ?>
            <tr class="text-center">
                <td><?php echo $number; ?></td>
                <td><?php echo $category_title; ?></td>
                <td><a href='index.php?editcategory=<?php echo $category_id?>' class='text-light'> <i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='index.php?deletecategory=<?php echo $category_id?>' class='text-light' type="button" class="text-light" data-toggle="modal" data-target="#exampleModal"> <i class='fa-solid fa-trash'></i></a></td>
           
            </tr>
            <?php
            }
            ?>
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?viewcategory" class="text-light text-decoration-none">no</a></button>
        <button type="button" class="btn btn-primary"><a href="./index.php?deletecategory=<?php echo $category_id?>" class="text-light text-decoration-none">yes</a></button>
      </div>
    </div>
  </div>
</div>


</body>
</html>