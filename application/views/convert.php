<div  class="row-fluid">
	  	
	  	<?php
	  		//load the status box
	  		$this->load->view('gen/status');
		?>
		
	  	<div class="span6 main-content convert"> 
			<h1>Convert Exam excel file</h1>  
			
			<!-- excel sheet configuration form -->
			<form method="post" action="<?php echo base_url();?>excel/convertExcel" enctype="multipart/form-data">
				<table>
					<tr>
						<td>
							Subject Code:
						</td>
						
						<td>
							<input type="text" name="subject_code" required=""/> *
						</td>					
					</tr>
					
					<tr>
						<td>
							Study year:
						</td>
						
						<td>
							<select name="study_year">
								<?php for($i = 0 ; $i < count($study_year) ; $i++)
								{
								?>
									<option value="<?php echo $study_year[$i]["year"];?>"><?php echo $study_year[$i]["year"];?></option>
								<?php		
								}
								?>	
							</select>
						</td>
					</tr>
					
					<tr>
						<td>
							Exam season:
						</td>
						
						<td>
							<select name="exam_season">
								<?php for($i = 0 ; $i < count($exam_season) ; $i++)
								{
								?>
									<option value="<?php echo $exam_season[$i]["season"];?>"><?php echo $exam_season[$i]["season"];?></option>
								<?php		
								}
								?>							
							</select>
						</td>
					</tr>
					
					<tr>
						<td>
							Upload excel file:
						</td>
						
						<td>
							<input type="file" name="exam_excel" required=""/>
							<p style="color:gray">only <b>.xls</b> files is acceptable</p>
						</td>
					</tr>
					
					<tr>
						<td colspan="2">
							<input type="submit" class="btn btn-success" value="Convert" name="convert" />
							<input type="button" class="btn btn-default" value="Cancel" name="cencel_settings" onclick="window.location='<?php echo base_url()?>dashboard'" />									
							
							<p style="color:green"><?php echo $status_message;?></p>
						
						</td>	
										
					</tr>
				</table>
			</form>
	  	</div>
	  		  	
	  	<?php
	  		//load database information box
	  		$this->load->view('gen/user_info');
	  	?>
		
	</div>
