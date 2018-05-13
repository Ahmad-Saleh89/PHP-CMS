<!-- Display all posts table in the admin dashboard area -->

<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>User Id</th>
      <th>UserName</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Role</th>
      <th>Date</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>

    <?php 
      $query = "SELECT * FROM users";
      $select_users = mysqli_query($connection, $query);
      while($row = mysqli_fetch_assoc($select_users)){
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_role = $row['user_role'];
        $user_image = $row['user_image'];

    echo "<tr>";
      echo"<td>$user_id</td>";
      echo"<td>$username</td>";
      echo"<td>$user_firstname</td>";
      echo"<td>$user_lastname</td>";
      echo"<td>$user_email</td>";
      echo"<td>$user_role</td>";
      echo"<td>Some Date</td>";
      echo"<td><a href='users.php?edit_user={$user_id}'>Edit</a></td>";
      echo"<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
    echo "</tr>";
    } // End while loop ?>
  </tbody>
</table>

<?php
  if(isset($_GET['delete'])){
    $get_user_id = $_GET['delete'];
    $query = "DELETE FROM users WHERE user_id = {$get_user_id} ";
    $delete_query = mysqli_query($connection, $query);
    header("Location: users.php");
  }
?>