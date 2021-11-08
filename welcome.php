<?php

session_start();

$conn = mysqli_connect('localhost', 'root', '', 'bakeryshop') 
or die ('Connection Failed'); mysqli_set_charset($conn, "utf8");

if(!isset($_SESSION['username']) )
{
    header("Location: login.php");
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Index.css">
    <script src="https://kit.fontawesome.com/cb7a61f42e.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Raleway:wght@200&display=swap" rel="stylesheet"/>
</head>
<body>
<!-- START NAV -->

<nav id="navbar" class="nav">
  <div class="Logo">
    <img src="Images/Logo.PNG" alt="Bakery Shop">
  </div>
  <div>
  <ul class="nav-list">
    <li> 
      <div class="dropdown">
        <button class="dropbtn">Menu</button>
        <div class="dropdown-content">
          <a href="#birthdaycake">Birthday cake</a>
          <a href="#cupcake">Cupcake</a>
        </div>
      </div>
    </li>
    <li>
      <a href="shoppingCart.php">Cart</a>
    </li>
    <?php
    if(!isset($_SESSION['username']))
    {
      ?> 
        <li>
          <a href="login.php">LogIn</a>
        </li>
        <li>
          <a href="register.php">SignUp</a>
        </li>
      <?php
    }
    else
    {
      ?>
      <li>
          <a href="profile.php">Profile</a>
        </li>
        <li>
          <a href="index.php">Logout</a>
        </li>
      <?php
    }
    ?>
  </ul>
  </div>
</nav>
<!-- END NAV -->

<!-- START WELCOME SECTION -->

<div id="header-title" class="header-title">
  <h1>Bakery Shop</h1><br>
  <p>More Sweet More Beautiful</p>
</div>

<!-- END WELCOME SECTION -->

<!-- START PROJECTS SECTION -->


<div id="birthdaycake" class="products-section">
  <h2 class="products-section-header">Birthday Cake</h2>
  
  <div class="products-grid">
  <?php
      $conn = mysqli_connect('localhost', 'root', '', 'bakeryshop') 
      or die ('Connection Failed'); mysqli_set_charset($conn, "utf8");
			$query = "SELECT * FROM product WHERE categoryID = 1";
			$result = mysqli_query($conn, $query);
			while($row = mysqli_fetch_array($result)){
			?>
      <form method="post" action="shoppingCart.php?productID=<?php echo $row['productID']; ?>">
      <div> 
      <img class="product-image" src="<?=$row['image']?>" alt="product"/>
      <p class="name"><?=$row['productName']?></p>
      <div class="price">
        <span class="price">&lt;</span>$<?=number_format($row['price'],2)?><span class="code">&gt;</span>
      </div>
      <input type="hidden" name="productName" value="<?=$row['productName']?>">
      <input type="hidden" name="price" value="<?=$row['price']?>">
      <input type="hidden" name="image" value="<?=$row['image']?>">
      <p class="product-title">
          <input type="submit" name="add" value="Order">
      </p>
    </div>
    </form>
    <?php
      }	
			?>
  </div>
</div>
<div id="cupcake" class="products-section">
  <h2 class="products-section-header">Cup Cake</h2>
  <div class="products-grid">
  <?php
      $conn = mysqli_connect('localhost', 'root', '', 'bakeryshop') 
      or die ('Connection Failed'); mysqli_set_charset($conn, "utf8");
			$query = "SELECT * FROM product WHERE categoryID = 2";
			$result = mysqli_query($conn, $query);
			// $result = $conn->query($query);
			while($row = mysqli_fetch_array($result)){
			?>
       <form method="post" action="shoppingCart.php?productID=<?php echo $row['productID']; ?>">
    <div>
      <img class="product-image" name="image" src="<?=$row['image']?>" alt="product"/>
      <p class="name" name="productName"><?=$row['productName']?></p>
      <div class="price">
        <span class="price" name="price">&lt;</span>$<?=$row['price']?><span class="code">&gt;</span>
      </div>
      <input type="hidden" name="productName" value="<?=$row['productName']?>">
      <input type="hidden" name="price" value="<?=$row['price']?>">
      <input type="hidden" name="image" value="<?=$row['image']?>">
      <p class="product-title">
          <input type="submit" name="add" value="Order">
      </p>
    </div>
    </form>
    <?php
      }	
			?>
  </div>
  </div>
</div>


<!-- END PROJECTS SECTION -->

<!-- START CONTACT SECTION -->

<div id="contact" class="contact-section">
  <div id="address">
    <img src="Images/Address.PNG" alt="Address">
  </div>
  <div class="contact-links">
    <div class="links">
    <a
      href="https://www.facebook.com/profile.php?id=100004248709309"
      target="_blank"
      class="btn contact-details"
      ><i class="fab fa-facebook-square"></i> Facebook</a
    >
    </div>
    <div class="links">
    <a
      href="https://www.instagram.com/dinh_gia_baoo/"
      target="_blank"
      class="btn contact-details"
      ><i class="fab fa-instagram"></i> Instagram</a
    >
    </div>
    <div class="links">
    <p href="" class="btn contact-details"
      ><i class="fas fa-mobile-alt"></i> 0905098828</p
    >
    </div>
    <div class="links">
    <p href="" 
      class="btn contact-details"><i class="fas fa-at"></i> dinhbb999@gmail.com</p
    >
    </div>
  </div>
</div>

<!-- END CONTACT SECTION -->

<!-- START FOOTER SECTION -->
<div>
<footer>
  <p>
    Copyright By Dinh Gia Bao 2021
  </p>
</footer>
</div>
</body>
</html>