<table dir="rtl" style="width=400px">
	
	<!-- provider information -->
	<tr>
		<td>
			اسم المعيل:	
		</td>
		<td>
			<?php echo $provider[0]["full_name"];?>
		</td>
		
		<td>
			الرقم الوطني:
		</td>		
		<td>
			<?php echo $provider[0]["national_id"];?>
		</td>
	</tr>
	
	
	<!-- package information -->
	<tr>
		<td>
			السلة الغذائية:
		</td>
		<td>
			<?php echo $package[0]["package_name"];?>
		</td>
	</tr>
	
	<!-- package details -->		
	<?php
		foreach($package as $subject)
		{			
	?>			
			<tr>
				<td>
					اسم المادة:			
				</td>
				<td>
					<?php echo $subject["subject_name"];?>
				</td>
				
				<td>
					الكمية:			
				</td>
				<td>
					<?php echo $subject["amount"];?>
				</td>
			</tr>		
	<?php
		}
	?>
	
	<!-- provder code -->
	<tr>
		<td colspan="4">
			<img src="<?php echo base_url();?>files/barcode/<?php echo $provider[0]['code'];?>.png" />
		</td>
	</tr> 
</table>