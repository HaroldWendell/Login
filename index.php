<?php
    session_start();
    include('connection.php');

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(!empty($username) && !empty($password) && !is_numeric($username))
        {
            $query = "select * from users where username = '$username' limit 1";
            $result = mysqli_query($con, $query);

            if($result)
            {
                if($result && mysqli_num_rows($result)>0)
                {
                    $user_data = mysqli_fetch_assoc($result);
                    if($user_data['pass_word'] == $password){
                        echo "<script type='text/javascript'> alert('Successfully Login')</script>";
                        header("location: user.php");
                        die;
                    }
                }
            }
            echo "<script type='text/javascript'> alert('Incorrect Username or Password')</script>";
        }
        else{
            echo "<script type='text/javascript'> alert('Incorrect Username or Password')</script>";
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
    <div class="wrapper">
        <div class="form-wrapper">
            <form method="POST">
                <h2>Login</h2>
                <div class="input-group">
                    <input type="text" name="username" required>
                    <label for="username">Username</label>
                </div>
                <div class="input-group">
                    <input type="password" name="password" required>
                    <label for="password">Password</label>
                </div>
                <div class="remember">
                    <label><input type="checkbox" required> Remember me</label>
                </div>
                <button type="submit">Login</button>
                <div class="signUp-link">
                    <p>Don't have an account? <a href="signup.php" class="signUpBtn-link">Sign Up</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>