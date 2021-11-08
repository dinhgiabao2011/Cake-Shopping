<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="register.css">
    <!-- <script src="register.js"></script> -->
</head>
<body>
    <div class="sign-up-form">
    <form method="post" action="register.php" class="form">
        <h2>Register</h2>
        <input class="input-box" type="text" name="username" placeholder="User Name" required>
        <input class="input-box" type="text" name="phone" value="" placeholder="Your Phone" required/>
        <input class="input-box" type="text" name="address" value="" placeholder="Your Address" required/>
        <input class="input-box" type="email" name="email" value="" placeholder="Your Email" required/>
        <input class="input-box" type="password" name="password" value="" placeholder="Your Password" required/>
        <input class="input-box" type="password" name="confirmpassword" value="" placeholder="Confirm Your Password" required/>
        <input type="submit" class="signup-btn" name="register" value="Register"/>
        <hr>
        <p>Have an account: <a href="login.php">Login</a></p>
        <?php require 'connect.php';?>  
    </form>
    </div>
</body>
</html>