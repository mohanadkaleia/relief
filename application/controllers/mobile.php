<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Class name : Mobile
 * 
 * Description :
 * This class contain functions to manage mobile functions
 * 
 * Created date ; 24-3-2013
 * Modification date : ---
 * Modfication reason : ---
 * Author : Ahmad Mulhem Barakat
 * contact : molham225@gmail.com
 */
class Mobile extends CI_Controller {


	
	public function index()
	{
		$this->load->view("mobile");
	}
	
	
	/**
	 * Function name : add
	 * Description: 
	 * adds the inserted bar code to atext file cold barcode.text
	 * 
	 * created date: 24-3-2014
	 * ccreated by: Eng. Ahmad Mulhem Barakat
	 * contact: molham225@gmail.com 
	 */
	public function add(){
		$barcode = $this->input->post('barcode');
		//echo $barcode;
		file_put_contents("./files/text.txt",$barcode); 
		exec("c:\\wamp\\www\\relief\\files\\exec\\decode.exe 2> error.txt");
		$string = file_get_contents(base_url()."/files/outtext.txt");
		$data['data'] =  $string;
		$this->load->view("mobile",$data);
	}
	
	
}
/* End of file mobile.php */
/* Location: ./application/controllers/mobile.php */
