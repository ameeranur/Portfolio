<?php
session_start();
include_once('../config.php');






if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $user_name = $_POST['username'];
    $password = $_POST['password'];


    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
 
    $sql = "INSERT INTO user (username, password)
            VALUES ('$user_name',  '$hashed_password')";

    
     if ($con->query($sql) === TRUE) {
        $_SESSION['success_message'] = "Record added successfully";
        header("Location: admin.php"); 
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/login.css'>

</head>


<body>
    <h2 style="margin-bottom: 30%; position: absolute; font-size: 40px;">HELLO, AMEERA!</h2> 

    <a href="admincms.php" style="box-shadow: black; margin-right: 70px;">
        <img src="../assets/logo3.png" alt="Logo" width="270" height="100">
    </a> 
    
    <form action="" method="post">

    <input type="text" name="username" id="username" class="input-field" placeholder="Username" required>
    <input type="password" name="password" id="password" class="input-field" placeholder="Password" required>
    <input type="submit" name="submit" value="Create">
    </form>

    <!--<form method="post" action="login.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form> -->



</body>
</html>
