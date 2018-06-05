<?php
  if(isset($_GET['p_id'])){
    $get_post_id = $_GET['p_id'];
   }
?>

<!-- Page Heading -->
<?php
  $query = "SELECT post_title FROM posts WHERE post_id = '{$get_post_id}'";
  $post_title_query = mysqli_query($connection, $query);
  $row = mysqli_fetch_assoc($post_title_query);
  $post_title = $row['post_title'];
?>

<h2>Post: <?php echo $post_title; ?></h2>
<!-- Display Specific post's comments table in the admin dashboard area -->

<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Id</th>
      <th>Author</th>
      <th>Comment</th>
      <th>Email</th>
      <th>Status</th>
      <th>In Response to</th>
      <th>Date</th>
      <th>Approve</th>
      <th>Deny</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>

    <?php 
      $query = "SELECT * FROM comments WHERE comment_post_id = '{$get_post_id}' ORDER BY comment_id DESC ";
      $select_comments = mysqli_query($connection, $query);
      while($row = mysqli_fetch_assoc($select_comments)){
        $comment_id = $row['comment_id'];
        $comment_post_id = $row['comment_post_id'];
        $comment_author = $row['comment_author'];
        $comment_content = $row['comment_content'];
        $comment_email = $row['comment_email'];
        $comment_status = $row['comment_status'];
        $comment_date = $row['comment_date'];

    echo "<tr>";
      echo"<td>$comment_id</td>";
      echo"<td>$comment_author</td>";
      echo"<td>$comment_content</td>";
      echo"<td>$comment_email</td>";
      ?>
      
      <td style="color: 
      <?php 
        if($comment_status == 'Approved'){
          echo 'green';
        }elseif($comment_status == 'Denied'){
          echo 'red';
        }else{
          echo 'gray';
        }
      
      ?>" ><?php echo $comment_status; ?></td>

      <?php
      // Fetching the related post title from database
      $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
      $select_post_query = mysqli_query($connection, $query);
  
      $row = mysqli_fetch_assoc($select_post_query);
      $related_post_title = $row['post_title'];
      if($related_post_title == NULL){
        $related_post_title = "This post doesn't exist anymore";
        echo"<td>$related_post_title</td>";
      }else{
        echo"<td><a href='../post.php?p_id=$comment_post_id'>$related_post_title</a></td>";
      }

        
      echo"<td>$comment_date</td>";
      echo"<td><a href='comments.php?source=post_comments&p_id={$comment_post_id}&approve={$comment_id}'>Approve</a></td>";
      echo"<td><a href='comments.php?source=post_comments&p_id={$comment_post_id}&deny={$comment_id}'>Deny</a></td>";
      echo"<td><a onClick=\"javascript: return confirm('Are you sure you want to delete this comment') \" href='comments.php?source=post_comments&p_id={$comment_post_id}&delete={$comment_id}'>Delete</a></td>";
    echo "</tr>";
    } // End while loop ?>
  </tbody>
</table>

<?php
  // Deny a comment
  if(isset($_GET['deny'])){
    $get_comment_id = $_GET['deny'];
    $query = "UPDATE comments SET comment_status = 'Denied' WHERE comment_id = $get_comment_id";
    $deny_comment_query = mysqli_query($connection, $query);
    header("Location: comments.php?source=post_comments&p_id={$comment_post_id}");
  }
  // Approve a comment
  if(isset($_GET['approve'])){
    $get_comment_id = $_GET['approve'];
    $query = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id = $get_comment_id";
    $deny_comment_query = mysqli_query($connection, $query);
    header("Location: comments.php?source=post_comments&p_id={$comment_post_id}");
  }

  // Delete a comment
  if(isset($_GET['delete'])){
    $get_comment_id = $_GET['delete'];
    $query = "DELETE FROM comments WHERE comment_id = {$get_comment_id} ";
    $delete_query = mysqli_query($connection, $query);
    header("Location: comments.php?source=post_comments&p_id={$comment_post_id}");
  }
?>