

<div  class="row-fluid">	  	
	  	<div class="span8 main-content offset2">
			<h1>إضافة جمعية</h1>  

			<form method="post" action="<?php echo base_url();?>association/saveData/add" enctype="multipart/form-data" >
				<table>
					<tr>
						<td>
							اسم الجمعية:
						</td>
						
						<td>
							<input type="text" name="name"  />
						</td>
						
						<td>
							رمز الجمعية:
						</td>
						
						<td>
							<input type="text" name="code"   />
						</td>
						
					</tr>
					<tr>
						
						<td>
							اسم المدير:
						</td>
						
						<td>
							<input type="text" name="manager_name"   />
						</td>
						
						<td>
							شعار الجمعية:
						</td>
						
						<td>
							<input type="file" name="logo" id="logo"  />
						</td>
						
						
					</tr>
					<tr>
						
						<td>
							هاتف 1:
						</td>
						
						<td>
							<input type="text" name="phone1"  />
						</td>
						
						<td>
							هاتف 2:
						</td>
						
						<td>
							<input type="text" name="phone2"  />
						</td>
						
					</tr>
					<tr>
						
						<td>
							موبايل 1:
						</td>
						
						<td>
							<input type="text" name="mobile1"  />
						</td>
						
						<td>
							موبايل 2:
						</td>
						
						<td>
							<input type="text" name="mobile2"  />
						</td>
						
					</tr>
					<tr>
						
						<td>
							العنوان:
						</td>
						
						<td>
							<textarea name="address"  ></textarea>
						</td>
						
						<td>
							حول الجمعية:
						</td>
						
						<td>
							<textarea name="about" ></textarea>
						</td>
						
					</tr>
					<tr>
						
						<td>
							تاريخ الإنشاء:
						</td>
						
						<td>
							<input type="text" name="created_date"  id="created_date"/>
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
	
<script>
	 $(document).ready(function() {
		$("#created_date").datepicker({
			format: 'yyyy-mm-dd'
		});
	});
</script>
