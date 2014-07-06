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
	
	//the code of the subject
	var $code = "";
	
	//subjet unit
	var $unit = "";
	
	//total amount
	var $total_amount;
	
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
				code,
				unit,
				total_amount,
				subject_category_id		
				)
				VALUES (  
				'{$this->name}', 
				'{$this->code}', 
				'{$this->unit}',
				'{$this->total_amount}',
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
						code = '{$this->code}',
						unit = '{$this->unit}',
						total_amount = '{$this->total_amount}',
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
		$query = "SELECT subject.id AS id,subject.name AS subject,subject.code AS code , subject.unit AS unit,category.name AS category , subject.total_amount AS total_amount 
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
	 * function name : getSubjectByCode
	 * 
	 * Description : 
	 * Gets the Subject specified by the given code.
	 * 
	 * parameters:
	 * 
	 * Created date ; 4-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function getSubjectByCode(){
		$query = "SELECT * 
				  FROM subject
				  WHERE code like '{$this->code}' ";				
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
	 
	 
	 /**
	 * function name : decreaseSubjectAount
	 * 
	 * Description : 
	 * Decrease subject amount by package amount
	 * 
	 * parameters:
	 * $consumed_amount: sonsumed amount that need to be decreased from the total amount
	 * Created date ; 27-6-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Kaleia
	 * contact : ms.aleia@gmail.com
	 */
	 public function decreaseSubjectAount($consumed_amount)
	 {
	 	$query = "UPDATE  subject
					SET							
						total_amount = total_amount - '{$consumed_amount}'						
					WHERE code = {$this->code}
					";	
		$this->db->query($query);
	 } 
	 
	 
	 /**
	 * function name : getSubjectColumn
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
	 public function getSubjectColumn()
	 {	 	
	 	$query = "SHOW COLUMNS FROM subject";
		$query =  $this->db->query($query);
		return $query->result_array();		
	 }
	 
	 
	 /**
	 * function name : importSubject
	 * 
	 * Description : 
	 * 
	 * 
	 * parameters:
	 * 
	 * Created date ; 6-7-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Kaleia
	 * contact : ms.aleia@gmail.com
	 */
	 public function importSubject()
	 {
	 				
	 	$subjects = $this->getSubjectByCode();
		
		if(count($subjects) == 0)
		{
			$this->addSubject();
		}		
		else 
		{
			$this->modifySubject();			
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
				  FROM subject 				 
				  ";
		$query = $this->db->query($query);		
	 }
	 
	 
}    


    
    
    
    
    
?>
