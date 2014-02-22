

<div  class="row-fluid">	  	
	  	<div class="span8 main-content offset2">
			<h1>تعديل بيانات جمعية</h1>  

			<form method="post" action="<?php echo base_url();?>association/saveData/edit/<?php echo $association['id'];?>" enctype="multipart/form-data">
				<table>
					<tr>
						<td>
							اسم الجمعية:
						</td>
						
						<td>
							<input type="text" name="name" value='<?php echo $association['name'];?>'></input>
						</td>
						
						<td>
							رمز الجمعية:
						</td>
						
						<td>
							<input type="text" name="code" value='<?php echo $association['code'];?>'></input>
						</td>
						
					</tr>
					<tr>
						
						<td>
							اسم المدير:
						</td>
						
						<td>
							<input type="text" name="manager_name"  value='<?php echo $association['manager_name'];?>'></input>
						</td>
						
						<td>
							شعار الجمعية:
						</td>
						
						<td>
							<input type="file" name="logo" ></input>
						</td>
						
						
					</tr>
					<tr>
						
						<td>
							هاتف 1:
						</td>
						
						<td>
							<input type="text" name="phone1" value='<?php echo $association['phone1'];?>'></input>
						</td>
						
						<td>
							هاتف 2:
						</td>
						
						<td>
							<input type="text" name="phone2" value='<?php echo $association['phone2'];?>'></input>
						</td>
						
					</tr>
					<tr>
						
						<td>
							موبايل 1:
						</td>
						
						<td>
							<input type="text" name="mobile1" value='<?php echo $association['mobile1'];?>'></input>
						</td>
						
						<td>
							موبايل 2:
						</td>
						
						<td>
							<input type="text" name="mobile2" value='<?php echo $association['mobile2'];?>'></input>
						</td>
						
					</tr>
					<tr>
						
						<td>
							العنوان:
						</td>
						
						<td>
							<textarea name="address"  ><?php echo $association['address'];?></textarea>
						</td>
						
						<td>
							حول الجمعية:
						</td>
						
						<td>
							<textarea name="about" ><?php echo $association['about'];?></textarea>
						</td>
						
					</tr>
					<tr>
						
						<td>
							تاريخ الإنشاء:
						</td>
						
						<td>
							<input type="text" name="created_date"  id="created_date" value='<?php echo $association['created_date'];?>'></input>
						</td>
					</tr>
					
					<tr>
						<td>
							<input type="submit" name="save" class="btn btn-info" value="احفظ"/>
							<input type="button" class="btn btn-default" value="إلغاء" name="cencel_settings" onclick="window.location='<?php echo base_url();?>dashboard'" />
						</td>
					</tr>
				</table>
				<input type="hidden" name="old_logo" id="old_logo" value='<?php echo $association['logo'];?>'/>
			</form>
			
	  	</div>
	  
	</div>
	
<script>
	var logo = "";
	 $(document).ready(function() {
		$("#created_date").datepicker({
			format: 'yyyy/mm/dd'
		});
		logo = "<?php echo 'files/'.$association['name'].'/'.$association['logo'];?>";
	});
	$('form').submit(function(){
		if($('#logo').val() !== undefined && $('#logo').val() && 'undefined' && $('#logo').val().trim() !== ""){
			$('#old_logo').val("");
		}
	});
</script>
