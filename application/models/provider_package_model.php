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
	var $provider_id = "";
	
	//the id of the package of this provider package
	var $package_id = "";
	
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
					package_id,
					provider_id,
					date
					)
					VALUES (  
					'{$this->package_id}', 
					'{$this->provider_id}',
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
						package_id = '{$this->package_id}',
						subject_id = '{$this->provider_id}',
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
		$query = "SELECT * 
				  FROM provider_package ";
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
	 * function name : getProviderPackagesByProviderId
	 * 
	 * Description : 
	 * Gets the Package Details specified by the given provider id.
	 * 
	 * parameters:
	 * 
	 * Created date ; 4-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function getProviderPackagesByProviderId(){
		$query = "SELECT * 
				  FROM provider_package
				  WHERE provider_id = {$this->provider_id} ";
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
}    
    
    
    
    
    
?>
