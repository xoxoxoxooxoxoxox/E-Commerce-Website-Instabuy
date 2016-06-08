<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoggingProcess extends CI_Controller {

	//---------------------------
	// Login, sign up and logout
	//---------------------------

	public function test_input($data) {

		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;

	}

	public function index() {

		$this->load->helper('url');
		$this->load->view('login_view');

	}

	public function login() {

		session_start();
		$this->load->helper('url');
		$uname = $_POST['username'];
		$pword = $_POST['password'];
		$errormsg = ""; // if $errormsg is empty, then either both un/pw are blank or both have a value

		if (strlen($uname) == 0) {
			
			$errormsg = "Invalid login";

		}

		if (strlen($pword) == 0) {

			$errormsg = "Invalid login";

		}

		if (strlen($uname) == 0 && strlen($pword) == 0) {

			$errormsg = "";
	    }

	   	// go to database
	    if (strlen($uname) > 0 && strlen($pword) > 0) {

	    	$uname = $this->test_input($uname);
	    	$pword = $this->test_input($pword);
		    // check regular expression
		    if (!preg_match("/^[a-zA-Z0-9_]{3,16}$/", $uname) ||
		    	!preg_match("/^[a-zA-Z0-9]{4,18}$/", $pword)) {

		      	$errormsg = "Invalid input"; 

		    } else {

				$this->load->model('instabuy_model');
				$results = $this->instabuy_model->login($uname, $pword);


			}

	    }
		
		if (strlen($errormsg) > 0 || (strlen($uname) == 0 && strlen($pword) == 0)) {

			$data = array('errormsg' => $errormsg);
	    	$this->load->view('login_view', $data);

	    } elseif ($results == 'Invalid login') {

	    	$data = array('errormsg' => $results);
	    	$this->load->view('login_view', $data);

	    } else {

	    	$_SESSION['memberID'] = $results;
	    	$_SESSION['loggedin_time'] = time();

	    	header("location: http://cs-server.usc.edu:8436/CodeIgniter/index.php/instabuy");
	    
	    }

	}

	public function signUp() {

		$this->load->helper('url');
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

	    if (strlen($uname) == 0 && 
	        strlen($pword) == 0 && 
	        strlen($fname) == 0 && 
	        strlen($lname) == 0 && 
	        strlen($email) == 0 && 
	        strlen($address) == 0 && 
	        strlen($city) == 0 && 
	        strlen($country) == 0) {
	      $errormsg = "";
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
				$errormsg = $this->instabuy_model->signUp($uname, $pword, $fname, $lname, $email, $address, $city, $country);

			
	    }

	    if ($errormsg != 'Succuessfully added!' && strlen($errormsg) > 0) {

	    	$data = array('data' => $errormsg);
	    	$this->load->view('login_view', $data);


	    } elseif ($errormsg == 'Succuessfully added!') {

	    	$data = array('data' => $errormsg);
	    	$this->load->view('login_view', $data);

	    }

	}

	public function logOut() {

		session_start();
		unset($_SESSION["memberID"]);
		unset($_SESSION['loggedin_time']);
		session_destroy();
		header("location: http://cs-server.usc.edu:8436/CodeIgniter/index.php/loggingProcess");

	}

}
?>