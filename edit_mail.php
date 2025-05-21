<?php session_start(); ?>

<?php

if(isset($_SESSION['user'])){
    require_once('./settings.php');
    
    // Check if the form has been submitted and email is set in POST
    if(isset($_POST['email'])){
        $OldEmail = $_SESSION['email'];
        $NewEmail = $_POST['email'];

        // Database connection
        $connection = mysqli_connect($host, $user, $pass, $database);

        if($connection){
            // Prepare the SQL query using placeholders to prevent SQL injection
            $sql = "UPDATE user SET email = '$NewEmail' WHERE email = '$OldEmail'";

            // Execute the query
            $result = mysqli_query($connection, $sql);

            // Check if the query was successful
            if ($result) {
                echo "Email updated successfully to: " . htmlspecialchars($NewEmail);
                $_SESSION['email'] = $NewEmail; // Update session email to the new one
                header("location:profile.php");
            } else {
                echo "Error updating email.";
            }

            // Close the database connection
            mysqli_close($connection);
        } else {
            echo "Database connection failed.";
        }
    } else {
        // $errorMsg = "<h1>No email provided.</h1>";
    }
} else {
    echo "Please login to update your email.";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Input Form</title>
</head>
<body>

<h2>Enter Your Email</h2>

<form action="edit_mail.php" method="POST">
    <table>
        <tr>
            <th>Email Address</th>
            <td><input type="email" name="email" required placeholder="Enter your email"></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <input type="submit" value="Submit">
            </td>
        </tr>
    </table>
</form>
<?php
if(isset($errorMsg)){
    echo $errorMsg;
}
?>
</body>
</html>

