<div  class="row-fluid">
	  	
	  	<?php
	  		//load the status box
	  		$this->load->view('gen/status');
		?>
		
	  	<div class="span6 main-content">
			<h1>Settings</h1>  
			
			<!-- excel sheet configuration form -->
			<form method="post" action="<?php echo base_url();?>settings/addSettings" enctype="multipart/form-data">
				<table>
					<tr>
						<td class="first-col">
							Student ID cell:
						</td>
						
						<td>
							<input type="text" name="student_id_cell" placeholder="A1" value="<?php echo $settings[0]['student_id_cell']?>"/>
						</td>
						
						<td class="second-col">
							Student name cell:
						</td>
						
						<td>
							<input type="text" name="student_name_cell" placeholder="B1" value="<?php echo $settings[0]['student_name_cell']?>"/>
						</td>					
					</tr>
					
					<tr>
						<td class="first-col">
							Practical Mark cell:
						</td>
						
						<td>
							<input type="text" name="practical_mark_cell" value="<?php echo $settings[0]['practical_mark_cell']?>"/>
						</td>
						
						<td class="second-col">
							Theory Mark cell:
						</td>
						
						<td>
							<input type="text" name="theory_mark_cell" value="<?php echo $settings[0]['theory_mark_cell']?>"/>
						</td>					
					</tr>
					
					<tr>
						<td class="first-col">
							Full Mark Number cell:
						</td>
						
						<td>
							<input type="text" name="full_mark_number_cell" value="<?php echo $settings[0]['full_mark_number_cell']?>"/>
						</td>
						
						<td class="second-col">
							Full Mark Text cell:
						</td>
						
						<td>
							<input type="text" name="full_mark_text_cell" value="<?php echo $settings[0]['full_mark_text_cell']?>"/>
						</td>					
					</tr>
					
					<tr>
						<td class="first-col">
							Mark Status cell:
						</td>
						
						<td>
							<input type="text" name="mark_status_cell" value="<?php echo $settings[0]['mark_status_cell']?>"/>
						</td>
						
						<td class="second-col">
							Student National ID cell:
						</td>
						
						<td>
							<input type="text" name="student_national_id_cell" value="<?php echo $settings[0]['student_national_id_cell']?>"/>
						</td>					
					</tr>
					
					<tr>
						<td>
							<input type="submit" class="btn btn-primary" value="save" name="save_settings" />
							<input type="button" class="btn btn-default" value="Cancel" name="cencel_settings" onclick="window.location='<?php echo base_url()?>dashboard'" />
						</td>	
						
						<td colspan="3" class="status-message">
							<?php
								echo $status_message; 
							?>
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
