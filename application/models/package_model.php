<?php if (!defined("BASEPATH")) exit("No direct script access allowed");
    
/**
 * Class name : Package_model
 * 
 * Description :
 * This class contain functions to deal with the package database table (Add , Edit , Delete)
 * 
 * Created date ; 4-3-2014
 * Modification date : ---
 * Modfication reason : ---
 * Author : Ahmad Mulhem Barakat
 * contact : molham225@gmail.com
 */    
    
    
class Package_model extends CI_Model{
	/**class variable**/
	//The id field of the package in the database
	var $id;
	
	//the name of this package
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
	 * function name : addPackage
	 * 
	 * Description : 
	 * Add new package to the database.
	 * 
	 * parameters:
	 * 
	 * Created date ; 4-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function addPackage()
	 {
	 	$query = "INSERT INTO  package (
					name
					)
					VALUES (  
					'{$this->name}'
					);
				 ";	
		$this->db->query($query);
		return $this->db->insert_id();
	 }
	 
	 
	 /**
	 * function name : modifyPackage
	 * 
	 * Description : 
	 * modify the data of the Package specified with
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
	 public function modifyPackage()
	 {
	 	$query = "UPDATE  package
					SET	
						name = '{$this->name}'
					WHERE id = {$this->id}
					";	
		$this->db->query($query);
	 }
	 
	 
	 /**
	 * function name : deletePackage
	 * 
	 * Description : 
	 * Delete the data of the package specified with 
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
	 public function deletePackage(){
		$query = "DELETE FROM package
				    WHERE id = {$this->id}";
		$this->db->query($query);
	 }
	 
	 
	 /**
	 * function name : getAllPackages
	 * 
	 * Description : 
	 * Gets all of the Packages in the database.
	 * 
	 * parameters:
	 * 
	 * Created date ; 4-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function getAllPackages(){
		$query = "SELECT * 
				  FROM package ";
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
	 /**
	 * function name : getPackageById
	 * 
	 * Description : 
	 * Gets the Package specified by the given id.
	 * 
	 * parameters:
	 * 
	 * Created date ; 4-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function getPackageById(){
		$query = "SELECT * 
				  FROM package
				  WHERE id = {$this->id} ";
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
	 /**
	 * function name : getPackageByName
	 * 
	 * Description : 
	 * Gets the Package specified by the given Name.
	 * 
	 * parameters:
	 * 
	 * Created date ; 8-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function getPackageByName(){
		$query = "SELECT * 
				  FROM package
				  WHERE name = '{$this->name}' ";
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
}    
    
    
    
    
    
?>
