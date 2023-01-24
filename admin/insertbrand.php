<?php
include('../includes/connect.php');
if(isset($_POST['insert-brand'])){
    $brand_title=$_POST['brand-title'];

//select data from database (to avoid redundant category)
    $select_query="Select * from `brands` where brand_title='$brand_title'";
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);

    if($number>0){
        echo"<script>alert('This brand has already been added')</script>";
    }else{


//adding brands to database
    $insert_query="insert into `brands` (brand_title) values ('$brand_title')";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo"<script>alert('Brand has been inserted successfully')</script>";
    }
}}

?>

<h2 class="text-center">Insert Brands</h2>



<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
    <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
            <input type="text" class="form-control" name="brand-title" placeholder="Insert Brands" aria-label="Insert Brands" aria-describedby="basic-addon1">

    </div>

    <div class="input-group w-10 mb-2 m-auto">
    
        <div class="form-floating">
            <input type="submit" class=" bg-info border-0 p-2 my-3" name="insert-brand" value="Insert Brands" aria-label="Username" aria-describedby="basic-addon1">
        <!-- <button class="bg-info p-2 my-3 border-0">Insert Brands</button>
        </div>
</form>