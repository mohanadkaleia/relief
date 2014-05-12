<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Class name : Family_member
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
class Family_member extends CI_Controller {


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
		//load setting model
		//$this->load->model('setting_model');
		
		//get the setting values
		//$settings_value = $this->setting_model->getSettingsByUserId();
			
		//$data["settings"] = $settings_value;
		//$data["status_message"] = $status_message;
				
		$this->load->view('gen/header');
		$this->load->view('gen/slogan');
		$this->load->view('family_member_manage');
		$this->load->view('gen/footer');
	}
	
	
	
	/**
	 * function name : add
	 * 
	 * Description : 
	 * call add family member page
	 * 
	 * Created date ; 14-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function add($provider_code = 0)
	{			
		if($provider_code !== 0){
			//load provider model
			$this->load->model("provider_model");
			$this->provider_model->code = $provider_code;
			$provider  = $this->provider_model->getProviderByCode();
				
			//provider info is an array of provider basic information		
			$data['provider'] = $provider;	
												
			$this->load->view('gen/header');
			$this->load->view('gen/slogan');
			$this->load->view('family_member_add' , $data);
			$this->load->view('gen/footer');
		}else{
			$data['provider'] = 0;
			$this->load->view('gen/header');
			$this->load->view('gen/slogan');
			$this->load->view('family_member_add',$data);
			$this->load->view('gen/footer');
		}
	}
	
	
	/**
	 * function name : delete
	 * 
	 * Description : 
	 * deletes the family member specified by the id.
	 * this function is called from provider's family members page.
	 * 
	 * Parameters:
	 * $provider_code: the code of the provider for this family member
	 * $id: the id of the record to be deleted
	 * 
	 * Created date ; 22-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	public function delete($provider_code,$id)
	{			
		//load family member model
		$this->load->model("family_member_model");
		
		//set the id in the family member model
		$this->family_member_model->id = $id;
		
		//execute the delete function
		$this->family_member_model->deleteFamilyMember();
		
		//redirect to the provider's family members page
		redirect(base_url()."family_member/familyManage/". $provider_code);
	}
	
	
	/**
	 * function name : delete_member
	 * 
	 * Description : 
	 * deletes the family member specified by the id.
	 * this function is called from family members page.
	 * 
	 * Parameters:
	 * $id: the id of the record to be deleted
	 * 
	 * Created date ; 24-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	public function delete_member($id)
	{			
		//load family member model
		$this->load->model("family_member_model");
		
		//set the id in the family member model
		$this->family_member_model->id = $id;
		
		//execute the delete function
		$this->family_member_model->deleteFamilyMember();
		
		//redirect to the provider's family members page
		redirect(base_url()."family_member");
	}
	
	
	/**
	 * function name : edit
	 * 
	 * Description : 
	 * call edit family member page and fill it with family member's data
	 * 
	 * Parameters:
	 * $id: the id of this family member
	 * 
	 * Created date ; 22-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	public function edit($page,$id)
	{			
		//load provider model
		$this->load->model("family_member_model");
		$this->family_member_model->id = $id;
		//get the family member data 
		$family_member = $this->family_member_model->getFamilyMemberById();
		if(isset($family_member[0])){
			
			//insert the family member data in the data array to get into the view.		
			$data['family_member'] = $family_member[0];
			$data['page'] = $page;
												
			$this->load->view('gen/header');
			$this->load->view('gen/slogan');
			$this->load->view('family_member_edit' , $data);
			$this->load->view('gen/footer');
		}else
		redirect(base_url()."dashboard");
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
	 * Modfication reason : add saving edited family member data
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	public function saveData($action,$id = "")
	{
										
		//include model provider
		$this->load->model('family_member_model');
		
		// assign values to the model variable
		$this->family_member_model->provider_code = $this->input->post('provider_code');
		$this->family_member_model->national_id = $this->input->post('national_id');
		$this->family_member_model->fname = $this->input->post('fname');			
		$this->family_member_model->lname = $this->input->post('lname');
		$this->family_member_model->father_name = $this->input->post('father_name');				
		$this->family_member_model->gender = $this->input->post('gender');
		$this->family_member_model->birth_date = $this->input->post('birth_year').'-'.$this->input->post('birth_month').'-'.$this->input->post('birth_day');
		$this->family_member_model->relationship = $this->input->post('relationship');
		$this->family_member_model->health_status = $this->input->post('health_status');		
		$this->family_member_model->job = $this->input->post('job');
		$this->family_member_model->study_status = $this->input->post('study_status');
		$this->family_member_model->social_status = $this->input->post('social_status');		
		$this->family_member_model->note = $this->input->post('note');
			
		//provider info
		$provider_info['name'] = $this->input->post('provider_name');
		$provider_info['code'] = $this->input->post('provider_code');
		
		if($action == "add"){
			//add the informatoin to the database
			$this->family_member_model->addFamilyMember();
			
			//redirect to the setting page 
			redirect(base_url()."family_member/add/". $provider_info['code']);
			
		}else if($action == "edit"){
			//add the id of family member to be edited
			$this->family_member_model->id = $id;
			
			//call modify family member data function
			$this->family_member_model->modifyFamilyMember();
			$page = $this->input->post('page');
			if( $page == 'prov_fam'){
				//redirect to the provider's family members page if it was the previous page
				redirect(base_url()."family_member/familyManage/". $provider_info['code']);
			}else if($page == 'member'){
				//else redirect to the family members general page
				redirect(base_url().'family_member');
			}
		}		
				
	}



	/**
	 * function name : ajaxGetFamilyMember
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
	public function ajaxGetFamilyMember()
	{										
		//load user model to get data from it
		$this->load->model('family_member_model');
		
		//load grid library
		$this->load->library('grid');				
		
		//grid option
		$this->grid->option['title'] = "Family Member";   //  grid title
		$this->grid->option['id'] = "id";         // database table id
		$this->grid->option['sortable'] = FALSE;  // is sortable
		$this->grid->option['page_size'] = 10;    //records per page
		$this->grid->option['row_number'] = true; //show the row number		
		$this->grid->option['add_button'] = false; //show add button
		$this->grid->option['add_url'] = base_url()."family_member/add"; //add url
		$this->grid->option['add_title'] = "إضافة فرد"; //add title
			
		$this->grid->columns = array('full_name' , 'full_name' , 'relationship'  , 'gender' , 'birth_date');
		
		//get the data	
		$this->grid->data = $this->family_member_model->getAllFamilyMembers();
		
		//grid controls
		$this->grid->control = array(
									  array("title" => "تعديل" , "icon"=>"icon-pencil" , "url"=>base_url()."family_member/edit/member" , "message_type"=>null , "message"=>"") , 
									  array("title" => "حذف" , "icon"=>"icon-trash" ,"url"=>base_url()."family_member/delete_member" , "message_type"=>"confirm" , "message"=>"Are you sure?")
									);												
						
		//render our grid :)
		echo $this->grid->gridRender();
												
	}


	/**
	 * function name : familyManage
	 * 
	 * Description : 
	 * get provider family manage page
	 * 
	 * Created date ; 22-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function familyManage($provider_code)
	{
		//load family_member model
		$this->load->model('family_member_model');
		
			
		$data["provider_code"] = $provider_code;
		
				
		$this->load->view('gen/header');
		$this->load->view('gen/slogan');
		$this->load->view('provider_family_manage' , $data);
		$this->load->view('gen/footer');
	}
	
	
	/**
	 * function name : ajaxGetProviderFamily
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
	public function ajaxGetProviderFamily($provider_code)
	{										
		//load user model to get data from it
		$this->load->model('family_member_model');
		
		//load grid library
		$this->load->library('grid');				
		
		//grid option
		$this->grid->option['title'] = "Family Member";   //  grid title
		$this->grid->option['id'] = "id";         // database table id
		$this->grid->option['sortable'] = FALSE;  // is sortable
		$this->grid->option['page_size'] = 10;    //records per page
		$this->grid->option['row_number'] = true; //show the row number		
		$this->grid->option['add_button'] = true; //show add button
		$this->grid->option['add_url'] = base_url()."family_member/add/".$provider_code; //add url
		$this->grid->option['add_title'] = "إضافة فرد"; //add title
			
		$this->grid->columns = array('full_name' , 'full_name' , 'relationship'  , 'gender' , 'birth_date');
		
		//get the data	FamilyMembers
		$this->family_member_model->provider_code = $provider_code;
		$this->grid->data = $this->family_member_model->getFamilyMemberByProviderCode();
		
		//grid controls
		$this->grid->control = array(
									  array("title" => "تعديل" , "icon"=>"icon-pencil" , "url"=>base_url()."family_member/edit/prov_fam" , "message_type"=>null , "message"=>"") , 
									  array("title" => "حذف" , "icon"=>"icon-trash" ,"url"=>base_url()."family_member/delete/".$provider_code , "message_type"=>"confirm" , "message"=>"Are you sure?")
									);												
						
		//render our grid :)
		echo $this->grid->gridRender();
												
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */
