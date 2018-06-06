<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php 
                  if(isset($_GET['category'])){
                    $get_category_title = $_GET['category'];
                  }

                ?>

                <h1 class="page-header">
                  <?php echo $get_category_title . " "; ?> related blogs
                </h1>

                <?php
                //  Pagination system
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                    if($page == 1){
                        $posts_offset = 0;
                        }else{
                            $posts_offset = ($page * 5) - 5;
                        }
                    }else{
                        $page = 0;
                        $posts_offset = 0;
                    }


                    // Detecting how many Published posts we have for Pagination purpose
                    $posts_count_query = "SELECT * FROM posts WHERE post_status = 'Published' AND post_category LIKE '%$get_category_title%' ";
                    $find_count = mysqli_query($connection, $posts_count_query);
                    $count = mysqli_num_rows($find_count);

                    $count = ceil($count / 5);

                // select data from posts table in database:
                    $query = "SELECT * FROM posts WHERE post_category LIKE '%$get_category_title%' ORDER BY post_id DESC LIMIT $posts_offset, 5 ";
                    $select_all_posts_query = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_all_posts_query)){
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_all_categories = $row['post_category'];
                        $post_image = $row['post_image'];
                        $post_content = substr($row['post_content'], 0, 200);
                        $post_tags = $row['post_tags'];
                        $post_status = $row['post_status'];


                        if($post_status == 'Published'){

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
                    <p><?php echo $post_content; ?>......</p>
                    <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">
                    Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
    
                    <hr>
                <?php } // End if Statement
                
                } ?> <!-- Ending while loop -->

                <!-- Pager -->
                <ul class="pager">
                    <?php
                        for($i = 1; $i <= $count; $i++){ 
                            if($i == $page){
                                echo "<li style='margin-right: 8px'><a href='category.php?category=$get_category_title&page={$i}' class='active_link'>{$i}</a></li>";
                            }else{
                                echo "<li style='margin-right: 8px'><a href='category.php?category=$get_category_title&page={$i}'>{$i}</a></li>";
                            }
                        }
                    ?>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>
        <!-- /.row -->

        <hr>

  <!-- Footer -->
<?php include "includes/footer.php"; ?>
