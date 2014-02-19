<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Class name : Association
 * 
 * Description :
 * This class contain functions to manage association like add - edit - delete
 * 
 * Created date ; 14-2-2013
 * Modification date : ---
 * Modfication reason : ---
 * Author : Ahmad Mulhem Barakat
 * contact : molham225@gmail.com
 */
class Association extends CI_Controller {


	
	public function index()
	{
		$this->manage();
	}
	
	
	/**
	 * function name : manage
	 * 
	 * Description : 
	 * calls association management page.
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
		$this->load->view('association_manage');
		$this->load->view('gen/footer');
	}
	
	
	
	/**
	 * function name : add
	 * 
	 * Description : 
	 * calls the page with the add association form.
	 * 
	 * Created date ; 14-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	public function add()
	{									
		$this->load->view('gen/header');
		$this->load->view('gen/slogan');
		$this->load->view('association_add');
		$this->load->view('gen/footer');
	}
	
	
	/**
	 * function name : edit
	 * 
	 * Description : 
	 * calls the page with the edit association form.
	 * 
	 * Created date ; 16-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	public function edit($association_id)
	{
		//include model association
		$this->load->model('association_model');
		
		$this->association_model->id = $association_id;
		
		$association = $this->association_model->getAssociationById();
		
		if(isset($association)){
			//data to be inserted into the view.
			$data['association'] = $association[0];
							
			$this->load->view('gen/header');
			$this->load->view('gen/slogan');
			$this->load->view('association_edit',$data);
			$this->load->view('gen/footer');
		}else{
			$this->manage();
		}
	}
	
	/**
	 * function name : saveData
	 * 
	 * Description : 
	 * saves the added association data to the database.
	 * 
	 * Created date ; 14-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	public function saveData($action,$id = 0)
	{
		//include model association
		$this->load->model('association_model');
		 
		// assign values to the model variable
		$this->association_model->name = $this->input->post('name');			
		$this->association_model->code = $this->input->post('code');		
		$this->association_model->manager_name = $this->input->post('manager_name');		
		$this->association_model->phone1 = $this->input->post('phone1');		
		$this->association_model->phone2 = $this->input->post('phone2');		
		$this->association_model->mobile1 = $this->input->post('mobile1');		
		$this->association_model->mobile2 = $this->input->post('mobile2');		
		$this->association_model->address = $this->input->post('address');		
		$this->association_model->about = $this->input->post('about');
		$this->association_model->created_date = $this->input->post('created_date');
		$this->association_model->creator_id = 1;
		
		
		if(isset($action)){
			//if this is an add operation.
			if($action === "add"){
				
				$logo = $_FILES["logo"];
				$allowedExts = array("gif", "jpeg", "jpg", "png");
				$temp = explode(".", $logo["name"]);
				$extension = end($temp);
				if ((($logo["type"] == "image/gif")
				|| ($logo["type"] == "image/jpeg")
				|| ($logo["type"] == "image/jpg")
				|| ($logo["type"] == "image/pjpeg")
				|| ($logo["type"] == "image/x-png")
				|| ($logo["type"] == "image/png"))
				&& in_array($extension, $allowedExts)){
					if ($logo["error"] > 0)
					{
						echo $logo["error"];
					}
					else
					{
						// Desired folder structure
						$structure = 'files/'.$this->association_model->code;
						
						//find the position of the last '.' in the name
						$pos = strripos($logo["name"],'.');
						//get the image extension
						$extension = substr($logo["name"],$pos);
						
						if (!mkdir($structure, 0777, true)) {
							echo 'Could not make directory '.$structure;
						}else{
							move_uploaded_file($logo["tmp_name"],
							$structure .'/'. $this->association_model->code.$extension);
						}
					}
				  }	
				$this->association_model->logo = $this->association_model->code.$extension;
				
				//add the information to the database
				$this->association_model->addAssociation();
			}elseif($action === "edit" && $id !== 0){
				if($this->input->post("old_logo") !== ""){
					$logo = $_FILES["logo"];
					$allowedExts = array("gif", "jpeg", "jpg", "png");
					$temp = explode(".", $logo["name"]);
					$extension = end($temp);
					if ((($logo["type"] == "image/gif")
					|| ($logo["type"] == "image/jpeg")
					|| ($logo["type"] == "image/jpg")
					|| ($logo["type"] == "image/pjpeg")
					|| ($logo["type"] == "image/x-png")
					|| ($logo["type"] == "image/png"))
					&& in_array($extension, $allowedExts)){
						if ($logo["error"] > 0)
						{
							echo $logo["error"];
							$this->association_model->logo = $this->input->post("old_logo");
						}
						else
						{
							// Desired folder path
							$path = 'files/'.$this->association_model->code;
							//find the position of the last '.' in the name
							$pos = strripos($logo["name"],'.');
							//get the image extension
							$extension = substr($logo["name"],$pos);
							//delete old logo..
							
							//move the uploaded file to the desired folder
							move_uploaded_file($logo["tmp_name"],$path .'/'. $this->association_model->code.$extension);
							$this->association_model->logo =  $this->association_model->code . $extension;
						}
					}
				}else{
					$this->association_model->logo = $this->input->post("old_logo");
				}
				$this->association_model->id = $id;
				//modify the information to the database
				$this->association_model->modifyAssociation();
			}
		}
		redirect(base_url()."association");	
	}



	/**
	 * function name : ajaxGetAssociations
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
	public function ajaxGetAssociations()
	{										
		//load association model to get data from it
		$this->load->model('association_model');
		
		//load grid library
		$this->load->library('grid');				
		
		//grid option
		$this->grid->option['title'] = "Associations";   //  grid title
		$this->grid->option['id'] = "id";         // database table id
		$this->grid->option['sortable'] = FALSE;  // is sortable
		$this->grid->option['page_size'] = 10;    //records per page
		$this->grid->option['row_number'] = true; //show the row number		
		$this->grid->option['add_button'] = true; //show add button
		$this->grid->option['add_url'] = base_url()."association/add"; //add url
		$this->grid->option['add_title'] = "إضافة جمعية"; //add title
			
		$this->grid->columns = array('code' , 'name' , 'phone1' , 'manager_name' , 'created_date' , 'logo');
		
		//get the data
		$associations = $this->association_model->getAllAssociations();
		for($i=0;$i<count($associations);$i++){
			$associations[$i]['logo'] = '<img height="20px" width="15px" src="'.base_url()."files/".$associations[$i]['code'].'/'.$associations[$i]['logo'].'" />';
		}	
		//echo $associations;
		$this->grid->data = $associations;
		
		//grid controls
		$this->grid->control = array(
									  array("title" => "تعديل" , "icon"=>"icon-pencil" , "url"=>base_url()."association/edit" , "message_type"=>null , "message"=>"") , 
									  array("title" => "حذف" , "icon"=>"icon-trash" ,"url"=>base_url()."association/delete" , "message_type"=>"confirm" , "message"=>"Are you sure?")
									);												
						
		//render our grid :)
		echo $this->grid->gridRender();
												
	}
	
	
	
	public function delete($association_id){
		//load association model to get data from it
		$this->load->model('association_model');
		
		//Put the id of the record to delete in the id field of the model.
		$this->association_model->id = $association_id;
		
		
		$this->association_model->deleteAssociation();	
		
		//Go back to association page to view the execution result.
		redirect("association");
	}
}

/* End of file association.php */
/* Location: ./application/controllers/association.php */
