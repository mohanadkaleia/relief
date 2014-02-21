<?php if (!defined("BASEPATH")) exit("No direct script access allowed");
    
/**
 * Class name : User_model
 * 
 * Description :
 * This class contain functions to deal with the user database table (Add , Edit , Delete)
 * 
 * Created date ; 18-2-2014
 * Modification date : ---
 * Modfication reason : ---
 * Author : Ahmad Mulhem Barakat
 * contact : molham225@gmail.com
 */    
    
    
class User_model extends CI_Model{
	/**class variable**/
	//The id field of the user in the database
	var $id;
	
	//the first name of the user
	var $first_name = "";
	
	//the last name of the user
	var $last_name = "";
	
	//The national id of the user
	var $national_id = "";
	
	//user's home phone number
	var $phone = "";
	
	//user's personal mobile number
	var $mobile = "";
	
	//user's current address
	var $address = "";
	
	//user's login username
	var $username = "";
	
	//user's login password
	var $password = "";
	
	//the id of the association of this user
	var $association_code = "";
	
	/**
     * Constructor
    **/	
	function __construct()
    {
        parent::__construct();
    }
	
	/**
	 * Class functions
	 **/
	
	/**
	 * function name : addUser
	 * 
	 * Description : 
	 * Add new user to the database.
	 * 
	 * parameters:
	 * 
	 * Created date ; 18-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function addUser()
	 {
	 	$query = "INSERT INTO  user (
				first_name,
				last_name,
				national_id,
				phone,
				mobile,
				address,
				username,
				password,
				association_code
				)
				VALUES (  
				'{$this->first_name}',
				'{$this->last_name}',
				'{$this->national_id}',
				'{$this->phone}',
				'{$this->mobile}', 
				'{$this->address}', 
				'{$this->username}', 
				'{$this->password}',
				'{$this->association_code}'
				);
					 	";	
		$this->db->query($query);
	 }
	 
	 
	 /**
	 * function name : modifyUser
	 * 
	 * Description : 
	 * modify the data of the user specified with
	 * the given id.
	 * 
	 * parameters:
	 * 
	 * Created date ; 18-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function modifyUser()
	 {
	 	$query = "UPDATE  user
					SET	
						first_name = '{$this->first_name}',
						last_name = '{$this->last_name}',
						national_id = '{$this->national_id}',
						phone = '{$this->phone}',
						mobile = '{$this->mobile}',
						address = '{$this->address}',
						username = '{$this->username}',";
		if(isset($this->password) && $this->password !== ""){
			$query .=	" password = '{$this->password}',";
		}
		$query .=	" association_code = '{$this->association_code}'
					WHERE id = {$this->id}
					";	
		$this->db->query($query);
	 }
	 
	 
	 /**
	 * function name : deleteUser
	 * 
	 * Description : 
	 * Delete the data of the user specified with 
	 * the given id from database.
	 * 
	 * parameters:
	 * 
	 * Created date ; 18-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function deleteUser(){
		$query = "DELETE FROM user
				    WHERE id = {$this->id}";
		$this->db->query($query);
	 }
	 
	 
	 /**
	 * function name : getAllUsers
	 * 
	 * Description : 
	 * Gets all of the users in the database.
	 * 
	 * parameters:
	 * 
	 * Created date ; 18-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function getAllUsers(){
		$query = "SELECT * 
				  FROM user ";
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
	 
	 /**
	 * function name : getAllUsersForView
	 * 
	 * Description : 
	 * Gets all of the users in the database and render their 
	 * fields for grid view.
	 * 
	 * parameters:
	 * 
	 * Created date ; 19-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function getAllUsersForView(){
		$this->load->model('association_model');
		$query = "SELECT * 
				  FROM user ";
		$query = $this->db->query($query);
		$users = $query->result_array();
		for($i = 0;$i<count($users);$i++){
			//echo print_r($users[$i]);
			$users[$i]['full_name'] = $users[$i]['first_name'].' '.$users[$i]['last_name'];
			$this->association_model->code = $users[$i]['association_code'];
			$associations = $this->association_model->getAssociationByCode();
			if(isset($associations[0])){
				$association = $associations[0];
				$users[$i]['association'] = $association['name'];
			}else{
				$users[$i]['association'] = "";
			}
		}
		return $users;
	 }
	 
	 
	 /**
	 * function name : getUserByAssociationCode
	 * 
	 * Description : 
	 * Gets the user specified by the given code.
	 * 
	 * parameters:
	 * 
	 * Created date ; 18-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function getAreaByCode(){
		$query = "SELECT * 
				  FROM user 
				  WHERE association_code = '{$this->association_code}'";
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
	 
	 /**
	 * function name : getUserById
	 * 
	 * Description : 
	 * Gets the user specified by the given id.
	 * 
	 * parameters:
	 * 
	 * Created date ; 18-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function getUserById(){
		$query = "SELECT * 
				  FROM user
				  WHERE id = {$this->id} ";
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
	 
	 /**
	 * function name : searchUserByName
	 * 
	 * Description : 
	 * Gets the user that has the string inserted as name.
	 * 
	 * parameters:
	 * 
	 * Created date ; 18-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function searchAreaByName(){
		$query = "SELECT * 
				  FROM user
				  WHERE full_name LIKE %{$this->full_name}% ";
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
	 
	 /**
	 * function name : getUserByUsernameAndPassword
	 * 
	 * Description : 
	 * Gets the user specified by the given username and password.
	 * 
	 * parameters:
	 * 
	 * Created date ; 18-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function getUserByUsernameAndPassword(){
		$query = "SELECT * 
				  FROM user
				  WHERE username = '{$this->username}' 
					AND password = '{$this->password}'";
		$query = $this->db->query($query);
		return $query->result_array();
	 }
}    
    
    
    
    
    
?>
