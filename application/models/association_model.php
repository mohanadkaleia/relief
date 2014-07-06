<?php if (!defined("BASEPATH")) exit("No direct script access allowed");
    
/**
 * Class name : Association_model
 * 
 * Description :
 * This class contain functions to deal with the association database table (Add , Edit , Delete)
 * 
 * Created date ; 13-2-2014
 * Modification date : ---
 * Modfication reason : ---
 * Author : Ahmad Mulhem Barakat
 * contact : molham225@gmail.com
 */    
    
    
class Association_model extends CI_Model{
	/**class variable**/
	//The id field of the association in the database
	var $id = "";
	
	//2-Numeric code that is unique for every association
	var $code = "";
	
	//the name of the assciation
	var $name = "";
	
	//Name of the current manager of the association
	var $manager_name = "";
	
	//The current phone number of the association
	var $phone1 = "";
	
	//A second phone number for this association
	var $phone2 = "";
	
	//Association mobile number 1
	var $mobile1 = "";
	
	//Association mobile number 2
	var $mobile2 = "";
	
	//The current address of the association
	var $address = "";
	
	//Some description about the association activity and goal  
	var $about = "";
	
	//The logo of the association
	var $logo = "";
	
	//is deleted
	var $is_deleted = "";
	
	//Creation date of the association
	var $created_date = "";
	
