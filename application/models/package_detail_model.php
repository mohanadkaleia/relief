<?php if (!defined("BASEPATH")) exit("No direct script access allowed");
    
/**
 * Class name : Package_detail_model
 * 
 * Description :
 * This class contain functions to deal with the package details database table (Add , Edit , Delete)
 * 
 * Created date ; 4-3-2014
 * Modification date : ---
 * Modfication reason : ---
 * Author : Ahmad Mulhem Barakat
 * contact : molham225@gmail.com
 */    
    
    
class Package_detail_model extends CI_Model{
	/**class variable**/
	//The id field of the package detail in the database
	var $id;
	
	//the code of the subject of this package detail
	var $subject_code = "";
	
	//the code of the package of this package detail
	var $package_code = "";
	
	//the amount of this subject in this package
	var $amount = "";
	
	
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
	 * function name : addPackageDetail
	 * 
	 * Description : 
	 * Add new package detail to the database.
	 * 
	 * parameters:
	 * 
	 * Created date ; 4-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function addPackageDetail()
	 {
	 	$query = "INSERT INTO  package_detail (
					package_code,
					subject_code,
					amount
					)
					VALUES (  
					'{$this->package_code}', 
					'{$this->subject_code}',
					'{$this->amount}' 
					);
					 	";	
		$this->db->query($query);
	 }
	 
	 
	 /**
	 * function name : modifyPackageDetail
	 * 
	 * Description : 
	 * modify the data of the Package Detail specified with
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
	 public function modifyPackageDetail()
	 {
	 	$query = "UPDATE  package_detail
					SET	
						package_code = '{$this->package_code}',
						subject_code = '{$this->subject_code}',
						amount = '{$this->amount}'
					WHERE id = {$this->id}
					";	
		$this->db->query($query);
	 }
	 
	 /**
	 * function name : modifyAmount
	 * 
	 * Description : 
	 * modify the amount field of the Package Detail specified with
	 * the given id.
	 * 
	 * parameters:
	 * 
	 * Created date ; 8-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function modifyAmount()
	 {
	 	$query = "UPDATE  package_detail
					SET
						amount = '{$this->amount}'
					WHERE id = {$this->id}
					";	
		$this->db->query($query);
	 }
	 
	 
	 /**
	 * function name : deletePackageDetail
	 * 
	 * Description : 
	 * Delete the data of the package detail specified with 
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
	 public function deletePackageDetail(){
		$query = "DELETE FROM package_detail
				    WHERE id = {$this->id}";
		$this->db->query($query);
	 }
	 
	 /**
	 * function name : deletePackageDetailByPackageId
	 * 
	 * Description : 
	 * Delete the data of the package detail specified with 
	 * the given package from database.
	 * 
	 * parameters:
	 * 
	 * Created date ; 4-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function deletePackageDetailByPackageCode(){
		$query = "DELETE FROM package_detail
				    WHERE package_code = '{$this->package_code}'";
		$this->db->query($query);
	 }
	 
	 
	 /**
	 * function name : getAllPackageDetails
	 * 
	 * Description : 
	 * Gets all of the Package Details in the database.
	 * 
	 * parameters:
	 * 
	 * Created date ; 4-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function getAllPackageDetails(){
		$query = "SELECT * 
				  FROM package_detail ";
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
	 /**
	 * function name : getPackageDetailById
	 * 
	 * Description : 
	 * Gets the Package Detail specified by the given id.
	 * 
	 * parameters:
	 * 
	 * Created date ; 4-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function getPackageDetailById(){
		$query = "SELECT * 
				  FROM package_detail
				  WHERE id = {$this->id} ";
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
	 /**
	 * function name : getPackageDetailsByPackageId
	 * 
	 * Description : 
	 * Gets the Package Details specified by the given package code.
	 * 
	 * parameters:
	 * 
	 * Created date ; 4-3-2014
	 * Modification date : 4-7-2014 by Mohanad Kaleia
	 * Modfication reason : remove package id and replace it with package code
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function getPackageDetailsByPackageCode()
	 {
		$query = "SELECT package.id as id ,   subject.id as subject_id ,subject.code as subject_code ,  package.name as package_name,subject.name as subject_name, package_detail.amount as amount
					FROM package_detail  , package , subject
					where 
					package.code = package_detail.package_code
					and
					subject.code = package_detail.subject_code
					and
					package.code = {$this->package_code}";
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
	 
	 /**
	 * function name : getPackageDetails
	 * 
	 * Description : 
	 * Gets the Package Details specified by the given package id.
	 * 
	 * parameters:
	 * 
	 * Created date ; 4-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function getPackageDetails()
	 {
		$query = "SELECT package.id as id ,   subject.id as subject_id ,subject.code as subject_code ,  package.name as package_name,subject.name as subject_name, package_detail.amount as amount , subject.unit as unit
					FROM package_detail  , package , subject
					where 
					package.code = package_detail.package_code
					and
					subject.code = package_detail.subject_code
					";
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
	 
	 /**
	 * function name : getPackageDetailsColumn
	 * 
	 * Description : 
	 * this function will get the prackage table column names and return it in an array
	 * ararry {field , type , null , key  ,default , extra}
	 * 		
	 * Created date ; 3-7-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	 public function getPackageDetailsColumn()
	 {	 	
	 	$query = "SHOW COLUMNS FROM package_detail";
		$query =  $this->db->query($query);
		return $query->result_array();		
	 }
	 
	 /**
	 * function name : importPackageDetails
	 * 
	 * Description : 
	 * delete all record that have subject code and package code
	  * and add them again
	 * 		
	 * Created date ; 6-7-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	 public function importPackageDetails()
	 {
	 	
			//delete the old one	 					 	
	 		$query = "delete from package_detail
	 				  where
	 				  package_code = '{$this->package_code}' and
	 				  subject_code = '{$this->subject_code}'
	 				  ";
					  
			$this->db->query($query);
			
			//add the new one
			$this->addPackageDetail();	
					  
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
				  FROM package_detail 				 
				  ";
		$query = $this->db->query($query);		
	 }	 
	 
	 
}    
    
    
    
    
    
?>
