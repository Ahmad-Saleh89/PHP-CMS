<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

        <?php 

            if(isset($_POST['submit'])){
                $search = $_POST['search'];

            ?>

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <h1 class="page-header">
                    <?php echo $search; ?> related blogs
                </h1>

                <?php
                    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' 
                                OR post_category LIKE '%$search%'
                                OR post_author LIKE '%$search%' ";
                    $search_query = mysqli_query($connection, $query);
    
                    if(!$search_query){
                        die("Query Failed" . mysqli_error($connection));
                    }
    
                    // Return the number of rows:
                    $rowCount = mysqli_num_rows($search_query);
                    if($rowCount == 0){
                        echo "<h1> No Result </h1>";
                    }else {
                    while($row = mysqli_fetch_assoc($search_query)){
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_all_categories = $row['post_category'];
                        $post_image = $row['post_image'];
                        $post_content = substr($row['post_content'], 0, 200);
                        $post_tags = $row['post_tags'];

                    ?>

                    <!-- Blog Post -->
                    <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="author.php?author=<?php echo $post_author; ?>"><?php echo $post_author; ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?>
                        under 
                        <?php 
                            // Convert categories string into an array
                            $categories_array = explode(" ", $post_all_categories);
                            foreach($categories_array as $key => $category){
                                echo "<a href='category.php?category=$category'>$category</a> ";
                            }
                        ?></p>
                    <p>Tags: <?php echo $post_tags ?></p>
                    <hr>
                    <a href="post.php?p_id=<?php echo $post_id; ?>">
                        <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                    </a>
                    <hr>
                    <p><?php echo $post_content; ?>.....</p>
                    <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">
                    Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
    
                    <hr>
                <?php }
                    }
                }
                ?>


            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>
        <!-- /.row -->

        <hr>

  <!-- Footer -->
<?php include "includes/footer.php"; ?>
