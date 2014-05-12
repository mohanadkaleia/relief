<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Class name : User
 * 
 * Description :
 * This class contain functions to manage user like add - edit - delete
 * 
 * Created date ; 18-2-2013
 * Modification date : ---
 * Modfication reason : ---
 * Author : Ahmad Mulhem Barakat
 * contact : molham225@gmail.com
 */
class User extends CI_Controller {


	
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
	 * calls user management page.
	 * 
	 * Created date ; 18-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	public function manage($status_message = null)
	{				
		$this->load->view('gen/header');
		$this->load->view('gen/slogan');
		$this->load->view('user_manage');
		$this->load->view('gen/footer');
	}
	
	
	/**
	 * function name : add
	 * 
	 * Description : 
	 * calls the page with the add user form.
	 * 
	 * Created date ; 18-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	public function add()
	{
		$this->load->model('user_model');
						
		$this->load->view('gen/header');
		$this->load->view('gen/slogan');
		$this->load->view('user_add');
		$this->load->view('gen/footer');
	}
	
	
	/**
	 * function name : edit
	 * 
	 * Description : 
	 * calls the page with the edit user form.
	 * 
	 * Created date ; 18-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	public function edit($user_id)
	{
		$this->load->model('user_model');
		
		$this->user_model->id = $user_id;
		
		$users = $this->user_model->getUserById();
		
		if(isset($users[0])){
		
		$data['user'] = $users[0];
						
		$this->load->view('gen/header');
		$this->load->view('gen/slogan');
		$this->load->view('user_edit',$data);
		$this->load->view('gen/footer');
		}
	}
	
	/**
	 * function name : delete
	 * 
	 * Description : 
	 * deletes the user specified by the given id.
	 * 
	 * Created date ; 18-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	public function delete($user_id)
	{
		$this->load->model('user_model');
		
		$this->user_model->id = $user_id;
		
		//delete the user.
		$this->user_model->deleteUser();
		
		//go back to user grid.
		redirect(base_url()."user");
	}
	
	
	/**
	 * function name : saveData
	 * 
	 * Description : 
	 * saves the added user data to the database.
	 * 
	 * Created date ; 18-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	public function saveData($action,$id = "")
	{										
		//include model user
		$this->load->model('user_model');
		 
		 // assign values to the model variable
		$this->user_model->first_name = $this->input->post('first_name');
		$this->user_model->last_name = $this->input->post('last_name');
		$this->user_model->national_id = $this->input->post('national_id');		
		$this->user_model->phone = $this->input->post('phone');		
		$this->user_model->mobile = $this->input->post('mobile');		
		$this->user_model->address = $this->input->post('address');		
		$this->user_model->username = $this->input->post('username');
		
		//get the association code from the database
		$this->load->model("association_model");
		$current_association = $this->association_model->getAllAssociations();
		$association_code = $current_association[0]["code"];
		$this->user_model->association_code = $association_code;
		 
		 if($action === "add"){
			 if(trim($this->input->post('password').$this->input->post('re_password'))
				&& $this->input->post('password') === $this->input->post('re_password')){	
				$this->user_model->password = md5($this->input->post('password'));
				//add the information to the database
				$this->user_model->addUser();
			}
		}elseif($action === "edit"){
			if(trim($this->input->post('password').$this->input->post('re_password'))
				&& $this->input->post('password') === $this->input->post('re_password')){	
				$this->user_model->password = md5($this->input->post('password'));
			}
			$this->user_model->id = $id;
			$this->user_model->modifyUser();
		}
		
		redirect(base_url()."user");	
	}



	/**
	 * function name : ajaxGetUsers
	 * 
	 * Description : 
	 * get users' information from the database.
	 * 
	 * Created date ; 19-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	public function ajaxGetUsers()
	{										
		//load user model to get data from it
		$this->load->model('user_model');
		
		//load grid library
		$this->load->library('grid');				
		
		//grid option
		$this->grid->option['title'] = "Users";   //  grid title
		$this->grid->option['id'] = "id";         // database table id
		$this->grid->option['sortable'] = FALSE;  // is sortable
		$this->grid->option['page_size'] = 10;    //records per page
		$this->grid->option['row_number'] = true; //show the row number		
		$this->grid->option['add_button'] = true; //show add button
		$this->grid->option['add_url'] = base_url()."user/add"; //add url
		$this->grid->option['add_title'] = "إضافة مستخدم"; //add title
			
		$this->grid->columns = array('full_name' , 'national_id','phone','mobile','association');
		
		//get the data	
		$this->grid->data = $this->user_model->getAllUsersForView();
		
		//grid controls
		$this->grid->control = array(
									  array("title" => "تعديل" , "icon"=>"icon-pencil" , "url"=>base_url()."user/edit" , "message_type"=>null , "message"=>"") , 
									  array("title" => "حذف" , "icon"=>"icon-trash" ,"url"=>base_url()."user/delete" , "message_type"=>"confirm" , "message"=>"Are you sure?")
									);												
						
		//render our grid :)
		echo $this->grid->gridRender();
												
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */
