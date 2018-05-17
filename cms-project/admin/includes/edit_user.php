<?php 
  if(isset($_GET['user_id'])){
   $get_user_id = $_GET['user_id'];
  }
  // Fetch Data for a specific user
  $query = "SELECT * FROM users WHERE user_id = $get_user_id ";
  $select_user_by_id = mysqli_query($connection, $query);
  while($row = mysqli_fetch_assoc($select_user_by_id)){
    $username = $row['username'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_role = $row['user_role'];
  }

  if(isset($_POST['update_user'])){
    $username = $_POST['username'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_role = $_POST['user_role'];

    // $user_image = $_FILES['upload_img']['name'];
    // $user_image_temp = $_FILES['upload_img']['tmp_name'];

    // move_uploaded_file($post_image_temp, "../images/$post_image");

    // if(empty($post_image)){
    //   $query = "SELECT * FROM users WHERE user_id = $get_user_id";
    //   $select_image = mysqli_query($connection, $query);
    //   $row = mysqli_fetch_array($select_image);
    //   $user_image = $row['user_image']; 
    // }

    $query = "UPDATE users SET ";
    $query .= "username = '{$username}', ";
    $query .= "user_firstname = '{$user_firstname}', ";
    $query .= "user_lastname = '{$user_lastname}', ";
    $query .= "user_email = '{$user_email}', ";
    $query .= "user_password = '{$user_password}', ";
    $query .= "user_role = '{$user_role}' ";
    // $query .= "user_image = '{$user_image}' ";

    $query .= "WHERE user_id = $get_user_id ";

    $update_user = mysqli_query($connection, $query);

    confirmQuery($update_user);

    echo "User updated successfully: " . "<a href='users.php'>Veiw Users</a>";
  }
  
?>

<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
  <label for="username">User Name</label>
  <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
</div>

<div class="form-group">
  <label for="user_firstname">First Name</label>
  <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname; ?>">
</div>


<div class="form-group">
  <label for="user_lastname">Last Name</label>
  <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname; ?>">
</div>

<!-- <div class="form-group">
  <label for="upload_img">User Image</label>
  <input type="file" name="upload_img">
</div> -->

<div class="form-group">
  <label for="user_email">Email</label>
  <input type="email" class="form-control" name="user_email" value="<?php echo $user_email; ?>">
</div>

<div class="form-group">
  <label for="user_password">Password</label>
  <input type="password" class="form-control" name="user_password" value="<?php echo $user_password; ?>">
</div>

<div class="form-group">
  <label for="user_role">Role</label>
  <select class="form-control selcls" name="user_role" id="user_role">
    <option value="<?php echo $user_role ?>"><?php echo ucfirst($user_role); ?></option>

    <?php 
      if($user_role == 'admin'){
        echo "<option value='author'>Author</option>";
        echo "<option value='subscriber'>Subscriber</option>";
      }elseif($user_role == 'subscriber'){
        echo "<option value='admin'>Admin</option>";
        echo "<option value='author'>Author</option>";
      }else{
        echo "<option value='admin'>Admin</option>";
        echo "<option value='subscriber'>Subscriber</option>";
      }
    ?>
  </select>
</div>

<div class="form-group">
  <input type="submit" class="btn btn-primary" name="update_user" value="Update">
</div>

</form>