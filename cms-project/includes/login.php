<?php include "db.php"; ?>
<?php session_start(); ?>

<?php 
if(isset($_POST['login'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  $username = mysqli_real_escape_string($connection, $username);
  $password = mysqli_real_escape_string($connection, $password);

  $query = "SELECT * FROM users WHERE username = '{$username}' ";
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

  if($username === $db_username && $password === $db_user_pw){
    $_SESSION['username'] = $db_username;
    $_SESSION['firstname'] = $db_user_fname;
    $_SESSION['lastname'] = $db_user_lname;
    $_SESSION['user_role'] = $db_user_role;

    header("Location: ../admin");
  }else{
    header("Location: ../index.php");
  }

?>