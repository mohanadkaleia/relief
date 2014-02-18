<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Class name : Dashboard
 * 
 * Description :
 * This class contain functions to manage dashboard page like statistics, show log ...
 * 
 * Created date ; 23-2-2013
 * Modification date : ---
 * Modfication reason : ---
 * Author : Mohanad Shab Kaleia
 * contact : ms.kaleia@gmail.com
 */
class Dashboard extends CI_Controller {


	
	public function index()
	{
		$this->showDashboard();
	}
	
	
	/**
	 * function name : showDashboard
	 * 
	 * Description : 
	 * call login view
	 * 
	 * Created date ; 23-2-2013
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function showDashboard()
	{		
		$this->load->view('gen/header');		
		$this->load->view('gen/slogan');
		$this->load->view('dashboard');
		$this->load->view('gen/footer');
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */