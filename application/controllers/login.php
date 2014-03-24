<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
	
/**
 * Class name : login
 * 
 * Description :
 * This class contain functions that refer to pages like go to page -- and pass data to it.
 * 
 * Created date ; 14-12-2012
 * Modification date : ---
 * Modfication reason : ---
 * Author : Mohanad Shab Kaleia
 * contact : ms.kaleia@gmail.com
 */
class Login extends CI_Controller
{
	
	public function index()
	{
		//load library	
		$this->load->library('form_validation');
											
		// call header		
		$this->load->view('gen/header');
		$this->load->view('gen/slogan');
		// call login page	
		$this->load->view('login');
		
		$this->load->view('gen/footer');
	}
	
	
	public function __construct(){
		parent::__construct();
		//load the login_helper
		$this->load->helper('login');
		//if the user already logged in redirect him/her to dash board page.
		if(isset($this->session->userdata['user'])){
			redirect(base_url()."dashboard");
		}
	}
	
	
	/**
	 * function name : validateLogin
	 * 
	 * Description : 
	 * validate login
	 * 		
	 * Created date ; 20-12-2012
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function validateLogin()
	{
		
		// load validation library								
		$this->load->library('form_validation');		
		
		//check validation
		$this->form_validation->set_rules('username', 'username', 'required|callback_validateCreditials');	
		$this->form_validation->set_rules('password', 'Password', 'required|md5');				
		
		if ($this->form_validation->run())
		{				
			//redirect to dashboard page
			redirect(base_url().'dashboard');
		}
		else
		{
			//redirect to login page again
			$this->index();						
		}				
	}	
	
	
	/**
	 * function name : validateCreditials
	 * 
	 * Description : 
	 * This functions gets the user of the given username and password.
	 * If he/she is an authorized user it adds him/her to the session. 
	 * Created date ; 14-10-2012
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function  validateCreditials()
	{
		$this->load->model('user_model');											
		//set username and md5 hashed password from the request in the user model
		$this->user_model->username = $this->input->post('username');
		$this->user_model->password = md5($this->input->post('password'));
		//get the users specified by the given username and password
		$users = $this->user_model->getUserByUsernameAndPassword();
		if(isset($users[0])){
		if($users[0]){
				$this->session->set_userdata('user',$users[0]);
				return TRUE;
			}
		}else{
			$this->form_validation->set_message('validateCreditials' , 'اسم مستخدم خاطئ أو كلمة المرور خاطئة :(');			
			return FALSE;
		}
	}
	
	/**
	 * function name : logout
	 * 
	 * Description : 
	 * logout and return back to the login page
	 * 		
	 * Created date ; 22-12-2012
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function  logout()
	{				
		//destroy the session	
		$this->session->sess_destroy();
		
		//redirect to login page
		$this->index();
	}	
}
	
	
?>
