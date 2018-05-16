<?php include "includes/ad_header.php"; ?>
<?php 
  if(isset($_SESSION['username'])){
   $username = $_SESSION['username'];
  }
  // Fetch Data for a specific user
  $query = "SELECT * FROM users WHERE username = '{$username}' ";
  $select_user_profile_query = mysqli_query($connection, $query);
  while($row = mysqli_fetch_assoc($select_user_profile_query)){
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_password = $row['user_password'];
    $user_fname = $row['user_firstname'];
    $user_lname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_role = $row['user_role'];
  }
?>


<body>

	<div id="wrapper">

		<!-- Navigation -->
		<?php include "includes/ad_navigation.php" ?>

		<div id="page-wrapper">

			<div class="container-fluid">

				<!-- Page Heading -->
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">
							Profile Information
						</h1>

            <table class="table table-striped table-hover">
              <tbody>
                <tr>
                  <td class='col-xs-3'><strong>Username</strong></td>
                  <td><?php echo $username; ?></td>
                </tr>
                <tr>
                  <td class='col-xs-3'><strong>First Name</strong></td>
                  <td><?php echo $user_fname; ?></td>
                </tr>
                <tr>
                  <td class='col-xs-3'><strong>Last Name</strong></td>
                  <td><?php echo $user_lname; ?></td>
                </tr>
                <tr>
                  <td class='col-xs-3'><strong>Email</strong></td>
                  <td><?php echo $user_email; ?></td>
                </tr>
                <tr>
                  <td class='col-xs-3'><strong>Role</strong></td>
                  <td><?php echo $user_role; ?></td>
                </tr>
                <tr>
                  <td class='col-xs-3'><strong>Password</strong></td>
                  <td>*******</td>
                </tr>
              </tbody>
            </table>

            <?php echo "<a href='users.php?source=edit_user&user_id={$user_id}' class='btn btn-primary'>Edit Profile</a>" ?>
            <br><br>

					</div>
					

				</div> <!-- /.row -->
				
			</div>
			<!-- /.container-fluid -->

		</div>
		<!-- /#page-wrapper -->

	</div>
	<!-- /#wrapper -->

	<!-- jQuery -->
	<script src="js/jquery.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>

</body>

</html>
