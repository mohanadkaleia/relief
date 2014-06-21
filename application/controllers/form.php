<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Class name : Form
 * 
 * Description :
 * This class contain functions to manage provider like add - edit - delete
 * 
 * Created date ; 8-2-2013
 * Modification date : ---
 * Modfication reason : ---
 * Author : Mohanad Shab Kaleia
 * contact : ms.kaleia@gmail.com
 */
class Form extends CI_Controller {

	
	/**
	 * Function name : __construct
	 * Description: 
	 * this contructor is called as this object is initiated.
	 * 
	 * created date: 21-2-2014
	 * ccreated by: Eng. Mohanad Kaleia
	 * contact: ms.kaleia@gmail.com 
	 */
	public function __construct(){
		parent::__construct();
		//check login state of the user requesting this controller.
		$this->load->helper('login');
		checkLogin();
	}
	
	
	
	public function index()
	{
		$this->manage();
	}
	
	
	/**
	 * function name : manage
	 * 
	 * Description : 
	 * call settings page
	 * 
	 * Created date ; 29-4-2013
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function manage($status_message = null)
	{														
		$this->load->view('gen/header');
		$this->load->view('gen/slogan');
		$this->load->view('form_manage');
		$this->load->view('gen/footer');
	}
	
	/**
	 * function name : ajaxGetForms
	 * 
	 * Description : 
	 * get forms information from database
	 * 
	 * Created date ; 4-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function ajaxGetForms()
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
		$this->grid->data = $this->provider_model->getProviderWithStatus();
		
		//grid controls
		$this->grid->control = array(									  
									  array("title" => "قبول" , "icon"=>"icon-ok" , "url"=>base_url()."form/accept" , "message_type"=>null , "message"=>"") , 
									  array("title" => "رفض" , "icon"=>"icon-trash" ,"url"=>base_url()."form/reject" , "message_type"=>"confirm" , "message"=>"Are you sure?"),
									  array("title" => "طباعة" , "icon"=>"icon-file" ,"url"=>base_url()."form/view" , "message_type"=>null , "message"=>"")
									);												
						
		//render our grid :)
		echo $this->grid->gridRender();											
	}

	
	/**
	 * function name : accept
	 * 
	 * Description : 
	 * call settings page
	 * 
	 * Created date ;4-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function accept($provider_code)
	{														
		//load model
		$this->load->model("provider_model");
		
		//accept provider
		$this->provider_model->code = $provider_code;
		$this->provider_model->acceptProvider(); 
		
		//redirect to manage page
		$this->manage();
	}


	/**
	 * function name : reject
	 * 
	 * Description : 
	 * Reject provider form 
	 * 
	 * Created date :4-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function reject($provider_code)
	{														
		//load model
		$this->load->model("provider_model");
		
		//reject provider
		$this->provider_model->code = $provider_code;
		$this->provider_model->rejectProvider();
		
		//redirect to manage page
		$this->manage(); 
	}
	
	
	/**
	 * function name : printForm
	 * 
	 * Description : 
	 * Reject provider form 
	 * 
	 * Created date :5-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function view($provider_code)
	{														
		//load model
		$this->load->model("provider_model");
		$this->load->model("family_member_model");
		$this->load->model("area_model");
		
		
		//set provider code
		$this->provider_model->code = $provider_code;
		$this->family_member_model->provider_code = $provider_code;
		
		
		
		$provider = $this->provider_model->getProviderByCode();
		$family_member = $this->family_member_model->getFamilyMemberByProviderCode();
		
		
		$this->area_model->code = $provider[0]["area_code"];
		$area = $this->area_model->getAreaByCode();
		
		$data["provider"] = $provider[0];		
		$data["family"] = $family_member;
		$data["area"] = $area;
		
			
		
		
		//load view page
		$this->load->view("form_view" , $data); 
	}
	
	/**
	 * function name : acceptReject
	 * 
	 * Description : 
	 * accept or reject multi forms 
	 * 
	 * Created date :22-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function acceptReject()
	{														
		//load model
		$this->load->model("provider_model");
		
		
		$providers = explode(";", $this->input->post("provider_code")); 
		$action = $this->input->post("save");
		foreach ($providers as $provider_code) 
		{								
			$this->provider_model->code = $provider_code;
			
			if($action == "قبول")
			{				
				$this->provider_model->acceptProvider(); 
			}	
			else 
			{
				$this->provider_model->rejectProvider();
			}						
		}
		//redirect to manage page
		$this->manage();			
	}
		
	
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */
