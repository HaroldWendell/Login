<?php
    session_start();
    include('connection.php');

    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $c_password = $_POST['confirmPassword'];

        if(!empty($username) && !empty($firstname) && !empty($lastname) && !empty($email) && !empty($password) && !is_numeric($username))
        {
            $query = "insert into users (username, first_name, last_name, email, pass_word, confirm_password) values ('$username', '$firstname', '$lastname', '$email', '$password', '$c_password')";
            mysqli_query($con, $query);
            echo "<script type='text/javascript'> alert('Successfully')</script>";
        }
        else{
            echo "<script type='text/javascript'> alert('Invalid')</script>";
        }

    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Login & Sign Up</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="signupwrapper">
        <div class="form-wrapper">
            <form method="POST">
                <h2>Sign Up</h2>
                <div class="input-group">
                    <input type="text" name="username" required>
                    <label for="username">Username</label>
                </div>
                <div class="input-group">
                    <input type="text" name="firstname" required>
                    <label for="firstname">First Name</label>
                </div>
                <div class="input-group">
                    <input type="text" name="lastname" required>
                    <label for="lastname">Last Name</label>
                </div>
                <div class="input-group">
                    <input type="email" name="email" required>
                    <label for="email">Email</label>
                </div>
                <div class="input-group">
                    <input type="password" name="password" required>
                    <label for="password">Password</label>
                </div>
                <div class="input-group">
                    <input type="password" name="confirmPassword" required>
                    <label for="confirmPassword">Confirm Password</label>
                </div>
                <div class="remember">
                    <label><input type="checkbox" required> I agree to the terms & conditions</label>
                </div>
                <button type="submit">Sign Up</button>
                <div class="signUp-link">
                    <p>Already have an account? <a href="index.php">Sign In</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>