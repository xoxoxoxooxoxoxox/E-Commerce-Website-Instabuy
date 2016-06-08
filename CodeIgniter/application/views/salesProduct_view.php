<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>
<script src = "productShow.js" type = "text/javascript"></script>
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
            <li value = "h" class = "active"><a href = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/instabuy/index">Home</a></li>
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
        <div class = "cart-text"><a href = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/cartFunction/cartView">Cart</a></div>
        <div class = "logout-text"><a href = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/loggingProcess/logout">Logout</a></div>
      <?php endif ?>
    </div>

    <div class = "body-wrapper col-7">
      <?php if ($product):?>
          <div class = "productShowDiv">
            <table class = "productTable">
              <tr>
                <th><a href = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/instabuy/salesProduct/<?php echo $product['productID'];?>"><?php echo $product['productName']; ?></a></th>
              </tr>
              <tr>
                <td style = "text-align: center;"><img src = "<?php echo $product['productImage']; ?>"/></td>
              </tr>
              <tr>
                <td><?php echo $product['productDescription'] ?></td>
              </tr>
              <tr>
                <td><?php echo '$'.$product['finalPrice'] ?></td>
              </tr>
              <tr style = "float: right;">
                <td>
                  <form class = "cart" name = "cartAdd" action = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/cartFunction/cart" method = "POST">
                      <select name = "productQuantity">
                        <option value = "1">1</option>
                        <option value = "2">2</option>
                        <option value = "3">3</option>
                        <option value = "4">4</option>
                        <option value = "5">5</option>
                      </select>
                      <input type = "hidden" name = "productID" value = "<?php echo $product['productID']; ?>"/>
                      <input type = "hidden" name = "productName" value = "<?php echo $product['productName']; ?>"/>
                      <input type = "hidden" name = "productPrice" value = "<?php echo $product['finalPrice']; ?>"/>
                      <input class = "cartSent" type = "submit" name = "submit" value = "Add to cart"/>
                    </form>
                  </td>
                </tr>
            </table>
          </div>
      <?php endif; ?>
    </div>

    <div class = "footer col-7">
      <div class = "footer-text" style = "padding-top:40px; margin-left:20px;"> Chin-Chwen Tien Copyright &copy; 2015 All Rights Reserved.</div>
    </div>

  </center>
</body>
</html>