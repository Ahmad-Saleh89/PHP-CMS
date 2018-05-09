<?php 
  if(isset($_POST['create_post'])){
    $post_title = $_POST['title'];
    $post_author = $_POST['author'];
    $post_category_id = $_POST['post_category_id'];
    $post_status = $_POST['post_status'];

    $post_image = $_FILES['upload_img']['name'];
    $post_image_temp = $_FILES['upload_img']['tmp_name'];

    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');

    $post_category = $_POST['post_category'];
    $post_category = implode(" ", $post_category);

    move_uploaded_file($post_image_temp, "../images/$post_image");

    $query = "INSERT INTO posts(post_category_id, post_category, post_title, post_author,
    post_date, post_image, post_content, post_tags, post_status) ";

    $query .= "VALUES({$post_category_id}, '{$post_category}', '{$post_title}', '{$post_author}', now(),
    '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}' ) ";

    $create_post_query = mysqli_query($connection, $query);

    confirmQuery($create_post_query);

  }

?>

<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" class="form-control" name="title">
  </div>

  <div class="form-group">
    <label for="post_category_id">Post Category Id</label>
    <input type="text" class="form-control" name="post_category_id">
  </div>

  <div class="form-group">
    <p>Post Category</p>
      <?php
        $query = "SELECT * FROM categories";
        $select_all_categories = mysqli_query($connection, $query);

        confirmQuery($select_all_categories);

        while($row = mysqli_fetch_assoc($select_all_categories)){
          // $cat_id = $row['cat_id'];
          $cat_title = $row['cat_title'];
          echo "<input type='checkbox' name='post_category[]' value='$cat_title'> $cat_title <br>";
        }

      ?>
  </div>

  <div class="form-group">
    <label for="author">Post Author</label>
    <input type="text" class="form-control" name="author">
  </div>

  <div class="form-group">
    <p>Post Status</p>
    <select name="post_status">
      <option value="draft">Draft</option>
      <option value="Published">Published</option>
    </select>
  </div>

  <div class="form-group">
    <label for="upload_img">Post Image</label>
    <input type="file" name="upload_img">
  </div>

  <div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input type="text" class="form-control" name="post_tags">
  </div>

  <div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea type="text" class="form-control" name="post_content" id="" cols="30" rows="10">
    </textarea>
  </div>

  <div class="form-group">
    <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
  </div>

</form>