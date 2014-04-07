<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Class name : package
 * 
 * Description :
 * This class contain functions to manage package like add - edit - delete
 * 
 * Created date ; 6-3-2013
 * Modification date : ---
 * Modfication reason : ---
 * Author : Ahmad Mulhem Barakat
 * contact : molham225@gmail.com
 */
class Package extends CI_Controller {


	
	public function index()
	{
		$this->manage();
	}
	
	
	/**
	 * Function name : __construct
	 * Description: 
	 * this contructor is called as this object is initiated.
	 * 
	 * created date: 5-3-2014
	 * ccreated by: Eng. Ahmad Mulhem Barakat
	 * contact: molham225@gmail.com 
	 */
	public function __construct(){
		parent::__construct();
		//check login state of the user requesting this controller.
		$this->load->helper('login');
		checkLogin($this->session->userdata['user']);
	}
	
	
	/**
	 * function name : manage
	 * 
	 * Description : 
	 * calls package management page.
	 * 
	 * Created date ; 6-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	public function manage($status_message = null)
	{				
		$this->load->view('gen/header');
		$this->load->view('gen/slogan');
		$this->load->view('package_manage');
		$this->load->view('gen/footer');
	}
	
	
	/**
	 * function name : add
	 * 
	 * Description : 
	 * calls the page with the add package form.
	 * 
	 * Created date ; 6-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	public function add()
	{
		$this->load->model('subject_category_model');
		$this->load->model('subject_model');
		
		//get all categories
		$categories = $this->subject_category_model->getAllSubjectCategories();
		
		//insert them into the view
		$data['categories'] = $categories;
		
		//get first category subjects
		$this->subject_model->subject_category_id = $categories[0]['id'];
		$subjects = $this->subject_model->getSubjectsByCategory();
		
		//insert them into the view
		$data['subjects'] = $subjects;
						
		$this->load->view('gen/header');
		$this->load->view('gen/slogan');
		$this->load->view('package_add',$data);
		$this->load->view('gen/footer');
	}
	
	
	/**
	 * function name : edit
	 * 
	 * Description : 
	 * calls the page with the edit subject form.
	 * 
	 * Created date ; 5-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	public function edit($package_id)
	{
		$this->load->model('package_model');
		$this->load->model('package_detail_model');
		$this->load->model('subject_category_model');
		$this->load->model('subject_model');
		
		$this->package_model->id = $package_id;
		
		$package = $this->package_model->getPackageById();
		
		if(isset($package[0])){
		//get the package to be edited
		$data['package'] = $package[0];
						
		$this->package_detail_model->package_id = $package[0]['id'];
		//get package's details
		$details = $this->package_detail_model->getPackageDetailsByPackageId();
		if(isset($details[0]))
		$data['details'] = $details;
		//get package details subject names
		foreach($details as $detail){
		//var_dump($detail);
			$this->subject_model->code = $detail['subject_code'];
			$subject = $this->subject_model->getSubjectByCode();
			
			$subject_names[] = $subject[0]['name'];
		}
		if(isset($subject_names))
		$data['subject_names'] = $subject_names;		
		
		//get all categories
		$categories = $this->subject_category_model->getAllSubjectCategories();
		
		//insert them into the view
		$data['categories'] = $categories;
		
		//get first category subjects
		$this->subject_model->subject_category_id = $categories[0]['id'];
		$subjects = $this->subject_model->getSubjectsByCategory();
		
		//insert them into the view
		$data['subjects'] = $subjects;
		
		$this->load->view('gen/header');
		$this->load->view('gen/slogan');
		$this->load->view('package_edit',$data);
		$this->load->view('gen/footer');
		}
	}
	
	/**
	 * function name : delete
	 * 
	 * Description : 
	 * deletes the package specified by the given id and its details.
	 * 
	 * Created date ; 8-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	public function delete($package_id)
	{
		$this->load->model('package_model');
		$this->load->model('package_detail_model');
		
		$this->package_model->id = $package_id;
		
		//delete the subject.
		$this->package_model->deletePackage();
		
		//delete packages' subjects
		$this->package_detail_model->package_id = $package_id;
		$this->package_detail_model->deletePackageDetailByPackageId();
		
		//go back to package grid.
		redirect(base_url()."package");
	}
	
	
	/**
	 * function name : getCategorySubjects
	 * 
	 * Description : 
	 * gets the subjects specified by the given category and returns them as json file.
	 * 
	 * Created date ; 6-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	public function getCategorySubjects($category_id)
	{
		$this->load->model('subject_model');
		
		$this->subject_model->subject_category_id = $category_id;
		
		//get category subjects
		$subjects = $this->subject_model->getSubjectsByCategory();
		
		print json_encode($subjects);
	}
	
	
	/**
	 * function name : getUnique
	 * 
	 * Description : 
	 * This function checks if the entered package name is unique.
	 * 
	 * Created date ; 8-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	public function getUnique()
	{
		if(isset($_GET['name'])){
			
			$this->load->model('package_model');
			
			$this->package_model->name = $_GET['name'];
			
			$package = $this->package_model->getPackageByName();
			
			if(isset($package[0])){
				echo "package";
			}
		}	
	}
	
	
	/**
	 * function name : saveData
	 * 
	 * Description : 
	 * saves the added subject data to the database.
	 * 
	 * Created date ; 5-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	public function saveData($action,$id = 0)
	{			
		$category_id = 0;
		//include models
		$this->load->model('package_model');
		$this->load->model('package_detail_model');
		 
		//add the package
		$this->package_model->name = $this->input->post('name');
		if($action == "add"){
			$id = $this->package_model->addPackage();
		}else if($action == "edit"){
			//modify the package name
			$this->package_model->id = $id;
			$this->package_model->modifyPackage();
			
			//modify the details modified by the user
			$amounts = $this->input->post('amount');
			$detail_ids = $this->input->post('detail_id');
			if($detail_ids)
			for($i=0 ; $i < count($detail_ids); $i++){
				$this->package_detail_model->amount = $amounts[$i];
				$this->package_detail_model->id = $detail_ids[$i];
				$this->package_detail_model->modifyAmount();				
			}
			
			/** Delete the details deleted by the user **/
			//get package details
			$this->package_detail_model->package_id = $id;
			$package_details = $this->package_detail_model->getPackageDetailsByPackageId();
			//delete the details don't exists in the returned detail ids
			foreach($package_details as $package_detail){
				$exists = false;
				foreach($detail_ids as $detail_id){
					if($package_detail['id'] == $detail_id){
						$exists = true;
						break;
					}
				}
				if(!$exists){
					$this->package_detail_model->id = $detail_id;
					$this->package_detail_model->deletePackageDetail();
				}
			}
		}
		/** add the new package details added by the user **/
		//get subject count
		$count = $this->input->post('rowCount');
		$this->package_detail_model->package_id = $id;
		//get actual subjects and add them
		for($i=1;$i<=$count;$i++){
			$subject_code = $this->input->post('subjectSelect'.$i);
			if($subject_code != ""){
				$this->package_detail_model->subject_code = $this->input->post('subjectSelect'.$i);
				$this->package_detail_model->amount = $this->input->post('amount'.$i);
				$this->package_detail_model->addPackageDetail();
			}
		}
		
		redirect(base_url()."package");	
	}



	/**
	 * function name : ajaxGetPackages
	 * 
	 * Description : 
	 * get packages' information from the database.
	 * 
	 * Created date ; 7-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	public function ajaxGetPackages()
	{										
		//load package model to get data from it
		$this->load->model('package_model');
		
		//load grid library
		$this->load->library('grid');				
		
		//grid option
		$this->grid->option['title'] = "Subjects";   //  grid title
		$this->grid->option['id'] = "id";         // database table id
		$this->grid->option['sortable'] = FALSE;  // is sortable
		$this->grid->option['page_size'] = 10;    //records per page
		$this->grid->option['row_number'] = true; //show the row number		
		$this->grid->option['add_button'] = true; //show add button
		$this->grid->option['add_url'] = base_url()."package/add"; //add url
		$this->grid->option['add_title'] = "إضافة صندوق معونات"; //add title
			
		$this->grid->columns = array('name');
		
		//get the data	
		$this->grid->data = $this->package_model->getAllPackages();
		
		//grid controls
		$this->grid->control = array(
									  array("title" => "تعديل" , "icon"=>"icon-pencil" , "url"=>base_url()."package/edit" , "message_type"=>null , "message"=>"") , 
									  array("title" => "حذف" , "icon"=>"icon-trash" ,"url"=>base_url()."package/delete" , "message_type"=>"confirm" , "message"=>"Are you sure?")
									);												
						
		//render our grid :)
		echo $this->grid->gridRender();
												
	}
}

/* End of file package.php */
/* Location: ./application/controllers/package.php */
