<?php 
    include "db.php";
    
    $query = "SELECT * FROM users";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die('Querry Failed' . mysqli_error());
    }
?>


<?php include "includes/header.php" ?>

    <div class="container" style=padding-top:50px;>
        <div class="col-sm-12">
            <h3 class="text-center">This is users table fetched from the database</h3>
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