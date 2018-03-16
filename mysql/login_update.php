<?php include "db.php"; ?>
<?php include "functions.php"; ?>

<?php
    if(isset($_POST['submit'])) {
       $username = $_POST['username'];
       $password = $_POST['password'];
       $id = $_POST['id'];

       $query = "UPDATE users SET ";
       $query .= "username = '$username', ";
       $query .= "password = '$password' ";
       $query .= "WHERE id = $id ";

       $result = mysqli_query($connection, $query);
       if(!$result){
           die("Query Failed". mysqli_error($connection));
       }

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
            <form action="login_update.php" method="post">
                <div class="form-group">
                 <label for="username">User Name</label>
                  <input type="text" class="form-control" name="username" placeholder="User Name">
                </div>
                <div class="form-group">
                  <label for="password">PassWord</label>
                  <input type="password" name="password" class="form-control"  placeholder="Password">
                </div>
                <div class="form-group">
                    <select name="id" id="">
                    <?php
                        showAllData();
                    ?>
                    </select>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

</body>
</html>