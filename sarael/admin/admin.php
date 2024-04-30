
<?php
session_start();
  include "../config.php";
  

  if (isset($_SESSION['ID'])) {
    header("Location: home.php");
    exit();
}

if (isset($_POST['submit'])) {
    $errorMsg = "";
    $username = $con->real_escape_string($_POST['username']);
    $password = $con->real_escape_string($_POST['password']);
    if (!empty($username) || !empty($password)) {
        $query = "SELECT * FROM `user` WHERE `username` = '$username'";
        $result = $con->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashed_password = $row['password'];
            if (password_verify($password, $hashed_password)) {
				$_SESSION['ID'] = $row['id'];
                header("Location:home.php");
                die();
            } else {
                $errorMsg = "Invalid password";
            }
        } else {
            $errorMsg = "No user found with this username";
        }
    } else {
        $errorMsg = "Username and password are required";
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
    <h2 style="margin-bottom: 30%; position: absolute; font-size: 40px;">Welcome, Admin!</h2> 

    <a href="../index.php" style="box-shadow: black; margin-right: 70px;">
        <img src="../assets/logo3.png" alt="Logo" width="270" height="100">
    </a> 
    
    <form action="" method="post">

    <input type="text" name="username" id="username" class="input-field" placeholder="Username" required>
    <input type="password" name="password" id="password" class="input-field" placeholder="Password" required>
    <input type="submit" name="submit" value="Login">
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
