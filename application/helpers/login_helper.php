<?php if (!defined("BASEPATH")) exit("No direct script access allowed");

/**
 * Function name : is_logged_in
 * 
 * Description :
 * This function checkes if the user is already logged in or not.
 * 
 * Created date ; 14-12-2012
 * Modification date : ---
 * Modfication reason : ---
 * Author : Ahmad Mulhem Barakat
 * contact : molham225@gmail.com
 */

function checkLogin($user){
	if(!$user){
		redirect(base_url().'login');
		return FALSE;
	}else{
		return TRUE;
	}
}
