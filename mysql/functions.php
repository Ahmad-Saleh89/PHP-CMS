<?php include "db.php" ?>

<?php 

// Create a new row in users table
function createRow(){
    global $connection;
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Insert Values into users table in the database:
        $query = "INSERT INTO  users(username,password) ";
        $query .= "VALUES ('$username','$password')";
        $result = mysqli_query($connection, $query);
     
        if(!$result) {
            die('Querry Failed' . mysqli_error());
        }else{
            echo "<h4>Your Name and Password have been successfully added to our database!!</h4>";
        }
    }
}

function showAllData(){
    global $connection;
    $query = "SELECT * FROM users";
    $result = mysqli_query($connection, $query);
 
    if(!$result) {
        die('Querry Failed' . mysqli_error());
    }

    while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        echo "<option value='$id'>$id</option>";
    }
}

// Update table records when Update button is clicked
function UpdateTable() {
    global $connection;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id = $_POST['id'];

    $query = "UPDATE users SET ";
    $query .= "username = '$username', ";
    $query .= "password = '$password' ";
    $query .= "WHERE id = $id ";

    $result = mysqli_query($connection, $query);
    if(!$result){
        die("Query Failed". mysqli_error($connection));
    }
}

// Delete row record from users table in database:
function DeleteRow() {
    global $connection;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id = $_POST['id'];

    $query = "DELETE FROM users ";
    $query .= "WHERE id = $id ";

    $result = mysqli_query($connection, $query);
    if(!$result){
        die("Query Failed". mysqli_error($connection));
    }
}