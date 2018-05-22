<?php 
  if(isset($_GET['post_id'])){
   $get_post_id = $_GET['post_id'];
  }
  // Fetch Data for a specific post
  $query = "SELECT * FROM posts WHERE post_id = $get_post_id";
  $select_post_by_id = mysqli_query($connection, $query);
  while($row = mysqli_fetch_assoc($select_post_by_id)){
    $post_author = $row['post_author'];
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_category = $row['post_category'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_date = $row['post_date'];
    $post_content = $row['post_content'];
  }

  if(isset($_POST['update_post'])){
    $post_title = $_POST['title'];
    $post_author = $_POST['author'];
    // $post_category_id = $_POST['post_category_id'];
    $post_status = $_POST['post_status'];

    $post_image = $_FILES['upload_img']['name'];
    $post_image_temp = $_FILES['upload_img']['tmp_name'];

    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];

    // $post_category = $_POST['post_category'];
    // $post_category = implode(" ", $post_category);

    move_uploaded_file($post_image_temp, "../images/$post_image");

    if(empty($post_image)){
      $query = "SELECT * FROM posts WHERE post_id = $get_post_id";
      $select_image = mysqli_query($connection, $query);
      $row = mysqli_fetch_array($select_image);
      $post_image = $row['post_image']; 
    }

    if(empty($_POST['post_category'])){
      $_POST['post_category'] = $post_category;
    }else{
      $post_category = $_POST['post_category'];
      $post_category = implode(" ", $post_category);
    }

    $query = "UPDATE posts SET ";
    $query .= "post_title = '{$post_title}', ";
    $query .= "post_category_id = '{$post_category_id}', ";
    $query .= "post_category = '{$post_category}', ";
    $query .= "post_date = now(), ";
    $query .= "post_author = '{$post_author}', ";
    $query .= "post_status = '{$post_status}', ";
    $query .= "post_image = '{$post_image}', ";
    $query .= "post_tags = '{$post_tags}', ";
    $query .= "post_content = '{$post_content}' ";

    $query .= "WHERE post_id = {$get_post_id} ";

    $update_post = mysqli_query($connection, $query);

    confirmQuery($update_post);

    echo "<p class='bg-success'>Your post has been updated successfully
    <a href='../post.php?p_id={$get_post_id}'> View Post</a></p>";
  }
  
?>


<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" class="form-control" name="title" value="<?php echo $post_title; ?>">
  </div>

  <div class="form-group">
    <label>Post Category</label><br>
    <p>This post's current categories: <span style="color: green"><?php echo $post_category; ?></span></p>
    
    <p><span style="color: red">Note</span>: this post's categories will remain the same unless you change them.</p>
      <?php
        $query = "SELECT * FROM categories";
        $select_all_categories = mysqli_query($connection, $query);

        confirmQuery($select_all_categories);

        while($row = mysqli_fetch_assoc($select_all_categories)){
          $cat_title = $row['cat_title'];
          echo "<input type='checkbox' name='post_category[]' value='$cat_title'> $cat_title <br>";
        }
      ?>
  </div>

  <div class="form-group">
    <label for="author">Post Author</label>
    <input type="text" class="form-control" name="author" value="<?php echo $post_author; ?>">
  </div>

  <div class="form-group">
    <p>Post Status</p>
    <select name="post_status">
      <option value="<?php echo $post_status; ?>"><?php echo $post_status; ?></option>
      <?php 
        if($post_status == 'Draft'){
          echo "<option value='Published'>Published</option>";
        }else{
          echo "<option value='Draft'>Draft</option>";
        }
      ?>
    </select>
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
    <textarea type="text" class="form-control" name="post_content" id="editor" cols="30" rows="10">
      <?php echo $post_content; ?>
    </textarea>
  </div>

  <div class="form-group">
    <input type="submit" class="btn btn-primary" value="Update Post" name='update_post'>
  </div>
</form>