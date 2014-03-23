<?php if (!defined("BASEPATH")) exit("No direct script access allowed");
    
/**
 * Class name : Family_member_model
 * 
 * Description :
 * This class contain functions to deal with the family_member database table (Add , Edit , Delete)
 * 
 * Created date ; 13-2-2014
 * Modification date : ---
 * Modfication reason : ---
 * Author : Ahmad Mulhem Barakat
 * contact : molham225@gmail.com
 */    
    
    
class Family_member_model extends CI_Model{
	/**class variable**/
	//The id field of the family_member in the database.
	var $id = "";
	
	//The code of the provider of this family member.
	var $provider_code= "";
	
	//national id of family member
	var $national_id = "";
	
	//Family member's full name.
	var $full_name = "";
	
	//family member's gender
	var $gender = "";
	
	//family member's birth date.
	var $birth_date = "";
	
	//The relationship between the provider and this family member
	var $relationship = "";
	
	//A flag that tells if this family member is emigrant or not.
	var $is_emigrant = "";
	
	//Describtion of the family member's current job.
	var $job = "";
	
	//Family member's study status.
	var $study_status = "";
	
	//Family member's social status.Common values: married,single.
	var $social_status = "";
	
	//Family member's health status and illnesses.
	var $health_status = "";
	
	//Notes about this family member.
	var $note = "";
	
	
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
	 * function name : addFamilyMember
	 * 
	 * Description : 
	 * Add new family member to the database.
	 * 
	 * parameters:
	 * 
	 * Created date ; 13-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function addFamilyMember()
	 {
	 	$query = "INSERT INTO  family_member (	 						
							provider_code,
							national_id,
							full_name,
							gender,
							birth_date,
							relationship,
							is_emigrant,
							job,
							study_status,
							social_status,
							health_status,
							note		
							)
					VALUES (  
							'{$this->provider_code}',
							'{$this->national_id}',
							'{$this->full_name}',
							'{$this->gender}',
							'{$this->birth_date}',
							'{$this->relationship}',
							'{$this->is_emigrant}',
							'{$this->job}',
							'{$this->study_status}',
							'{$this->social_status}',
							'{$this->health_status}',
							'{$this->note}' 
							);
					";	
		$this->db->query($query);
	 }
	 
	 
	 /**
	 * function name : modifyFamilyMember
	 * 
	 * Description : 
	 * modify the data of the family member specified with
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
	 public function modifyFamilyMember()
	 {
	 	$query = "UPDATE  family_member
					SET	
						provider_code = '{$this->provider_code}',
						national_id = '{$this->national_id}',
						full_name = '{$this->full_name}',
						gender = '{$this->gender}',
						birth_date = '{$this->birth_date}',
						relationship = '{$this->relationship}',
						is_emigrant = '{$this->is_emigrant}',
						job = '{$this->job}',
						study_status = '{$this->study_status}',
						social_status = '{$this->social_status}',
						health_status = '{$this->health_status}',
						note = '{$this->note}'		
					WHERE id = {$this->id}
					";	
		$this->db->query($query);
	 }
	 
	 
	 /**
	 * function name : deleteFamilyMember
	 * 
	 * Description : 
	 * Delete the data of the family member specified with 
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
	 public function deleteFamilyMember(){
		$query = "DELETE FROM family_member
				    WHERE id = {$this->id}";
		$this->db->query($query);
	 }
	 
	 
	 /**
	 * function name : getAllFamilyMembers
	 * 
	 * Description : 
	 * Gets all of the family members in the database.
	 * 
	 * parameters:
	 * 
	 * Created date ; 13-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function getAllFamilyMembers(){
		$query = "SELECT distinct family_member.* , provider.full_name as provider_name 
				  FROM family_member, provider 
				  where 
				  provider.code = family_member.provider_code
				  and
				  provider.is_deleted = 'F' 
				  ";
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
	 
	 /**
	 * function name : getFamilyMemberById
	 * 
	 * Description : 
	 * Gets the family member specified by the given id.
	 * 
	 * parameters:
	 * 
	 * Created date ; 13-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function getFamilyMemberById(){
		$query = "SELECT * 
				  FROM family_member
				  WHERE id = {$this->id} ";
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
	 
	 /**
	 * function name : getFamilyMemberByProviderId
	 * 
	 * Description : 
	 * Gets the family member specified by the given provider.
	 * 
	 * parameters:
	 * 
	 * Created date ; 13-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function getFamilyMemberByProviderCode(){
		$query = "SELECT distinct family_member.* , concat(provider.fname , ' ' , provider.father_name , ' ' , provider.lname) as provider_name 
				  FROM family_member , provider 
				  WHERE 
				  family_member.provider_code = '{$this->provider_code}'
				  and
				  provider.code = family_member.provider_code
				  ";						 
		$query = $this->db->query($query);				
		return $query->result_array();
	 }
	 
	 
	 /**
	 * function name : searchFamilyMemberByName
	 * 
	 * Description : 
	 * Gets the family member of the name that has the string inserted.
	 * 
	 * parameters:
	 * 
	 * Created date ; 13-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function searchFamilyMemberByName(){
		$query = "SELECT * 
				  FROM family_member
				  WHERE full_name LIKE %{$this->full_name}% ";
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
	 
	 /**
	 * function name : getFamilyColumn
	 * 
	 * Description : 
	 * this function will get the family member column names and return it in an array
	 * ararry {field , type , null , key  ,default , extra}
	 * 		
	 * Created date ; 25-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	 public function getFamilyColumn()
	 {	 	
	 	$query = "SHOW COLUMNS FROM family_member";
		$query =  $this->db->query($query);
		return $query->result_array();		
	 }
	 
	 
	 /**
	 * function name : importFamilyMember
	 * 
	 * Description : 
	 * import familt info:
	  * if the member is exist then just update his info
	  * else add new one
	 * 
	 * parameters:
	 * 
	 * Created date ; 7-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	 public function importFamilyMember()
	 {
	 	$query = "select * from family_member
	 	          where
	 	          national_id = '{$this->national_id}'";
		$query =  $this->db->query($query);
		$member =  $query->result_array();
		
		if(count($member) == 0)
		{
			$query = "INSERT INTO  family_member (
							provider_code,
							national_id , 
							full_name,
							gender,
							birth_date,
							relationship,
							is_emigrant,
							job,
							study_status,
							social_status,
							health_status,
							note		
							)
					VALUES (  
							'{$this->provider_code}',
							'{$this->national_id}',
							'{$this->full_name}',							
							'{$this->gender}',
							'{$this->birth_date}',
							'{$this->relationship}',
							'{$this->is_emigrant}',
							'{$this->job}',
							'{$this->study_status}',
							'{$this->social_status}',
							'{$this->health_status}',
							'{$this->note}' 
							);
					";	
		}	
		else
		{
			$query = "UPDATE  family_member
					SET	
						provider_code = '{$this->provider_code}',						
						full_name = '{$this->full_name}',
						gender = '{$this->gender}',
						birth_date = '{$this->birth_date}',
						relationship = '{$this->relationship}',
						is_emigrant = '{$this->is_emigrant}',
						job = '{$this->job}',
						study_status = '{$this->study_status}',
						social_status = '{$this->social_status}',
						health_status = '{$this->health_status}',
						note = '{$this->note}'		
					WHERE national_id = {$this->national_id}
					";		
		}							
		$this->db->query($query);
	 }
	 
	 
	 
	  /**
	 * function name : getMaleAbove12 
	 * 
	 * Description : 
	 * Get male family member above 12 that belong to provider
	 * 
	 * parameters:
	 * 
	 * Created date ; 20-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	 public function getMaleAbove12($provider_code)
	 {
		$query = "SELECT * 
				  FROM family_member
				  WHERE 
				  gender = 'M'
				  and
				  DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(birth_date)), '%Y') > 12
				  and
				  provider_code = '{$provider_code}'				  
				  ";
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
}    
    
    
    
    
    
?>
