<?php
if(isset($_GET['editproducts'])){
    $edit_id=$_GET['editproducts'];
    // echo $edit_id;
    $get_data="Select * from `products` where product_id=$edit_id";
    $result=mysqli_query($con, $get_data);
    $row=mysqli_fetch_assoc($result);
    $product_title=$row['product_title'];
    // echo $product_title;
    $product_description=$row['product_description'];
    $product_keywords=$row['product_keywords'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];

    //fetch category
    $select_category ="Select * from `categories` where category_id=$category_id";
    $result_category=mysqli_query($con, $select_category);
    $row_category=mysqli_fetch_assoc($result_category);
    $category_title=$row_category['category_title'];
    // echo $category_title;
    
    $select_brand ="Select * from `brands` where brand_id=$brand_id";
    $result_brand=mysqli_query($con, $select_brand);
    $row_brand=mysqli_fetch_assoc($result_brand);
    $brand_title=$row_brand['brand_title'];
    // echo $brand_title;
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docunt</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Edit ha</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_title" class="form-label"> product title</label>
                <input type="text" id="product_title" value="<?php echo $product_title ?>" name="product_title" class="form-control" required="required">

            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_description" class="form-label"> productdesc</label>
                <input type="text" id="product_description" value="<?php echo $product_description ?>" name="product_description" class="form-control" required="required">

            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_keywords" class="form-label"> productd key</label>
                <input type="text" id="product_keywords" value="<?php echo $product_keywords ?>" name="product_keywords" class="form-control" required="required">

            </div>
            <div class="form-outline w-50 m-auto mb-4">
            <label for="product_category" class="form-label"> productd category</label>
                <select name="product_category" class="form-select">
                
                <?php
                 $select_category_all ="Select * from `categories` ";
                 $result_category_all=mysqli_query($con, $select_category_all);

                 while($row_category_all=mysqli_fetch_assoc($result_category_all)){
                    $category_title=$row_category_all['category_title'];
                    $category_id=$row_category_all['category_id'];
                    echo "<option value='$category_id'>$category_title</option>";
                 }
                ?>
                </select>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
            <label for="product_brand" class="form-label"> productd brand</label>
                <select name="product_brand" class="form-select">
                    <?php
                    $select_brand_all ="Select * from `brands` ";
                    $result_brand_all=mysqli_query($con, $select_brand_all);

                    while($row_brand_all=mysqli_fetch_assoc($result_brand_all)){
                        $brand_title=$row_brand_all['brand_title'];
                        $category_id=$row_brand_all['brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                     }
                     ?>

                </select>
            </div>

            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image1" class="form-label"> productd image1</label>
                <div class="d-flex">
                <input type="file" id="product_image1" name="product_image1" class="form-control w-90 m-auto" required="required">
                <img src="./product_images/<?php echo $product_image1?>" alt="" class="product_img">
                </div>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_price" class="form-label"> product_price</label>
                <input type="text" id="product_price" value="<?php echo $product_price ?>" name="product_price" class="form-control" required="required">

            </div>
            <div class="text-center">
                <input type="submit" name="edit_products" value="update_product" class="btn btn-info px-3 mb-3">
            </div>

        </form>
    </div>


    <!-- editing product -->
        
    <?php 
    if(isset($_POST['edit_products'])){
        $product_title=$_POST['product_title'];
        $product_description=$_POST['product_description'];
        $product_keywords=$_POST['product_keywords'];
        $product_category=$_POST['product_category'];
        $product_brand=$_POST['product_brand'];
        // $product_image1=$_POST['product_image1'];
        $product_price=$_POST['product_price'];

        $product_image1=$_FILES['product_image1']['name'];

        $temp_image1=$_FILES['product_image1']['tmp_name'];

        move_uploaded_file($temp_image1,"./product_images/$product_image1");

        $update_products ="update `products` set product_title='$product_title', product_description='$product_description',
        product_keywords='$product_keywords',category_id='$product_category', brand_id='$product_brand', product_image1='$product_image1',
        product_price='$product_price', date=NOW()  where product_id=$edit_id";
        $result_update=mysqli_query($con,$update_products);
        if($result_update){
            echo "<script>alert('Product updateds')</script>";
            echo "<script>window.open('./insertproduct','_self')</script>";
        }
    }


    ?>


</body>
</html>