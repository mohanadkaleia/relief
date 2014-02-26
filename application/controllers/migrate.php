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
		$this->export();
	}
	
	
	
	
	
	/**
	 * function name : export
	 * 
	 * Description : 
	 * This function will do the following:
	 * 	1.upload the excel form
	 * 	2.read settings and variables from the database
	 * 	3.open the uploaded excel file
	 * 	4.create a new excel file
	 * 	5.read values from user excel file and write them to the new one
	 * 	6.make the created file downloadable
	 * 	7.that's all :)
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
	 * This function will do the following:
	 * 	3.read excel file
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
				$objPHPExcel->getActiveSheet()->SetCellValue($cell_index.($j+2), $provider_data[$j][$provider_header[$i]['Field']]);		
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
			
			for($j=0 ; $j<count($provider_data) ; $j++)
			{
				
				
				$objWorkSheet->SetCellValue($cell_index.($j+2), $family_data[$j][$family_header[$i]['Field']]);		
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
		$file_name = "relief";
		header('Content-Disposition: attachment; filename="'.$file_name.'.xls"');
								
		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
		
		//echo __FILE__;
		$objWriter->save(str_replace('.php', '.xls', __FILE__));
		
		// Write file to the browser
		$objWriter->save('php://output');				
	}
	
	
	
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */