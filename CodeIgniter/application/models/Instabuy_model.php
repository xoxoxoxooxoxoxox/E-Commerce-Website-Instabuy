<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instabuy_model extends CI_Model {

	//-----------------------
	// Product pages display
	//-----------------------

	public function welcome() {

		require_once 'php/linkDB-Product.php';
		require_once 'php/functions.php';
		$product = getProducts();
		$onSales = checkOnSales();
		date_default_timezone_set("America/Los_Angeles");
		$date = date('Y-m-d');

		return array('product' => $product, 'onSales' => $onSales, 'date' => $date);
		
	}

	public function technologies() {

		require_once 'php/linkDB.php';
		require_once 'php/functions.php';
		$product = getTechProducts();
		$onSales = checkOnSales();
		date_default_timezone_set("America/Los_Angeles");
		$date = date('Y-m-d');

		return array('product' => $product, 'onSales' => $onSales, 'date' => $date);

	}

	public function furnitures() {

		require_once 'php/linkDB.php';
		require_once 'php/functions.php';
		$product = getFurProducts();
		$onSales = checkOnSales();
		date_default_timezone_set("America/Los_Angeles");
		$date = date('Y-m-d');

		return array('product' => $product, 'onSales' => $onSales, 'date' => $date);
		
	}

	public function clothings() {

		require_once 'php/linkDB.php';
		require_once 'php/functions.php';
		$product = getCloProducts();
		$onSales = checkOnSales();
		date_default_timezone_set("America/Los_Angeles");
		$date = date('Y-m-d');

		return array('product' => $product, 'onSales' => $onSales, 'date' => $date);

	}

	public function automobiles() {

		require_once 'php/linkDB.php';
		require_once 'php/functions.php';
		$product = getAutoProducts();
		$onSales = checkOnSales();
		date_default_timezone_set("America/Los_Angeles");
		$date = date('Y-m-d');

		return array('product' => $product, 'onSales' => $onSales, 'date' => $date);

	}

	public function hotSales() {

		require_once 'php/linkDB-HotSales.php';
		require_once 'php/functions.php';
		$sales = getHotSales();
		$date = date('Y-m-d');

		return array('sales' => $sales, 'date' => $date);

	}

	//-------------------------------------
	// Click product title to show details
	//-------------------------------------

	public function product($productID) {

		require_once 'php/linkDB.php';
		require_once 'php/functions.php';
		$product = clickProduct($productID);
		$onSales = checkOnSales();
		$date = date('Y-m-d');

		return array('product' => $product, 'onSales' => $onSales, 'date' => $date);

	}

	public function salesProduct($productID) {

		require_once 'php/linkDB-HotSales.php';
		require_once 'php/functions.php';
		$product = getSalesProdcut($productID);

		return array('product' => $product);

	}

	//-------------------------
	// Login and sign up model
	//-------------------------

	public function login($uname, $pword) {

		//session_start();
		$sql = "SELECT * FROM Member WHERE username = '".$uname."' and password = '".MD5($pword)."'";
		$con = mysql_connect('cs-server.usc.edu:1904','root','root');

		if (!$con) {
			die('Could not connet...');
		}

		// issuing sql
		mysql_select_db('CS571',$con);

		$res = mysql_query($sql);
		if (!($row = mysql_fetch_assoc($res))) {

		$errormsg = "Invalid login";
			return $errormsg;

		} else {

		$id = $row['id'];
			return $id = $row['id'];

		}
	    
	    mysql_close($con);

	}

	public function signUp($uname, $pword, $fname, $lname, $email, $address, $city, $country) {

		$con = mysql_connect('cs-server.usc.edu:1904','root','root');

		if (!$con) {
			die('Could not connet...');
		}

		mysql_select_db('CS571',$con);

		// check duplicated username
		$dup = mysql_query("SELECT username FROM Member WHERE username = '".$uname."'");
		if(mysql_num_rows($dup) > 0) {

			$errormsg = 'Username Already Used!';
			return $errormsg;

		} else {

			// issuing sql
			$sql = "INSERT INTO Member (username, password, firstName, lastName, email, address, city, country) 
			        VALUES ('$uname', MD5('$pword'), '$fname', '$lname', '$email', '$address', '$city', '$country')";

			$res = mysql_query($sql);
			if (!empty(mysql_fetch_assoc($res))) {
				$errormsg = "Sign up falied!";
				return $errormsg;
			} else {
				$errormsg = "Succuessfully added!";
				return $errormsg;
			}

		}

	    mysql_close($con);

	}

	//-----------------
	// Account details
	//-----------------

	public function account() {

		require_once 'php/linkDB-User.php';
		require_once 'php/functions.php';
	    $user = getUser();
	    $payment = getPayment();
	    $order = getOrder();

	    return array('user' => $user, 'payment' => $payment, 'order' => $order);

	}

	public function accountEdit() {

		require_once 'php/linkDB-User.php';
		require_once 'php/functions.php';
		$user = getUser();

		return array('user' => $user);

	}

	public function accountEditSave($uname, $pword, $fname, $lname, $email, $address, $city, $country, $memberID) {

		$sql = "UPDATE Member SET username = '$uname', password = MD5('$pword'), firstName = '$fname', lastName = '$lname', email = '$email', address = '$address', city = '$city', country = '$country' 
		      WHERE id = $memberID";
		$con = mysql_connect('cs-server.usc.edu:1904','root','root');

		if (!$con) {
			die('Could not connet...');
		}

		// issuing sql
		mysql_select_db('CS571',$con);

		$res = mysql_query($sql);


		if (!$res) {

			$errormsg = "Save falied!";
			return $errormsg;

		}

		mysql_close($con);

	}


	//----------------
	// Wallet details
	//----------------

	public function walletAdd() {

		require_once 'php/linkDB-Wallet.php';
		require_once 'php/functions.php';

	}

	public function walletAddDone($memberID, $name, $type, $num, $month, $year, $code) {

		$sql = "INSERT INTO PaymentMethod (memberID, methodName, methodType, cardNo, cardDateMonth, cardDateYear, cardCode) VALUES ($memberID, '$name', '$type', '$num', '$month', '$year', '$code')";

		// $sql = "INSERT INTO PaymentMethod (memberID, methodName, methodType)
		//         VALUES ('$memberID', '$name', '$type')";

		$con = mysql_connect('cs-server.usc.edu:1904','root','root');

		if (!$con) {
			die('Could not connet...');
		}

		// issuing sql
		mysql_select_db('CS571',$con);

		$res = mysql_query($sql);

		if ($res) {

			$_SESSION['accountName'] = $name;
        	$_SESSION['accountType'] = $type;
        	$errormsg = '';
        	return $errormsg;

		} else {

	        $errormsg = 'Add Failed, Please make sure the Account Name and Card No. are not duplicated!';
	        return $errormsg;

		}

		mysql_close($con);

	}

	public function walletEdit() {

		require_once 'php/linkDB-Wallet.php';
		require_once 'php/functions.php';
		$payment = getPayment();

		return array('payment' => $payment);

	}

	public function walletEditRemoveDone($memberID, $name, $num, $action) {

		// connecting to server
		$con = mysql_connect('cs-server.usc.edu:1904','root','root');

		if (!$con) {
			die('Could not connet...');
		}

		// connecting to database
		mysql_select_db('CS571',$con);

		// issuing sql
		$sql = "DELETE FROM PaymentMethod WHERE memberID = $memberID AND methodName = '$name' AND cardNo = '$num'";
		$result = mysql_query($sql);

		if ($result) {

			$action = 1;
			$con = null;
			return $action;

		} else {

			echo 'Error! '.mysql_error();

		}

		mysql_close($con);

	}

	public function walletEditUpdateDone($memberID, $name, $num, $type, $month, $year, $code, $action) {

		// connecting to server
		$con = mysql_connect('cs-server.usc.edu:1904','root','root');

		if (!$con) {
			die('Could not connet...');
		}

		// connecting to database
		mysql_select_db('CS571',$con);

		// issuing sql
		$sql = "UPDATE PaymentMethod SET methodType = '$type', cardDateMonth = $month, cardDateYear = $year, cardCode = $code WHERE memberID = $memberID AND methodName = '$name' AND cardNo = '$num'";
		$result = mysql_query($sql);

		if ($result) {

			$action = 1;
			$con = null;
			return $action;

		} else {

	    	echo 'Error! '.mysql_error();

	    }

	    mysql_close($con);

	}

	//-----------------------
	// Order summary details
	//-----------------------

	public function orderItemSummary($orderID) {
		
	    require_once 'php/linkDB.php';
	    require_once 'php/functions.php';
	    $orderItemSummary = orderItemSummary($orderID);

	    return array('orderItemSummary' => $orderItemSummary);

	}

	public function orderItemSummaryShow($productID) {

		require_once 'php/linkDB.php';
		require_once 'php/functions.php';
		$product = clickProduct($productID);
		//$_SESSION['orderID'] = $orderID;

		return array('product' => $product);

	}

	//---------------
	// Cart function
	//---------------

	public function cartView() {
		
		require_once 'php/linkDB-Cart.php';
		require_once 'php/functions.php';
	    $cartView = cartView();

		return array('cartView' => $cartView);

	}

	public function cartAddItem($memberID, $productID, $productName, $productPrice, $productQuantity, $total, $action) {

		// connecting to server
		$con = mysql_connect('cs-server.usc.edu:1904','root','root');

		if (!$con) {
			die('Could not connet...');
		}

		// connecting to database
		mysql_select_db('CS571',$con);

		// issuing sql
		$sql = "INSERT INTO Cart (memberID, productID, productName, productPrice, productQuantity, productTotal) 
				VALUES ($memberID, $productID, '$productName', $productPrice, $productQuantity, $total)"; 
		$result = mysql_query($sql);

		if ($result) {
			mysql_close($con);
			$action = 2;
			return $action;
		} else {
			echo 'Error! '.mysql_error();
			return $action;
		}

	}

	public function cartRemoveItem($memberID, $productID, $action) {

		// connecting to server
		$con = mysql_connect('cs-server.usc.edu:1904','root','root');

		if (!$con) {
			die('Could not connet...');
		}

		// connecting to database
		mysql_select_db('CS571',$con);

		// issuing sql
		$sql = "DELETE FROM Cart WHERE memberID = $memberID AND productID = $productID";
		$result = mysql_query($sql);

		if ($result) {
			mysql_close($con);
			$action = 2;
			return $action;
		} else {
			echo 'Error! '.mysql_error();
			return $action;
		}

	}

	public function cartUpdateItem($memberID, $productID, $productPrice, $productQuantity, $productTotal, $action) {

		// connecting to server
		$con = mysql_connect('cs-server.usc.edu:1904','root','root');

		if (!$con) {
			die('Could not connet...');
		}

		// connecting to database
		mysql_select_db('CS571',$con);

		// issuing sql
		$sql = "UPDATE Cart SET productQuantity = $productQuantity, productTotal = $productTotal WHERE memberID = $memberID AND productID = $productID";
		$result = mysql_query($sql);

		if ($result) {
			mysql_close($con);
			$action = 2;
			return $action;
		} else {
			echo 'Error! '.mysql_error();
			return $action;
		}

	}

	//--------------------
	// Check out function
	//--------------------

	public function checkOutView() {

		require_once 'php/linkDB-Cart.php';
		require_once 'php/functions.php';
		$cartView = cartView();
		$user = getUser();
		$payment = getPayment();

		return array('cartView' => $cartView, 'user' => $user, 'payment' => $payment);
  		

	}

	public function order($memberID, $orderDate, $total, $payment, $shipping, $billing, $firstName, $lastName) {

		require_once 'php/linkDB-Order.php';
		require_once 'php/functions.php';
		$cart = cartView();

		$errormsg = "";

		// connecting to database
		$con = mysql_connect('cs-server.usc.edu:1904','root','root');

		if (!$con) {
			die('Could not connet...');
		}

		//echo $firstName."</br>".$lastName."</br>".$payment."</br>".$total.", ".$orderDate;

		// issuing sql
		mysql_select_db('CS571',$con);

  		// inserting into ORDER table
		$sql = "INSERT INTO `CS571`.`Order` (`memberID`, `orderDate`, `orderTotal`, `paymentMethod`, `shipping`, `billing`, `firstName`, `lastName`) VALUES ('$memberID', '$orderDate', $total, '$payment', '$shipping', '$billing', '$firstName', '$lastName');";

		$orderRes = mysql_query($sql);

		// fetching ORDER ID from ORDER table
		$sql = "SELECT orderID FROM `CS571`.`Order` WHERE orderDate = '$orderDate' AND memberID = $memberID";

		$orderIdRes = mysql_query($sql);

		$fetchOrderID;

		if ($orderIdRes) {
			if (mysql_num_rows($orderIdRes) > 0) {
				while ($row = mysql_fetch_assoc($orderIdRes)) {
					$fetchOrderID = $row['orderID'];
				}
			}
		} else {
			echo 'Error! '.mysql_error();

		}

		// extracting data from CART table
		// already done in the beginning of this ORDER function

		// insert cart data into order item table
		if (!empty($cart)) {

			foreach ($cart as $row) {

				$productID = $row['productID'];
				$productQuantity = $row['productQuantity'];
				$productPrice = $row['productPrice'];
				$productTotal = $row['productTotal'];
				$sql = "INSERT INTO `CS571`.`OrderItem` (`orderID`, `productID`, `productQuantity`, `productPrice`, `productTotal`) VALUES ($fetchOrderID, $productID, $productQuantity, $productPrice, $productTotal)";
				$cartRes = mysql_query($sql);

			}

		} else {

			echo 'Error! '.mysql_error();

		}

		// remove all items in the cart
		if (!empty($cartRes)) {

			$sql = "DELETE FROM Cart WHERE memberID = $memberID";
			$delCart = mysql_query($sql);

		}

		// condition check
		if (!$orderRes && !$orderIdRes && !$cartRes && !$delCart) {

			$errormsg = "Order failed";
			return $errormsg;

		} elseif ($orderRes && $orderIdRes && $cartRes && $delCart) {

			$action = 2;				
			return $action; // 2 means order completed!

		}

		mysql_close($con);

	}

	public function orderCompleted() {

		require_once 'php/linkDB-Cart.php';
		require_once 'php/functions.php';
		$cartView = cartView();
	
	}

}
?>