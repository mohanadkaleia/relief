<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Class name : Settings
 * 
 * Description :
 * The controller layer to set/get and modify variables {mark status, ..}
 * 
 * Created date ; 31-1-2014
 * Modification date : ---
 * Modfication reason : ---
 * Author : Mohanad Shab Kaleia
 * contact : ms.kaleia@gmail.com
 */
class Variables extends CI_Controller {

	
	public function index()
	{
		$this->showVariables();
	}
	
	
	/**
	 * function name : showVariables
	 * 
	 * Description : 
	 * call variables page
	 * 
	 * Created date ; 31-1-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function showVariables($status_message = null)
	{
		//load setting model
		$this->load->model('setting_model');
		
		//get the setting values
		$student_status = $this->setting_model->getStudentStatus();
		$excel_variables = $this->setting_model->getExcelStudentStatus();
			
		$data["student_status"] = $student_status;
		$data["excel_variables"] = $excel_variables;
		$data["status_message"] = $status_message;
				
		$this->load->view('gen/header');
		$this->load->view('gen/slogan');
		$this->load->view('variables' , $data);
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
	public function addVariables()
	{								
		//include model setting
		$this->load->model('setting_model');
		
		// assign values to the model variable
		$variables_count  = $this->input->post('hidden_var_count');
		
		
		for($i = 0 ; $i < $variables_count ; $i++)
		{
			$this->setting_model->variables[$i]['id'] = $this->input->post('hidden_var_'.$i);
			$this->setting_model->variables[$i]['value'] = $this->input->post('var_'.$i);
		}
		
		//delete a variables first if there is previus settings
		$this->setting_model->deleteVariables();
			
		//add the informatoin to the database
		$this->setting_model->addVariables();
						
		//status message to be shown if the user has been added
		$status_message =  "Variables saved succesfully :)";
		
		//redirect to the setting page 
		$this->showVariables($status_message);
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */