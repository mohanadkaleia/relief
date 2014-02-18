<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Class name : Settings
 * 
 * Description :
 * This class contain functions to manage dashboard page like statistics, show log ...
 * 
 * Created date ; 29-4-2013
 * Modification date : ---
 * Modfication reason : ---
 * Author : Mohanad Shab Kaleia
 * contact : ms.kaleia@gmail.com
 */
class Settings extends CI_Controller {


	
	public function index()
	{
		$this->showSettings();
	}
	
	
	/**
	 * function name : showSettings
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
	public function showSettings($status_message = null)
	{
		//load setting model
		$this->load->model('setting_model');
		
		//get the setting values
		$settings_value = $this->setting_model->getSettingsByUserId();
			
		$data["settings"] = $settings_value;
		$data["status_message"] = $status_message;
				
		$this->load->view('gen/header');
		$this->load->view('gen/slogan');
		$this->load->view('settings' , $data);
		$this->load->view('gen/footer');
	}
	
	
	
	/**
	 * function name : addSettings
	 * 
	 * Description : 
	 * read the data from the form and call add settings method from the model
	 * 
	 * Created date ; 30-1-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function addSettings()
	{								
		//include model setting
		$this->load->model('setting_model');
		
		// assign values to the model variable
		$this->setting_model->student_id_cell = $this->input->post('student_id_cell');	
		$this->setting_model->student_national_id_cell = $this->input->post('student_national_id_cell');
		$this->setting_model->student_name_cell = $this->input->post('student_name_cell');
		$this->setting_model->practical_mark_cell = $this->input->post('practical_mark_cell');
		$this->setting_model->theory_mark_cell = $this->input->post('theory_mark_cell');
		$this->setting_model->full_mark_number_cell = $this->input->post('full_mark_number_cell');
		$this->setting_model->full_mark_text_cell = $this->input->post('full_mark_text_cell');
		$this->setting_model->mark_status_cell = $this->input->post('mark_status_cell');
		
		//delete a setting first if there is previus settings
		$this->setting_model->deleteSettings();
			
		//add the informatoin to the database
		$this->setting_model->addSetting();
						
		//status message to be shown if the user has been added
		$status_message =  "Settings saved succesfully :)";
		
		//redirect to the setting page 
		$this->showSettings($status_message);
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */