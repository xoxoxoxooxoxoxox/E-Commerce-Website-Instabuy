<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>
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
        <div class = "login-text"><a href = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/loggingProcesslogin">Register/Login</a></div>
      <?php elseif (!empty($_SESSION['memberID'])): ?>
        <div class = "account-text"><a href = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/account">Account</a></div>
        <div class = "cart-text" class = "active"><a href = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/cartFunction/cartView">Cart</a></div>
        <div class = "logout-text"><a href = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/loggingProcess/logout">Logout</a></div>
      <?php endif ?>
    </div>

    <div class = "body-wrapper col-7">
      <form name = "order" action = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/CheckOut/order" method = "post">
        <div class = "member_login">
          <div class = "formtitle"></div>
            <div class = "show">
              <table class = "orderDetails" style = "display: inline;">
                <tr>
                  <th>Shipping Information</th>
                </tr>
                <?php foreach ($user as $row): ?>
                <tr style = "text-align: left;">
                  <td>First name: <input type = "text"  placeholder = "First Name" name = "SfirstName" value = "<?php echo $row['firstName']; ?>" pattern = "^[a-zA-Z-]+$" title = "Any lowercase and uppercase letter or a hyphen." required/></td>
                </tr>
                <tr style = "text-align: left">
                  <td>Last name: <input type = "text"  placeholder = "Last Name" name = "SlastName" value = "<?php echo $row['lastName']; ?>" pattern = "^[a-zA-Z]+$" title = "Any lowercase and uppercase letter." required/></td>
                </tr>
                <tr style = "text-align: left">
                  <td>Address: <input type = "text"  placeholder = "Address" name = "Saddress" value = "<?php echo $row['address']; ?>" pattern = "^[a-zA-Z0-9\s,.#]+$" title = "Enter a valid address" required/></td>
                </tr>
                <tr style = "text-align: left">
                  <td>City: <input type = "text"  placeholder = "City" name = "Scity" value = "<?php echo $row['city']; ?>" pattern = "^[a-zA-Z\s]+$" title = "Enter a valid city" required/></td>
                </tr>
                <tr style = "text-align: left">
                  <td>Country: <input type = "text"  placeholder = "Country" name = "Scountry" value = "<?php echo $row['country']; ?>" pattern = "^[a-zA-Z\s]+$" title = "Enter a valid country" required/> </td>
                </tr>
                <?php endforeach; ?>
                <tr>
                  <td></br></td>
                </tr>
                <tr>
                  <th>Billing Information</th>
                </tr>
                <?php foreach ($user as $row): ?>
                <tr style = "text-align: left">
                  <td>Address: <input type = "text"  placeholder = "Address" name = "Baddress" value = "<?php echo $row['address']; ?>" pattern = "^[a-zA-Z0-9\s,.#]+$" title = "Enter a valid address" required/></td>
                </tr>
                <tr style = "text-align: left">
                  <td>City: <input type = "text"  placeholder = "City" name = "Bcity" value = "<?php echo $row['city']; ?>" pattern = "^[a-zA-Z\s]+$" title = "Enter a valid city" required/></td>
                </tr>
                <tr style = "text-align: left">
                  <td>Country: <input type = "text"  placeholder = "Country" name = "Bcountry" value = "<?php echo $row['country']; ?>" pattern = "^[a-zA-Z\s]+$" title = "Enter a valid country" required/> </td>
                </tr>
                <?php endforeach; ?>
                <tr>
                  <td></br></td>
                </tr>
                <tr>
                  <th>Payment Method</th>
                </tr>

                <?php if (empty($payment)): ?>
                 <tr>
                  <td><a href = "walletAdd.php">Add</a></td>
                </tr>
                <?php elseif (!empty($payment)): ?>
                  <?php foreach ($payment as $row): ?>
                    <tr>
                      <td style = "text-align: left; ">
                        <input type = "radio" name = "paymentMethod" value = "<?php echo $row['methodName']; ?>" required/> <?php echo $row['methodName']; ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>

                <tr>
                  <td></br></td>
                </tr>
              </table>
            </div>
          </div>

          <div class = "cartViewDiv">
            <table class = "cartTable">
              <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
              </tr>
              <?php $total = 0; ?>
              <?php foreach ($cartView as $row):?>
                <tr>
                    <td style = "text-align: center;"><?php echo $row['productName'];?></a></td>
                    <td style = "text-align: center;"><?php echo '$'.$row['productPrice']; ?></td>
                    <td style = "text-align: center;"><?php echo $row['productQuantity']; ?></td>
                    <td style = "text-align: center;"><?php echo '$'.$row['productTotal']; ?></td>
                    <?php
                      $total += $row['productTotal'];
                    ?>
                </tr>
              <?php endforeach; ?>
            </table>
            <div class = "totalShowDiv">
              <div>Subtotal: $<?php echo number_format((float)$total, 2, '.', ''); ?></div>
              <div>Tax: $<?php $tax = $total * 0.09; echo number_format((float)$tax, 2, '.', ''); ?></div>
              <div>----------------------------------</div>
              <div>Total: $<?php $total = $total + $tax; echo number_format((float)$total, 2, '.', ''); ?></div>
              <input type = "hidden" name = "productTotal" value = "<?php echo $total; ?>"/>
            </div>

            <div class = "checkoutButton">
              <a href = "http://cs-server.usc.edu:8436/CodeIgniter/index.php/cartFunction/cartView"><input type = "button" name = "cancel" value = "Cancel"/></a>
              <input type = "submit" name = "submit" value = "Order"/>
            </div>
          </div>
        </form>
        <?php if (!empty($data)): ?>
          	<?php if ($data != 'Order failed'): ?>
	          	<div id = 'error1'>* <?php echo $data; ?> *</div>
	        <?php elseif ($data == 'Order failed'): ?>
	        	<div id = 'error1'>* Order failed *</div>
	        <?php endif; ?>
	    <?php endif; ?>
    </div></br>

    <div class = "footer col-7">
      <div class = "footer-text" style = "padding-top:40px; margin-left:20px;"> Chin-Chwen Tien Copyright &copy; 2015 All Rights Reserved.</div>
    </div>

  </center>
</body>
</html>