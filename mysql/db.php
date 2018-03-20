<?php
$connection = mysqli_connect('localhost', 'root', 'root', 'loginapp', '8889');
if(!$connection){
    die("Database connection failed") . mysqli_error($connection);
}
?>