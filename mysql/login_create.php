<?php include "db.php"; ?>
<?php include "functions.php" ?>

<?php 
createRow();
?>

<?php include "includes/header.php" ?>

    <div class="container" style=padding-top:50px;>
        <div class="col-sm-6">
            <h1 class="text-center">Add a name</h1>
            <form action="login_create.php" method="post">
                <div class="form-group">
                 <label for="username">User Name</label>
                  <input type="text" class="form-control" name="username" placeholder="User Name">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password" class="form-control"  placeholder="Password">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Add Name</button>
            </form>
        </div>
    </div>

</body>
</html>