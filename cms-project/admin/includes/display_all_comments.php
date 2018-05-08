<!-- Display all posts table in the admin dashboard area -->

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
      $query = "SELECT * FROM comments";
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
      echo"<td>$comment_status</td>";
      echo"<td>some title</td>";
      echo"<td>$comment_date</td>";
      echo"<td><a href='admin_posts.php?source=edit_post&post_id={$comment_id}'>Approve</a></td>";
      echo"<td><a href='admin_posts.php?delete={$comment_id}'>Deny</a></td>";
      echo"<td><a href='admin_posts.php?delete={$comment_id}'>Delete</a></td>";
    echo "</tr>";
    } // End while loop ?>
  </tbody>
</table>

<?php
  // if(isset($_GET['delete'])){
  //   $get_post_id = $_GET['delete'];
  //   $query = "DELETE FROM posts WHERE post_id = {$get_post_id} ";
  //   $delete_query = mysqli_query($connection, $query);
  // }
?>