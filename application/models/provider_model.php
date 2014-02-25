<?php if (!defined("BASEPATH")) exit("No direct script access allowed");
    
/**
 * Class name : provider_model
 * 
 * Description :
 * This class contain functions to deal with the provider table (Add , Edit , Delete)
 * 
 * Created date ; 8-2-2014
 * Modification date : ---
 * Modfication reason : ---
 * Author : Mohanad Shab Kaleia
 * contact : ms.kaleia@gmail.com
 */    
    
    
class Provider_model extends CI_Model
{
	
	/**class variable**/
	
	//the id field of the 
	var $id;
	
	//the code of provider the frmat of the code is as follow:
	// xx-xxx-xxxxxx: the first two digit is for association the second three digit is for area and the last six digit for national id
	var $code;
	
	//full name of provider
	var $full_name ="";
	
	//national id
	var $national_id;
	
	//family book number
	var $family_book_num;
	
	//family book letter
	var $family_book_letter;
	
	//family book family number
	var $family_book_family_number;
	
	//family book note
	var $family_book_note;
	
	//curent address
	var $current_address;
	
	//previuos address
	var $prev_address;
	
	//street 
	var $street;
	
	//point guide
	var $point_guide;
	
	//build number
	var $build;
	
	//floor	
	var $floor;
	
	//phone1,2
	var $phone1,$phone2;
	
	//mobile1,2
	var $mobile1,$mobile2;
	
	//note
	var $note;
	
	//relief_form_status
	var $relief_form_status;
	
	//created date
	var $created_date;
	
	//is_deleted
	var $is_deleted = "F";
	
	
	//the user id that create this settings
	var $user_id = 1;

	
	/**
     * Constructor
    **/	
	function __construct()
    {
        parent::__construct();
    }
	
	
	
	/**
	 * function name : addProvider
	 * 
	 * Description : 
	 * add provider values 
	 * 
	 * parameters:
	 * 	$association_id: the id of the association that the provider belong to
	 * 	$area_id: the area id that the provider belong to
	 * Created date ; 8-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	 public function addProvider($association_code , $area_code)
	 {
	 	$query = "INSERT INTO  provider (				
				area_code,
				association_code ,
				code ,
				full_name ,
				national_id ,
				family_book_num ,
				family_book_letter ,
				family_book_family_number ,
				family_book_note ,
				current_address,
				prev_address,
				street,
				point_guide,
				build,
				floor,
				phone1,
				phone2,
				mobile1,
				mobile2,
				note,
				relief_form_status,
				created_date,
				creator_id,
				is_deleted				
				)
				VALUES (
				'{$area_code}',  
				'{$association_code}',  
				'{$this->code}',  
				'{$this->full_name}',  
				'{$this->national_id}',  
				'{$this->family_book_num}',  
				'{$this->family_book_letter}',  
				'{$this->family_book_family_number}',  
				'{$this->family_book_note}',  
				'{$this->current_address}',
				'{$this->prev_address}',
				'{$this->street}',
				'{$this->point_guide}',
				'{$this->build}',
				'{$this->floor}',
				'{$this->phone1}',
				'{$this->phone2}',
				'{$this->mobile1}',
				'{$this->mobile2}',
				'{$this->note}',
				'{$this->relief_form_status}',
				'{$this->created_date}',
				{$this->user_id},
				'{$this->is_deleted}'
				);
					 	";	
		$this->db->query($query);
	 }
	 
	 
	 /**
	 * function name : modifyProvider
	 * 
	 * Description : 
	 * modify data of the provider specified by the id. 
	 * 
	 * parameters:
	 * 
	 * Created date ; 22-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function modifyProvider($association_code , $area_code)
	 {
	 	$query = "UPDATE provider 
				  SET 
					area_code = '{$area_code}',
					association_code  = '{$association_code}',
					code = '{$this->code}',
					full_name = '{$this->full_name}',
					national_id = '{$this->national_id}',
					family_book_num = '{$this->family_book_num}',
					family_book_letter = '{$this->family_book_letter}',
					family_book_family_number = '{$this->family_book_family_number}',
					family_book_note = '{$this->family_book_note}' ,
					current_address = '{$this->current_address}',
					prev_address = '{$this->prev_address}',
					street = '{$this->street}',
					point_guide = '{$this->point_guide}',
					build = '{$this->build}',
					floor = '{$this->floor}',
					phone1 = '{$this->phone1}',
					phone2 = '{$this->phone2}',
					mobile1 = '{$this->mobile1}',
					mobile2 = '{$this->mobile2}',
					note = '{$this->note}',
					relief_form_status = '{$this->relief_form_status}',
					created_date = '{$this->created_date}',
					creator_id = {$this->user_id},
					is_deleted = '{$this->is_deleted}'			
				  WHERE 
					id =  {$this->id};
					 	";	
		$this->db->query($query);
	 }
	 
	 
	 /**
	 * function name : deleteProvider
	 * 
	 * Description : 
	 * delete database  to delete settings associated with a user id
	 * 		
	 * Created date ; 8-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	 public function deleteProvider($association_code , $area_code)
	 {	 	
	 	$query = "delete from provider
	 			  where 
	 			  id = {$this->id} and 
	 			  association_code = {$association_code} and 
	 			  area_code = {$area_code}";
		$this->db->query($query);
	 }
	 
	 
	 /**
	 * function name : deleteProviderByCode
	 * 
	 * Description : 
	 * delete the provider specified with given code
	 * 		
	 * Created date ; 22-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function deleteProviderByCode()
	 {	 	
	 	$query = "delete from provider
	 			  where 
	 			  code = {$this->code} ;";
		$this->db->query($query);
	 }
	
	
	 /**
	 * function name : getAllProviders
	 * 
	 * Description : 
	 * get all providers from the database
	 * 		
	 * Created date ; 8-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	 public function getAllProviders()
	 {	 	
	 	$query = "select * from provider
	 			  where 
	 			  is_deleted= 'F'";
		$query =  $this->db->query($query);
		return $query->result_array();
		//return $query->result(); 	
	 }
	 
	/**
	 * function name : getProviderByCode
	 * 
	 * Description : 
	 * get provider information by code
	 * 		
	 * Created date ; 21-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	 public function getProviderByCode()
	 {	 	
	 	$query = "select * from provider
	 			  where 
	 			  code = '{$this->code}' and
	 			  is_deleted= 'F'";
	 			  		  
		$query =  $this->db->query($query);
		return $query->result_array();
		//return $query->result(); 	
	 } 
	
	
	/**
	 * function name : getProviderColumn
	 * 
	 * Description : 
	 * this function will get the provider column names and return it in an array
	 * ararry {field , type , null , key  ,default , extra}
	 * 		
	 * Created date ; 22-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	 public function getProviderColumn()
	 {	 	
	 	$query = "SHOW COLUMNS FROM provider";
		$query =  $this->db->query($query);
		return $query->result_array();		
	 }
}    
   
?>
