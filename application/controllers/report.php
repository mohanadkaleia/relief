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
class Report extends CI_Controller {


	
	public function index()
	{
		$this->manage();
	}
	
	
	/**
	 * function name : manage
	 * 
	 * Description: 
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
		//load models
		$this->load->model("provider_model");
		$this->load->model("family_member_model");
				
		//get all providers
		$providers = $this->provider_model->getAllProviders();	
		
		//get all family_members
		$family_members = $this->family_member_model->getAllFamilyMembers();
		
		//get all members by gender
		$members_male = $this->family_member_model->getFamilyMembersByGender('M');
		$members_female = $this->family_member_model->getFamilyMembersByGender('F');
		
		//get all members by their health status "disabled" 
		$members_disabled = $this->family_member_model->getFamilyMembersByHealth("disabled");
			
		$data["providers"] = $providers;
		$data["members"] = $family_members;
		$data["male"] = $members_male;
		$data["female"] = $members_female;
		$data["disabled"] = $members_disabled;
																	
		$this->load->view('gen/header');
		$this->load->view('gen/slogan');
		$this->load->view('report_manage' , $data);
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
		$data["message"] = $this->input->get("message");									
		$this->load->view('gen/header');
		$this->load->view('gen/slogan');
		$this->load->view('provider_add' , $data);
		$this->load->view('gen/footer');
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
	 * function name : search
	 * 
	 * Description : 
	 * search for provider
	 * 
	 * parameters:
	 * $providers: array of providers
	 * Created date ; 23-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function search($providers = "")
	{
		//load area model
		$this->load->model("area_model");

		//get all areas		
		$areas = $this->area_model->getAllAreas();
		$data["areas"] = $areas;
				
		if(isset($providers))	
		{
			$data["providers"] = $providers;
		}			
		else 
		{
				$data["providers"] = "";
		}															
		$this->load->view('gen/header');
		$this->load->view('gen/slogan');
		$this->load->view('provider_search' , $data);
		$this->load->view('gen/footer');
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
	 * Parameters:
	 * provider_code: the code of the provider.
	 * barcode: a flag that is set tu true if the bar code is generated.
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
	 * function name : printProvider
	 * 
	 * Description : 
	 * print the provider
	 * 
	 * Parameters:
	 * provider_code: the code of the provider.
	 * 
	 * 
	 * Created date ; 24-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	public function printProvider($provider_code)
	{	
			//load provider model
			$this->load->model("provider_model");
			//load provider model
			$this->load->model("family_member_model");
			//load area model 
			$this->load->model("area_model");
			//load association model
			$this->load->model("association_model");
			
			
			//set the code of the wanted provider in the model
			$this->provider_model->code = $provider_code;
			//get the data of the provider to edit
			$provider = $this->provider_model->getProviderByCode();
			
			if(isset($provider[0]))
			{
				//set the code of the wanted provider in the model
				$this->family_member_model->provider_code = $provider_code;
				
				//get the provider's family members
				$family_members = $this->family_member_model->getFamilyMemberByProviderCode();
				
				//set the id of the wanted provider's area in the model
				$this->area_model->code = $provider[0]['area_code'];
				
				//get the area of the provider
				$area  = $this->area_model->getAreaByCode();
				
				//get asspciation information
				$association = $this->association_model->getAllAssociations();
				
				//set the data array to be passed to the view page
				$data["provider"] = $provider[0];
				$data["family_members"] = $family_members;
				$data["area"] = $area;
				$data["association"] = $association[0];
				
				
				
				//load the views with data			
				//$this->load->view('gen/header');
				//$this->load->view('gen/slogan');
				$this->load->view('provider_print' , $data);
				//$this->load->view('gen/footer');
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
		$this->provider_model->fname = $this->input->post('fname');			
		$this->provider_model->lname = $this->input->post('lname');
		$this->provider_model->father_name = $this->input->post('father_name');
		$this->provider_model->mother_name = $this->input->post('mother_name');			
		$this->provider_model->national_id = $this->input->post('national_id');
		$this->provider_model->birth_date = $this->input->post('birth_date');
		$this->provider_model->is_emigrant = $this->input->post('is_emigrant');
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
		$association_code = $this->session->userdata['user']['association_code'];
		$area_code = $this->input->post('area');
		
		//provider code
		$provider_code = $association_code . "-" . $area_code . "-" . $this->input->post('national_id');
		$this->provider_model->code = $provider_code;
		
		//provide informaion
		$provider_info['name'] = $this->input->post('full_name');
		$provider_info['code'] = $provider_code;
		
		
		
		if($action == "add")
		{
			
			//validate national id
			$is_exist = $this->provider_model->chkExist();
			
			if($is_exist)
			{
				//return to the same page and show error message
				redirect(base_url()."provider/add?message=عذراً ولكن المعيل ".$this->input->post('fname')." موجود مسبقاً!");			
			}
			
			//add the informatoin to the database
			$this->provider_model->addProvider($association_code , $area_code);
											
			//print the barcode
			$this->barcode_generate($provider_code);
											
			//redirect to add probider family member 
			redirect(base_url()."family_member/add/". $provider_info["code"]);	
		}
		elseif($action == "edit")
		{
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
			
		$this->grid->columns = array('code','full_name' , 'national_id' , 'created_date');//'code' removed
		
		//get the data	
		$this->grid->data = $this->provider_model->getAllProviders();
		
		//grid controls
		$this->grid->control = array(
									  array("title" => "الأسرة" , "icon"=>"icon-th-list" , "url"=>base_url()."family_member/familyManage" , "message_type"=>null , "message"=>"") ,
									  array("title" => "تعديل" , "icon"=>"icon-pencil" , "url"=>base_url()."provider/edit" , "message_type"=>null , "message"=>"") , 
									  array("title" => "حذف" , "icon"=>"icon-trash" ,"url"=>base_url()."provider/delete" , "message_type"=>"confirm" , "message"=>"Are you sure?"),
									  array("title" => "عرض" , "icon"=>"icon-file" ,"url"=>base_url()."provider/view" , "message_type"=>null , "message"=>""),
									  array("title" => "طباعة" , "icon"=>"icon-print" ,"url"=>base_url()."provider/printProvider" , "message_type"=>null , "message"=>"")
									);												
						
		//render our grid :)
		echo $this->grid->gridRender();											
	}

	
	/**
	 * function name : searchData
	 * 
	 * Description : 
	 * search for data provider
	 * 
	 * Created date ; 23-4-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function searchData()
	{															
		//include model provider
		$this->load->model('provider_model');				
		
		// assign values to the model variable
		$fname = $this->input->post('fname');		
		$lname = $this->input->post('lname');
		$national_id = $this->input->post('national_id');
		
		$area = $this->input->post('area');
		
		$family_book_num = $this->input->post('family_book_num');
		$family_book_letter = $this->input->post('family_book_letter');
		$family_book_family_num = $this->input->post('family_book_family_num');
		
		$family_num_less = $this->input->post('family_less');
		$family_num_bigger = $this->input->post('family_big');
		$family_num_equal = $this->input->post('family_equal');
				
		$reg_date_less = $this->input->post('register_date_less');
		$reg_date_big = $this->input->post('register_date_bigger');
		$reg_date_equal = $this->input->post('register_date_equal');
		
		$providers = $this->provider_model->searchProvider($fname , 
														   $lname , 
														   $national_id, 
														   $area , 
														   $family_book_num , 
														   $family_book_letter , 
														   $family_book_family_num , 
														   $family_num_less , 
														   $family_num_bigger , 
														   $family_num_equal , 
														   $reg_date_less , 
														   $reg_date_big , 
														   $reg_date_equal);
		
		
		$this->search($providers);
		
	}	

	/**
	 * function name : getBarcodeData
	 * 
	 * Description : 
	 * search for data provider
	 * 
	 * Created date ; 25-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Eng. Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	public function getBarcodeData()
	{									
		$string = file_get_contents(base_url()."/files/outtext.txt");
		echo $string;
	}

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */
