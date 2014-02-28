<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Class name : Excel
 * 
 * Description :
 * This controller is used to manage excel convertion functions
 * 
 * Created date ; 1-2-2014
 * Modification date : ---
 * Modfication reason : ---
 * Author : Mohanad Shab Kaleia
 * contact : ms.kaleia@gmail.com
 */
class Migrate extends CI_Controller {


	
	public function index()
	{		
		$this->load->view('gen/header');
		$this->load->view('gen/slogan');
		$this->load->view('migrate');
		$this->load->view('gen/footer');
	}
	
	
	
	
	
	/**
	 * function name : export
	 * 
	 * Description : 
	 * this function create excel file with two sheet first one for provider second for family member
	 * 	
	 * 
	 * Created date ; 2-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function export()
	{
		//load provider and family model
		$this->load->model('provider_model');
		$this->load->model('family_member_model');											
				
		/** get provider and family data**/
		$providers = $this->provider_model->getAllProviders();
		$families = $this->family_member_model->getAllFamilyMembers();
						
		/** create new excel file **/
		//get provider header
		$provider_header = $this->provider_model->getProviderColumn();			
		$family_header = $this->family_member_model->getFamilyColumn();
		$this->createExcelFile($provider_header , $providers , $family_header , $families);
		
		//redrect to show convet page and show message
		$status_message = "Exam excel file has been converted succesfully, it should be downloaded now";
		
		//$this->showConvert($status_message);
	}
	
	

	
	/**
	 * function name : createExcelFile
	 * 
	 * Description : 
	 * write an excel file for provider and family data
	 * each field is sorounded by "", so when we need to read the excel file we
	 * have to strip thise quotes
	 * 	
	 * 	
	 * parameter:
	 * 		$provider_header: the header row
	 * 		$provider_data: provider data array
	 * 		$family_header: family header row for family sheet
	 * 		$family_data: family data	 
	 * 
	 * Created date ; 25-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function createExcelFile($provider_header , $provider_data , $family_header , $family_data )
	{
								
		//include the phpExcel classes from third party folder
		$include_path = "./application/third_party/phpexcel/";		
		include $include_path . 'PHPExcel.php';
		include $include_path . 'PHPExcel/Writer/Excel2007.php';	
					
		// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();
		
		// Set properties		
		$objPHPExcel->getProperties()->setCreator("relief");
		$objPHPExcel->getProperties()->setLastModifiedBy("relief");
		$objPHPExcel->getProperties()->setTitle("relief excel form");
		$objPHPExcel->getProperties()->setSubject("relief excel form");
		$objPHPExcel->getProperties()->setDescription("relief excel ");		
		$objPHPExcel->setActiveSheetIndex(0);
		
		$cell_index = "A";
		
		/** add header and data **/		
		for($i = 0 ; $i < count($provider_header); $i++)
		{				
			//add header data				
			$objPHPExcel->getActiveSheet()->SetCellValue($cell_index."1", $provider_header[$i]['Field']);			
		
			for($j=0 ; $j<count($provider_data) ; $j++)
			{
				//$objPHPExcel->getActiveSheet()->SetCellValue($cell_index.($j+2), "\"" .  $provider_data[$j][$provider_header[$i]['Field']] . "\"");
				$objPHPExcel->getActiveSheet()->setCellValueExplicit($cell_index.($j+2), $provider_data[$j][$provider_header[$i]['Field']], PHPExcel_Cell_DataType::TYPE_STRING);		
			}			
			$cell_index++;					
		}
				
		// Rename sheet		
		$objPHPExcel->getActiveSheet()->setTitle('معيل');
		
		
		/** add family member **/
		
		//create new sheet for family member
		$objWorkSheet = $objPHPExcel->createSheet(1); //Setting index when creating
		
		
		$cell_index = "A";
		/** add header and data **/		
		for($i = 0 ; $i < count($family_header); $i++)
		{				
			//add header data				
			$objWorkSheet->SetCellValue($cell_index."1", $family_header[$i]['Field']);						
			
			for($j=0 ; $j<count($family_data) ; $j++)
			{								
				$objWorkSheet->setCellValueExplicit($cell_index.($j+2), $family_data[$j][$family_header[$i]['Field']] , PHPExcel_Cell_DataType::TYPE_STRING);					
			}			
			$cell_index++;					
		}
		
		// Rename sheet		
		$objWorkSheet->setTitle('أفراد الأسرة');
		
		
		// Save Excel 2007 file		
		
		// We'll be outputting an excel file
		header('Content-type: application/vnd.ms-excel');
		
		// rename the output file
		
		//$orginal_file_name = pathinfo($_FILES["exam_excel"]["name"])['filename'];
		$file_name = "relief".date("Y-m-d");;
		header('Content-Disposition: attachment; filename="'.$file_name.'.xls"');
								
		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
		
		//echo __FILE__;
		$objWriter->save(str_replace('.php', '.xls', __FILE__));
		
		// Write file to the browser
		$objWriter->save('php://output');				
	}
	
	
	
	/**
	 * function name : import
	 * 
	 * Description : 
	 * this function will import providers information and thier families from excel form
	 * this function consist of this partial steps:
	 * 1. upload the excel file
	 * 2. read sheet 1 and add providers (check if the provider is exist then just update their information)
	 * 3. read sheet 2 and add families member
	 * 4. thats all	
	 * 
	 * 
	 * Created date ; 28-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function import()
	{
		//load provider and family model
		$this->load->model('provider_model');
		$this->load->model('family_member_model');											
				
		/** get provider and family data**/
		$providers = $this->provider_model->getAllProviders();
		$families = $this->family_member_model->getAllFamilyMembers();
						
		/** create new excel file **/
		//get provider header
		$provider_header = $this->provider_model->getProviderColumn();			
		$family_header = $this->family_member_model->getFamilyColumn();
		$this->createExcelFile($provider_header , $providers , $family_header , $families);
		
		//redrect to show convet page and show message
		$status_message = "Exam excel file has been converted succesfully, it should be downloaded now";
		
		//$this->showConvert($status_message);
	}
	
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */