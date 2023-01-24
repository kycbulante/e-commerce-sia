<?php
if(isset($_GET['deletecategory'])){
    $delete_category=$_GET['deletecategory'];
    echo $delete_category;

    $delete_query="Delete from `categories` where category_id=$delete_category";
    $result=mysqli_query($con,$delete_query);
    if($result){
        echo "<script>alert('category deleted')</script>";
        echo "<script>window.open('./index.php?viewcategory','_self')</script>";
    }
}
?>