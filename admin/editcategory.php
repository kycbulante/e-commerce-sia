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
    if(isset($_GET['editcategory'])){
        $edit_category=$_GET['editcategory'];
        // echo $edit_category;

        $get_categories="Select * from `categories` where category_id=$edit_category";
        $result=mysqli_query($con,$get_categories);
        $row=mysqli_fetch_assoc($result);
        $category_title=$row['category_title'];
        // echo $category_title;
        
    }

    if(isset($_POST['edit_cat'])){
        $cat_title=$_POST['category_title'];
        $update_query="update `categories` set category_title='$cat_title' where category_id=$edit_category";
        $result_cat=mysqli_query($con, $update_query);
        if($result_cat){
            echo"<script>alert('category updated')</script>";
            echo"<script>window.open('./index.php?viewcategory','_self')</script>";
            
        }
    }
    ?>
   <h1 class="text-center">Edit Category</h1>
   <form action="" method="post" class="text-center">
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="" class="form-label">Category title</label>
        <input type="text" name="category_title" id="category_title" class="form-control" required="required" value="<?php echo $category_title?>">
    </div>
    <input type="submit" value="update Category" class="btn btn-info px-3 mb-3" name="edit_cat">
   </form>
</body>
</html>