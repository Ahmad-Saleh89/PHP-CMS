<?php include "includes/ad_header.php"; ?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/ad_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin page
                            <small>Author</small>
                        </h1>
                    </div>

                    <div class="col-xs-6">

                    <?php insert_categories(); ?>

                    <!-- Add Category - FORM -->
                        <form action="" method="post">
                            <div class="form-group">
                            <label for="cat_title">CATEGORIES</label>
                                <input class="form-control" type="text" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                        </form>
      
                    <?php 
                        // Display the selected category in the Edit Form
                        if(isset($_GET['edit'])){
                            $cat_id = $_GET['edit'];
                            $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
                            $select_category_id = mysqli_query($connection, $query);
                            $cat_row = mysqli_fetch_assoc($select_category_id);
                            $cat_id = $cat_row['cat_id'];
                            $cat_title = $cat_row['cat_title'];
                            // check if the category exists
                            if(isset($cat_title)){
                    ?>
                        <hr>
                        <!-- Edit Category - FORM -->
                        <form action="" method="post">
                            <div class="form-group">
                                <input value="<?php echo $cat_title ?>" class="form-control" type="text" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="edit" value="Edit Category">
                            </div>
                        </form>

                    <?php
                            }
                        } 
                    ?>

                    <?php edit_category(); ?>

                    </div> 

                    <!-- Categories table -->
                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                    // Display all categories
                                    $query = "SELECT * FROM categories";
                                    $select_all_categories = mysqli_query($connection, $query);
                                    while($row = mysqli_fetch_assoc($select_all_categories)){
                                        $cat_id = $row['cat_id'];
                                        $cat_title = $row['cat_title'];
                                ?>

                                <tr>
                                    <td><?php echo $cat_id ?></td>
                                    <td><?php echo $cat_title ?></td>
                                    <td><a href='categories.php?delete=<?php echo $cat_id ?>'>Delete</a></td>
                                    <td><a href='categories.php?edit=<?php echo $cat_id ?>'>Edit</a></td>
                                </tr>
                                <?php } ?> <!-- /End while loop -->

                                <?php delete_categrory(); ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
