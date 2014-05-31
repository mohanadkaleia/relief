<?php if (!defined("BASEPATH")) exit("No direct script access allowed");
    
/**
 * Class name : Statistics_model
 * 
 * Description :
 * This class contain functions for statistics
 * 
 * Created date ; 31-5-2014
 * Modification date : ---
 * Modfication reason : ---
 * Author : Mohanad Shab Kaleia
 * contact : ms.kaleia@gmail.com
 */    
    
    
class Statistics_model extends CI_Model
{
	
	/**class variable**/
	
		
	
	
	 /**
	 * function name : searchByGender
	 * 
	 * Description : 
	 * get number of people by gender
	 * 		
	 * Created date ; 31-5-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	 public function searchByGender($gender = "M")
	 {	 	
	 	$query = "select count(id) 
	 			  from family_member
	 			  where gender = '{$gneder}'
	 			  ";
		$query =  $this->db->query($query);
		return $query->result_array();
		//return $query->result(); 	
	 }
	 
	 
	 /**
	 * function name : searchByHouse
	 * 
	 * Description : 
	 * get number of people that are emigrant or not
	 * 		
	 * Created date ; 31-5-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	 public function searchByHouse($emigrant = "T")
	 {	 	
	 	$query = "select count(id) as family_num
	 			  from provider
	 			  where 
	 			  is_emigrant = '{$emigrant}' and
	 			  relief_form_status = 'T' and
	 			  is_deleted = 'F'
	 			  ";
		$query =  $this->db->query($query);
		return $query->result_array();
		//return $query->result(); 	
	 }
	 	 
	 	 
}    
   
?>
