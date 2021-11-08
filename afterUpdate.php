<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="profile.css">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Raleway:wght@200&display=swap" rel="stylesheet"/>
</head>
<body>
    <div class="box">
        <form class="profile tabShow" action="" method="post">
            <?php
                // Kết nối cơ sở dữ liệu
                $conn = mysqli_connect('localhost', 'root', '', 'bakeryshop') 
                or die ('Connection Failed'); mysqli_set_charset($conn, "utf8");

                session_start();

                $currentUser = $_SESSION['username'];
                $sql = "SELECT * FROM customer WHERE username = '$currentUser'";

                $gotResults = mysqli_query($conn, $sql);

                if($gotResults)
                {
                    if(mysqli_num_rows($gotResults) > 0)
                    {
                        while($row = mysqli_fetch_array($gotResults))
                        {
                            ?>
                                <div>
                                    <h1>Profile</h1>
                                </div>
                                <div class="form">
                                    <p>Your email</p>
                                    <input type="text" class="input" name="email" value="<?php echo $row['email']; ?>" disabled>
                                </div>
                                <div class="form">
                                    <p>Your Password</p>
                                    <input type="password" class="input" name="password" value="<?php echo $row['password']; ?>">
                                </div>
                                <div class="form">
                                    <p>User name</p>
                                    <input type="text" class="input" name="username" value="<?php echo $row['username']; ?>" disabled>
                                </div>
                                <div class="form">
                                    <p>Phone Number</p>
                                    <input type="phone" class="input" name="phone" value="<?php echo $row['phone']; ?>">
                                </div>
                                <div class="form">
                                    <p>Address</p>
                                    <input type="text" class="input" name="address" value="<?php echo $row['address']; ?>">
                                </div>
                                <br>
                            <?php
                        }
                    }
                }
            ?>
            <input class="btn" type="submit" name="update" value="Update">
            <?php require 'updateProfile.php';?>
        </form>
    </div>
</body>
</html>