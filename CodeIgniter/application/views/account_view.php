<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>
<script src = "productShow.js" type = "text/javascript"></script>
<head>
  <title>Account</title>
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

    <div class = "body-wrapper">

      <div class = "member_login">

        <div class = "formtitle"></div>
        <div class = "show">

          <?php if (!empty($user)): ?>
            <?php foreach ($user as $row): ?>
              <div class = "memberInfoDiv col-m-6">
                <table class = "memberTable">
                  <tr>
                    <th>Member Information</th>
                  </tr>
                  <tr>
                    <td>First name: <?php echo $row['firstName']; ?></td>
                  </tr>
                  <tr>
                    <td>Last name: <?php echo $row['lastName']; ?></td>
                  </tr>
                  <tr>
                    <td>Username: <?php echo $row['username']; ?></td>
                  </tr>
                  <tr>
                    <td>Email: <?php echo $row['email']; ?></td>
                  </tr>
                  <tr>
                    <td>Address: <?php echo $row['address'].', '.$row['city'].', '.$row['country']; ?></td>
                  </tr>
                </table>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
          
        </div>
        <div class = "paymentButtons"></br>
          <div><a href = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/account/accountEdit">Edit</a></div>
        </div>

        <div class = "show">
          <?php if (!empty($payment)): ?>
            <div class = "walletDiv col-m-6">
              <table class = "walletTable">
                <tr>
                  <th>Wallet</th>
                </tr>
                <?php foreach ($payment as $row): ?>
                <tr>
                  <td>- Payment name: <?php echo $row['methodName'] ?></td>
                </tr>
                <tr>
                  <td>&nbsp&nbsp Payment type: <?php echo $row['methodType']; ?></td>
                </tr>
                <tr>
                  <td>&nbsp&nbsp Card No.: <?php echo $row['cardNo']; ?></td>
                </tr>
                <?php endforeach; ?></br>
              </table>
            </div>
          <div class = "paymentButtons">
          <div></br><a href = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/wallet/walletEdit">Edit</a> / <a href = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/wallet/walletAdd">Add</a></div>
          </div>
          <?php endif; ?>

          <?php if (empty($payment)): ?>
            <div class = "walletDiv col-m-6">
              <table class = "walletTable">
                <tr>
                  <th>Wallet</th>
                </tr>
              </table>
            </div></br>
          <div class = "paymentButtons">
            <div><a href = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/wallet/walletAdd">Add</a></div>
          </div>
          <?php endif; ?>
        </div>

        <div class = "show">
          <?php if (!empty($order)): ?>
            <div class = "osDiv col-m-6">
              <table class = "osTable">
                <tr>
                  <th>Order Summary</th>
                </tr>
                <?php foreach ($order as $row): ?>
                <tr>
                  <th style = "border: grey dash 2px; background-color: #BEBEBE;">
                    <a href = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/orderSummary/orderItemSummary/<?php echo $row['orderID'];?>">Order ID: <?php echo $row['orderID'] ?></a>
                  </th>
                </tr>
                <tr>
                  <td>- Date: <?php echo $row['orderDate'] ?></td>
                </tr>
                <tr>
                  <td>- Payment: <?php echo $row['paymentMethod']; ?></td>
                </tr>
                <tr>
                  <td>- Total: <?php echo '$'.number_format((float)$row['orderTotal'], 2, '.', ''); ?></td>
                </tr>
                <?php endforeach; ?></br>
              </table>
            </div></br>
          <?php endif; ?>

          <?php if (empty($order)): ?>
            <div class = "osDiv col-m-6">
              <table class = "osTable">
                <tr>
                  <th>Order Summary</th>
                </tr>
                <tr>
                  <td style = "text-align: center;">You have zero order.</td>
                </tr>
              </table>
            </div></br>
          <?php endif; ?>
        </div>

        </div>

      </div>

    <div class = "footer col-7">
      <div class = "footer-text" style = "padding-top:40px; margin-left:20px;"> Chin-Chwen Tien Copyright &copy; 2015 All Rights Reserved.</div>
    </div>

  </center>
</body>
</html>