<?php include "includes/ad_header.php"; ?>

<body>

	<div id="wrapper" style="width: 1300px">

		<!-- Navigation -->
		<?php include "includes/ad_navigation.php" ?>

		<div id="page-wrapper" style="width: 1300px">

			<div class="container-fluid">

				<!-- Page Heading -->
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">
								Posts
						</h1>
					</div>
					
					<?php 
						if(isset($_GET['source'])){
							$source = $_GET['source'];
						}else{
							$source = '';
						}

						switch($source){
							case 'add_post';
							include "includes/add_post.php";
							break;

							case 'edit_post';
							include "includes/edit_post.php";
							break;

							default:
							include "includes/display_all_posts.php";
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
	<script src="js/script.js"></script>
</body>

</html>
