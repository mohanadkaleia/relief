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
	
	//the id of the subject of this package detail
	var $subject_id = "";
	
	//the id of the package of this package detail
	var $package_id = "";
	
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
					package_id,
					subject_id,
					amount
					)
					VALUES (  
					'{$this->package_id}', 
					'{$this->subject_id}',
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
						package_id = '{$this->package_id}',
						subject_id = '{$this->subject_id}',
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
	 public function deletePackageDetailByPackageId(){
		$query = "DELETE FROM package_detail
				    WHERE package_id = {$this->package_id}";
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
	 public function getPackageDetailsByPackageId(){
		$query = "SELECT package_detail.id as id,subject.id as subject_id,package.name as package_name,subject.name as subject_name, package_detail.amount as amount
					FROM package_detail  , package , subject
					where 
					package.id = package_detail.package_id
					and
					subject.id = package_detail.subject_id
					and
					package.id = {$this->package_id}";
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
	 
}    
    
    
    
    
    
?>
