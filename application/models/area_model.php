<?php if (!defined("BASEPATH")) exit("No direct script access allowed");
    
/**
 * Class name : Area_model
 * 
 * Description :
 * This class contain functions to deal with the area database table (Add , Edit , Delete)
 * 
 * Created date ; 13-2-2014
 * Modification date : ---
 * Modfication reason : ---
 * Author : Ahmad Mulhem Barakat
 * contact : molham225@gmail.com
 */    
    
    
class Area_model extends CI_Model{
	/**class variable**/
	//The id field of the area in the database
	var $id;
	
	//the name of the area
	var $name = "";
	
	//3-Numeric code that is unique for every area
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
	 * function name : addArea
	 * 
	 * Description : 
	 * Add new area to the database.
	 * 
	 * parameters:
	 * 
	 * Created date ; 13-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function addArea()
	 {
	 	$query = "INSERT INTO  area (
				name,
				code		
				)
				VALUES (  
				'{$this->name}',
				'{$this->code}' 
				);
					 	";	
		$this->db->query($query);
	 }
	 
	 
	 /**
	 * function name : modifyArea
	 * 
	 * Description : 
	 * modify the data of the area specified with
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
	 public function modifyArea()
	 {
	 	$query = "UPDATE  area
					SET	
						code = '{$this->code}',
						name = '{$this->name}'
					WHERE id = {$this->id}
					";	
		$this->db->query($query);
	 }
	 
	 
	 /**
	 * function name : deleteArea
	 * 
	 * Description : 
	 * Delete the data of the area specified with 
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
	 public function deleteArea(){
		$query = "DELETE FROM area
				    WHERE id = {$this->id}";
		$this->db->query($query);
	 }
	 
	 
	 /**
	 * function name : getAllAreas
	 * 
	 * Description : 
	 * Gets all of the areas in the database.
	 * 
	 * parameters:
	 * 
	 * Created date ; 13-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function getAllAreas(){
		$query = "SELECT * 
				  FROM area ";
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
	 
	 /**
	 * function name : getAreaByCode
	 * 
	 * Description : 
	 * Gets the area specified by the given code.
	 * 
	 * parameters:
	 * 
	 * Created date ; 13-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function getAreaByCode(){
		$query = "SELECT * 
				  FROM area 
				  WHERE code = '{$this->code}'";				
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
	 
	 /**
	 * function name : getAreaById
	 * 
	 * Description : 
	 * Gets the area specified by the given id.
	 * 
	 * parameters:
	 * 
	 * Created date ; 13-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function getAreaById(){
		$query = "SELECT * 
				  FROM area
				  WHERE id = {$this->id} ";
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
	 
	 /**
	 * function name : searchAreaByName
	 * 
	 * Description : 
	 * Gets the area that has the string inserted as name.
	 * 
	 * parameters:
	 * 
	 * Created date ; 13-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function searchAreaByName(){
		$query = "SELECT * 
				  FROM area
				  WHERE name LIKE '%{$this->name}%' ";
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
	 /**
	 * function name : getAreaByName
	 * 
	 * Description : 
	 * Gets the area of the given name
	 * 
	 * parameters:
	 * 
	 * Created date ; 2-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function getAreaByName(){
		$query = "SELECT * 
				  FROM area
				  WHERE name LIKE '{$this->name}' ";
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
	 
	 /**
	 * function name : getAreaColumn
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
	 public function getAreaColumn()
	 {	 	
	 	$query = "SHOW COLUMNS FROM area";
		$query =  $this->db->query($query);
		return $query->result_array();		
	 }
	 
	 
	 /**
	 * function name : importAreas
	 * 
	 * Description : 
	 * import provider
	  *  if the provider is exist then just update its info
	  *  if the provider does not exist then inster new one
	 * 
	 * parameters:
	 * 	$association_id: the id of the association that the provider belong to
	 * 	$area_id: the area id that the provider belong to
	 * Created date ; 7-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	 public function importAreas()
	 {
	 	
		//check if exist
		$query = "select * from area where
				  code = '{$this->code}'";
	    
		$query =  $this->db->query($query);
		$area =  $query->result_array();
		
		
		
		if(count($area) == 0)
		{
			$query = "INSERT INTO  area (				
				code,
				name				
				)
				VALUES (
				'{$this->code}',  				 
				'{$this->name}'				
				);	";
		}
		
		else {
				$query = "UPDATE area 
				  SET 
					code = '{$this->code}',					
					name = '{$this->name}'								
				  WHERE 
					code =  '{$this->code}';
					 	";
		}
					 	
		$this->db->query($query);
	 }
}    
    
    
    
    
    
?>
