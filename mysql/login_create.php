<?php 
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $connection = mysqli_connect('localhost', 'root', 'root', 'loginapp', '8889');
        if($connection){
         echo "we are connected";
        }else{
            die("Database connection failed");
        }

        $query = "INSERT INTO  users(username,password) ";
        $query .= "VALUES ('$username','$password')";
        $result = mysqli_query($connection, $query);
     
        if(!$result) {
            die('Querry Failed' . mysqli_error());
        }
    }

?>