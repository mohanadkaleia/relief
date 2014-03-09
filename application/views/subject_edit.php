<div  class="row-fluid">	  	
	  	<div class="span8 main-content offset2">
			<h1>تعديل بيانات مادة</h1>  
			<br />
			<!-- error message -->
			<div  id="error" style="display: none;">
			
			</div>
			<form method="post" action="<?php echo base_url();?>subject/saveData/edit/<?php echo $subject['id'];?>" >
			<input type="hidden" value="<?php echo $subject['name'];?>" name="old_name" id="old_name" />
				<table>
					<tr>
						<td>
							  اختر الفئة:
						</td>
						
						<td>
							<select name="category_id" id="category_id" >
								<?php foreach($categories as $cat){?>
									<option <?php if($category['id'] == $cat['id']) echo "selected";?> value="<?php echo $cat['id'];?>"><?php echo $cat['name'];?></option>
								<?php }?>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							اسم المادة:
						</td>
						<td>
							<input type="text" name="subject_name" id="subject_name" placeholder="اسم المادة" value="<?php echo $subject['name'];?>" />
						</td>
					</tr>
					<tr>
						<td>
							<input type="button" onclick="getUnique()" name="save" class="btn btn-info" value="احفظ"/>
							<input type="button" class="btn btn-default" value="إلغاء" name="cencel_settings" onclick="window.location='<?php echo base_url()?>dashboard'" />
						</td>
					</tr>
				</table>
				<input type="submit" id="submit" style="display: none" />
			</form>
	  	</div>
	  
	</div>
	
	<script>		
		function getUnique(){
			var subject_name = $('#subject_name').val();
			var old_name = $('#old_name').val();
			if(subject_name !== old_name){
				$.get('<?php echo base_url();?>'+'subject/getUnique?subject='+subject_name,function(data){
					if(data == "subject"){
						$('div#error').html('<div class="alert alert-error"><button class="close" data-dismiss="alert" type="button">×</button> اسم المادة هذا موجود مسبقاً في قاعدة البيانات..</div>');
						$('div#error').slideDown("slow");
					}else{
						$('#submit').click();
					}
				});
			}else{
				$('#submit').click();
			}
		}
	</script>
