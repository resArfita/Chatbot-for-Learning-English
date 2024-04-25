<?php

$con = new mysqli("localhost", "root", "", "chatbot");

if(!$con){
    die(mysqli_error($con));
}


?>