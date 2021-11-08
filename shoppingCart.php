<?php
$conn = mysqli_connect('localhost', 'root', '', 'bakeryshop') 
or die ('Connection Failed'); mysqli_set_charset($conn, "utf8");

session_start();

if(isset($_POST['add']))
{
  if(isset($_SESSION['cart']))
  {
    $session_array_id = array_column($_SESSION['cart'], "productID");

    if(!in_array($_GET['productID'], $session_array_id))
    {
      $session_array  = array(
        'productID' => $_GET['productID'],
        "productName" => $_POST['productName'],
        "image" => $_POST['image'],
        "price" => $_POST['price'],
      );
  
      $_SESSION['cart'][] = $session_array;
    }
  }
  else
  {
    $session_array  = array(
      'productID' => $_GET['productID'],
      "productName" => $_POST['productName'],
      "image" => $_POST['image'],
      "price" => $_POST['price'],
    );

    $_SESSION['cart'][] = $session_array;
  }
}

?>

<?php
		if(isset($_GET['action'])){
			if($_GET['action']=="remove"){
				foreach($_SESSION['cart'] as $key => $value){
					if($value['productID']==$_GET['productID']){
						unset($_SESSION['cart'][$key]);
           
					}
				}
			}
		}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="shoppingCart.css">
    
    <script src="https://kit.fontawesome.com/cb7a61f42e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/cb7a61f42e.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Raleway:wght@200&display=swap" rel="stylesheet"/>
</head>
<body>
  <?php
  if(empty($_SESSION['cart']))
  {
    ?>
    <div class="emptycart">
        <div>
            <img src="Images/cartempty.png" alt="">
        </div>
        <div class="text">
            <h1>Oops!!!</h1>
            <h2>There is no Order</h2>
            <a id="order" href="welcome.php">Click here to Order</a>
        </div>
    </div>
    <?php
  }
  else
  {
    ?>
    <h2 id="h2" class="text-center">Shopping Cart</h2>
<div class="container"> 
 <table id="cart table" class="table table-hover table-condensed"> 
  <thead> 
        <tr> 
            <th style="width:60%"><h3>Products</h3></th> 
            <th style="width:50%"><h3>Name</h3></th> 
            <th style="width:50%"><h3>Price</h3></th>  
            <th style="width:50%">&nbsp;</th>  
            <th style="width:10%"><h3>Remove</h3></th> 
        </tr> 
  </thead> 
  <tbody>
      <?php
      $conn = mysqli_connect('localhost', 'root', '', 'bakeryshop') 
      or die ('Connection Failed'); mysqli_set_charset($conn, "utf8");
      
      $total = 0;

      if(!empty($_SESSION['cart']))
      {
          foreach($_SESSION['cart'] as $key => $value)
          {  ?>
            <tr> 
            <td data-th="Product"> 
                <div class="row"> 
                <div class="col-sm-2 hidden-xs">
                    <img src="<?=$value['image']?>" alt="Product" class="img-responsive" width="100">
                </div> 
                </div> 
            </td>
            <td data-th="Name">
              <h4 class="nomargin"><?=$value['productName']?></h4>  
            </td> 
            <td data-th="Price"><h4>$<?=$value['price']?></h4></td>
            <td>&nbsp;</td>  
            <td class="action" data-th="">
                <a href='shoppingCart.php?action=remove&productID=<?=$value['productID'];?>'>
                    <button id="remove" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                </a> 
            </td> 
          </tr>
        <?php
          $total = $total + $value['price']; 
        }
      }
    
      ?>

  </tbody>
  <tfoot> 
   <tr class="visible-xs"> 
   </tr> 
   <tr> 
    <td>
      <a href="welcome.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue to Order</a>
    </td> 
    <td class="hidden-xs text-center"><strong><h4>Total $<?=$total?></h4></strong>
    <td colspan="2" class="hidden-xs"></td> 
    
    </td> 
    <td><a href=""  class="btn btn-success btn-block">Payment<i class="fa fa-angle-right"></i></a>
    </td> 
   </tr> 
  </tfoot> 
 </table>
</div>
<?php
    }
    ?>
</body>
</html>

