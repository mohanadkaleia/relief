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
	public function saveData()
	{
		//load provider model
		$this->load->model("package_model");
				
		// assign values to the model variable
		$this->package_model->id = $this->input->post('aid');
		$provider_code = $this->input->post('provider');
		
		
		//deliever aid to provider
		$this->package_model->aidDelivery($provider_code);
		
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
									  array("title" => "تعديل" , "icon"=>"icon-pencil" , "url"=>base_url()."provider/edit" , "message_type"=>null , "message"=>"") , 
									  array("title" => "حذف" , "icon"=>"icon-trash" ,"url"=>base_url()."provider/delete" , "message_type"=>"confirm" , "message"=>"Are you sure?"),
									  array("title" => "طباعة" , "icon"=>"icon-file" ,"url"=>base_url()."provider/barcode_generate" , "message_type"=>null , "message"=>"")
									);												
						
		//render our grid :)
		echo $this->grid->gridRender();											
	}		
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */
