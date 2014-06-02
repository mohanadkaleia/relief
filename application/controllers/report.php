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
		$this->load->model("statistics_model");
				
		//get all providers
		$providers = $this->provider_model->getAllProviders();	
		
		//get all family_members
		$family_members = $this->family_member_model->getAllFamilyMembers();
		
		//get all members by gender
		$members_male = $this->family_member_model->getFamilyMembersByGender('M');
		$members_female = $this->family_member_model->getFamilyMembersByGender('F');
		
		//get all members by their health status "disabled" 
		$members_disabled = $this->family_member_model->getFamilyMembersByHealth("disabled");
		
		//get number of emigrant family
		$emigramt_family = $this->statistics_model->searchByHouse("T");		
		
		//get all illiterate members
		$illiterates = $this->statistics_model->searchByStudyStatus("illiterate");
		
		//get all university study status members
		$university = $this->statistics_model->searchByStudyStatus("university");
		
		//get all unemployed members
		$unemployed = $this->statistics_model->searchByJobStatus("unemployed");
		
		//get all employed members
		$employed = $this->statistics_model->searchByJobStatus("employed");
		
		//get disabled member
		$disabled = $this->statistics_model->searchByHealthStatus("disabled");
				
			
		$data["providers"] = $providers;
		$data["members"] = $family_members;
		$data["male"] = $members_male;
		$data["female"] = $members_female;
		$data["disabled"] = $members_disabled;
		$data["emigramt_family"] = $emigramt_family;
		$data["illiterates"] = $illiterates;
		$data["university"] = $university;
		$data["unemployed"] = $unemployed;
		$data["employed"] = $employed;
		$data["disabled"] = $disabled;
																	
		$this->load->view('gen/header');
		$this->load->view('gen/slogan');
		$this->load->view('report_manage' , $data);
		$this->load->view('gen/footer');
	}
	
	
	
	
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */
