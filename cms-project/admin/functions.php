<?php
    // //// Add a New Category
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

?>