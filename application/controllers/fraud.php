<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Class name : Fraud
 * 
 * Description :
 * detect fraud controller
 * 
 * Created date ; 8-3-2013
 * Modification date : ---
 * Modfication reason : ---
 * Author : Mohanad Shab Kaleia
 * contact : ms.kaleia@gmail.com
 */
class Fraud extends CI_Controller {


	
	public function index()
	{
		$this->manage();
	}
	
	
	/**
	 * function name : manage
	 * 
	 * Description : 
	 * manage fraud
	 * 
	 * Created date ; 8-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function manage($status_message = null)
	{
		$this->load->view('gen/header');
		$this->load->view('gen/slogan');
		$this->load->view('fraud_manage');
		$this->load->view('gen/footer');
	}
	
	

	/**
	 * function name : ajaxGetProviders
	 * 
	 * Description : 
	 * get providers information from database
	 * 
	 * Created date ; 13-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function ajaxGetFroudProviders()
	{										
		//load user model to get data from it
		$this->load->model('provider_model');
		
		//load grid library
		$this->load->library('grid');				
		
		//grid option
		$this->grid->option['title'] = "Providers";   //  grid title
		$this->grid->option['id'] = "code";         // database table id
		$this->grid->option['sortable'] = FALSE;  // is sortable
		$this->grid->option['page_size'] = 10;    //records per page
		$this->grid->option['row_number'] = true; //show the row number		
		$this->grid->option['add_button'] = false; //show add button
		$this->grid->option['add_url'] = base_url()."provider/add"; //add url
		$this->grid->option['add_title'] = "إضافة معيل"; //add title
			
		$this->grid->columns = array('code','full_name' , 'national_id' , 'created_date');//'code' removed
		
		//get the data	
		$this->grid->data = $this->provider_model->detectProviderFraud();
		
		//grid controls
		$this->grid->control = array(									  
									  									  
									);												
						
		//render our grid :)
		echo $this->grid->gridRender();											
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */
