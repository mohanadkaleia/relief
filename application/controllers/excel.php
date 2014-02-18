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
class Excel extends CI_Controller {


	
	public function index()
	{
		$this->showConvert();
	}
	
	
	/**
	 * function name : showConvert
	 * 
	 * Description : 
	 * call convert page
	 * 
	 * Created date ; 1-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function showConvert($status_message = null)
	{
		//load setting model
		$this->load->model('setting_model');
				
		//get exam season and study year
		$exam_season = $this->setting_model->getExamSeason();
		$study_year = $this->setting_model->getStudyYear();
		
		$data["status_message"] = $status_message;
		$data["exam_season"] = $exam_season;
		$data["study_year"] = $study_year; 
		
				
		$this->load->view('gen/header');
		$this->load->view('gen/slogan');
		$this->load->view('convert' , $data);
		$this->load->view('gen/footer');
	}
	
	
	
	/**
	 * function name : convertExcel
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
	public function convertExcel()
	{
		//load setting model
		$this->load->model('setting_model');									
		
		/** upload the excel files **/
		if(!$this->uploadExcelFile())
		{
			$error =  "failed to upload excel file :(";
		}		
		
		/** Reading settings and variables**/
		$settings = $this->setting_model->getSettingsByUserId();
		$variables = $this->setting_model->getExcelStudentStatus();
		
		/** open the uploaded excel file **/				
		$inputFileName = './files/'.$_FILES["exam_excel"]["name"];										
		$exam_worksheet_data = $this->readExcelFile($inputFileName , $settings);
				
		/** create new excel file **/
		//get excel header
		$header = $this->setting_model->getExcelHeader();
		
		//read data from convert form
		$subject_code = $this->input->post('subject_code');
		$study_year = $this->input->post('study_year');
		$exam_season = $this->input->post('exam_season');
		
		$this->createExcelFile($header , $exam_worksheet_data , $subject_code , $study_year , $exam_season);
		
		
		//redrect to show convet page and show message
		$status_message = "Exam excel file has been converted succesfully, it should be downloaded now";
		
