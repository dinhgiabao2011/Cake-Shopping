<?php
// Kết nối cơ sở dữ liệu
$conn = mysqli_connect('localhost', 'root', '', 'bakeryshop') 
or die ('Connection Failed'); mysqli_set_charset($conn, "utf8");

if(isset($_POST['update']))
{
    // $username = mysqli_real_escape_string($conn, $_POST['username']);   
    $password = mysqli_real_escape_string($conn, $_POST['password']);   
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);    
    $address = mysqli_real_escape_string($conn, $_POST['address']); 
    $sql = "UPDATE customer SET  password = '$password', phone = '$phone', address = '$address' WHERE username = '{$_SESSION['username']}'";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
        echo '<script language="javascript">alert("Update Completed");window.location="afterUpdate.php";</script>';
    }
    else
    {
        echo "<script>alert('Update Failed')</script>";
    }
}

?>