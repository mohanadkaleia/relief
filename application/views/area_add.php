<div  class="row-fluid">	  	
	  	<div class="span8 main-content offset2">
			<h1>إضافة منطقة</h1>  

			<form method="post" action="<?php echo base_url();?>area/saveData" >
				<table>
					<tr>
						<td>
							اسم المنطقة:
						</td>
						
						<td>
							<input type="text" name="name" required="required" />
						</td>
						
						<td>
							رمز المنطقة:
						</td>
						
						<td>
							<input type="text" name="code"  required="required" />
						</td>
					</tr>
					
					<tr>
						<td>
							<input type="submit" name="save" class="btn btn-info" value="احفظ"/>
							<input type="button" class="btn btn-default" value="إلغاء" name="cencel_settings" onclick="window.location='<?php echo base_url()?>dashboard'" />
						</td>
					</tr>
				</table>
			</form>
	  	</div>
	  
	</div>
