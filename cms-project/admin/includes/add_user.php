<?php 
  if(isset($_POST['add_user'])){
    $username = $_POST['username'];
    $user_password = $_POST['user_password'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];

    // $user_image = $_FILES['upload_img']['name'];
    // $user_image_temp = $_FILES['upload_img']['tmp_name'];

    
    $user_role = $_POST['user_role'];


    // move_uploaded_file($post_image_temp, "../images/$post_image");

    $query = "INSERT INTO users(username, user_password, user_firstname, user_lastname,
    user_email, user_role) ";

    $query .= "VALUES('{$username}', '{$user_password}', '{$user_firstname}', '{$user_lastname}',
    '{$user_email}', '{$user_role}' ) ";

    $add_user_query = mysqli_query($connection, $query);

    confirmQuery($add_user_query);

  }

?>

<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="username">User Name</label>
    <input type="text" class="form-control" name='username'>
  </div>

  <div class="form-group">
    <label for="user_firstname">First Name</label>
    <input type="text" class="form-control" name="user_firstname">
  </div>


  <div class="form-group">
    <label for="user_lastname">Last Name</label>
    <input type="text" class="form-control" name="user_lastname">
  </div>

  <!-- <div class="form-group">
    <label for="upload_img">User Image</label>
    <input type="file" name="upload_img">
  </div> -->

  <div class="form-group">
    <label for="user_email">Email</label>
    <input type="email" class="form-control" name="user_email">
  </div>

  <div class="form-group">
    <label for="user_password">Password</label>
    <input type="password" class="form-control" name="user_password">
  </div>

  <div class="form-group">
    <label for="user_role">Role</label>
    <select class="form-control selcls" name="user_role" id="user_role">
      <option value="subscriber">Select Option</option>
      <option value="admin">Admin</option>
      <option value="author">Author</option>
      <option value="subscriber">Subscriber</option>
    </select>
  </div>

  <div class="form-group">
    <input type="submit" class="btn btn-primary" name="add_user" value="Add User">
  </div>

</form>