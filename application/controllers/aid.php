<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Class name : Provider
 * 
 * Description :
 * This class contain functions for give a provider aid
 * 
 * Created date ; 12-3-2014
 * Modification date : ---
 * Modfication reason : ---
 * Author : Mohanad Shab Kaleia
 * contact : ms.kaleia@gmail.com
 */
class Aid extends CI_Controller {


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
	 * go to manage page
	 * 
	 * Created date ; 13-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function manage()
	{		
		$this->load->view('gen/header');
		$this->load->view('gen/slogan');
		$this->load->view('aid_manage');
		$this->load->view('gen/footer');
	}
	
	
	
	/**
	 * function name : add
	 * 
	 * Description : 
	 * give aid to provider
	 * 
	 * Created date ; 12-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function add($status_message = null)
	{
		//load provider model
		$this->load->model("provider_model");
		$data["providers"] = $this->provider_model->getAllProviders();
		
		//load package model
		$this->load->model("package_model");
		$data["packages"] = $this->package_model->getAllPackages();
		
		$this->load->view('gen/header');
		$this->load->view('gen/slogan');
		$this->load->view('aid_add' , $data);;
		$this->load->view('gen/footer');
	}
	
	
	
	/**
	 * function name : saveData
	 * 
	 * Description : 
	 * deliever package to provider
	 * 
	 * Created date ; 12-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function saveData($provider_code)
	{		
		//load provider model
		$this->load->model("package_model");
				
		// assign values to the model variable
		$packages_number = $this->input->post("packages_number");
		
		for($i = 0 ; $i< $packages_number ; $i++)
		{						
			if($this->input->post('package_'.$i) == 'true')
			{				
				$package_id = $this->input->post('package_id_'.$i);
				$package_code = $this->input->post('package_code_'.$i);
					
				$this->package_model->code = $package_code;
			
				//deliever aid to provider
				$this->package_model->aidDelivery($provider_code);
				
				//decrease subject amount
				$this->decreaseSubectsAmount($package_code);	
			}								
		}
		
		
		
		
		
		
		/*
		//print the package detail
		$this->load->model("package_detail_model");
		
		
		$this->package_detail_model->package_id = $this->input->post('aid');
		$package_detail = $this->package_detail_model->getPackageDetailsByPackageId();
		
		$this->load->model("provider_model");
		$this->provider_model->code = $provider_code; 
		$data["provider"] = $this->provider_model->getProviderByCode();
		$data["package"] = $package_detail;
		
		//load print view
		$this->load->view("aid_print" , $data);
		 */ 
		 
		redirect(base_url()."provider"); 						
	}
	
	
	
	/**
	 * function name : ajaxGetProvidersPackages
	 * 
	 * Description : 
	 * get providers information from database
	 * 
	 * Created date ; 13-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function ajaxGetProvidersPackages()
	{										
		//load user model to get data from it
		$this->load->model('provider_package_model');
		
		//load grid library
		$this->load->library('grid');				
		
		//grid option
		$this->grid->option['title'] = "Provider's packages";   //  grid title
		$this->grid->option['id'] = "id";         // database table id
		$this->grid->option['sortable'] = FALSE;  // is sortable
		$this->grid->option['page_size'] = 10;    //records per page
		$this->grid->option['row_number'] = true; //show the row number		
		$this->grid->option['add_button'] = true; //show add button
		$this->grid->option['add_url'] = base_url()."aid/add"; //add url
		$this->grid->option['add_title'] = "تسليم معونة"; //add title
			
		$this->grid->columns = array('full_name' , 'package_name' , 'deliever_date');//'code' removed
		
		//get the data	
		$this->grid->data = $this->provider_package_model->getAllProviderPackages();
		
		//grid controls
		$this->grid->control = array(									  									  
									  //array("title" => "طباعة" , "icon"=>"icon-file" ,"url"=>base_url()."provider/barcode_generate" , "message_type"=>null , "message"=>"")
									);												
						
		//render our grid :)
		echo $this->grid->gridRender();											
	}	


	/**
	 * function name : ajaxGetPackagesByProviderCode
	 * 
	 * Description : 
	 * get packages for a spesific provider
	 * 
	 * Created date ; 27-6-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function ajaxGetPackagesByProviderCode($code)
	{										
		//load user model to get data from it
		$this->load->model('provider_package_model');
		
		//load grid library
		$this->load->library('grid');				
		
		//grid option
		$this->grid->option['title'] = "Provider's packages";   //  grid title
		$this->grid->option['id'] = "id";         // database table id
		$this->grid->option['sortable'] = FALSE;  // is sortable
		$this->grid->option['page_size'] = 10;    //records per page
		$this->grid->option['row_number'] = true; //show the row number		
		$this->grid->option['add_button'] = true; //show add button
		$this->grid->option['add_url'] = base_url()."aid/giveProvider/" . $code; //add url
		$this->grid->option['add_title'] = "تسليم معونة"; //add title
			
		$this->grid->columns = array('full_name' , 'package_name' , 'deliever_date');//'code' removed
		
		//get the data	
		$this->provider_package_model->provider_code = $code;
		$this->grid->data = $this->provider_package_model->getProviderPackagesByProviderCode();
		
		//grid controls
		$this->grid->control = array(									  									  
									  //array("title" => "طباعة" , "icon"=>"icon-file" ,"url"=>base_url()."provider/barcode_generate" , "message_type"=>null , "message"=>"")
									);												
						
		//render our grid :)
		echo $this->grid->gridRender();											
	}

	/**
	 * function name : decreaseSubectsAmount
	 * 
	 * Description : 
	 * 1. get subjects codes by pakage id
	 * 2. get package subect amount
	 * 3. decrease each subject amount by package subject amount
	 * 
	 * Created date ; 27-6-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function decreaseSubectsAmount($package_code)
	{
		//load pacjage model
		$this->load->model("package_detail_model");
		
		//get package details by package id
		$this->package_detail_model->package_code = $package_code;
		$package_details = $this->package_detail_model->getPackageDetailsByPackageCode();
		
		foreach ($package_details as $package) 
		{
			$subject_code = $package["subject_code"];
			$amount = $package["amount"];
			
			//decrease subject amount by package amount
			//load subject model
			$this->load->model("subject_model");
			$this->subject_model->code = $subject_code;
			$this->subject_model->decreaseSubjectAount($amount);
		}			
	}
	
	
	/**
	 * function name : giveProvider
	 * 
	 * Description : 
	 * give aid to a spesific provider  
	 * 
	 * Created date ; 28-6-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function giveProvider($provider_code)
	{
		//load provider model
		$this->load->model("provider_model");
		$this->provider_model->code = $provider_code;
		$provider_info = $this->provider_model->getProviderByCode();
		$data["provider_info"] = $provider_info[0];
		
				
		//load package model
		$this->load->model("package_model");
		$data["packages"] = $this->package_model->getAllPackages();		
		
		//load package details model to get package component
		$this->load->model("package_detail_model");		
		$data["package_details"] = $this->package_detail_model->getPackageDetails();
		
		$this->load->view('gen/header');
		$this->load->view('gen/slogan');
		$this->load->view('aid_provider_give' , $data);
		$this->load->view('gen/footer');
	}
		
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */
