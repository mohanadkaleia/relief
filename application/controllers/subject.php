<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Class name : Subject
 * 
 * Description :
 * This class contain functions to manage subject like add - edit - delete
 * 
 * Created date ; 5-3-2013
 * Modification date : ---
 * Modfication reason : ---
 * Author : Ahmad Mulhem Barakat
 * contact : molham225@gmail.com
 */
class Subject extends CI_Controller {


	
	public function index()
	{
		$this->manage();
	}
	
	
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

	
	
	/**
	 * function name : manage
	 * 
	 * Description : 
	 * calls subject management page.
	 * 
	 * Created date ; 5-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	public function manage($status_message = null)
	{				
		$this->load->view('gen/header');
		$this->load->view('gen/slogan');
		$this->load->view('subject_manage');
		$this->load->view('gen/footer');
	}
	
	
	/**
	 * function name : add
	 * 
	 * Description : 
	 * calls the page with the add subject form.
	 * 
	 * Created date ; 5-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	public function add()
	{
		$this->load->model('subject_category_model');
		
		//get all categories
		$categories = $this->subject_category_model->getAllSubjectCategories();
		
		//insert them into the view
		$data['categories'] = $categories;
						
		$this->load->view('gen/header');
		$this->load->view('gen/slogan');
		$this->load->view('subject_add',$data);
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
	public function edit($subject_id)
	{
		$this->load->model('subject_model');
		$this->load->model('subject_category_model');
		
		$this->subject_model->id = $subject_id;
		
		$subject = $this->subject_model->getSubjectById();
		
		if(isset($subject[0])){
		//get the subject to be edited
		$data['subject'] = $subject[0];
						
		$this->subject_category_model->id = $subject[0]['subject_category_id'];
		//get subject's category
		$category = $this->subject_category_model->getSubjectCategoryById();
		if(isset($category[0]))
		$data['category'] = $category[0];
		
		//get all categories
		$categories = $this->subject_category_model->getAllSubjectCategories();
		
		//insert them into the view
		$data['categories'] = $categories;
		
		$this->load->view('gen/header');
		$this->load->view('gen/slogan');
		$this->load->view('subject_edit',$data);
		$this->load->view('gen/footer');
		}
	}
	
	/**
	 * function name : delete
	 * 
	 * Description : 
	 * deletes the subject specified by the given id.
	 * 
	 * Created date ; 17-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	public function delete($subject_id)
	{
		$this->load->model('subject_model');
		
		$this->subject_model->id = $subject_id;
		
		//delete the subject.
		$this->subject_model->deleteSubject();
		
		//go back to subject grid.
		redirect(base_url()."subject");
	}
	
	
	/**
	 * function name : getUnique
	 * 
	 * Description : 
	 * This function checks if the entered subject name and category of the subject are unique.
	 * 
	 * Created date ; 2-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	public function getUnique()
	{
		if(isset($_GET['category'])){
			
			$this->load->model('subject_category_model');
			
			$this->subject_category_model->name = $_GET['category'];
			
			$category = $this->subject_category_model->getSubjectCategoryByName();
			
			if(isset($category[0])){
				echo "category";
			}
		}else if(isset($_GET['subject'])){
			$this->load->model('subject_model');
		
			$this->subject_model->name = $_GET['subject'];
			
			$subject = $this->subject_model->getSubjectByName();
			
			if(isset($subject[0])){
				echo "subject";
			}
		}else if(isset($_GET['code'])){
			$this->load->model('subject_model');
		
			$this->subject_model->code = $_GET['code'];
			
			$subject = $this->subject_model->getSubjectByCode();
			
			if(isset($subject[0])){
				echo "code";
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
		//include model subject
		$this->load->model('subject_model');
		 
		//if the category is new add it to the db and get its id
		$category_type = $this->input->post('category');
		if($category_type == "new")
		{
			$this->load->model('subject_category_model');
			//fill model variables
			$this->subject_category_model->name = $this->input->post('category_name');
			//execute the addition function
			$category_id = $this->subject_category_model->addSubjectCategory();
		}
		else
		{
			//or just get the chosen category id
			$category_id = $this->input->post('category_id');
		}
		 
		// assign values to the model variable
		$this->subject_model->name = $this->input->post('subject_name');			
		$this->subject_model->code = $this->input->post('subject_code');
		$this->subject_model->unit = $this->input->post('unit');
		$this->subject_model->total_amount = $this->input->post('total_amount');
		$this->subject_model->subject_category_id = $category_id;		
		
		if($action === "add")
		{
			//add the information to the database
			$this->subject_model->addSubject();
		}
		elseif($action === "edit")
		{
			$this->subject_model->id = $id;
			$this->subject_model->modifySubject();
		}
		redirect(base_url()."subject");	
	}



	/**
	 * function name : ajaxGetSubjects
	 * 
	 * Description : 
	 * get subjects' information from the database.
	 * 
	 * Created date ; 5-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	public function ajaxGetSubjects()
	{										
		//load subject model to get data from it
		$this->load->model('subject_model');
		
		//load grid library
		$this->load->library('grid');				
		
		//grid option
		$this->grid->option['title'] = "Subjects";   //  grid title
		$this->grid->option['id'] = "id";         // database table id
		$this->grid->option['sortable'] = FALSE;  // is sortable
		$this->grid->option['page_size'] = 10;    //records per page
		$this->grid->option['row_number'] = true; //show the row number		
		$this->grid->option['add_button'] = true; //show add button
		$this->grid->option['add_url'] = base_url()."subject/add"; //add url
		$this->grid->option['add_title'] = "إضافة مادة"; //add title
			
		$this->grid->columns = array('code', 'subject' , 'category');
		
		//get the data	
		$this->grid->data = $this->subject_model->getAllSubjectsForView();
		
		//grid controls
		$this->grid->control = array(
									  array("title" => "تعديل" , "icon"=>"icon-pencil" , "url"=>base_url()."subject/edit" , "message_type"=>null , "message"=>"") , 
									  array("title" => "حذف" , "icon"=>"icon-trash" ,"url"=>base_url()."subject/delete" , "message_type"=>"confirm" , "message"=>"Are you sure?")
									);												
						
		//render our grid :)
		echo $this->grid->gridRender();
												
	}



	/**
	 * function name : ajaxGetSubjetByCode
	 * 
	 * Description : 
	 * get subjects' information from the database by code
	 * parameters:
	 * $code: subject code
	 * Created date ; 26-6-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	public function ajaxGetSubjetByCode($code)
	{
		//load model
		$this->load->model("subject_model");
		$this->subject_model->code = $code;
		$subject_info = $this->subject_model->getSubjectByCode();	
			
		print json_encode($subject_info[0]);										
	}


	
}

/* End of file subject.php */
/* Location: ./application/controllers/subject.php */
