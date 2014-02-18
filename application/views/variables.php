<div  class="row-fluid">
	  	
	  	<?php
	  		//load the status box
	  		$this->load->view('gen/status');
		?>
		
	  	<div class="span6 main-content setvariables">
			<h1>Set Variables</h1>  
			
			<!-- excel sheet configuration form -->
			<form method="post" action="<?php echo base_url();?>variables/addVariables" enctype="multipart/form-data">
				<!-- hidden input to put variables count in -->
				<input type="hidden" name="hidden_var_count" value="<?php echo count($excel_variables);?>" />
				
												
				<table>
					
					<?php 
						for($i = 0 ; $i < count($student_status) ; $i = $i + 2)
						{							
							$status = $excel_variables[$i]['website_status'];
							$status_id = $excel_variables[$i]['id'];
							$excel_status = $excel_variables[$i]['excel_status'];							
					?>
							<tr>
								<td>
									<?php echo $status;?> =  
								</td>
								<td>
									<input type="text" name="var_<?php echo $i;?>" value = "<?php echo $excel_status;?>"/>
									<input type="hidden" name="hidden_var_<?php echo $i;?>" value="<?php echo $status_id;?>"/>
								</td>
								
								<?php if($i+1 >= count($student_status)) break;?>
								
								<?php									
									$status = $excel_variables[$i+1]['website_status'];
									$status_id = $excel_variables[$i+1]['id'];
									$excel_status = $excel_variables[$i+1]['excel_status'];									
								?>
								
								<td class="second-col">
									<?php echo $status;?> =  
								</td>
								<td>
									<input type="text" name="var_<?php echo $i+1;?>" value="<?php echo $excel_status;?>" />
									<input type="hidden" name="hidden_var_<?php echo $i+1;?>" value="<?php echo $status_id;?>"/>
								</td>															
							</tr>																			
					<?php		
						}
					?>
							<tr>
								<td colspan="2">
									<input type="submit" class="btn btn-primary" value="save" name="save_settings" />
									<input type="button" class="btn btn-default" value="Cancel" name="cencel_settings" onclick="window.location='<?php echo base_url()?>dashboard'" />
								</td>	
								
								<td colspan="2" class="status-message">
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
