<?php
    // Check for errors - function
    function confirmQuery($result) {
        global $connection;
        if(!$result){
            die("QUERY FAILED ." . mysqli_error($connection));
        }
    }


    // Add a New Category
    function insert_categories(){
        global $connection;
        if(isset($_POST['submit'])){
            $cat_title = $_POST['cat_title'];
            if($cat_title == "" || empty($cat_title)){
                echo "This field should not be empty!";
            }else{
                $query = "INSERT INTO categories(cat_title) ";
                $query .= "VALUE('{$cat_title}') ";

                $create_category_query = mysqli_query($connection, $query);
                if(!$create_category_query){
                    die('Query Failed' . mysqli_error($connection));
                }
            }
        }
    }

    // Edit an existing category
    function edit_category(){
        global $connection;
        global $cat_id;
        if(isset($_POST['edit'])){
            $the_cat_title = $_POST['cat_title'];

        $query = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id} ";
        $edit_query = mysqli_query($connection, $query);
            if(!$edit_query){
                die("Editing Failed" . mysqli_error($connection));
            }
        }
    }

    // Delete category
    function delete_categrory(){
        global $connection;
        if(isset($_GET['delete'])){
        $get_cat_id = $_GET['delete'];

        $query = "DELETE FROM categories WHERE cat_id = {$get_cat_id} ";
        $delete_query = mysqli_query($connection, $query);
        header("Location: categories.php");
        }
    }

    function display_all_categories(){
        global $connection;
        // Display all categories
        $query = "SELECT * FROM categories";
        $select_all_categories = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_all_categories)){
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
        ?>
        <tr>
            <td><?php echo $cat_id ?></td>
            <td><?php echo $cat_title ?></td>
            <td><a href='categories.php?delete=<?php echo $cat_id ?>'>Delete</a></td>
            <td><a href='categories.php?edit=<?php echo $cat_id ?>'>Edit</a></td>
        </tr>
        <?php } //End while loop
    }

    // Detect Users online
    function online(){
        global $connection;

        $session = session_id();
        $current_time = time();
        $time_live = 180;
        $time_out = $current_time - $time_live;
    
        $query = "SELECT * FROM online_users WHERE session = '$session' ";
        $send_query = mysqli_query($connection, $query);
        
        // Count how many sessions in online_users table
        $count_sessions = mysqli_num_rows($send_query);
    
        if($count_sessions == NULL){
            $insert_session = "INSERT INTO online_users(session, time) VALUES('$session', '$current_time')";
            $insert_session_query = mysqli_query($connection, $insert_session);
    
        }else{
            $update_session = "UPDATE online_users SET time = '$current_time' WHERE session = '$session' ";
            $update_session_query = mysqli_query($connection, $update_session);
        }

        // Delete offline users from online_users table
        $offline = "DELETE FROM online_users WHERE time < '$time_out'";
        $offline_query = mysqli_query($connection, $offline);
    
        $online = "SELECT * FROM online_users WHERE time > '$time_out'";
        $online_query = mysqli_query($connection, $online);
        return $count_users = mysqli_num_rows($online_query);
    }


?>