	//The id of the user who added this association to the database.
	var $creator_id = "";
	
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
	 * function name : addAssociation
	 * 
	 * Description : 
	 * add new association to the database
	 * 
	 * parameters:
	 * 
	 * Created date ; 13-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function addAssociation()
	 {
	 	$query = "INSERT INTO  association (
						code,
						name,
						manager_name,
						phone1,
						phone2,
						mobile1,
						mobile2,
						address,
						about,
						logo,
						created_date,
						creator_id		
						)
						VALUES (  
						'{$this->code}',  
						'{$this->name}',  
						'{$this->manager_name}',  
						'{$this->phone1}',  
						'{$this->phone2}',  
						'{$this->mobile1}',  
						'{$this->mobile2}',  
						'{$this->address}',
						'{$this->about}',
						'{$this->logo}',
						'{$this->created_date}',
						'{$this->creator_id}'
						);
					 	";	
		$this->db->query($query);
	 }
	 
	 
	 /**
	 * function name : modifyAssociation
	 * 
	 * Description : 
	 * modify the data of the association specified with
	 * the given id.
	 * 
	 * parameters:
	 * 
	 * Created date ; 13-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function modifyAssociation()
	 {
	 	$query = "UPDATE  association 
					SET	
						code = '{$this->code}',
						name = '{$this->name}',
						manager_name = '{$this->manager_name}',
						phone1 = '{$this->phone1}',
						phone2 = '{$this->phone2}',
						mobile1 = '{$this->mobile1}',
						mobile2 = '{$this->mobile2}',
						address = '{$this->address}',
						about = '{$this->about}',			
						logo = '{$this->logo}',
						created_date = '{$this->created_date}',
						creator_id = '{$this->creator_id}'
					WHERE id = {$this->id}
					";	
		$this->db->query($query);
	 }
	 
	 
	 /**
	 * function name : deleteAssociation
	 * 
	 * Description : 
	 * Delete the data of the association specified with 
	 * the given id from database.
	 * 
	 * parameters:
	 * 
	 * Created date ; 13-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function deleteAssociation(){
		$query = "DELETE FROM association
				    WHERE id = {$this->id}";
		$this->db->query($query);
	 }
	 
	 
	 /**
	 * function name : getAllAssociations
	 * 
	 * Description : 
	 * Gets all of the associations in the database.
	 * 
	 * parameters:
	 * 
	 * Created date ; 13-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function getAllAssociations(){
		$query = "SELECT * 
				  FROM association 
				  WHERE is_deleted = 'F'";
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
	 /**
	 * function name : getAllAssociationsToExport
	 * 
	 * Description : 
	 * Gets all of the associations in the database to export even it the record is deleted
	 * 
	 * parameters:
	 * 
	 * Created date ; 26-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function getAllAssociationsToExport(){
		$query = "SELECT * 
				  FROM association";
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
	 
	 /**
	 * function name : getAssociationByCode
	 * 
	 * Description : 
	 * Gets the association specified by the given code.
	 * 
	 * parameters:
	 * 
	 * Created date ; 13-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function getAssociationByCode(){
		$query = "SELECT * 
				  FROM association 
				  WHERE code = '{$this->code}'";
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
	 
	 /**
	 * function name : getAssociationById
	 * 
	 * Description : 
	 * Gets the association specified by the given id.
	 * 
	 * parameters:
	 * 
	 * Created date ; 13-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function getAssociationById(){
		$query = "SELECT * 
				  FROM association
				  WHERE id = {$this->id} ";
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
	 
	 /**
	 * function name : searchAssociationByName
	 * 
	 * Description : 
	 * Gets that has the string inserted as name.
	 * 
	 * parameters:
	 * 
	 * Created date ; 13-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function searchAssociationByName(){
		$query = "SELECT * 
				  FROM association
				  WHERE name LIKE '%{$this->name}%' ";
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
	 /**
	 * function name : getAssociationByName
	 * 
	 * Description : 
	 * Gets the association specified by the given Name.
	 * 
	 * parameters:
	 * 
	 * Created date ; 2-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function getAssociationByName(){
		$query = "SELECT * 
				  FROM association
				  WHERE name like '{$this->name}' ";
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
	 /**
	 * function name : getAssociationColumn
	 * 
	 * Description : 
	 * this function will get the area column names and return it in an array
	 * ararry {field , type , null , key  ,default , extra}
	 * 		
	 * Created date ; 26-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	 public function getAssociationColumn()
	 {	 	
	 	$query = "SHOW COLUMNS FROM association";
		$query =  $this->db->query($query);
		return $query->result_array();		
	 }
	 
	 
	 /**
	 * function name : importAssociations
	 * 
	 * Description : 
	 * import associations
	  *  
	  *  
	 * 
	 * parameters:
	 * 	
	 * Created date ; 26-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	 public function importAssociations()
	 {
	 	
		//check if exist
		$query = "select * from association where
				  code = '{$this->code}'";
	    
		$query =  $this->db->query($query);
		$assocaition =  $query->result_array();
		
		
		
		if(count($assocaition) == 0)
		{
			$query = "INSERT INTO  association (
						code,
						name,
						manager_name,
						phone1,
						phone2,
						mobile1,
						mobile2,
						address,
						about,
						logo,
						created_date,
						is_deleted						
						)
						VALUES (  
						'{$this->code}',  
						'{$this->name}',  
						'{$this->manager_name}',  
						'{$this->phone1}',  
						'{$this->phone2}',  
						'{$this->mobile1}',  
						'{$this->mobile2}',  
						'{$this->address}',
						'{$this->about}',
						'{$this->logo}',
						'{$this->created_date}',
						'{$this->is_deleted}');";
		}
		
		else {
				$query = "UPDATE  association 
					SET							
						name = '{$this->name}',
						manager_name = '{$this->manager_name}',
						phone1 = '{$this->phone1}',
						phone2 = '{$this->phone2}',
						mobile1 = '{$this->mobile1}',
						mobile2 = '{$this->mobile2}',
						address = '{$this->address}',
						about = '{$this->about}',			
						logo = '{$this->logo}',
						created_date = '{$this->created_date}',
						creator_id = '{$this->creator_id}' , 
						is_deleted = '{$this->is_deleted}'
					WHERE code = {$this->code}
					";	
		}
					 	
		$this->db->query($query);
	 }
	 
	 /**
	 * function name : emptyTable
	 * 
	 * Description : 
	 * empty the table
	 * 
	 * parameters:
	 * 
	 * Created date ; 6-7-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	 public function emptyTable()
	 {
		$query = "delete 
				  FROM association 				 
				  ";
		$query = $this->db->query($query);		
	 }
	 
}    
    
    
    
    
    
?>
