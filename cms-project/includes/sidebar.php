<div class="col-lg-4">

    <!-- Blog Search Well -->
    <div class="well col-sm-6 col-lg-12">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">
            <div class="input-group">
                <input type="text" name="search" class="form-control">
                <span class="input-group-btn">
                    <button name="submit" class="btn btn-default" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                </button>
                </span>
            </div>
        </form>
        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well col-sm-6 col-lg-12">
        <h4>Categories</h4>
        <div class="row">
            <div class="col-lg-12">

                <?php 
                    $query = "SELECT * FROM categories LIMIT 10";
                    $select_sidebar_categories = mysqli_query($connection, $query);
                ?>

                <ul class="list-unstyled">
                    <?php 
                        while($row = mysqli_fetch_assoc($select_sidebar_categories)){
                            $cat_title = $row['cat_title'];
                            echo "<li><a href='category.php?category=$cat_title'>{$cat_title}</a></li>";
                        }
                    ?>
                </ul>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <?php include "widget.php" ?>

    <!-- Log in -->
    <div class="well col-sm-6 col-lg-12" style="height: 250px">
        <h4>Login</h4>
        <form action="includes/login.php" method="post">
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Username">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="col-xs-4 pull-left" style="padding-left: 0">
                <span class="input-group-btn">
                    <button name="login" class="btn btn-default" type="submit">
                        Login <span class="glyphicon glyphicon-log-in"></span>
                    </button>
                </span>
            </div>
        </form>
        <div class="col-xs-6 pull-right">
            <p>Not a member?</p>
            <a href="registration.php" class="btn btn-primary">Register Now</a>
        </div>

        <!-- /.input-group -->
    </div>

</div>