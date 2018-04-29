<div class="col-md-4">

<!-- Blog Search Well -->
<div class="well">
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
<div class="well">
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

</div>

</div>