<?php 
  if(isset($_GET['post_id'])){
    echo $get_post_id = $_GET['post_id'];
  }

  $query = "SELECT * FROM posts WHERE post_id = $get_post_id";
  $select_post_by_id = mysqli_query($connection, $query);
  while($row = mysqli_fetch_assoc($select_post_by_id)){
    $post_author = $row['post_author'];
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_date = $row['post_date'];
    $post_content = $row['post_content'];
  }
?>



<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" class="form-control" name="title" value="<?php echo $post_title; ?>">
  </div>

  <div class="form-group">
    <p>Post Category</p>
    <form action="">
      <input type='checkbox' name='post_category' value='Nature' >
    </form>
  </div>

  <div class="form-group">
    <label for="author">Post Author</label>
    <input type="text" class="form-control" name="author" value="<?php echo $post_author; ?>">
  </div>

  <div class="form-group">
    <label for="post_status">Post Status</label>
    <input type="text" class="form-control" name="post_status" value="<?php echo $post_status; ?>">
  </div>

  <div class="form-group">
    <label for="upload_img">Post Image</label>
    <div>
      <img src="../images/<?php echo $post_image; ?>" alt="" width="100">
    </div>
    <br>
    <input type="file" name="upload_img">
  </div>

  <div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags; ?>">
  </div>

  <div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea type="text" class="form-control" name="post_content" id="" cols="30" rows="10">
      <?php echo $post_content; ?>
    </textarea>
  </div>

  <div class="form-group">
    <input type="submit" class="btn btn-primary" name="create_post" value="Edit Post">
  </div>

</form>