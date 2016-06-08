<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wallet extends CI_Controller {

	public function test_input($data) {

		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;

	}

	public function walletAdd() {

		session_start();
		$this->load->helper('url');

		if (!empty($_SESSION['memberID']) && ((time() - $_SESSION['loggedin_time']) > 300)) { 

			unset($_SESSION['loggedin_time']);
			session_destroy();
			header("location: http://cs-server.usc.edu:8436/CodeIgniter/index.php/logout");

		} else {

			$this->load->model('instabuy_model');
			$results = $this->instabuy_model->walletAdd();
			$this->load->view('walletAdd_view');

		}

	}

	public function walletAddDone() {

		session_start();
		$this->load->helper('url');
		$memberID = $_SESSION['memberID'];

		$type = $_POST['accountType'];
		$name = $_POST['accountName'];
		$num = $_POST['cardNo'];
		$month = $_POST['cardMonth'];
		$year = $_POST['cardYear'];
		$code = $_POST['cardCode'];
		$errormsg = "";
		$ok = true;

		if (strlen($type) == 0) {
			$errormsg = "Invalid input";
		}

		if (strlen($name) == 0) {
			$errormsg = "Invalid input!";
		} else {
	    	$name = $this->test_input($name);
		    // check regular expression
		    if (!preg_match("/^[a-zA-Z0-9]{4,20}$/", $name)) {

		      	$errormsg = "Invalid account name";
		      	$ok = false;

		    }
	    }

		if (strlen($num) == 0) {
			$errormsg = "Invalid input";
		} else {
	    	$num = $this->test_input($num);
		    // check regular expression
		    if (!preg_match("/^(?:4[0-9]{12}(?:[0-9]{3})?)$/", $num)) {

		      	$errormsg = "Invalid VISA card number, card number must begins with digit 4";
		      	$ok = false;

		    }
	    }

		if (strlen($month) == 0) {
			$errormsg = "Invalid input";
		} else {
	    	$month = $this->test_input($month);
		    // check regular expression
		    if (!preg_match("/^(0?[1-9]|1[012])$/", $month)) {

		      	$errormsg = "Invalid month";
		      	$ok = false;

		    }
	    }

		if (strlen($year) == 0) {
			$errormsg = "Invalid input!";
		} else {
	    	$year = $this->test_input($year);
		    // check regular expression
		    if (!preg_match("/^[0-9]{2}$/", $year)) {

		      	$errormsg = "Invalid year";
		      	$ok = false;

		    }
	    }

		if (strlen($code) == 0) {
			$errormsg = "Invalid input";
		} else {
	    	$code = $this->test_input($code);
		    // check regular expression
		    if (!preg_match("/^[0-9]{3}$/", $code)) {

		      	$errormsg = "Invalid security code";
		      	$ok = false;

		    }
	    }

		// go to database
	    if (strlen($type) > 0 && 
	        strlen($name) > 0 && 
	        strlen($num) > 0 && 
	        strlen($month) > 0 && 
	        strlen($year) > 0 && 
	        strlen($code) > 0 && $ok) {

	    	$this->load->model('instabuy_model');
	    	$errormsg = $this->instabuy_model->walletAddDone($memberID, $name, $type, $num, $month, $year, $code);

	    }

		if (strlen($errormsg) > 0 && $errormsg != 'Add Failed, Please make sure the Account Name and Card No. can not duplicated!') {

	    	$data = array('data' => $errormsg);
	    	$this->load->view('walletAdd_view', $data);

		} elseif (strlen($errormsg) > 0 && $errormsg == 'Add Failed, Please make sure the Account Name and Card No. can not duplicated!') {

	    	$data = array('data' => $errormsg);
	    	$this->load->view('walletAdd_view', $data);

		} elseif (empty($errormsg)) {

	      	header('location: http://cs-server.usc.edu:8436/CodeIgniter/index.php/account');

      	}

	}

	public function walletEdit() {

		session_start();
		$this->load->helper('url');

		if (!empty($_SESSION['memberID']) && ((time() - $_SESSION['loggedin_time']) > 300)) { 

			unset($_SESSION['loggedin_time']);
			session_destroy();
			$header("location: http://cs-server.usc.edu:8436/CodeIgniter/index.php/logout");

		} else {
			
			$this->load->model('instabuy_model');
			$results = $this->instabuy_model->walletEdit();
			$this->load->view('walletEdit_view', $results);

		}

	}

	public function walletEditDone() {

		session_start();
		$this->load->helper('url');

		$memberID = $_SESSION['memberID'];
		$name = $_POST['methodName'];
		$num = $_POST['cardNo'];

		$submit = $_POST['submit'];

		$action = 0;

		if ($submit == 'Remove') {

			$this->load->model('instabuy_model');
			$action = $this->instabuy_model->walletEditRemoveDone($memberID, $name, $num, $action);

		} elseif ($submit == 'Update') {

			// getting exp. date, exp. year and secruity code and method type for an update
			$type = $_POST['accountType'];
			$month = $_POST['cardMonth'];
			$year = $_POST['cardYear'];
			$code = $_POST['cardCode'];
			$errormsg = "";
			$ok = true;

			if (strlen($month) == 0) {
				$errormsg = "Invalid input";
			} else {
		    	$month = $this->test_input($month);
			    // check regular expression
			    if (!preg_match("/^(0?[1-9]|1[012])$/", $month)) {

			      	$errormsg = "Invalid month";
			      	$ok = false;

			    }
		    }

			if (strlen($year) == 0) {
				$errormsg = "Invalid input!";
			} else {
		    	$year = $this->test_input($year);
			    // check regular expression
			    if (!preg_match("/^[0-9]{2}$/", $year)) {

			      	$errormsg = "Invalid year";
			      	$ok = false;

			    }
		    }

			if (strlen($code) == 0) {
				$errormsg = "Invalid input";
			} else {
		    	$code = $this->test_input($code);
			    // check regular expression
			    if (!preg_match("/^[0-9]{3}$/", $code)) {

			      	$errormsg = "Invalid security code";
			      	$ok = false;

			    }
		    }

			if (strlen($type) == 0) {
				$errormsg = "Invalid input";
			}

			if (strlen($month) != 0 && strlen($year) != 0 && strlen($code) != 0 && strlen($type) != 0 && $ok) {
			
				$this->load->model('instabuy_model');
				$action = $this->instabuy_model->walletEditUpdateDone($memberID, $name, $num, $type, $month, $year, $code, $action);

			}

		}

		if ($action == 1) {

			$errormsg = 'Action completed';
			$this->load->model('instabuy_model');
			$results = $this->instabuy_model->walletEdit();
			$data = array('data' => $errormsg, 'payment' => $results['payment']);

			$this->load->view('walletEdit_view', $data);

		} elseif (strlen($errormsg) > 0) {

			$this->load->model('instabuy_model');
			$results = $this->instabuy_model->walletEdit();
			$data = array('data' => $errormsg, 'payment' => $results['payment']);

			$this->load->view('walletEdit_view', $data);

		}

	}

}
?>