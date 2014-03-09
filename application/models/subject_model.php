<?php if (!defined("BASEPATH")) exit("No direct script access allowed");
    
/**
 * Class name : Subject_model
 * 
 * Description :
 * This class contain functions to deal with the subject database table (Add , Edit , Delete)
 * 
 * Created date ; 4-3-2014
 * Modification date : ---
 * Modfication reason : ---
 * Author : Ahmad Mulhem Barakat
 * contact : molham225@gmail.com
 */    
    
    
class Subject_model extends CI_Model{
	/**class variable**/
	//The id field of the subject in the database
	var $id;
	
	//the name of the subject
	var $name = "";
	
	//the id of the category of this subject
	var $subject_category_id = "";
	
	
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
	 * function name : addSubject
	 * 
	 * Description : 
	 * Add new subject to the database.
	 * 
	 * parameters:
	 * 
	 * Created date ; 4-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function addSubject()
	 {
	 	$query = "INSERT INTO  subject (
				name,
				subject_category_id		
				)
				VALUES (  
				'{$this->name}', 
				'{$this->subject_category_id}' 
				);
					 	";	
		$this->db->query($query);
	 }
	 
	 
	 /**
	 * function name : modifySubject
	 * 
	 * Description : 
	 * modify the data of the subject specified with
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
	 public function modifySubject()
	 {
	 	$query = "UPDATE  subject
					SET	
						name = '{$this->name}',
						subject_category_id = '{$this->subject_category_id}'
					WHERE id = {$this->id}
					";	
		$this->db->query($query);
	 }
	 
	 
	 /**
	 * function name : deleteSubject
	 * 
	 * Description : 
	 * Delete the data of the subject specified with 
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
	 public function deleteSubject(){
		$query = "DELETE FROM subject
				    WHERE id = {$this->id}";
		$this->db->query($query);
	 }
	 
	 
	 /**
	 * function name : getAllSubjects
	 * 
	 * Description : 
	 * Gets all of the Subjects in the database.
	 * 
	 * parameters:
	 * 
	 * Created date ; 13-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function getAllSubjects(){
		$query = "SELECT * 
				  FROM subject ";
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
	 
	 
	 /**
	 * function name : getAllSubjectsForView
	 * 
	 * Description : 
	 * Gets all of the Subjects in the database.
	 * 
	 * parameters:
	 * 
	 * Created date ; 5-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function getAllSubjectsForView(){
		$query = "SELECT subject.id AS id,subject.name AS subject,category.name AS category 
				  FROM subject,subject_category AS category
				  WHERE subject.subject_category_id = category.id ";
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
	 /**
	 * function name : getSubjectById
	 * 
	 * Description : 
	 * Gets the Subject specified by the given id.
	 * 
	 * parameters:
	 * 
	 * Created date ; 4-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function getSubjectById(){
		$query = "SELECT * 
				  FROM subject
				  WHERE id = {$this->id} ";
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
	 /**
	 * function name : getSubjectsByCategory
	 * 
	 * Description : 
	 * Gets the Subject specified by the given subject category id.
	 * 
	 * parameters:
	 * 
	 * Created date ; 4-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function getSubjectsByCategory(){
		$query = "SELECT * 
				  FROM subject
				  WHERE subject_category_id = {$this->subject_category_id} ";
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
	 /**
	 * function name : getSubjectByName
	 * 
	 * Description : 
	 * Gets the Subject specified by the given subject name.
	 * 
	 * parameters:
	 * 
	 * Created date ; 4-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function getSubjectByName(){
		$query = "SELECT * 
				  FROM subject
				  WHERE name like '{$this->name}' ";
		$query = $this->db->query($query);
		return $query->result_array();
	 }  
	 
}    


    
    
    
    
    
?>
