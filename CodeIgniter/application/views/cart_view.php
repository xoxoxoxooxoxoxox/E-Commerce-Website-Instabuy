<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>
<!--<script src = "cartViewJS.js" type = "text/javascript"></script>-->
<head>
  <title>Instabuy</title>
  <meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
  <link rel = "stylesheet" type = "text/css" href = "http://cs-server.usc.edu:8436/CodeIgniter/assets/css/style.css"/>
</head>
<body>
  <center>
    <div class = "wrapper col-8">
      <div class = "logo"> Insta<strong>buy</strong></div>
        <div class = "menu">
          <ul class = "solidblockmenu">
            <li value = "h"><a href = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/instabuy/index">Home</a></li>
            <li value = "t"><a href = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/instabuy/technologies">Technologies</a></li>
            <li value = "f"><a href = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/instabuy/furnitures">Furnitures</a></li>
            <li value = "c"><a href = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/instabuy/clothings">Clothings</a></li>
            <li value = "a"><a href = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/instabuy/automobiles">Automobiles</a></li>
            <li value = "hs"><a href = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/instabuy/hotSales">Hot Sales</a></li>
          </ul>
        </div>
    </div>

    <div class = "loginBar col-8">
      <?php if (empty($_SESSION['memberID'])): ?>
        <div class = "login-text"><a href = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/loggingProcess">Register/Login</a></div>
      <?php elseif (!empty($_SESSION['memberID'])): ?>
        <div class = "account-text"><a href = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/account">Account</a></div>
        <div class = "cart-text" class = "active"><a href = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/cartFunction/cartView">Cart</a></div>
        <div class = "logout-text"><a href = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/loggingProcess/logout">Logout</a></div>
      <?php endif ?>
    </div>

    <div class = "body-wrapper">
      <?php if (!empty($cartView)):?>
          <div class = "cartViewDiv">
            <table class = "cartTable col-7">
              <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Remove</th>
                <th>Update</th>
              </tr>
              <?php foreach ($cartView as $row):?>
                <tr>
                  <form name = "update" action = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/cartFunction/cart" method = "POST">
                    <td style = "text-align: center;"><?php echo $row['productName'];?></a></td>
                    <td style = "text-align: center;"><?php echo '$'.$row['productPrice']; ?></td>
                    <td style = "text-align: center;">
                      <select name = "changeQuantity">
                        <option value = "1" <?php if ($row['productQuantity'] == 1) echo selected; ?>>1</option>
                        <option value = "2" <?php if ($row['productQuantity'] == 2) echo selected; ?>>2</option>
                        <option value = "3" <?php if ($row['productQuantity'] == 3) echo selected; ?>>3</option>
                        <option value = "4" <?php if ($row['productQuantity'] == 4) echo selected; ?>>4</option>
                        <option value = "5" <?php if ($row['productQuantity'] == 5) echo selected; ?>>5</option>
                      </select>
                    </td>
                    <td style = "text-align: center;"><?php echo '$'.$row['productTotal']; ?></td>
                    <td style = "text-align: center;"><input type = "submit" name = "submit" value = "Remove"/></td>
                    <td style = "text-align: center;"><input type = "submit" name = "submit" value = "Update"/></td>
                    <input type = "hidden" name = "productID" value = "<?php echo $row['productID']; ?>"/>
                    <input type = "hidden" name = "productPrice" value = "<?php echo $row['productPrice']; ?>"/>
                  </form>
                </tr>
              <?php endforeach; ?>
            </table>
            <div class = "checkoutButton">
              <a href = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/checkOut/checkOutView"><input type = "button" value = "Check out"/></a>
            </div>
          </div>
        <?php elseif (empty($cartView)): ?>
          <div class = "cartViewDiv">
            <table class = "cartTable col-7">
              <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Remove</th>
                <th>Update</th>
              </tr>
            </table>
            <div class = "zeroItemMsg">You have zero item in the shopping cart.</div>
          </div>
      <?php endif ?>
    </div>

    <div class = "footer col-7">
      <div class = "footer-text" style = "padding-top:40px; margin-left:20px;"> Chin-Chwen Tien Copyright &copy; 2015 All Rights Reserved.</div>
    </div>

  </center>
</body>
</html> 