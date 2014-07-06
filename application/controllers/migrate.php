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



	/**
	 * Function name : __construct
	 * Description: 
	 * this contructor is called as this object is initiated.
	 * 
	 * created date: 21-2-2014
	 * ccreated by: Eng. Mohanad Kaleia
	 * contact: ms.kaleia@gmail.com 
	 */
	public function __construct(){
		parent::__construct();
		//check login state of the user requesting this controller.
		$this->load->helper('login');
		checkLogin();
				
		//include the phpExcel classes from third party folder
		$include_path = "./application/third_party/phpexcel/";		
		include $include_path . 'PHPExcel.php';
		include $include_path . 'PHPExcel/Writer/Excel2007.php';
	}
	
	
	public function index($result = "")
	{
		$data["result"]  = $result;		
		$this->load->view('gen/header');
		$this->load->view('gen/slogan');
		$this->load->view('migrate' , $data);
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
		$this->createExcelFile(); 
		
		//redrect to show convet page and show message
		$status_message = "Exam excel file has been converted succesfully, it should be downloaded now";				
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
	 * 		 
	 * 
	 * Created date ; 25-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function createExcelFile()
	{
		
		//load provider and family model
		$this->load->model('provider_model');
		$this->load->model('family_member_model');											
		$this->load->model('area_model');
		$this->load->model('association_model');
		$this->load->model('package_model');
		$this->load->model('package_detail_model');
		$this->load->model('provider_package_model');
		$this->load->model('subject_model');
		$this->load->model('subject_category_model');
		
		
		
		
		//get the neeeded data
		
		/** get the data of tables */
		
		//provider data 
		$provider_data = $this->provider_model->getAllProvidersToExport();
		
		//famiy data
		$family_data = $this->family_member_model->getAllFamilyMembers();
		
		//area data
		$area_data = $this->area_model->getAllAreas();
		
		//association data	
		$association_data = $this->association_model->getAllAssociationsToExport();
		
		//pakcage data
		$package_data = $this->package_model->getAllPackages();
		
		//pakcage details data
		$package_details_data = $this->package_detail_model->getAllPackageDetails();

		//provider package data
		$provider_package_data = $this->provider_package_model->getAll();
		
		//subject data
		$subject_data = $this->subject_model->getAllSubjects();
		
		//subject category data
		$subject_category_data = $this->subject_category_model->getAllSubjectCategories();
		
							
		/** get the header (columns names of tables) **/
		//provider header
		$provider_header = $this->provider_model->getProviderColumn();
		
		//family header 			
		$family_header = $this->family_member_model->getFamilyColumn();
		
		//area header 
		$area_header = $this->area_model->getAreaColumn();
		
		//association header
		$association_header = $this->association_model->getAssociationColumn();
		
		//package header
		$package_header = $this->package_model->getPackageColumn();
		
		//package details header
		$package_details_header = $this->package_detail_model->getPackageDetailsColumn();
		
		//provider_package  header
		$provider_package_header = $this->provider_package_model->getProviderPackageColumn();
		
		//subject header
		$subject_header = $this->subject_model->getSubjectColumn();
		
		//subject category header
		$subject_category_header = $this->subject_category_model->getSubjectCategoryColumn();
								
		//include the phpExcel classes from third party folder
		/*
		$include_path = "./application/third_party/phpexcel/";		
		include $include_path . 'PHPExcel.php';
		include $include_path . 'PHPExcel/Writer/Excel2007.php';	
		*/
		
					
		// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();
		
		// Set properties		
		$objPHPExcel->getProperties()->setCreator("relief");
		$objPHPExcel->getProperties()->setLastModifiedBy("relief");
		$objPHPExcel->getProperties()->setTitle("relief excel form");
		$objPHPExcel->getProperties()->setSubject("relief excel form");
		$objPHPExcel->getProperties()->setDescription("relief excel");				
						
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
		$this->createExcelSheet( $objPHPExcel , 1 , $family_header , $family_data , "أفراد الأسرة");		
		
		/** add areas **/
		$this->createExcelSheet( $objPHPExcel , 2 , $area_header , $area_data , "المناطق");				
		
		/** add association **/
		$this->createExcelSheet( $objPHPExcel , 3 , $association_header , $association_data , "الجمعيات");		
		
		/** add package **/
		$this->createExcelSheet( $objPHPExcel , 4 , $package_header , $package_data , "السلات");
				
		/** add package details**/		
		$this->createExcelSheet( $objPHPExcel , 5 , $package_details_header , $package_details_data , "تفاصيل السلة");
		
		/** add provider package**/		
		$this->createExcelSheet( $objPHPExcel , 6 , $provider_package_header , $provider_package_data , "معونات المعيل ");
		
		/** add subject**/		
		$this->createExcelSheet( $objPHPExcel , 7 , $subject_header , $subject_data , "المواد");
		
		/** add subject header **/		
		$this->createExcelSheet( $objPHPExcel , 8 , $subject_category_header , $subject_category_data , "تصنيفات المواد");
		
		
		
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
		
		//show migrate summary
		$this->importSummary($data , $inputFileName);
		
		//write the result to the database 
		//$this->saveToDatabase($data);
						
				
		//redrect to show convet page and show message
		//$status_message = "Exam excel file has been converted succesfully, it should be downloaded now";
		//$status = "تم استيراد البيانات بنجاح";
		//$this->index($status);
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
	 * 	read sheet tree and four where areas and associations are
	 *	
	 * 	
	 * parameter:
	 * 		$inputFileName: the excel file name including its path	 
	 * Created date ; 26-3-2014
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
		$this->load->model('area_model');
		$this->load->model('association_model');
		$this->load->model('package_model');
		$this->load->model('package_detail_model');
		$this->load->model('provider_package_model');
		$this->load->model('subject_model');
		$this->load->model('subject_category_model');		
				
		//get provider header
		$provider_header = $this->provider_model->getProviderColumn();			
		$family_header = $this->family_member_model->getFamilyColumn();
		$area_header = $this->area_model->getAreaColumn();
		$association_header = $this->association_model->getAssociationColumn(); 
		$package_header = $this->package_model->getPackageColumn();
		$package_detail_header = $this->package_detail_model->getPackageDetailsColumn();
		$provider_package_header = $this->provider_package_model->getProviderPackageColumn();
		$subject_header = $this->subject_model->getSubjectColumn();
		$subject_category_header = $this->subject_category_model->getSubjectCategoryColumn();
		
		//include the phpExcel classes from third party folder
		/*
		$include_path = "./application/third_party/phpexcel/";
		//include $include_path . 'PHPExcel/IOFactory.php';
		include $include_path . 'PHPExcel.php';	
		*/
		
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
		$areas = array();
		$asociations = array();
		
					
		//sheet number counter
		$sheet_number = 0;		
		$column = array("A" , "B" , "C" , "D" , "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U" , "V", "W", "X", "Y", "Z" , "AA" , "AB" , "AC" , "AD" , "AE" , "AF" , "AG" , "AH");					
		
		$sheet_number = 0;
		
		$sheets = $objPHPExcel->getAllSheets();
		
		
		//read provider data from sheet 0
		$provider_data = $this->readSheetData($sheets[0], $provider_header);
		
		//read family data from sheet 1
		$family_data = $this->readSheetData($sheets[1], $family_header);
		
		//read area data from sheet 2
		$area_data = $this->readSheetData($sheets[2], $area_header);
		
		//read association data from sheet 3
		$association_data = $this->readSheetData($sheets[3], $association_header);
		
		//read package data from sheet 4
		$package_data = $this->readSheetData($sheets[4], $package_header);
		
		//read family data from sheet 5
		$package_detail_data = $this->readSheetData($sheets[5], $package_detail_header);
		
		//read provider package data from sheet 6
		$provider_package_data = $this->readSheetData($sheets[6], $provider_package_header);
		
		//read subject data from sheet 7
		$subject_data = $this->readSheetData($sheets[7], $subject_header);
		
		//read subject category data from sheet 8
		$subject_category_data = $this->readSheetData($sheets[8], $subject_category_header);
		
		$result[] = $provider_data;
		$result[] = $family_data;
		$result[] = $area_data;
		$result[] = $association_data;
		$result[] = $package_data;
		$result[] = $package_detail_data;
		$result[] = $provider_package_data;
		$result[] = $subject_data;
		$result[] = $subject_category_data;
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
		//import provider data to the data base	
		$this->importProvider($data[0]);	
		
		//import family data
		$this->importFamily($data[1]);
					
		//import area
		$this->importArea($data[2]);
				
		//impoer association data
		$this->importAssociation($data[3]);
		
		//import package
		$this->importPackage($data[4]);
		
		//import package details
		$this->importPackageDetail($data[5]);	
		
		//import provide package
		$this->importProviderPackage($data[6]);
		
		//import subjects
		$this->importSubject($data[7]);
		
		//import subjects
		$this->importSubjectCategory($data[8]);								 		
	}
	


	/**
	 * function name : importSummary
	 * 
	 * Description : 
	 * this function will show the summary of import function, before import it to the database
	 * 	
	 * prameters:
	 * $summary: array of imported data {provider - family_members - areas - associations}
	 * $excel_file: excel file path and name
	 * Created date ; 2-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function importSummary($summary , $excel_file)
	{
		$data["providers"]  = $summary[0];		
		$data["family_members"]  = $summary[1];
		$data["areas"]  = $summary[2];
		$data["associations"]  = $summary[3];
		
		$data['excel_file'] = $excel_file;
		
		$this->load->view('gen/header');
		$this->load->view('gen/slogan');
		$this->load->view('migrate_summary' , $data);
		$this->load->view('gen/footer');
	}
	
	/**
	 * function name : importApprove
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
	 * Created date ; 29-6-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function importApprove()
	{
		//load provider and family model
		$this->load->model('provider_model');
		$this->load->model('family_member_model');											
			
		/** open the uploaded excel file **/				
		$inputFileName = $this->input->post("excel_file");
		
		//read uploaded excel file data									
		$data = $this->readExcelFile($inputFileName);
		
		
		//write the result to the database 
		$this->saveToDatabase($data);
						
				
		//redrect to show convet page and show message
		$status_message = "Exam excel file has been converted succesfully, it should be downloaded now";
		$status = "تم استيراد البيانات بنجاح";
		$this->index($status);
	}
	
	
	/**
	 * function name : importApprove
	 * 
	 * Description : 
	 * this function will create excel sheet
	 * by passing the needed data
	 * 
	 * 
	 * Created date ; 3-7-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function createExcelSheet( &$objPHPExcel , $sheet_number , $header , $data , $sheet_name)
	{
		/** add family member **/
		
		//create new sheet for family member
		$objWorkSheet = $objPHPExcel->createSheet($sheet_number); //Setting index when creating
		
		//set right to left
		$objWorkSheet->setRightToLeft(true);
		
		$cell_index = "A";
		/** add header and data **/		
		for($i = 0 ; $i < count($header); $i++)
		{				
			//add header data				
			$objWorkSheet->SetCellValue($cell_index."1", $header[$i]['Field']);						
			
			for($j=0 ; $j<count($data) ; $j++)
			{								
				$objWorkSheet->setCellValueExplicit($cell_index.($j+2), $data[$j][$header[$i]['Field']] , PHPExcel_Cell_DataType::TYPE_STRING);					
			}			
			$cell_index++;					
		}
		
		// Rename sheet		
		$objWorkSheet->setTitle($sheet_name);
	}
	
	
	
	/**
	 * function name : readSheetData
	 * 
	 * Description : 
	 * this function will read sheet data and return the data as an array
	 * 
	 * 
	 * Created date ; 4-7-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function readSheetData($sheet , $header)
	{
		$column = array("A" , "B" , "C" , "D" , "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U" , "V", "W", "X", "Y", "Z" , "AA" , "AB" , "AC" , "AD" , "AE" , "AF" , "AG" , "AH");
		
		for($i = 0 ; $i < count($header) ; $i++)
		{
			$row = 2;
			$current_cell = $column[$i].$row;				
			//true while the id field is empty
			while($sheet->getCell("A".$row) != "")
			{
				$data[$row-2][$header[$i]["Field"]] = $sheet->getCell($column[$i].$row)->getFormattedValue();
				$row++; 
			}
		}
		
		return $data;
	}
	
	
	/**
	 * function name : importProvider
	 * 
	 * Description : 
	 * iterate provider data and import each record to the database
	 * 
	 * 
	 * Created date ; 4-7-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function importProvider($providers)
	{
		
		$this->load->model("provider_model");
		
		// assign values to the model variable
		foreach ($providers as $provider) 
		{
			
			$this->provider_model->fname = $provider["fname"];
			$this->provider_model->lname = $provider["lname"];
			$this->provider_model->father_name = $provider["father_name"];
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
			$this->provider_model->relief_form_status = $provider['relief_form_status'];
			$this->provider_model->created_date = $provider['created_date'];
			$this->provider_model->gender = $provider['gender'];
			
			//area and association
			$association_code = $provider['association_code']; 
			$area_code = $provider['area_code'];
						
			
			//add to the database
			$this->provider_model->importProvider($association_code , $area_code );													
		}
			
	}



	/**
	 * function name : importFamily
	 * 
	 * Description : 
	 * iterate faily member data and import each record to the database
	 * 
	 * 
	 * Created date ; 4-7-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function importFamily($family_data)
	{
		
		//load family model
		$this->load->model("family_member_model");
		
		// assign values to the model variable
		foreach ($family_data as $family) 
		{
			
			// assign values to the model variable
			$this->family_member_model->provider_code = $family['provider_code'];
			$this->family_member_model->national_id = $family['national_id'];
			$this->family_member_model->fname = $family['fname'];			
			$this->family_member_model->lname = $family['lname'];
			$this->family_member_model->father_name = $family['father_name'];
			$this->family_member_model->gender = $family['gender'];
			$this->family_member_model->birth_date = $family['birth_date'];
			$this->family_member_model->relationship = $family['relationship'];
			$this->family_member_model->health_status = $family['health_status'];		
			$this->family_member_model->job = $family['job'];
			$this->family_member_model->study_status = $family['study_status'];
			$this->family_member_model->social_status = $family['social_status'];		
			$this->family_member_model->note = $family['note'];
			
			//add to the database
			$this->family_member_model->importFamilyMember();									
		}
	}


	/**
	 * function name : importArea
	 * 
	 * Description : 
	 * iterate area data and import each record to the database
	 * 
	 * 
	 * Created date ; 4-7-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function importArea($areas)
	{
		//load area model
		$this->load->model("area_model");
		
		// assign values to the model variable
		foreach ($areas as $area) 
		{
			
			// assign values to the model variable
			$this->area_model->name  = $area["name"];
			$this->area_model->code  = $area["code"];			
			
			//add to the database
			$this->area_model->importAreas();									
		}	
	}
	
	
	/**
	 * function name : importAssociation
	 * 
	 * Description : 
	 * iterate assocaition data and import each record to the database
	 * 
	 * 
	 * Created date ; 4-7-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function importAssociation($associations)
	{
		//load asociation model
		$this->load->model("association_model");
		
		
		/* associations */
		foreach ($associations as $association) 
		{
			
			// assign values to the model variable
			$this->association_model->name  = $association["name"];
			$this->association_model->code  = $association["code"];
			$this->association_model->manager_name  = $association["manager_name"];
			$this->association_model->phone1  = $association["phone1"];
			$this->association_model->phone2  = $association["phone2"];
			$this->association_model->mobile1  = $association["mobile1"];
			$this->association_model->mobile2  = $association["mobile2"];
			$this->association_model->address  = $association["address"];
			$this->association_model->about  = $association["about"];
			$this->association_model->logo  = $association["logo"];
			$this->association_model->is_deleted  = $association["is_deleted"];									
			$this->association_model->created_date  = $association["created_date"];
			
			//add to the database
			$this->association_model->importAssociations();									
		}	
	}



	/**
	 * function name : importPackage
	 * 
	 * Description : 
	 * iterate area data and import each record to the database
	 * 
	 * 
	 * Created date ; 6-7-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function importPackage($packages)
	{
		//load area model
		$this->load->model("package_model");
				
		foreach ($packages as $package) 
		{
			// assign values to the model variable			
			$this->package_model->id = $package['id'];
			$this->package_model->name = $package['name'];
			$this->package_model->code = $package['code'];
			
			//import to the database
			$this->package_model->importPackage();												
		}	
	}
	
	
	/**
	 * function name : importPackageDetail
	 * 
	 * Description : 
	 * iterate area data and import each record to the database
	 * 
	 * 
	 * Created date ; 6-7-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function importPackageDetail($package_details)
	{
		//load area model
		$this->load->model("package_model");
				
		foreach ($package_details as $detail) 
		{
			// assign values to the model variable			
			$this->package_detail_model->id = $detail['id'];
			$this->package_detail_model->subject_code = $detail['subject_code'];
			$this->package_detail_model->package_code = $detail['package_code'];
			$this->package_detail_model->amount = $detail['amount'];
			//import to the database
			$this->package_detail_model->importPackageDetails();												
		}	
	}
		
	
	
	/**
	 * function name : importProviderPackage
	 * 
	 * Description : 
	 * iterate table data and import each record to the database
	 * 
	 * 
	 * Created date ; 6-7-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function importProviderPackage($provider_packages)
	{
		//load area model
		$this->load->model("provider_package_model");
				
		foreach ($provider_packages as $provider_package) 
		{
			// assign values to the model variable			
			$this->provider_package_model->id = $provider_package['id'];
			$this->provider_package_model->provider_code = $provider_package['provider_code'];
			$this->provider_package_model->package_code = $provider_package['package_code'];
			$this->provider_package_model->date = $provider_package['date'];
			//import to the database
			$this->provider_package_model->importProviderPackage();												
		}	
	}
	
	
	
	/**
	 * function name : importSubject
	 * 
	 * Description : 
	 * iterate table data and import each record to the database
	 * 
	 * 
	 * Created date ; 6-7-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function importSubject($subjects)
	{
		//load area model
		$this->load->model("subject_model");
				
		foreach ($subjects as $subject) 
		{
			// assign values to the model variable			
			$this->subject_model->id = $subject['id'];
			$this->subject_model->code = $subject['code'];
			$this->subject_model->name = $subject['name'];
			$this->subject_model->total_amount = $subject['total_amount'];
			$this->subject_model->subject_category_id = $subject['subject_category_id'];
			//import to the database
			$this->subject_model->importSubject();												
		}	
	}
	
	
	/**
	 * function name : importSubjectCategory
	 * 
	 * Description : 
	 * iterate table data and import each record to the database
	 * 
	 * 
	 * Created date ; 6-7-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function importSubjectCategory($categories)
	{
		//load subject category model
		$this->load->model("subject_category_model");
				
		foreach ($categories as $category) 
		{
			// assign values to the model variable			
			$this->subject_category_model->id = $category['id'];			
			$this->subject_category_model->name = $category['name'];
						
			//import to the database
			$this->subject_category_model->importSubjectCategory();												
		}	
	}
	
	
	
	/**
	 * function name : exportImportNew
	 * 
	 * Description : 
	 * this function will import a new file to the database as follow:
	 * 1. export the data
	 * 2. empty the database
	 * 3. import the uploaded file
	 * 
	 * 
	 * Created date ; 6-7-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function exportImportNew()
	{
		//export the database		
		//load provider and family model
		$this->load->model('provider_model');
		$this->load->model('family_member_model');											
		$this->load->model('area_model');
		$this->load->model('association_model');
		$this->load->model('package_model');
		$this->load->model('package_detail_model');
		$this->load->model('provider_package_model');
		$this->load->model('subject_model');
		$this->load->model('subject_category_model');
		
		/** get the data of tables */
		
		//provider data 
		$provider_data = $this->provider_model->getAllProvidersToExport();
		
		//famiy data
		$family_data = $this->family_member_model->getAllFamilyMembers();
		
		//area data
		$area_data = $this->area_model->getAllAreas();
		
		//association data	
		$association_data = $this->association_model->getAllAssociationsToExport();
		
		//pakcage data
		$package_data = $this->package_model->getAllPackages();
		
		//pakcage details data
		$package_details_data = $this->package_detail_model->getAllPackageDetails();

		//provider package data
		$provider_package_data = $this->provider_package_model->getAll();
		
		//subject data
		$subject_data = $this->subject_model->getAllSubjects();
		
		//subject category data
		$subject_category_data = $this->subject_category_model->getAllSubjectCategories();
		
							
		/** get the header (columns names of tables) **/
		//provider header
		$provider_header = $this->provider_model->getProviderColumn();
		
		//family header 			
		$family_header = $this->family_member_model->getFamilyColumn();
		
		//area header 
		$area_header = $this->area_model->getAreaColumn();
		
		//association header
		$association_header = $this->association_model->getAssociationColumn();
		
		//package header
		$package_header = $this->package_model->getPackageColumn();
		
		//package details header
		$package_details_header = $this->package_detail_model->getPackageDetailsColumn();
		
		//provider_package  header
		$provider_package_header = $this->provider_package_model->getProviderPackageColumn();
		
		//subject header
		$subject_header = $this->subject_model->getSubjectColumn();
		
		//subject category header
		$subject_category_header = $this->subject_category_model->getSubjectCategoryColumn();										
					
		// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();
		
		// Set properties		
		$objPHPExcel->getProperties()->setCreator("relief");
		$objPHPExcel->getProperties()->setLastModifiedBy("relief");
		$objPHPExcel->getProperties()->setTitle("relief excel form");
		$objPHPExcel->getProperties()->setSubject("relief excel form");
		$objPHPExcel->getProperties()->setDescription("relief excel");				
						
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
		$this->createExcelSheet( $objPHPExcel , 1 , $family_header , $family_data , "أفراد الأسرة");		
		
		/** add areas **/
		$this->createExcelSheet( $objPHPExcel , 2 , $area_header , $area_data , "المناطق");				
		
		/** add association **/
		$this->createExcelSheet( $objPHPExcel , 3 , $association_header , $association_data , "الجمعيات");		
		
		/** add package **/
		$this->createExcelSheet( $objPHPExcel , 4 , $package_header , $package_data , "السلات");
				
		/** add package details**/		
		$this->createExcelSheet( $objPHPExcel , 5 , $package_details_header , $package_details_data , "تفاصيل السلة");
		
		/** add provider package**/		
		$this->createExcelSheet( $objPHPExcel , 6 , $provider_package_header , $provider_package_data , "معونات المعيل ");
		
		/** add subject**/		
		$this->createExcelSheet( $objPHPExcel , 7 , $subject_header , $subject_data , "المواد");
		
		/** add subject header **/		
		$this->createExcelSheet( $objPHPExcel , 8 , $subject_category_header , $subject_category_data , "تصنيفات المواد");
		
		
		
		
		
		//2. empty the database				
		$this->provider_model->emptyTable();
						
		$this->family_member_model->emptyTable();
		
		$this->area_model->emptyTable();
		
		$this->association_model->emptyTable();
		
		$this->package_model->emptyTable();
		
		$this->package_detail_model->emptyTable();
		
		$this->provider_package_model->emptyTable();
		
		$this->subject_model->emptyTable();
		
		$this->subject_category_model->emptyTable();
		
		
		//3. import the new file
		/** upload the excel files **/
		if(!$this->uploadExcelFile())
		{
			$error =  "failed to upload excel file :(";
		}
			
			
		/** open the uploaded excel file **/				
		$inputFileName = './files/backup/'.$_FILES["imported_file"]["name"];
		
		//read uploaded excel file data									
		//$data = $this->readExcelFile($inputFileName);
		
		//write the result to the database 
		//$this->saveToDatabase($data);
		
		//4. save the old data to excel file		
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
	
	
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */