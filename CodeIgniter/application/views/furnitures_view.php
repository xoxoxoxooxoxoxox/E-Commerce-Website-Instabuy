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
            <li value = "h"><a href = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/instabuy/index">Home</a></li>
            <li value = "t"><a href = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/instabuy/technologies">Technologies</a></li>
            <li value = "f" class = "active"><a href = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/instabuy/furnitures">Furnitures</a></li>
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
      <?php if (!empty($product)):?>
        <?php foreach ($product as $row):?>
          <div class = "productShowDiv">
            <table class = "productTable">
              <tr>
                <th><a href = "product/<?php echo $row['productID'];?>"><?php echo $row['productName']; ?></a></th>
              </tr>
              <tr>
                <td style = "text-align: center;"><img src = "<?php echo $row['productImage']; ?>"/></td>
              </tr>
              <tr>
                <td><?php echo $row['productDescription'] ?></td>
              </tr>
              <tr>
                <td>Price: <?php echo '$'.$row['productPrice'] ?></td>
              </tr>
              <?php foreach ($onSales as $rowSales): ?>
                <?php if (($row['productID'] == $rowSales['productID']) && ($rowSales['startDate'] <= $date) && ($rowSales['endDate'] >= $date)): ?>
                  <tr>
                    <td style = "color: red; font-size: 1.5em;">Sales Price: <strong><?php echo '$'.number_format((float)$row['productPrice'] * $rowSales['price'], 2, '.', ''); ?></strong></td>
                  </tr>
                <?php endif; ?>
              <?php endforeach; ?>
            </table>
          </div>
        <?php endforeach; ?>
      <?php endif ?>
    </div>

    <div class = "footer col-7">
      <div class = "footer-text" style = "padding-top:40px; margin-left:20px;"> Chin-Chwen Tien Copyright &copy; 2015 All Rights Reserved.</div>
    </div>

  </center>
</body>
</html>