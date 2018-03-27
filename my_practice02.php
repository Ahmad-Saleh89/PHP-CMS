<!-- GET , COOKIES , SESSIONS -->
<?php 
// starting a session
session_start();
$_SESSION['message'] = "This is the message of the session";
// setting the cookie
$name = "myCookie";
$value = "this is the value of the cookie";
$expiration = time() + (60*60*24*7);
setcookie($name,$value,$expiration);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GET,COOKIES,SESSIONS</title>
</head>
<body>

<a href="my_practice02.php?name=Ahmad">Click Here</a>
<?php 
if(isset($_GET['name'])){
    echo $_GET['name'];
}
?>
<br>
<!-- Checking if the cookie was set -->
<?php 
if(isset($_COOKIE[$name])){
    echo $_COOKIE[$name];
}
?>
<br>
<!-- Checking if the session was set -->
<?php 
if(isset($_SESSION['message'])){
    echo $_SESSION['message'];
}
?>

    
</body>
</html>
