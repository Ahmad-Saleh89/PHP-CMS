<?php

// $_POST is a supper global variable
if(isset($_POST['submit'])){
    $namesArray = array("Ahmad", "Heba", "Tom", "Ashley", "Nour", "Maher", "Tony");


    $userName = $_POST['username'];
    $password = $_POST['password'];

    if(strlen($userName) < 2){
        echo "User Name has to be longer than two" . "<br>";
    }elseif(strlen($userName) > 10){
        echo "User name cannot be longer than ten";
    }

    if(!in_array($userName, $namesArray)){
        echo "Sorry you are not allowed";
    }else{
        echo "Welcome to the jungle " . $userName;
    }
}

?>