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

      <div class = "accounEdit col-m-10 col-7">
        <form class = "sign" action = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/account/accountEditSave" method = "POST">

          <?php if(!empty($user)): ?>
          <?php foreach ($user as $row): ?>

          <div class = "formtitle">EDIT DETAILS</div></br>
            <div class = "top_section col-m-10 col-7">
              <div class = "section">
                <div class = "input username" style = "text-align: left;">
                  - Username: <input type = "text" placeholder = "Username" name = "username" value = "<?php echo $row['username']; ?>" pattern = "^[a-zA-Z0-9_]{3,16}$" title = "Any lowercase and uppercase letter, number, an underscore that are at least 3 of those characters, but no more than 16." required/></div>
                <div class="input password" style = "text-align: left;">
                  - New password: <input type = "password" placeholder = "New Password" name = "password" pattern = "^[a-zA-Z0-9]{4,18}$" title = "Any lowercase and uppercase letter, number that are at least 4 of those characters, but no more than 18." required/></div>
                <div class = "clear"> </div>
              </div>
              <div class = "section">
                <div class = "input-sign email" style = "text-align: left;">
                  - Email: <input type = "email"  placeholder = "Email" name = "email" value = "<?php echo $row['email']; ?>" size = "35" pattern = "^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$" title = "Enter valid email address." required/>
                </div>
                <div class = "clear"> </div>
              </div>
            </div>

            <div class = "section col-m-10 col-7">
              <div class = "section">
                <div class = "input-sign details" style = "text-align: left;">
                  - First name: <input type = "text"  placeholder = "First Name" name = "firstName" value = "<?php echo $row['firstName']; ?>" pattern = "^[a-zA-Z-]+$" title = "Any lowercase and uppercase letter or a hyphen." required/>
                </div>
                <div class = "input-sign details1" style = "text-align: left;">
                  - Last name: <input type = "text"  placeholder = "Last Name" name = "lastName" value = "<?php echo $row['lastName']; ?>" pattern = "^[a-zA-Z]+$" title = "Any lowercase and uppercase letter." required/>
                </div>
                <div class = "clear"> </div>
              </div>

            <div class = "section">
              <div class = "input-sign details" style = "text-align: left;">
                - Address: <input type = "text"  placeholder = "Address" name = "address" value = "<?php echo $row['address']; ?>" pattern = "^[a-zA-Z0-9\s,.#]+$" title = "Enter a valid address" required/> 
              </div>
              <div class = "clear"> </div>
            </div>

              <div class = "section">
                <div class = "input-sign details" style = "text-align: left;">
                  - City: <input type = "text"  placeholder = "City" name = "city" value = "<?php echo $row['city']; ?>" pattern = "^[a-zA-Z\s]+$" title = "Enter a valid city" required/> 
                </div>
              </div>

              <div class = "section-country" style = "text-align: left;">
                - Country: 
                <select id = "country" onChange = "change_country(this.value)" class = "frm-field" name = "country" required>
                  <option value = "<?php echo $row['country']; ?>"><?php echo $row['country']; ?></option>
                  <option value = "Taiwan">Taiwan</option>
                  <option value = "United States">United States</option>
                </select>
              </div></br>

              <div class = "submit">
                <a href = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/account"><input type = "button" value = "Back"/></a><input class = "bluebutton submitbotton" type = "submit" name = "submit" value = "Save"/>
              </div>
            </div>

          <?php endforeach; ?>
          <?php endif; ?>

          </form>
			<?php if (!empty($data)): ?>
				<?php if ($data != 'Save falied!'): ?>
					<div id = 'error1'>* <?php echo $data ?> *</div>
				<?php elseif ($data == 'Save falied!'): ?>
					<div id = 'error1'>* <?php echo $data ?> - You have to change at least one info. *</div>
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