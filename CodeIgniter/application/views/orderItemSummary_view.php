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
        <div class = "login-text"><a href = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/loggingProcess"> Register/Login </a></div>
      <?php elseif (!empty($_SESSION['memberID'])): ?>
        <div class = "account-text"><a href = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/account"> Account </a></div>
        <div class = "cart-text"><a href = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/cartFunction/cartView"> Cart </a></div>
        <div class = "logout-text"><a href = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/loggingProcess/logout"> Logout </a></div>
      <?php endif ?>
    </div>

    <div class = "body-wrapper col-7">

      <?php if ($orderItemSummary):?>
          <div class = "orderItemSummaryDiv">
            <table class = "productTable">

              <tr>
                <th>Product No.</th>
                <th>Product Quantity</th>
                <th>Product Price</th>
                <th>Product Total</th>
              </tr>
              <?php $no = 0; ?>
              <?php foreach ($orderItemSummary as $row): ?>
              <?php $_SESSION['orderID'] = $row['orderID']; ?>
                <tr>
                  <td style = "text-align: center;"><a href = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/orderSummary/orderItemSummaryShow/<?php echo $row['productID'];?>/<?php echo $_SESSION['orderID'];?>"><?php echo $no = $no + 1; ?></a></td>
                  <td style = "text-align: center;"><?php echo $row['productQuantity'] ?></td>
                  <td style = "text-align: center;"><?php echo '$'.$row['productPrice'] ?></td>
                  <td style = "text-align: center;"><?php echo '$'.$row['productTotal'] ?></td>
                </tr>
              <?php endforeach; ?>

            </table>
          </div></br>
      <?php endif?>

      <div style = "float: center;">
        <a href = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/account"><input type = "button" value = "Back"/></a>
      </div>

    </div>

    <div class = "footer col-7">
      <div class = "footer-text" style = "padding-top:40px; margin-left:20px;"> Chin-Chwen Tien Copyright &copy; 2015 All Rights Reserved.</div>
    </div>

  </center>
</body>
</html>