<?php
$con=mysqli_connect('localhost:3307', 'root','','koreanstore');
if(!$con){
    die(mysqli_error($con));
}
$con1=mysqli_connect('localhost:3307', 'root','','admin');
if(!$con1){
    //echo"hatdog";
    die(mysqli_error($con1));
}
?>