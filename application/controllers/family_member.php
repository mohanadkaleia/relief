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
	public function add()
	{									
		$this->load->view('gen/header');
		$this->load->view('gen/slogan');
		$this->load->view('family_member_add');
		$this->load->view('gen/footer');
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
	 */
	public function saveData()
	{
										
		//include model provider
		$this->load->model('family_member_model');
		
		// assign values to the model variable
		$this->family_member_model->provider_code = $this->input->post('provider_code');
		$this->family_member_model->full_name = $this->input->post('full_name');			
		$this->family_member_model->gender = $this->input->post('gender');
		$this->family_member_model->birth_date = $this->input->post('birth_date');
		$this->family_member_model->relationship = $this->input->post('relationship');
		$this->family_member_model->health_status = $this->input->post('health_status');
		$this->family_member_model->is_emigrant = $this->input->post('is_emigrant');
		$this->family_member_model->job = $this->input->post('job');
		$this->family_member_model->study_status = $this->input->post('study_status');
		$this->family_member_model->social_status = $this->input->post('social_status');		
		$this->family_member_model->note = $this->input->post('note');
			
	
		
			
		//add the informatoin to the database
		$this->family_member_model->addFamilyMember();
										
		
		//redirect to the setting page 
		//$this->showSettings($status_message);		
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
		$this->grid->option['add_button'] = true; //show add button
		$this->grid->option['add_url'] = base_url()."family_member/add"; //add url
		$this->grid->option['add_title'] = "إضافة فرد"; //add title
			
		$this->grid->columns = array('full_name' , 'full_name' , 'relationship'  , 'gender' , 'birth_date');
		
		//get the data	
		$this->grid->data = $this->family_member_model->getAllFamilyMembers();
		
		//grid controls
		$this->grid->control = array(
									  array("title" => "تعديل" , "icon"=>"icon-pencil" , "url"=>base_url()."user/editUser" , "message_type"=>null , "message"=>"") , 
									  array("title" => "حذف" , "icon"=>"icon-trash" ,"url"=>base_url()."user/deleteUser" , "message_type"=>"confirm" , "message"=>"Are you sure?")
									);												
						
		//render our grid :)
		echo $this->grid->gridRender();
												
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */