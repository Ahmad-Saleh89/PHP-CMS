<?php session_start(); ?>
<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <?php 
                // Catch the clicked post id
                  if(isset($_GET['p_id'])){
                    $get_post_id = $_GET['p_id'];

                    $query = "SELECT * FROM posts WHERE post_id = $get_post_id";
                    $select_this_post = mysqli_query($connection, $query);
                    $row = mysqli_fetch_assoc($select_this_post);
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_all_categories = $row['post_category'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];
                        $post_tags = $row['post_tags'];

                ?>
                    <!-- Blog Post -->
                    <h2>
                        <?php echo $post_title; ?>
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
                    <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                    <hr>
                    <p><?php echo $post_content; ?></p>
                    <!-- <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a> -->
    
                    <hr>
                <?php } // End if statement ?>

                <!-- Blog Comments -->

                <?php 
                    if(isset($_POST['create_comment'])){
                        // first: catch the post id from url
                        $get_post_id = $_GET['p_id'];

                        $comment_author = $_POST['comment_author'];
                        $comment_email = $_POST['comment_email'];
                        $comment_content = $_POST['comment_content'];

                        if(!empty($comment_author) && !empty($comment_email) && !empty($comment_content) ){
                            $query = "INSERT INTO comments (comment_post_id, comment_author,
                            comment_email, comment_content, comment_status, comment_date )";
    
                            $query .= "VALUES ($get_post_id, '{$comment_author}', '{$comment_email}',
                            '{$comment_content}', 'Pending', now())";
    
                            $create_comment_query = mysqli_query($connection, $query);
    
                            if(!$create_comment_query){
                              die('QUERY FAILED' . mysqli_error($connection));  
                            }

                            $msg = "Your comment will show up after it gets approved";
    
                            // Increase post comments count by 1
                            $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
                            $query .= "WHERE post_id = $get_post_id";
                            $update_comments_count_query = mysqli_query($connection, $query);
                        }else{
                            echo "<script>alert('Fields cannot be empty')</script>";
                            $msg = '';
                        }
                    }else{
                        $msg = '';
                    }         
                ?>

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post">
                        <div class="form-group">
                            <label for="comment_author">Your Name</label>
                            <input type="text" class="form-control" name="comment_author">
                        </div>
                        <div class="form-group">
                            <label for="comment_email">Your Email</label>
                            <input type="email" class="form-control" name="comment_email">
                        </div>
                        <div class="form-group">
                            <label for="comment">Your Comment</label>
                            <textarea class="form-control" name="comment_content" rows="3"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                        <br>
                        <p class='text-center bg-success'><?php echo $msg; ?></p>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <?php
                    $query = "SELECT * FROM comments WHERE comment_post_id = {$get_post_id} ";
                    $query .= "AND comment_status = 'Approved' ";
                    $query .= "ORDER BY comment_id DESC ";
                    $select_comment_query = mysqli_query($connection, $query);
                    if(!$select_comment_query){
                        die('QUERY FAILED' . mysqli_error($connection));
                    }
                    while($row = mysqli_fetch_array($select_comment_query)){
                        $comment_author = $row['comment_author'];
                        $comment_date = $row['comment_date'];
                        $comment_content = $row['comment_content'];
                    ?>
                    <!-- Comment -->
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $comment_author; ?>
                                <small><?php echo $comment_date; ?></small>
                            </h4>
                            <?php echo $comment_content; ?>
                        </div>
                    </div>

                <?php } ?>

            </div>

            <br><hr>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>

        <!-- /.row -->
    </div>
    <!-- /.container -->

        <hr>

  <!-- Footer -->
<?php include "includes/footer.php"; ?>
