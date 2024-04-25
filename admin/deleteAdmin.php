<?php
include 'connect.php';

if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql = "delete from `admin` where id=$id";
    $result = mysqli_query($con,$sql);
    if($result){
        header("location: dataAdmin.php");
    }else{
        echo "Error";
    }
}

?>