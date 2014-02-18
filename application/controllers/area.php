<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Class name : Area
 * 
 * Description :
 * This class contain functions to manage area like add - edit - delete
 * 
 * Created date ; 14-2-2013
 * Modification date : ---
 * Modfication reason : ---
 * Author : Ahmad Mulhem Barakat
 * contact : molham225@gmail.com
 */
class Area extends CI_Controller {


	
	public function index()
	{
		$this->manage();
	}
	
	
	/**
	 * function name : manage
	 * 
	 * Description : 
	 * calls area management page.
	 * 
	 * Created date ; 14-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	public function manage($status_message = null)
	{				
		$this->load->view('gen/header');
		$this->load->view('gen/slogan');
		$this->load->view('area_manage');
		$this->load->view('gen/footer');
	}
	
	
	
	/**
	 * function name : edit
	 * 
	 * Description : 
	 * calls the page with the edit area form.
	 * 
	 * Created date ; 17-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	public function edit($association_id)
	{
		$this->load->model('area_model');
		
		$this->area_model->id = $association_id;
		
		$areas = $this->area_model->getAreaById();
		
		if(isset($areas[0])){
		
		$data['area'] = $areas[0];
						
		$this->load->view('gen/header');
		$this->load->view('gen/slogan');
		$this->load->view('area_edit',$data);
		$this->load->view('gen/footer');
		}
	}
	
	/**
	 * function name : delete
	 * 
	 * Description : 
	 * deletes the area specified by the given id.
	 * 
	 * Created date ; 17-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	public function delete($association_id)
	{
		$this->load->model('area_model');
		
		$this->area_model->id = $association_id;
		
		//delete the area.
		$this->area_model->deleteArea();
		
		//go back to area grid.
		redirect(base_url()."area");
	}
	
	
	/**
	 * function name : saveData
	 * 
	 * Description : 
	 * saves the added area data to the database.
	 * 
	 * Created date ; 14-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	public function saveData($action,$id)
	{										
		//include model area
		$this->load->model('area_model');
		 
		// assign values to the model variable
		$this->area_model->name = $this->input->post('name');			
		$this->area_model->code = $this->input->post('code');		
		
		if($action === "add"){
		//add the information to the database
		$this->area_model->addArea();
		}elseif($action === "edit"){
			$this->area_model->id = $id;
			$this->area_model->modifyArea();
		}
		redirect(base_url()."area");	
	}



	/**
	 * function name : ajaxGetAreas
	 * 
	 * Description : 
	 * get areas' information from the database.
	 * 
	 * Created date ; 14-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	public function ajaxGetAreas()
	{										
		//load area model to get data from it
		$this->load->model('area_model');
		
		//load grid library
		$this->load->library('grid');				
		
		//grid option
		$this->grid->option['title'] = "Areas";   //  grid title
		$this->grid->option['id'] = "id";         // database table id
		$this->grid->option['sortable'] = FALSE;  // is sortable
		$this->grid->option['page_size'] = 10;    //records per page
		$this->grid->option['row_number'] = true; //show the row number		
		$this->grid->option['add_button'] = true; //show add button
		$this->grid->option['add_url'] = base_url()."area/add"; //add url
		$this->grid->option['add_title'] = "إضافة منطقة"; //add title
			
		$this->grid->columns = array('code' , 'name');
		
		//get the data	
		$this->grid->data = $this->area_model->getAllAreas();
		
		//grid controls
		$this->grid->control = array(
									  array("title" => "تعديل" , "icon"=>"icon-pencil" , "url"=>base_url()."area/edit" , "message_type"=>null , "message"=>"") , 
									  array("title" => "حذف" , "icon"=>"icon-trash" ,"url"=>base_url()."area/delete" , "message_type"=>"confirm" , "message"=>"Are you sure?")
									);												
						
		//render our grid :)
		echo $this->grid->gridRender();
												
	}
}

/* End of file area.php */
/* Location: ./application/controllers/area.php */
