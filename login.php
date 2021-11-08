<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login">
        <h1>Login</h1>
        <form action="" method="POST">
            <label>Your Email</label>
            <div class="field_text">
                <input  type="email" name="email" required>
            </div>
            <label>Password</label>
            <div class="field_text">
                <input type="password" name="password" required>
            </div>
            <input type="submit" name="login" value="Login">
            <div class="signup_link">
                Create new Account? <a href="register.php">Register</a>
            </div>
            <?php require 'checkLogin.php';?>
        </form>
    </div>
</body>
</html>