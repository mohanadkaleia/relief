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
	
	//package code of this package
	var $code = "";
	
	
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
					name , 
					code
					)
					VALUES (  
					'{$this->name}' , 
					'{$this->code}'
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
						name = '{$this->name}' , 
						code = '{$this->code}'
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
				    WHERE code = '{$this->code}'";
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
	 
	 
	/**
	 * function name : aidDelivery 
	 * 
	 * Description : 
	 * deliever aid to provider
	 * 
	 * parameters:
	 * 
	 * Created date ; 12-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	 public function aidDelivery($provider_code)
	 {	 	 
		$query = "insert into provider_package
				  (package_code , provider_code , date)
				  values
				  ('{$this->code}' , '{$provider_code}' , curdate())
				  ";		
		$this->db->query($query);
	 }
	 
	 
	 /**
	 * function name : getPackageColumn
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
	 public function getPackageColumn()
	 {	 	
	 	$query = "SHOW COLUMNS FROM package";
		$query =  $this->db->query($query);
		return $query->result_array();		
	 }
	 
	 
	 
	 /**
	 * function name : getPackageByCode
	 * 
	 * Description : 
	 * Gets the Package specified by the given id.
	 * 
	 * parameters:
	 * 
	 * Created date ; 4-7-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	 public function getPackageByCode()
	 {
		$query = "SELECT * 
				  FROM package
				  WHERE code = '{$this->code}' ";
		$query = $this->db->query($query);
		return $query->result_array();
	 }	 
	 
	 
	 
	 /**
	 * function name : importPackage
	 * 
	 * Description : 
	 * import package to the database, 
	  * if the package is not exist then add it to the database,
	  * if it is exist then update its info
	 * 
	 * parameters:
	 * 
	 * Created date ; 6-7-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	 public function importPackage()
	 {
		$packages = $this->getPackageByCode();
		
		
		//if there is no packages then add new one 
		if(count($packages) == 0)
		{
			$this->addPackage();
		}		
		else
		{
			$query = "UPDATE  package
					SET	
						name = '{$this->name}' 						
					WHERE code = {$this->code}
					";	
			$this->db->query($query);	
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
				  FROM package 				 
				  ";
		$query = $this->db->query($query);		
	 }	
	 
}    
    
    
    
    
    
?>
