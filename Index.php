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
      <a href="emptycart.php">Cart</a>
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

<!-- START PRODUCT SECTION -->
<form action="" method="post"  >
<div id="birthdaycake" class="products-section">
  <h2 class="products-section-header">Birthday Cake</h2>
  <div class="products-grid">
  <?php
      $conn = mysqli_connect('localhost', 'root', '', 'bakeryshop') 
      or die ('Connection Failed'); mysqli_set_charset($conn, "utf8");
			$query = "SELECT * FROM product WHERE categoryID = 1";
			$result = mysqli_query($conn, $query);
			// $result = $conn->query($query);
			while($row = mysqli_fetch_array($result)){
			?>
      <div> 
      <img class="product-image" src="<?=$row['image']?>" alt="product"/>
      <p class="name"><?=$row['productName']?></p>
      <div class="price">
        <span class="price">&lt;</span>$<?=$row['price']?><span class="code">&gt;</span>
      </div>
      <p class="product-title">
          <input type="submit" name="add" value="Order">
      </p>
    </div>
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
    <div>
      <img class="product-image" src="<?=$row['image']?>" alt="product"/>
      <p class="name"><?=$row['productName']?></p>
      <div class="price">
        <span class="price">&lt;</span>$<?=$row['price']?><span class="code">&gt;</span>
      </div>
      <p class="product-title">
          <input type="submit" name="add" value="Order">
      </p>
    </div>
    <?php
      }	
			?>
  </div>
</div>
</form>

<!-- END PROJECTS SECTION -->

<!-- START CONTACT SECTION -->

<div id="contact" class="contact-section">
  <div id="address"><img src="Images/Address.PNG" alt="Address"></div>
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
<?php
		if(isset($_POST['add'])){

    $conn = mysqli_connect('localhost', 'root', '', 'bakeryshop') 
    or die ('Connection Failed'); mysqli_set_charset($conn, "utf8");

    $email = trim($_POST['email']);

		$sql = "SELECT * FROM customer WHERE email = '$email'";
		
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) < 1)
			{
			echo '<script language="javascript">alert("You have to Log in before Order"); window.location="login.php";</script>';
			die();
			}
		}
?>
