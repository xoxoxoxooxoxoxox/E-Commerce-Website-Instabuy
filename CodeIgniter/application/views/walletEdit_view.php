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

    <div class = "body-wrapper">

      <?php if (!empty($payment)):?>
          <div class = "paymentEditDiv">
            <table class = "paymentEditTable col-7">
              <tr>
                <th>Account Name</th>
                <th>Type</th>
                <th>Card No.</th>
                <th>Exp. Month</th>
                <th>Exp. Year</th>
                <th>Security Code</th>
                <th>Remove</th>
                <th>Update</th>
              </tr>
              <?php foreach ($payment as $row):?>
                <tr>
                  <form name = "update" action = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/wallet/walletEditDone" method = "POST">
                    <td style = "text-align: center;"><?php echo $row['methodName']; ?></a></td>
                    <td style = "text-align: center;">
                      <input type = "radio" name = "accountType" value = "credit" <?php if ($row['methodType'] == 'credit') { echo checked; } ?> required/>Credit
                      <input type = "radio" name = "accountType" value = "debit" <?php if ($row['methodType'] == 'debit') { echo checked; } ?> required/>Debit
                    </td>
                    <td style = "text-align: center;"><?php echo $row['cardNo']; ?></td>
                    <td style = "text-align: center;">
                      <input type = "text" placeholder = "Exp. Month" name = "cardMonth" value = "<?php echo $row['cardDateMonth']; ?>" size = "2" pattern = "^(0?[1-9]|1[012])$" required/></div>
                    </td>
                    <td style = "text-align: center;">
                      <input type = "text" placeholder = "Exp. Year" name = "cardYear" value = "<?php echo $row['cardDateYear']; ?>" size = "2" pattern = "^[0-9]{2}$" required/></div>
                    </td>
                    <td style = "text-align: center;">
                      <input type = "text" placeholder = "Secruity Code" name = "cardCode" value = "<?php echo $row['cardCode']; ?>" size = "3" pattern = "^[0-9]{3}$" required/></div>
                    </td>
                    <td style = "text-align: center;"><input type = "submit" name = "submit" value = "Remove"/></td>
                    <td style = "text-align: center;"><input type = "submit" name = "submit" value = "Update"/></td>
                    <input type = "hidden" name = "methodName" value = "<?php echo $row['methodName']; ?>"/>
                    <input type = "hidden" name = "cardNo" value = "<?php echo $row['cardNo']; ?>"/>
                  </form>
                </tr>
              <?php endforeach; ?>
            </table>
          </div>
        <?php elseif (empty($payment)): ?>
        <div class = "paymentEditDiv col-m-6">
          <table class = "paymentEditTable">
            <tr>
              <th>Account Name</th>
              <th>Type</th>
              <th>Card No.</th>
              <th>Exp. Month</th>
              <th>Exp. Year</th>
              <th>Security Code</th>
              <th>Remove</th>
              <th>Update</th>
            </tr>
          </table>
          You have zero payment method.
        </div>
      <?php endif ?>  
		<?php if (!empty($data)): ?>
			<?php if ($data != 'Action completed'): ?>
				<div id = 'error1'>* <?php echo $data; ?> *</div>
      <?php elseif ($data == 'Action completed'): ?>
        <div style = 'color: green;'>* Action completed *</div>
			<?php endif; ?>
		<?php endif; ?></br>

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