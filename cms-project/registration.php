<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>

<?php
    if(isset($_POST['register'])){
        $username = $_POST['username'];
        $user_email = $_POST['email'];
        $password = $_POST['password'];

        if(!empty($username) && !empty($user_email) && !empty($password)){
            $username = mysqli_real_escape_string($connection, $username);
            $user_email = mysqli_real_escape_string($connection, $user_email);
            $password = mysqli_real_escape_string($connection, $password);

            $hashed_pw = password_hash($password, PASSWORD_DEFAULT, array('cost' => 10));

            $query = "INSERT INTO users (username, user_email, user_password, user_role) ";
            $query .= "VALUES('{$username}', '{$user_email}', '{$hashed_pw}', 'subscriber')";
            $register_user_query = mysqli_query($connection, $query);
            if(!$register_user_query) {
                die("Query Failed " . mysqli_error($connection) . ' ' . mysqli_errno($connection));
            }else{
                $message = "Congratulations!! You have been registered!";
                
            }
        }else{
            $message = "Feilds cannot be empty!";
        }
       
    }else{
        $message = '';
    }

?>

    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
    <!-- Page Content -->
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                    <h1>Register</h1><br>
                    <h5 class="text-center"><?php echo $message; ?></h5>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="register" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-6 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

<hr>

<?php include "includes/footer.php";?>
