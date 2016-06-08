<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CheckOut extends CI_Controller {

	public function test_input($data) {

		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;

	}

	public function checkOutView() {

		$this->load->helper('url');
		$this->load->model('instabuy_model');
		$results = $this->instabuy_model->checkOutView();

		$this->load->view('checkOut_view', $results);

	}

	public function order() {

		session_start();
		$this->load->helper('url');

		$errormsg = "";

		// member ID
		$memberID = $_SESSION['memberID'];

		// name
		$firstName = $_POST['SfirstName'];
		$lastName = $_POST['SlastName'];

		// shipping
		$sAdd = $_POST['Saddress'];
		$sCity = $_POST['Scity'];
		$sCountry = $_POST['Scountry'];

		// billing
		$bAdd = $_POST['Baddress'];
		$bCity = $_POST['Bcity'];
		$bCountry = $_POST['Bcountry'];

		// payment method
		$payment = $_POST['paymentMethod'];

		// product total
		$total = $_POST['productTotal'];
		$total = number_format((float)$total, 2, '.', '');

		// sumbit
		$submit = $_POST['submit'];

		$ok = true;

		// processing
		if ($submit == 'Order') {

			if (strlen($firstName) == 0) {
			  $errormsg = "Invalid input";
			}  else {
		    	$firstName = $this->test_input($firstName);
			    // check regular expression
			    if (!preg_match("/^[a-zA-Z-]+$/", $firstName)) {

			      	$errormsg = "Invalid first name";
			      	$ok = false;

			    }
		    }

			if (strlen($lastName) == 0) {
			  $errormsg = "Invalid input";
			} else {
		    	$lastName = $this->test_input($lastName);
			    // check regular expression
			    if (!preg_match("/^[a-zA-Z]+$/", $lastName)) {

			      	$errormsg = "Invalid last name";
			      	$ok = false;

			    }
		    }

			if (strlen($sAdd) == 0) {
			  $errormsg = "Invalid input";
			} else {
		    	$sAdd = $this->test_input($sAdd);
			    // check regular expression
			    if (!preg_match("/^[a-zA-Z0-9\s,.#]+$/", $sAdd)) {

			      	$errormsg = "Invalid shipping address";
			      	$ok = false;

			    }
		    }

			if (strlen($sCity) == 0) {
			  $errormsg = "Invalid input";
			} else {
		    	$sCity = $this->test_input($sCity);
			    // check regular expression
			    if (!preg_match("/^[a-zA-Z\s]+$/", $sCity)) {

			      	$errormsg = "Invalid shipping city";
			      	$ok = false;

			    }
		    }

			if (strlen($sCountry) == 0) {
			  $errormsg = "Invalid input";
			} else {
		    	$sCountry = $this->test_input($sCountry);
			    // check regular expression
			    if (!preg_match("/^[a-zA-Z\s]+$/", $sCountry)) {

			      	$errormsg = "Invalid shipping country";
			      	$ok = false;

			    }
		    }

			if (strlen($bAdd) == 0) {
			  $errormsg = "Invalid input";
			} else {
		    	$bAdd = $this->test_input($bAdd);
			    // check regular expression
			    if (!preg_match("/^[a-zA-Z0-9\s,.#]+$/", $bAdd)) {

			      	$errormsg = "Invalid billing address";
			      	$ok = false;

			    }
		    }

			if (strlen($bCity) == 0) {
			  $errormsg = "Invalid input";
			} else {
		    	$bCity = $this->test_input($bCity);
			    // check regular expression
			    if (!preg_match("/^[a-zA-Z\s]+$/", $bCity)) {

			      	$errormsg = "Invalid billing city";
			      	$ok = false;

			    }
		    }

			if (strlen($bCountry) == 0) {
			  $errormsg = "Invalid input";
			} else {
		    	$bCountry = $this->test_input($bCountry);
			    // check regular expression
			    if (!preg_match("/^[a-zA-Z\s]+$/", $bCountry)) {

			      	$errormsg = "Invalid billing country";
			      	$ok = false;

			    }
		    }

			if (strlen($payment) == 0) {
			  $errormsg = "Please choose a payment";
			}

			if (strlen($total) == 0) {
			  $errormsg = "Unknown error!";
			}

			// if all fields are entered
			if (strlen($firstName) > 0 &&
				strlen($lastName) > 0 &&
				strlen($sAdd) > 0 && 
				strlen($sCity) > 0 &&
				strlen($sCountry) > 0 &&
				strlen($bAdd) > 0 &&
				strlen($bCity) > 0 &&
				strlen($bCountry) > 0 &&
				strlen($payment) > 0 && $ok) { 

				$shipping = $sAdd.", ".$sCity.", ".$sCountry;
				$billing = $bAdd.", ".$bCity.", ".$bCountry;
				date_default_timezone_set("America/Los_Angeles");
				$orderDate = date("Y-m-d H:i:s");

				$this->load->model('instabuy_model');
				$results = $this->instabuy_model->order($memberID, $orderDate, $total, $payment, $shipping, $billing, $firstName, $lastName);
				
			}

		} else {

			echo 'Error! No items in the cart!';

		}

		if (strlen($errormsg) > 0) {

			$this->load->model('instabuy_model');
			$fetchData = $this->instabuy_model->checkOutView();
			$data = array('data' => $errormsg,'cartView' => $fetchData['cartView'], 'user' => $fetchData['user'], 'payment' => $fetchData['payment']);
			$this->load->view('checkOut_view', $data);

		} elseif ($results == 'Order failed') {

			$this->load->model('instabuy_model');
			$fetchData = $this->instabuy_model->checkOutView();
			$data = array('data' => $results,'cartView' => $fetchData['cartView'], 'user' => $fetchData['user'], 'payment' => $fetchData['payment']);
			$this->load->view('checkOut_view', $data);

		} elseif ($results == 2) {

			header('location: http://cs-server.usc.edu:8436/CodeIgniter/index.php/checkOut/orderCompleted');

		}

	}

	public function orderCompleted() {

		session_start();
		$this->load->helper('url');
		$this->load->view('orderCompleted_view');

	}

}
?>
