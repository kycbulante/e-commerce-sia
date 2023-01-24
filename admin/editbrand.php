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
    if(isset($_GET['editbrand'])){
        $editbrand=$_GET['editbrand'];
        // echo $edit_category;

        $get_brand="Select * from `brands` where brand_id=$editbrand";
        $result=mysqli_query($con,$get_brand);
        $row=mysqli_fetch_assoc($result);
        $brand_title=$row['brand_title'];
        // echo $category_title;
        
    }

    if(isset($_POST['editbrand'])){
        $brand_title=$_POST['brand_title'];
        $update_query="update `brands` set brand_title='$brand_title' where brand_id=$editbrand";
        $result_brand=mysqli_query($con, $update_query);
        if($result_brand){
            echo"<script>alert('cbrand updated')</script>";
            echo"<script>window.open('./index.php?viewbrand','_self')</script>";
            
        }
    }
    ?>
   <h1 class="text-center">Edit brand</h1>
   <form action="" method="post" class="text-center">
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="" class="form-label">brand title</label>
        <input type="text" name="brand_title" id="brand_title" class="form-control" required="required" value="<?php echo $brand_title?>">
    </div>
    <input type="submit" value="update brand" class="btn btn-info px-3 mb-3" name="editbrand">
   </form>
</body>
</html>