		//$this->showConvert($status_message);
	}
	
	/**
	 * function name : uploadExcelFile
	 * 
	 * Description : 
	 * This function will do the following:
	 * 	1.upload the excel form
	 * 	
	 * 	
	 * 
	 * Created date ; 2-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function uploadExcelFile()
	{
		//upload the file and allow only .xls extension to be uploaded								
		$allowedExts = array("xls" , "xlsx");
		$temp = explode(".", $_FILES["exam_excel"]["name"]);
		$extension = end($temp);
		
		if (in_array($extension, $allowedExts))
		  {
		  if ($_FILES["exam_excel"]["error"] > 0)
		    {
		    echo "Return Code: " . $_FILES["exam_excel"]["error"] . "<br>";
		    }
		  else
		    {
		    //echo "Upload: " . $_FILES["exam_excel"]["name"] . "<br>";
		    //echo "Type: " . $_FILES["exam_excel"]["type"] . "<br>";
		    //echo "Size: " . ($_FILES["exam_excel"]["size"] / 1024) . " kB<br>";
		    //echo "Temp file: " . $_FILES["exam_excel"]["tmp_name"] . "<br>";
		
			//upload the file to the "files" directory		    
		    move_uploaded_file($_FILES["exam_excel"]["tmp_name"], "files/" . $_FILES["exam_excel"]["name"]);
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
	 * 	
	 * 	
	 * parameter:
	 * 		$inputFileName: the excel file name including its path
	 * 		$settings: the cells where to read values
	 * Created date ; 3-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function readExcelFile($inputFileName , $settings)
	{
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
		$exam_workseet_data = array(); //this array is 3D array firt index is for sheet, second for column and the third one for row
		
					
		//sheet number counter
		$sheet_number = 0;					
		foreach ($objPHPExcel->getWorksheetIterator() as $sheet) 
		{					
			//counter for cell in each sheet
			$row_counter = 0;
			
			//get the first data row index
			$cell_index = preg_split('#(?<=[a-z])(?=\d)#i', $settings[0]['student_id_cell']);
			$first_row_index = $cell_index[1];
			$current_row_index = $first_row_index;
			
						
			//read all values until empty student Id found as a stop condition				
			while (true) 
			{
				
				//read student Id
				$cell_index = preg_split('#(?<=[a-z])(?=\d)#i', $settings[0]['student_id_cell']);
				$current_cell = $cell_index[0] . $current_row_index;

				//stopping condition
				if($sheet->getCell($current_cell) == "")				
					break;	
							
				$exam_workseet_data[$sheet_number]['student_id_cell'][$row_counter] = $sheet->getCell($current_cell);
				
				
				
				//read student name
				if($settings[0]['student_name_cell'] != "")
				{
					$cell_index = preg_split('#(?<=[a-z])(?=\d)#i', $settings[0]['student_name_cell']);
					$current_cell = $cell_index[0] . $current_row_index;
					$exam_workseet_data[$sheet_number]['student_name_cell'][$row_counter] = $sheet->getCell($current_cell);
				}
				//read practical mark
				if($settings[0]['practical_mark_cell'] != "")
				{
					$cell_index = preg_split('#(?<=[a-z])(?=\d)#i', $settings[0]['practical_mark_cell']);
					$current_cell = $cell_index[0] . $current_row_index;
					$exam_workseet_data[$sheet_number]['practical_mark_cell'][$row_counter] = $sheet->getCell($current_cell);
				}
				//read theory mark
				if($settings[0]['theory_mark_cell'] != "")
				{
					$cell_index = preg_split('#(?<=[a-z])(?=\d)#i', $settings[0]['theory_mark_cell']);
					$current_cell = $cell_index[0] . $current_row_index;
					$exam_workseet_data[$sheet_number]['theory_mark_cell'][$row_counter] = $sheet->getCell($current_cell);
				}
				
				//read mark number
				if($settings[0]['full_mark_number_cell'] != "")
				{ 
					$cell_index = preg_split('#(?<=[a-z])(?=\d)#i', $settings[0]['full_mark_number_cell']);
					$current_cell = $cell_index[0] . $current_row_index;
					$exam_workseet_data[$sheet_number]['full_mark_number_cell'][$row_counter] = $sheet->getCell($current_cell);
				}
				//read mark in text format
				if($settings[0]['full_mark_text_cell'] != "")
				{ 
					$cell_index = preg_split('#(?<=[a-z])(?=\d)#i', $settings[0]['full_mark_text_cell']);
					$current_cell = $cell_index[0] . $current_row_index;
					$exam_workseet_data[$sheet_number]['full_mark_text_cell'][$row_counter] = $sheet->getCell($current_cell);
				}
				//read mark status
				if($settings[0]['mark_status_cell'] != "")
				{ 
					$cell_index = preg_split('#(?<=[a-z])(?=\d)#i', $settings[0]['mark_status_cell']);
					$current_cell = $cell_index[0] . $current_row_index;
					$exam_workseet_data[$sheet_number]['mark_status_cell'][$row_counter] = $sheet->getCell($current_cell);
				}
				
				//read national id
				if($settings[0]['student_national_id_cell'] != "")
				{
					$cell_index = preg_split('#(?<=[a-z])(?=\d)#i', $settings[0]['student_national_id_cell']);
					$current_cell = $cell_index[0] . $current_row_index;
					$exam_workseet_data[$sheet_number]['student_national_id_cell'][$row_counter] = $sheet->getCell($current_cell);	
				}								
				
				//increase indexes
				$current_row_index++;
				$row_counter++;
			}
			
			//increase sheet number
			$sheet_number++;																		
		}
				
		//return the data array
		return $exam_workseet_data;
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
	 * 		$header: the header row
	 * 		$exam_worksheet_data: the excel data that have read from the user excel
	 * 		$subject_code: the code of the exam a user will fill this field
	 * 		$study year: the study year of the exam: 2011/2012
	 * 		$exam_season: 1,2 ... etc
	 * 
	 * Created date ; 3-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function createExcelFile($header , $exam_worksheet_data , $subject_code , $study_year , $exam_season)
	{			
		
		//include the phpExcel classes from third party folder
		$include_path = "./application/third_party/phpexcel/";		
		include $include_path . 'PHPExcel/Writer/Excel2007.php';
		
		// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();
		
		// Set properties		
		$objPHPExcel->getProperties()->setCreator("Exorter");
		$objPHPExcel->getProperties()->setLastModifiedBy("Exorter");
		$objPHPExcel->getProperties()->setTitle("Exam excel form");
		$objPHPExcel->getProperties()->setSubject("Exam excel form");
		$objPHPExcel->getProperties()->setDescription("Exam excel file that contain exam results for alepuniv.edu.sy");		
		$objPHPExcel->setActiveSheetIndex(0);
		
		
		/** add header data **/		
		for($i = 0 ; $i < count($header); $i++)
		{				
			//add header data	
			$cell_index = $header[$i]['cell_index'];
			$objPHPExcel->getActiveSheet()->SetCellValue($cell_index, $header[$i]['header_value']);					
		}
		
		
		
		/** add exam data to the excel file **/
		
		//total number of sheets
		$number_of_sheet =  count($exam_worksheet_data);
		
		//total number of exam results
		$total_exam_count = 0;
		
		for($i = 0 ; $i < $number_of_sheet ; $i++)
		{
			$total_exam_count+= count($exam_worksheet_data[$i]['student_id_cell']);					
		}
		
		
		for($i = 0 ; $i < count($header); $i++)
		{				
			/** add exam data **/	
			//splite the cell index into letter and number for example A1 will be $cell_index[0]= A and $cell_index[1] = 1				
			$cell_index = $cell_index = preg_split('#(?<=[a-z])(?=\d)#i', $header[$i]['cell_index']);
			
			$row_count = $cell_index[1];
			$row_count++;
						
			//add subject code data
			if($header[$i]["header_id"] == "subject_code")
			{					
				for($j = 0 ; $j < $total_exam_count ; $j++)
				{
					$data_index = $cell_index[0].$row_count;
					$objPHPExcel->getActiveSheet()->SetCellValue($data_index, $subject_code);
					$row_count++;	
				}					
			}
			
			//add study year
			else if($header[$i]["header_id"] == "study_year")
			{					
				for($j = 0 ; $j < $total_exam_count ; $j++)
				{
					$data_index = $cell_index[0].$row_count;
					$objPHPExcel->getActiveSheet()->SetCellValue($data_index, $study_year);
					$row_count++;	
				}					
			}
			
			
			//add exam season
			else if($header[$i]["header_id"] == "exam_season")
			{					
				for($j = 0 ; $j < $total_exam_count ; $j++)
				{
					$data_index = $cell_index[0].$row_count;
					$objPHPExcel->getActiveSheet()->SetCellValue($data_index, $exam_season);
					$row_count++;	
				}					
			}
			
						
			else 
			{
				for($j = 0 ; $j < $number_of_sheet ; $j++)
				{
					for($k = 0 ; $k < count($exam_worksheet_data[$j]['student_id_cell']) ; $k++)
					{
						$data_index = $cell_index[0].$row_count;
						
						//we can reach the exact data index using header_id and add "_cell" to it due its the same prefix
						if(!isset($exam_worksheet_data[$j][$header[$i]["header_id"]."_cell"][$k]))
							break;	
						
						$data = $exam_worksheet_data[$j][$header[$i]["header_id"]."_cell"][$k];
																		
						//convert it from array to string
						$excel_cell_data = "".$data."";
						
						if($header[$i]["header_id"] == "mark_status")
						{
							$excel_cell_data = $this->markStatusConvertion($excel_cell_data);
						}
												
						$objPHPExcel->getActiveSheet()->SetCellValue($data_index, $excel_cell_data);
						
						$row_count++;
					}
				}	
			}
			
			
			
								
		}
		
		
		// Rename sheet		
		$objPHPExcel->getActiveSheet()->setTitle('Sheet 1');
		
		// Save Excel 2007 file		
		
		// We'll be outputting an excel file
		header('Content-type: application/vnd.ms-excel');
		
		// rename the output file
		
		//$orginal_file_name = pathinfo($_FILES["exam_excel"]["name"])['filename'];
		$file_name = "alepuniv";
		header('Content-Disposition: attachment; filename="'.$file_name.'.xls"');
								
		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
		$objWriter->save(str_replace('.php', '.xls', __FILE__));
		
		// Write file to the browser
		$objWriter->save('php://output');				
	}
	
	
	/**
	 * function name : markStatusConvertion
	 * 
	 * Description : 
	 * This function will do the following:
	 * 	
	 * 	
	 * parameter:
	 * 		$mark_status: the status from excel array
	 * 
	 * Created date ; 4-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function markStatusConvertion($mark_status)
	{
		//load setting model
		$this->load->model('setting_model');									
		
		/** Reading variables**/		
		$variables = $this->setting_model->getExcelStudentStatus();
		
		for($i = 0 ; $i<count($variables) ; $i++)
		{
			if($mark_status == $variables[$i]['excel_status'])
			{
				
				$mark_status =  $variables[$i]['website_status'];
				break;
			}			
		}
		
		return $mark_status;
	}
	
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */