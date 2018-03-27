<?php include "db.php" ?>

<?php 

// Create a new row in users table
function createRow(){
    global $connection;
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        //  Using some sanitizing: 
        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);

        // crypt password with Blowfish algorithm
        $hashFormat = "$2y$10$";
        $salt = "ichosecodingcozitshard";
        $hashF_and_salt = $hashFormat . $salt;
        $password = crypt($password, $hashF_and_salt);
 
        // Insert Values into users table in the database:
        $query = "INSERT INTO  users(username,password) ";
        $query .= "VALUES ('$username','$password')";
        $result = mysqli_query($connection, $query);
     
        if(!$result) {
            die('Querry Failed' . mysqli_error());
        }else{
            echo "<h4>Your Name and Password are successfully added to our database!!</h4>";
        }
    }
}

function showId(){
    global $connection;
    $query = "SELECT * FROM users";
    $result = mysqli_query($connection, $query);
 
    if(!$result) {
        die('Querry Failed' . mysqli_error());
    }

    while($row = mysqli_fetch_assoc($result)){
        /* Here we are only fetching the value of id from users tabel */
        $id = $row['id'];
        echo "<option value='$id'>$id</option>";
    }
}

// Update table records when Update button is clicked
function updateTable() {
    if(isset($_POST['submit'])) {
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
        }else{
            echo "Name updated";
        }
    }  
}

// Delete row record from users table in database:
function deleteRow() {
    if(isset($_POST['submit'])) {
        global $connection;
        $username = $_POST['username'];
        $password = $_POST['password'];
        $id = $_POST['id'];

        $query = "DELETE FROM users ";
        $query .= "WHERE id = $id ";

        $result = mysqli_query($connection, $query);
        if(!$result){
            die("Query Failed". mysqli_error($connection));
        }else{
            echo "Name deleted";
        }
    }
}

