<?php
// Kết nối cơ sở dữ liệu
$conn = mysqli_connect('localhost', 'root', '', 'bakeryshop') 
or die ('Connection Failed'); mysqli_set_charset($conn, "utf8");

session_start();

// if(isset($_SESSION['username']))
// {
//     header("Location: welcome.php");
// }

if(isset($_POST['login'])){
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM customer WHERE email = '$email' AND password = '$password'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        // header("Location: welcome.php");
        echo '<script language="javascript" >alert("Login Successfully"); 
              window.location="welcome.php";</script>';
    }
    else
    {
        echo '<script language="javascript" >alert("Email or Password is Wrong"); 
              window.location="login.php";</script>';
    }
}
?>


