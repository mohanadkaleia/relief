<?php if (!defined("BASEPATH")) exit("No direct script access allowed");
    
/**
 * Class name : Provider_package_model
 * 
 * Description :
 * This class contain functions to deal with the provider package database table (Add , Edit , Delete)
 * 
 * Created date ; 4-3-2014
 * Modification date : ---
 * Modfication reason : ---
 * Author : Ahmad Mulhem Barakat
 * contact : molham225@gmail.com
 */    
    
    
class Provider_package_model extends CI_Model{
	/**class variable**/
	//The id field of the provider package in the database
	var $id;
	
	//the id of the provider of this provider package
	var $provider_code = "";
	
	//the code of the package of this provider package
	var $package_code = "";
	
	//the date of the deliverance of this package to the provider
	var $date = "";
	
	
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
	 * function name : addProviderPackage
	 * 
	 * Description : 
	 * Add new provider package to the database.
	 * 
	 * parameters:
	 * 
	 * Created date ; 4-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function addProviderPackage()
	 {
	 	$query = "INSERT INTO  provider_package (
					package_code,
					provider_code,
					date
					)
					VALUES (  
					'{$this->package_code}', 
					'{$this->provider_code}',
					'{$this->date}' 
					);
					 	";	
		$this->db->query($query);
	 }
	 
	 
	 /**
	 * function name : modifyProviderPackage
	 * 
	 * Description : 
	 * modify the data of the Provider Package specified with
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
	 public function modifyProviderPackage()
	 {
	 	$query = "UPDATE  provider_package
					SET	
						package_code = '{$this->package_code}',
						provider_id = '{$this->provider_id}',
						amount = '{$this->date}'
					WHERE id = {$this->id}
					";	
		$this->db->query($query);
	 }
	 
	 
	 /**
	 * function name : deleteProviderPackage
	 * 
	 * Description : 
	 * Delete the data of the Provider Package specified with 
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
	 public function deleteProviderPackage(){
		$query = "DELETE FROM provider_package
				    WHERE id = {$this->id}";
		$this->db->query($query);
	 }
	 
	 
	 /**
	 * function name : getAllProviderPackages
	 * 
	 * Description : 
	 * Gets all of the Provider Packages in the database.
	 * 
	 * parameters:
	 * 
	 * Created date ; 4-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function getAllProviderPackages(){
		$query = "SELECT CONCAT( provider.fname,  ' ', provider.father_name,  ' ', provider.lname ) as provider_name, package.name as package_name , provider_package.date as deliever_date
				  FROM provider_package  , provider , package
				  where
				  provider_package.package_code = package.code
				  and
				  provider_code = provider.code";
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
	 /**
	 * function name : getProviderPackageById
	 * 
	 * Description : 
	 * Gets the Provider Package specified by the given id.
	 * 
	 * parameters:
	 * 
	 * Created date ; 4-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function getProviderPackageById(){
		$query = "SELECT * 
				  FROM provider_package
				  WHERE id = {$this->id} ";
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
	
	 
	 
	  /**
	 * function name : getProviderPackagesByProviderCode
	 * 
	 * Description : 
	 * Gets the Package Details specified by the given provider id.
	 * 
	 * parameters:
	 * 
	 * Created date ; 27-6-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function getProviderPackagesByProviderCode(){			
		$query = "SELECT CONCAT( provider.fname,  ' ', provider.father_name,  ' ', provider.lname ) as provider_name, package.name as package_name , provider_package.date as deliever_date
				  FROM provider_package  , provider , package
				  where
				  provider_package.package_code = package.code
				  and
				  provider_code = provider.code
				  and 
				  provider_code = '{$this->provider_code}' ";
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
	 
	 /**
	 * function name : getProviderPackageColumn
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
	 public function getProviderPackageColumn()
	 {	 	
	 	$query = "SHOW COLUMNS FROM provider_package";
		$query =  $this->db->query($query);
		return $query->result_array();		
	 }
	 
	 
	 /**
	 * function name : getAll 
	 * 
	 * Description : 
	 * get all data from table
	 * 
	 * parameters:
	 * 
	 * Created date ; 3-7-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	 public function getAll()
	 {
		$query = "SELECT * 
				  FROM provider_package
				  ";
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
	 
	 /**
	 * function name : importProviderPackage 
	 * 
	 * Description : 
	 * import provider pakcage data to table
	 * 
	 * parameters:
	 * 
	 * Created date ; 6-7-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	 public function importProviderPackage()
	 {
		$query = "delete from provider_package
				  where 
				  provider_code = '{$this->provider_code}' and
				  package_code  = '{$this->package_code}' and 
				  date = '{$this->date}'
				  ";
		$this->db->query($query);
		
		
		//add the new data
		$this->addProviderPackage();
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
				  FROM provider_package 				 
				  ";
		$query = $this->db->query($query);		
	 }
	 
	 
}    
    
    
    
    
    
?>
