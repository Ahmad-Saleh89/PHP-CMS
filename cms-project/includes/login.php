<?php include "db.php"; ?>
<?php session_start(); ?>

<?php 
if(isset($_POST['login'])){
  $user_id = $_POST['userId'];
  $password = $_POST['password'];

  $user_id = mysqli_real_escape_string($connection, $user_id);
  $password = mysqli_real_escape_string($connection, $password);

  $query = "SELECT * FROM users WHERE username = '{$user_id}' OR user_email = '{$user_id}'";
  $select_user_query = mysqli_query($connection, $query);

  if(!$select_user_query){
    die("Query Failed". mysqli_error($connection));
  }
}

  while($row = mysqli_fetch_array($select_user_query)){
    $db_user_id = $row['user_id'];
    $db_username = $row['username'];
    $db_user_fname = $row['user_firstname'];
    $db_user_lname = $row['user_lastname'];
    $db_user_email = $row['user_email'];
    $db_user_pw = $row['user_password'];
    $db_user_role = $row['user_role'];
  }

  if(password_verify($password, $db_user_pw)){
    $_SESSION['user_id'] = $db_user_id;
    $_SESSION['username'] = $db_username;
    $_SESSION['firstname'] = $db_user_fname;
    $_SESSION['lastname'] = $db_user_lname;
    $_SESSION['user_role'] = $db_user_role;
    $_SESSION['user_email'] = $db_user_email;
    $_SESSION['user_pw'] = $db_user_pw;

    header("Location: ../admin");
  }else{
    header("Location: ../index.php");
  }

?>