<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Class name : Provider
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
class Provider extends CI_Controller {


	
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
		//load setting model
		//$this->load->model('setting_model');
		
		//get the setting values
		//$settings_value = $this->setting_model->getSettingsByUserId();
			
		//$data["settings"] = $settings_value;
		//$data["status_message"] = $status_message;
				
		$this->load->view('gen/header');
		$this->load->view('gen/slogan');
		$this->load->view('provider_manage');
		$this->load->view('gen/footer');
	}
	
	
	
	/**
	 * function name : add
	 * 
	 * Description : 
	 * call provider add page
	 * 
	 * Created date ; 20-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function add()
	{
		//load area page 
		$this->load->model("area_model");
		
		//get all available area
		$area  = $this->area_model->getAllAreas();
		
		$data["area"] = $area;
											
		$this->load->view('gen/header');
		$this->load->view('gen/slogan');
		$this->load->view('provider_add' , $data);
		$this->load->view('gen/footer');
	}
	
	
	/**
	 * function name : barcode_generate
	 * 
	 * Description : 
	 * deletes the provider specified by the id
	 * 
	 * Created date ; 22-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	public function barcode_generate($provider_code)
	{			
		$data['provider_code'] = $provider_code;
		$this->load->view('barcode_generate' , $data);
		
	}
	
	/**
	 * function name : delete
	 * 
	 * Description : 
	 * deletes the provider specified by the id
	 * 
	 * Created date ; 22-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	public function delete($provider_code)
	{			
		//load family member model
		$this->load->model("provider_model");
		
		//set the code in the provider model
		$this->provider_model->code = $provider_code;
		
		//execute the delete function
		$this->provider_model->deleteProviderByCode();
		
		//redirect to the provider's family members page
		redirect(base_url()."provider");
	}
	
	
	
	/**
	 * function name : edit
	 * 
	 * Description : 
	 * call provider edit page
	 * 
	 * Created date ; 22-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	public function edit($provider_code)
	{
		//load area model 
		$this->load->model("area_model");
		
		//get all available area
		$area  = $this->area_model->getAllAreas();
		
		$data["area"] = $area;
		
		//load provider model
		$this->load->model("provider_model");
		
		//set the code of the wanted provider in the model
		$this->provider_model->code = $provider_code;
		
		//get the data of the provider to edit
		$provider = $this->provider_model->getProviderByCode();
		
		if(isset($provider[0])){
			$data["provider"] = $provider[0];
			//load the views with data			
			$this->load->view('gen/header');
			$this->load->view('gen/slogan');
			$this->load->view('provider_edit' , $data);
			$this->load->view('gen/footer');
		}else{
			redirect(base_url()."provider");
		}
	}
	
	
	/**
	 * function name : view
	 * 
	 * Description : 
	 * views all the provider data and his family members.
	 * 
	 * Created date ; 24-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	public function view($provider_code)
	{
		//load provider model
		$this->load->model("provider_model");
		//load provider model
		$this->load->model("family_member_model");
		//load area model 
		$this->load->model("area_model");
		
		//set the code of the wanted provider in the model
		$this->provider_model->code = $provider_code;
		//get the data of the provider to edit
		$provider = $this->provider_model->getProviderByCode();
		
		if(isset($provider[0])){
			//set the code of the wanted provider in the model
			$this->family_member_model->provider_code = $provider_code;
			//get the provider's family members
			$family_members = $this->family_member_model->getFamilyMemberByProviderCode();
			
			//set the id of the wanted provider's area in the model
			$this->area_model->code = $provider[0]['area_code'];
			//get the area of the provider
			$area  = $this->area_model->getAreaByCode();
			
			//set the data array to be passed to the view page
			$data["provider"] = $provider[0];
			$data["family_members"] = $family_members;
			$data["area"] = $area;
			
			//load the views with data			
			$this->load->view('gen/header');
			$this->load->view('gen/slogan');
			$this->load->view('provider_view' , $data);
			$this->load->view('gen/footer');
		}else{
			redirect(base_url()."provider");
		}
	}
	
	/**
	 * function name : saveData
	 * 
	 * Description : 
	 * show add provider page
	 * 
	 * Created date ; 8-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 * 
	 * Modification date : 22-2-2014
	 * Modfication reason : add saving edited provider data
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	public function saveData($action,$id)
	{
										
		//include model provider
		$this->load->model('provider_model');				
		
		// assign values to the model variable
		$this->provider_model->full_name = $this->input->post('full_name');			
		$this->provider_model->national_id = $this->input->post('national_id');
		$this->provider_model->family_book_num = $this->input->post('family_book_num');
		$this->provider_model->family_book_letter = $this->input->post('family_book_letter');
		$this->provider_model->family_book_family_num = $this->input->post('family_book_family_num');
		$this->provider_model->family_book_note = $this->input->post('family_book_note');
		$this->provider_model->current_address = $this->input->post('current_address');
		$this->provider_model->prev_address = $this->input->post('prev_address');
		$this->provider_model->street = $this->input->post('street');
		$this->provider_model->point_guide = $this->input->post('point_guide');
		$this->provider_model->build = $this->input->post('build');
		$this->provider_model->floor = $this->input->post('floor');
		$this->provider_model->phone1 = $this->input->post('phone1');
		$this->provider_model->phone2 = $this->input->post('phone2');
		$this->provider_model->mobile1 = $this->input->post('mobile1');
		$this->provider_model->mobile2 = $this->input->post('mobile2');
		$this->provider_model->note = $this->input->post('note');
		$this->provider_model->created_date = date("y/m/d"); 		
			
		//area and association
		$association_code = "01" ;
		$area_code = $this->input->post('area');;
		
		//provider code
		$provider_code = $association_code . $area_code . $this->input->post('national_id');
		$this->provider_model->code = $association_code . $area_code . $this->input->post('national_id');
		
		//provide informaion
		$provider_info['name'] = $this->input->post('full_name');
		$provider_info['code'] = $provider_code;
		
		if($action == "add"){
			//add the informatoin to the database
			$this->provider_model->addProvider($association_code , $area_code);
											
			//redirect to add probider family member 
			redirect(base_url()."family_member/add/". $provider_info["code"]);	
		}elseif($action == "edit"){
			// set the id in the model
			$this->provider_model->id = $id;
			// call the modify function
			$this->provider_model->modifyProvider($association_code , $area_code);
			// redirect to the provider page
			redirect(base_url()."provider");
		}
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
	public function ajaxGetProviders()
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
		$this->grid->option['add_button'] = true; //show add button
		$this->grid->option['add_url'] = base_url()."provider/add"; //add url
		$this->grid->option['add_title'] = "إضافة معيل"; //add title
			
		$this->grid->columns = array( 'full_name' , 'national_id' , 'created_date');//'code' removed
		
		//get the data	
		$this->grid->data = $this->provider_model->getAllProviders();
		
		//grid controls
		$this->grid->control = array(
									  array("title" => "الأسرة" , "icon"=>"icon-plus" , "url"=>base_url()."family_member/familyManage" , "message_type"=>null , "message"=>"") ,
									  array("title" => "تعديل" , "icon"=>"icon-pencil" , "url"=>base_url()."provider/edit" , "message_type"=>null , "message"=>"") , 
									  array("title" => "حذف" , "icon"=>"icon-trash" ,"url"=>base_url()."provider/delete" , "message_type"=>"confirm" , "message"=>"Are you sure?"),
									  array("title" => "عرض" , "icon"=>"icon-file" ,"url"=>base_url()."provider/view" , "message_type"=>null , "message"=>""),
									  array("title" => "توليد كود" , "icon"=>"icon-barcode" ,"url"=>base_url()."provider/barcode_generate" , "message_type"=>null , "message"=>"")
									);												
						
		//render our grid :)
		echo $this->grid->gridRender();
												
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */
