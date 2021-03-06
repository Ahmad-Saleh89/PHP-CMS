<?php include "includes/ad_header.php"; ?>

<body>

	<div id="wrapper">

		<!-- Navigation -->
		<?php include "includes/ad_navigation.php" ?>

		<div id="page-wrapper" style="min-width: 800px; max-width: 1000px">

			<div class="container-fluid">

				<!-- Page Heading -->
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">
								Users
						</h1>
					</div>
					
					<?php 
						if(isset($_GET['source'])){
							$source = $_GET['source'];
						}else{
							$source = '';
						}

						switch($source){
							case 'add_user';
							include "includes/add_user.php";
							break;

							case 'edit_user';
							include "includes/edit_user.php";
							break;

							default:
							include "includes/display_all_users.php";
						}
					?>


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
