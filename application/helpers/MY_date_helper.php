<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Function name : date_to_db
 * 
 * Description :
 * This function takes the date in MM/DD/YYYY form and outputes 
 * it in Mysql acceptable form YYYY//MM/DD. 
 * 
 * Created date ; 15-2-2013
 * Modification date : ---
 * Modfication reason : ---
 * Author : Ahmad Mulhem Barakat
 * contact : molham225@gmail.com
 */

function date_to_db($date){
	$pieces = explode("/",$date);
	$db_date = $pieces[2] ."/". $pieces[0] ."/". $pieces[1]; 
	return $db_date;
}
