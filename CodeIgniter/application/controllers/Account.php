<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	public function test_input($data) {

		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;

	}

	public function index() {

		session_start();
		$this->load->helper('url');

		if (!empty($_SESSION['memberID']) && ((time() - $_SESSION['loggedin_time']) > 300)) { 

			unset($_SESSION['loggedin_time']);
			session_destroy();
			header("location: http://cs-server.usc.edu:8436/CodeIgniter/index.php/logout");

		} else {

			$this->load->model('instabuy_model');
			$results = $this->instabuy_model->account();
			$this->load->view('account_view', $results);

		}

	}

	public function accountEdit() {

		session_start();
		$this->load->helper('url');

		if (!empty($_SESSION['memberID']) && ((time() - $_SESSION['loggedin_time']) > 300)) { 

			unset($_SESSION['loggedin_time']);
			session_destroy();
			header("location: http://cs-server.usc.edu:8436/CodeIgniter/index.php/logout");

		} else {

			$this->load->model('instabuy_model');
			$results = $this->instabuy_model->accountEdit();
			$this->load->view('accountEdit_view', $results);
			
		}

	}

	public function accountEditSave() {

		session_start();
		$this->load->helper('url');
		$memberID = $_SESSION['memberID'];

		$uname = $_POST['username'];
		$pword = $_POST['password'];
		$fname = $_POST['firstName'];
		$lname = $_POST['lastName'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$country= $_POST['country'];
		$errormsg = "";
		$ok = true; // Check if the input is correct

		if (strlen($uname) == 0) {
	      $errormsg = "Invalid input";
	    } else {
	    	$uname = $this->test_input($uname);
		    // check regular expression
		    if (!preg_match("/^[a-zA-Z0-9_]{3,16}$/", $uname)) {

		      	$errormsg = "Invalid username";
		      	$ok = false;

		    }
	    }

	    if (strlen($pword) == 0) {
	      $errormsg = "Invalid input!";
	    } else {
	    	$pword = $this->test_input($pword);
		    // check regular expression
		    if (!preg_match("/^[a-zA-Z0-9]{4,18}$/", $pword)) {

		      	$errormsg = "Invalid password";
		      	$ok = false;

		    }
	    }

	    if (strlen($fname) == 0) {
	      $errormsg = "Invalid input";
	    } else {
	    	$fname = $this->test_input($fname);
		    // check regular expression
		    if (!preg_match("/^[a-zA-Z-]+$/", $fname)) {

		      	$errormsg = "Invalid first name";
		      	$ok = false;

		    }
	    }

	    if (strlen($lname) == 0) {
	      $errormsg = "Invalid input";
	    } else {
	    	$lname = $this->test_input($lname);
		    // check regular expression
		    if (!preg_match("/^[a-zA-Z]+$/", $lname)) {

		      	$errormsg = "Invalid last name";
		      	$ok = false;

		    }
	    }

	    if (strlen($email) == 0) {
	      $errormsg = "Invalid input";
	    } else {
	    	$email = $this->test_input($email);
		    // check regular expression
		    if (!preg_match("/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/", $email)) {

		      	$errormsg = "Invalid email";
		      	$ok = false;

		    }
	    }

	    if (strlen($address) == 0) {
	      $errormsg = "Invalid input";
	    } else {
	    	$address = $this->test_input($address);
		    // check regular expression
		    if (!preg_match("/^[a-zA-Z0-9\s,.#]+$/", $address)) {

		      	$errormsg = "Invalid address";
		      	$ok = false;

		    }
	    }

	    if (strlen($city) == 0) {
	      $errormsg = "Invalid input";
	    } else {
	    	$city = $this->test_input($city);
		    // check regular expression
		    if (!preg_match("/^[a-zA-Z\s]+$/", $city)) {

		      	$errormsg = "Invalid city";
		      	$ok = false;

		    }
	    }

		if (strlen($country) == 0) {
		  	$errormsg = "Invalid input";
		}

		// go to database
	    if (strlen($uname) > 0 && 
	        strlen($pword) > 0 && 
	        strlen($fname) > 0 && 
	        strlen($lname) > 0 && 
	        strlen($email) > 0 && 
	        strlen($address) > 0 && 
	        strlen($city) > 0 && 
	        strlen($country) > 0 && $ok) {

	        $this->load->model('instabuy_model');
	    	$errormsg = $this->instabuy_model->accountEditSave($uname, $pword, $fname, $lname, $email, $address, $city, $country, $memberID);

		}

	    if (strlen($errormsg) > 0 && $errormsg != 'Save failed!') {

	    	$this->load->model('instabuy_model');
	    	$results = $this->instabuy_model->account();
	    	$data = array('data' => $errormsg, 'user' => $results['user']);
	    	$this->load->view('accountEdit_view', $data);

	    } elseif (strlen($errormsg) > 0 && $errormsg == 'Save falied!') {

	    	$this->load->model('instabuy_model');
	    	$results = $this->instabuy_model->account();
	    	$data = array('data' => $errormsg, 'user' => $results['user']);
	    	$this->load->view('accountEdit_view', $data);

      	} elseif (empty($errormsg)) {

	      	header('location: http://cs-server.usc.edu:8436/CodeIgniter/index.php/account');

      	}

	}

}
?>