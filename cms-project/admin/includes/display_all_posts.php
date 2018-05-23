<!-- Display all posts table in the admin dashboard area -->

<!-- Checkbox functionality -->
<?php 
  // First: check if any checkbox got checked
  if(isset($_POST['checkBox'])){
    // Second: loop through the CHECKED boxes
    foreach($_POST['checkBox'] as $box_id){
      // Third: assign the chosen BULK OPTION into a variable
      $bulk_option = $_POST['bulk_options'];

      switch($bulk_option){
        case 'Published':
          $query = "UPDATE posts SET post_status = '$bulk_option' WHERE post_id = '$box_id'";
          $update_to_published = mysqli_query($connection, $query);
          break;
        case 'Draft':
          $query = "UPDATE posts SET post_status = '$bulk_option' WHERE post_id = '$box_id'";
          $update_to_draft = mysqli_query($connection, $query);
          break;
        case 'delete':
          $query = "DELETE FROM posts WHERE post_id = '$box_id'";
          $delete_post = mysqli_query($connection, $query);
          break;
      }
    }
  }


?>
<form action="" method='post'>
  <div id="bulkOptionContainer" class="col-xs-4 form-group" style="padding-left: 0">
    <select name="bulk_options" id="" class="form-control" style='display: inline-block; width: 70%'>
      <option value="">Select Options</option>
      <option value="Published">Publish</option>
      <option value="Draft">Draft</option>
      <option value="delete">Delete</option>
    </select>
    <input type="submit" name="submit" class="btn btn-success pull-right" value="Apply">
  </div>
  <div class="col-xs-4 form-group pull-right">
    <a href="admin_posts.php?source=add_post" class="btn btn-primary pull-right">New Post</a>
  </div>
  <table class="table table-bordered table-hover col-lg-12">
    <thead>
      <tr>
        <th><input id="selectAllBoxes" type="checkbox"></th>
        <th>Id</th>
        <th>Author</th>
        <th>Title</th>
        <th>Category</th>
        <th>Status</th>
        <th>Image</th>
        <th>Tags</th>
        <th><small>Comments</small></th>
        <th>Date</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>

      <?php 
        $query = "SELECT * FROM posts";
        $select_posts = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_posts)){
          $post_id = $row['post_id'];
          $post_author = $row['post_author'];
          $post_title = $row['post_title'];
          $post_category = $row['post_category'];
          $post_status = $row['post_status'];
          $post_image = $row['post_image'];
          $post_tags = $row['post_tags'];
          $post_comment_count = $row['post_comment_count'];
          $post_date = $row['post_date'];

      echo "<tr>";
        echo"<td><input class='checkbox' type='checkbox' name='checkBox[]' value='{$post_id}'></td>";
        echo"<td>$post_id</td>";
        echo"<td>$post_author</td>";
        echo"<td><a href='../post.php?p_id={$post_id}'>$post_title</a></td>";
        echo"<td>$post_category</td>";
        echo"<td>$post_status</td>";
        echo"<td><img width='70' src='../images/$post_image'></td>";
        echo"<td>$post_tags</td>";
        echo"<td>$post_comment_count</td>";
        echo"<td>$post_date</td>";
        echo"<td><a href='admin_posts.php?source=edit_post&post_id={$post_id}'>Edit</a></td>";
        echo"<td><a href='admin_posts.php?delete={$post_id}'>Delete</a></td>";
      echo "</tr>";
      } // End while loop ?>
    </tbody>
  </table>
</form>

<div class="col-xs-4">
  <a href="admin_posts.php?source=add_post" class="btn btn-primary">New Post</a>
</div>

<?php
  if(isset($_GET['delete'])){
    $get_post_id = $_GET['delete'];
    $query = "DELETE FROM posts WHERE post_id = {$get_post_id} ";
    $delete_query = mysqli_query($connection, $query);
    header("Location: admin_posts.php");
  }
?>