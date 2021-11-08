<?php
// Kết nối cơ sở dữ liệu
$conn = mysqli_connect('localhost', 'root', '', 'bakeryshop') 
or die ('Connection Failed'); mysqli_set_charset($conn, "utf8");
session_start();
// Dùng isset để kiểm tra Form
if(isset($_POST['register'])){
$username = trim($_POST['username']);
$phone = trim($_POST['phone']);
$address = trim($_POST['address']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$confirmpassword = trim($_POST['confirmpassword']);
// Kiểm tra username hoặc email có bị trùng hay không
$sql = "SELECT * FROM customer WHERE email = '$email'";
// Thực thi câu truy vấn
$result = mysqli_query($conn, $sql);
// Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
if (mysqli_num_rows($result) > 0)
{
echo '<script language="javascript">alert("Your email is valid. Please enter other Email"); 
      window.location="register.php";</script>';
// Dừng chương trình
die ();
}
else {
    if($password == $confirmpassword){
$sql = "INSERT INTO customer (username, phone, address, email, password) 
        VALUES ('$username', '$phone', '$address', '$email','$password')";
echo '<script language="javascript">alert("Register Successfully!"); 
      window.location="register.php";</script>';
$result = mysqli_query($conn, $sql);
}
else
{
    echo "<script>alert('Password and ConfirmPassword are not the same')</script>";
}
}
}
?>