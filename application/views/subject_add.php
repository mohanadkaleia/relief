<div  class="row-fluid">	  	
	  	<div class="span8 main-content offset2">
			<h1>إضافة مادة</h1>  
			<br />
			<!-- error message -->
			<div  id="error" style="display: none;">
			
			</div>
			<form method="post" action="<?php echo base_url();?>subject/saveData/add" >
				<table>
					<tr>
						<td>
							 <input type="radio" name="category" id="choose" value="choose" class="radio" /> اختر الفئة:
						</td>
						
						<td>
							<select name="category_id" id="category_id" >
								<?php foreach($categories as $category){?>
									<option value="<?php echo $category['id'];?>"><?php echo $category['name'];?></option>
								<?php }?>
							</select>
						</td>
						
						<td>
							<input type="radio" name="category" id="new" value="new" class="radio"/>       إنشاء فئة جديدة:
						</td>
						
						<td>
							 <input  type="text" name="category_name" id="category_name" placeholder="اسم الفئة" />
						</td>
					</tr>
					<tr>
						<td>
							اسم المادة:
						</td>
						<td>
							<input type="text" name="subject_name" id="subject_name" placeholder="اسم المادة">
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
		$(document).ready(function(){
			$('input:radio#choose').prop("checked", true);
			$('input:text#category_name').prop("disabled", true);
			$('input:radio#new').change(function () {
				if ($('input:radio#new').is(":checked")) {
					$('select#category_id').prop("disabled", true);
					$('input:text#category_name').removeProp("disabled");
				} 
			});
			
			$('input:radio#choose').change(function () {
				if ($('input:radio#choose').is(":checked")) {
					$('input:text#category_name').prop("disabled", true);
					$('select#category_id').removeProp("disabled");
				}
			});
		});
		
		function getUnique(){
			
			
			var subject = $('#subject_name').val();
			var category = $('#category_name').val();
			if ($('input:radio#new').is(":checked")) {
				$.get('<?php echo base_url();?>'+'subject/getUnique?subject='+subject+'&category='+category,function(data){
					if(data == "subject"){
						$('div#error').html('<div class="alert alert-error"><button class="close" data-dismiss="alert" type="button">×</button> اسم المادة هذا موجود مسبقاً في قاعدة البيانات..</div>');
						$('div#error').slideDown("slow");
					}else if(data == "category"){
						$('div#error').html('<div class="alert alert-error"><button class="close" data-dismiss="alert" type="button">×</button> اسم الفئة الجديدة موجود مسبقاً في قاعدة البيانات..</div>');
						$('div#error').slideDown("slow");
					}else{
						//alert(subject+" "+category+" "+data)
						$('#submit').click();
					}
				});
			}else{
				$.get('<?php echo base_url();?>'+'subject/getUnique?subject='+subject,function(data){
					if(data == "subject"){
						$('div#error').html('<div class="alert alert-error"><button class="close" data-dismiss="alert" type="button">×</button> اسم المادة هذا موجود مسبقاً في قاعدة البيانات..</div>');
						$('div#error').slideDown("slow");
					}else{
						$('#submit').click();
					}
				});
			}
		}
	</script>