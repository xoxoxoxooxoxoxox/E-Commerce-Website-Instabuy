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
        <div class = "login-text"><a href = "#"> Register/Login </a></div>
    </div>

    <div class = "body-wrapper">

      <div class = "member_login">
        <form class = "login"  action = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/loggingProcess/login" method = "POST">
          <div class = "formtitle">Member Login</div>
          <div class = "input">
            <input type = "text" placeholder = "Username" name = "username" pattern = "^[a-zA-Z0-9_]{3,16}$" title = "Any lowercase and uppercase letter, number, an underscore that are at least 3 of those characters, but no more than 16." required/></div>
          <div class = "input">
            <input type = "password" placeholder = "Password" name = "password" pattern = "^[a-zA-Z0-9]{4,18}$" title = "Any lowercase and uppercase letter, number that are at least 4 of those characters, but no more than 18." required/></div></br>
          <div class = "buttons">
            <input class = "bluebutton" type = "submit" name = "submit" value = "Login" />
            <div class = "clear"></div>
          </div>
        </form>
        <?php if (!empty($errormsg)): ?>
          <div id = 'error'>* <?php echo $errormsg ?> *</div>
      <?php endif; ?>
      </div>

      <div class = "sign_up">
        <form class = "sign" action = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/loggingProcess/signUp" method = "POST">
          <div class = "formtitle">Sign Up - It's free!</div>
            <div class = "top_section">
              <div class = "section">

                <div class = "input username">
                  <input type = "text"  placeholder = "Username" name = "username" pattern = "^[a-zA-Z0-9_]{3,16}$" title = "Any lowercase and uppercase letter, number, an underscore that are at least 3 of those characters, but no more than 16." required/></div>
                <div class="input password">
                  <input type = "password"  placeholder = "Password" name = "password" pattern = "^[a-zA-Z0-9]{4,18}$" title = "Any lowercase and uppercase letter, number that are at least 4 of those characters, but no more than 18." required/></div>
                <div class = "clear"> </div>
              </div>

              <div class = "section">
                <div class = "input-sign email">
                  <input type = "email"  placeholder = "Email" name = "email" pattern = "^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$" title = "Enter valid email address." required/>
                </div>
                <div class = "clear"> </div>
              </div>

            </div>

            <div class = "section">
              <div class = "section">

                <div class = "input-sign details">
                  <input type = "text"  placeholder = "First Name" name = "firstName" pattern = "^[a-zA-Z-]+$" title = "Any lowercase and uppercase letter or a hyphen." required/>
                </div>

                <div class = "input-sign details1">
                  <input type = "text"  placeholder = "Last Name" name = "lastName" pattern = "^[a-zA-Z]+$" title = "Any lowercase and uppercase letter." required/>
                </div>
                <div class = "clear"> </div>

              </div>

            <div class = "section">

              <div class = "input-sign details">
                <input type = "text"  placeholder = "Address" name = "address" pattern = "^[a-zA-Z0-9\s,.#]+$" title = "Enter a valid address" required/> 
              </div>
              <div class = "clear"> </div>

            </div>

              <div class = "section">

                <div class = "input-sign details">
                  <input type = "text"  placeholder = "City" name = "city" pattern = "^[a-zA-Z\s]+$" title = "Enter a valid city" required/> 
                </div>

              </div>

              <div class = "section-country">

                <select id = "country" onChange = "change_country(this.value)" class = "frm-field" name = "country" required>
                  <option value = "United States">United States</option>
                  <option value = "Taiwan">Taiwan</option>
                </select>

              </div></br>

              <div class = "submit">
                <input class = "bluebutton submitbotton" type = "submit" name = "submit" value = "Sign up"/>
              </div>
            </div>
          </form>
          <div id = 'error1'>* Your session has been expired, please re-login. *</div>
        </div>
    </div>

    <div class = "footer col-7">
      <div class = "footer-text" style = "padding-top:40px; margin-left:20px;"> Chin-Chwen Tien Copyright &copy; 2015 All Rights Reserved.</div>
    </div>

  </center>
</body>
</html>
