<?php include "includes/ad_header.php"; ?>

<body>

    <div id="wrapper">

        <?php 

            $session = session_id();
            $current_time = time();
            $time_live = 180;
            $time_out = $current_time - $time_live;

            $query = "SELECT * FROM online_users WHERE session = '$session' ";
            $send_query = mysqli_query($connection, $query);
            
            // Count how many sessions in online_users table
            $count_sessions = mysqli_num_rows($send_query);
            echo $count_sessions;

            if($count_sessions == NULL){
                $insert_session = "INSERT INTO online_users(session, time) VALUES('$session', '$current_time')";
                $insert_session_query = mysqli_query($connection, $insert_session);

            }else{
                $update_session = "UPDATE online_users SET time = '$current_time' WHERE session = '$session' ";
                $update_session_query = mysqli_query($connection, $update_session);
            }

            $online = "SELECT * FROM online_users WHERE time > '$time_out'";
            $online_query = mysqli_query($connection, $online);
            $count_users = mysqli_num_rows($online_query);

            // Delete offline users from online_users table
            $offline = "DELETE FROM online_users WHERE time < '$time_out'";
            $offline_query = mysqli_query($connection, $offline);
        
        ?>

        <!-- Navigation -->
        <?php include "includes/ad_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome <small><?php echo $_SESSION['firstname']; ?></small>
                        </h1>
                        <h2> <?php echo $count_users ?> </h2>
                    </div>
                </div>
                <!-- /.row -->

                <!-- Admin Dashboard widgets -->
                <?php include "admin_widgets.php"; ?>

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
