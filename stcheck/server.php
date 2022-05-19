<?php 
    session_start();

    $conn = mysqli_connect("localhost" , "root" , "" , "stcheck");

    if(!$conn){
        echo "Disconnected" ;
    }
?>