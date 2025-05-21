<?php
session_start();
require_once("./settings.php");
$conn = mysqli_connect($host,$user,$pass,$database);
if($conn){
    $username = "Tanvir Rahman Tonoy";
    $password = "105699937";
    $email = "i_love_web_development@swinburne.com";
    $sql = "select * from user where username = '$username' and password = '$password' and email = '$email'";
    $result = mysqli_query($conn,$sql);

    $validation = (mysqli_fetch_assoc($result)['username'] = $username and mysqli_fetch_assoc($result)['password'] = $password);

    if($validation == 1){
        $_SESSION['user'] = $username;
        $_SESSION['email'] = $email;
        echo "user exists";
        header("location:profile.php");
        
    }else{
        echo "NO match";
    }
}else{
    die("There is an error". mysqli_connect_error($conn));
}
?>