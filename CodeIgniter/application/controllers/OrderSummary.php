<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderSummary extends CI_Controller {

	public function orderItemSummary($orderID) {

		session_start();
		$this->load->helper('url');

		if (!empty($_SESSION['memberID']) && ((time() - $_SESSION['loggedin_time']) > 300)) { 

			unset($_SESSION['loggedin_time']);
			session_destroy();
			header("location: http://cs-server.usc.edu:8436/CodeIgniter/index.php/logout");

		} else {

			$this->load->model('instabuy_model');
			$results = $this->instabuy_model->orderItemSummary($orderID);
			$this->load->view('orderItemSummary_view', $results);

		}

	}

	public function orderItemSummaryShow($productID, $orderID) {

		session_start();
		$this->load->helper('url');

		if (!empty($_SESSION['memberID']) && ((time() - $_SESSION['loggedin_time']) > 300)) { 

			unset($_SESSION['loggedin_time']);
			session_destroy();
			header("location: http://cs-server.usc.edu:8436/CodeIgniter/index.php/logout");

		} else {

			$_SESSION['orderID'] = $orderID;
			$this->load->model('instabuy_model');
			$results = $this->instabuy_model->orderItemSummaryShow($productID);
			$this->load->view('orderItemSummaryShow_view', $results);

		}

	}

}
?>