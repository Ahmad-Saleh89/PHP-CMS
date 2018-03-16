<?php 
    include "db.php";
    
    $query = "SELECT * FROM users";
    $result = mysqli_query($connection, $query);
 
    if(!$result) {
        die('Querry Failed' . mysqli_error());
    }
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container" style=padding-top:50px;>
        <div class="col-sm-12">
            
            <?php
                while($row = mysqli_fetch_assoc($result)){
                ?>
                <pre style="border:2px solid black; padding:20px;">
                <?php
                    print_r($row);
                ?>    
                </pre>
                <?php
                }
                ?>

        </div>
    </div>

</body>
</html>