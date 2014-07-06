<?php if (!defined("BASEPATH")) exit("No direct script access allowed");
    
/**
 * Class name : Subject_category_model
 * 
 * Description :
 * This class contain functions to deal with the subject category database table (Add , Edit , Delete)
 * 
 * Created date ; 4-3-2014
 * Modification date : ---
 * Modfication reason : ---
 * Author : Ahmad Mulhem Barakat
 * contact : molham225@gmail.com
 */    
    
    
class Subject_category_model extends CI_Model{
	/**class variable**/
	//The id field of the subject category in the database
	var $id;
	
	//the name of the subject category
	var $name = "";
	
	
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
	 * function name : addSubjectCategory
	 * 
	 * Description : 
	 * Add new subject category to the database.
	 * 
	 * parameters:
	 * 
	 * Created date ; 4-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function addSubjectCategory()
	 {
	 	$query = "INSERT INTO  subject_category (
				name		
				)
				VALUES (  
				'{$this->name}' 
				);
					 	";	
		$this->db->query($query);
		//return the added record's id
		return $this->db->insert_id();
	 }
	 
	 
	 /**
	 * function name : modifySubjectCategory
	 * 
	 * Description : 
	 * modify the data of the subject category specified with
	 * the given id.
	 * 
	 * parameters:
	 * 
	 * Created date ; 4-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function modifySubjectCategory()
	 {
	 	$query = "UPDATE  subject_category
					SET	
						name = '{$this->name}'
					WHERE id = {$this->id}
					";	
		$this->db->query($query);
	 }
	 
	 
	 /**
	 * function name : deleteSubjectCategory
	 * 
	 * Description : 
	 * Delete the data of the subject category specified with 
	 * the given id from database.
	 * 
	 * parameters:
	 * 
	 * Created date ; 4-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function deleteSubjectCategory(){
		$query = "DELETE FROM subject_category
				    WHERE id = {$this->id}";
		$this->db->query($query);
	 }
	 
	 
	 /**
	 * function name : getAllSubjectCategories
	 * 
	 * Description : 
	 * Gets all of the Subject Categories in the database.
	 * 
	 * parameters:
	 * 
	 * Created date ; 13-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function getAllSubjectCategories(){
		$query = "SELECT * 
				  FROM subject_category ";
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
	 /**
	 * function name : getSubjectCategoryById
	 * 
	 * Description : 
	 * Gets the Subject Category specified by the given id.
	 * 
	 * parameters:
	 * 
	 * Created date ; 4-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function getSubjectCategoryById(){
		$query = "SELECT * 
				  FROM subject_category
				  WHERE id = {$this->id} ";
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
	 
	 /**
	 * function name : getSubjectCategoryByName
	 * 
	 * Description : 
	 * Gets the Subject Category specified by the given Name.
	 * 
	 * parameters:
	 * 
	 * Created date ; 4-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function getSubjectCategoryByName(){
		$query = "SELECT * 
				  FROM subject_category
				  WHERE name LIKE '{$this->name}' ";
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
	 /**
	 * function name : getSubjectCategoryColumn
	 * 
	 * Description : 
	 * this function will get the  table column names and return it in an array
	 * ararry {field , type , null , key  ,default , extra}
	 * 		
	 * Created date ; 3-7-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	 public function getSubjectCategoryColumn()
	 {	 	
	 	$query = "SHOW COLUMNS FROM subject_category";
		$query =  $this->db->query($query);
		return $query->result_array();		
	 }
	 
	 
	 /**
	 * function name : importSubjectCategory 
	 * 
	 * Description : 
	 * import subject category into the database
	  * check if there is no such category
	  * and add it
	 * 
	 * parameters:
	 * 
	 * Created date ; 6-7-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function importSubjectCategory()
	 {
	 	//check if there is no categroy
		$category = $this->getSubjectCategoryByName();
		
		if(count($category) == 0 )
		{
			$this->addSubjectCategory();
		}
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
				  FROM subject_category 				 
				  ";
		$query = $this->db->query($query);		
	 }
}    
    
    
    
    
    
?>
