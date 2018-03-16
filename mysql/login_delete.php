<?php include "db.php"; ?>
<?php include "functions.php"; ?>

<?php
    deleteRow();
?>

<?php include "includes/header.php" ?>

    <div class="container" style=padding-top:50px;>
        <div class="col-sm-12">
            <h2 class="text-center">Delete a name</h2>
            <form action="login_delete.php" method="post">
                <div class="form-group">
                 <label for="username">User Name</label>
                  <input type="text" class="form-control" name="username" placeholder="User Name">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password" class="form-control"  placeholder="Password">
                </div>
                <div class="form-group">
                    <select name="id" id="">
                    <?php
                        showId();
                    ?>
                    </select>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Delete</button>
            </form>
        </div>
    </div>

</body>
</html>