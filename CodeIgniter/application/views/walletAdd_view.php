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

      <div class = "member_login">
        <div id = "error"></div>
      </div>

      <div class = "sign_up">
        <form class = "sign" action = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/wallet/walletAddDone" method = "POST">

          <div class = "formtitle">ADD A PAYMENT</div></br>
            <div class = "top_section">
              <div class = "section">
                <div>
                  <input type = "radio" name = "accountType" value = "credit" checked required/>Credit &nbsp&nbsp
                  <input type = "radio" name = "accountType" value = "debit" required/>Debit</div>
                <div>
                  <input type = "text" placeholder = "Account Name" name = "accountName" pattern = "^[a-zA-Z0-9]{4,20}$" title = "Any lowercase and uppercase letter, number at least 4 of those characters, but no more than 20." required/></div>
                <div>
                  <input type = "text" placeholder = "Card No." name = "cardNo" title = "Please Enter VISA" pattern = "^(?:4[0-9]{12}(?:[0-9]{3})?)" title = "VISA Credit Card begins with digit 4 and followed by 15 digits." required/></div>
                <div class = "clear"> </div>
              </div>
            </div>

            <div class = "section">
              <div class = "section">
                <div class = "input-sign details">
                  <input type = "text"  placeholder = "Expiration Month" name = "cardMonth" pattern = "^(0?[1-9]|1[012])$" required/>
                </div>
                <div class = "input-sign details1">
                  <input type = "text"  placeholder = "Expiration Year" name = "cardYear" pattern = "^[0-9]{2}$" required/>
                </div>
                <div class = "clear"> </div>
              </div>

            <div class = "section">
              <div class = "input-sign details">
                <input type = "text"  placeholder = "Secruity Code" name = "cardCode" pattern = "^[0-9]{3}$" required/> 
              </div>
              <div class = "clear"> </div>
            </div></br>

              <div class = "submit">
                <a href = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/account"><input type = "button" value = "Back"/></a><input class = "bluebutton submitbotton" type = "submit" name = "submit" value = "Add"/>
              </div>
            </div>

          </form>
          <?php if (!empty($data)): ?>
            <?php if ($data != 'Add Failed, Please make sure the Account Name and Card No. are not duplicated!'): ?>
              <div id = 'error1'>* <?php echo $data; ?> *</div>
            <?php elseif ($data == 'Add Failed, Please make sure the Account Name and Card No. are not duplicated!'): ?>
              <div id = 'error1'>* Add Failed, Please make sure the Account Name and Card No. are not duplicated! *</div>
            <?php endif; ?>
          <?php endif; ?>
        </div>
        
    </div>

    <div class = "footer col-7">
      <div class = "footer-text" style = "padding-top:40px; margin-left:20px;"> Chin-Chwen Tien Copyright &copy; 2015 All Rights Reserved.</div>
    </div>

  </center>
</body>
</html>