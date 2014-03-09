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
		//set right to left
		$objPHPExcel->getActiveSheet()->setRightToLeft(true);
		
		$cell_index = "A";
		
		/** add header and data **/		
		for($i = 0 ; $i < count($provider_header); $i++)
		{				
			//add header data				
			$objPHPExcel->getActiveSheet()->SetCellValue($cell_index."1", $provider_header[$i]['Field']);	
			$objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(40);				
			// right-to-left worksheet
			
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
		
		//set right to left
		$objWorkSheet->setRightToLeft(true);
		
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
		
		
				
		/** upload the excel files **/
		if(!$this->uploadExcelFile())
		{
			$error =  "failed to upload excel file :(";
		}
			
			
		/** open the uploaded excel file **/				
		$inputFileName = './files/backup/'.$_FILES["imported_file"]["name"];
		
		//read uploaded excel file data									
		$data = $this->readExcelFile($inputFileName);
		
		//write the result to the database 
		$this->saveToDatabase($data);
						
				
		//redrect to show convet page and show message
		//$status_message = "Exam excel file has been converted succesfully, it should be downloaded now";
		
		$this->showConvert($status_message);
	}
	
	
	
	/**
	 * function name : uploadExcelFile
	 * 
	 * Description : 
	 * This function will do the following:
	 * 	1.upload the excel form, the file will be uploaded to the files directory under backup folder
	 * 	
	 * 	
	 * 
	 * Created date ; 28-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function uploadExcelFile()
	{				
		//upload the file and allow only .xls extension to be uploaded								
		$allowedExts = array("xls" , "xlsx");
		$temp = explode(".", $_FILES["imported_file"]["name"]);
		$extension = end($temp);
		
		if (in_array($extension, $allowedExts))
		  {
		  if ($_FILES["imported_file"]["error"] > 0)
		    {
		    echo "Return Code: " . $_FILES["imported_file"]["error"] . "<br>";
		    }
		  else
		    {
		    //echo "Upload: " . $_FILES["exam_excel"]["name"] . "<br>";
		    //echo "Type: " . $_FILES["exam_excel"]["type"] . "<br>";
		    //echo "Size: " . ($_FILES["exam_excel"]["size"] / 1024) . " kB<br>";
		    //echo "Temp file: " . $_FILES["exam_excel"]["tmp_name"] . "<br>";
		
			//upload the file to the "files" directory		    
		    move_uploaded_file($_FILES["imported_file"]["tmp_name"], "files/backup/" . $_FILES["imported_file"]["name"]);
		    //echo "Stored in: " . "files/" . $_FILES["exam_excel"]["name"];
		    
		    return true;
		    
		    }
		  }
		else
		  {
		  //echo "Invalid file";
		  return false;
		  }
	}


	/**
	 * function name : readExcelFile
	 * 
	 * Description : 
	 * This function will do the following:
	 * 	3.read excel file
	 * 	read sheet one where is the provider exist
	 * 	read sheet two where family member is exist
	 * 	
	 *	
	 * 	
	 * parameter:
	 * 		$inputFileName: the excel file name including its path	 
	 * Created date ; 28-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function readExcelFile($inputFileName)
	{
		//load provider and family model
		$this->load->model('provider_model');
		$this->load->model('family_member_model');											
				
		//get provider header
		$provider_header = $this->provider_model->getProviderColumn();			
		$family_header = $this->family_member_model->getFamilyColumn();
		
		//include the phpExcel classes from third party folder
		$include_path = "./application/third_party/phpexcel/";
		//include $include_path . 'PHPExcel/IOFactory.php';
		include $include_path . 'PHPExcel.php';	
		
		
		/**  Identify the type of $inputFileName  **/
		$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
		
		/**  Create a new Reader of the type that has been identified  **/
		$objReader = PHPExcel_IOFactory::createReader($inputFileType);
		
		/** load all sheet **/
		$objReader->setLoadAllSheets();
		
		/** load data only **/
		$objReader->setReadDataOnly(true);
		
		/**  Load $inputFileName to a PHPExcel Object  **/
		$objPHPExcel = $objReader->load($inputFileName);
		
		//read all sheet			
		$workseet_data = array(); //this array is 3D array firt index is for sheet, second for column and the third one for row
		$provider = array();
		$family_member = array();
					
		//sheet number counter
		$sheet_number = 0;		
		$column = array("A" , "B" , "C" , "D" , "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U" , "V", "W", "X", "Y", "Z");					
		
		$sheet_number = 0;
		foreach ($objPHPExcel->getWorksheetIterator() as $sheet) 
		{
			
			//get provider data
			if($sheet_number ==0)
			{
				for($i = 0 ; $i < count($provider_header) ; $i++)
				{
					$row = 2;
					$current_cell = $column[$i].$row;				
					//true while the id field is empty
					while($sheet->getCell("A".$row) != "")
					{
						$provider[$row-2][$provider_header[$i]["Field"]] = $sheet->getCell($column[$i].$row)->getFormattedValue();;
						$row++; 
					}
				}	
			}	
			else 
			{
				for($i = 0 ; $i < count($family_header) ; $i++)
				{
					$row = 2;
					$current_cell = $column[$i].$row;				
					//true while the id field is empty
					while($sheet->getCell("A".$row) != "")
					{
						$family_member[$row-2][$family_header[$i]["Field"]] = $sheet->getCell($column[$i].$row)->getFormattedValue();;
						$row++; 
					}
				}	
			}		
			
			//increase sheet number to enable adding family member data					
			$sheet_number++;
		}
		
		$result[] = $provider;
		$result[] = $family_member;
		//return array_merge($provider, $family_member);
		return $result;				
	}
	
	/**
	 * function name : saveToDatabase
	 * 
	 * Description : 
	 * This function will do the following:
	 * 	read the input array and write the result to the database	 	 
	 *	
	 * 	
	 * parameter:
	 * 		$data: input array this array is in 3d 
	 * 		first deminision for 0 for provider 1 for family
	 * 		second and third index to get provider fields and family member 	 
	 * Created date ; 1-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function saveToDatabase($data)
	{
		//load provider model
		$this->load->model("provider_model");					
				
		// assign values to the model variable
		foreach ($data[0] as $provider) 
		{
			
			$this->provider_model->full_name = $provider["full_name"];
			$this->provider_model->code = $provider["code"];						
			$this->provider_model->national_id = $provider['national_id'];
			$this->provider_model->family_book_num = $provider['family_book_num'];
			$this->provider_model->family_book_letter = $provider['family_book_letter'];
			$this->provider_model->family_book_family_num = $provider['family_book_family_number'];
			$this->provider_model->family_book_note = $provider['family_book_note'];
			$this->provider_model->current_address = $provider['current_address'];
			$this->provider_model->prev_address = $provider['prev_address'];
			$this->provider_model->street = $provider['street'];
			$this->provider_model->point_guide = $provider['point_guide'];
			$this->provider_model->build = $provider['build'];
			$this->provider_model->floor = $provider['floor'];
			$this->provider_model->phone1 = $provider['phone1'];
			$this->provider_model->phone2 = $provider['phone2'];
			$this->provider_model->mobile1 = $provider['mobile1'];
			$this->provider_model->mobile2 =$provider['mobile2'];
			$this->provider_model->note = $provider['note'];
			$this->provider_model->created_date = $provider['created_date'];
			
			//area and association
			$association_code = $provider['association_code']; 
			$area_code = $provider['area_code'];
			
			//add to the database
			$this->provider_model->importProvider($association_code , $area_code );									
		}
				
		// assign values to the model variable
		foreach ($data[1] as $family) 
		{
			
			// assign values to the model variable
			$this->family_member_model->provider_code = $family['provider_code'];
			$this->family_member_model->national_id = $family['national_id'];
			$this->family_member_model->full_name = $family['full_name'];			
			$this->family_member_model->gender = $family['gender'];
			$this->family_member_model->birth_date = $family['birth_date'];
			$this->family_member_model->relationship = $family['relationship'];
			$this->family_member_model->health_status = $family['health_status'];
			$this->family_member_model->is_emigrant = $family['is_emigrant'];
			$this->family_member_model->job = $family['job'];
			$this->family_member_model->study_status = $family['study_status'];
			$this->family_member_model->social_status = $family['social_status'];		
			$this->family_member_model->note = $family['note'];
			
			//add to the database
			$this->family_member_model->importFamilyMember();									
		}				 		
	}
	

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */