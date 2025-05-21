<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
<?php
session_start();
if(isset($_SESSION['user'])){
    echo "<h1>Welcome </h1><br> ";
    echo  "<h2>".$_SESSION['user'] ."</h2> "."<br>" ;
    echo "<p>". $_SESSION['email']."</p> <br>";
    echo "<a href='edit_mail.php'>Edit </a>"."<br>";
}
?>
</body>
</html>

