<div  class="row-fluid">	  	
	  	<div class="span8 main-content offset2">
	  		
	  		<!-- breacrumb -->
	  		<ul class="breadcrumb">
			  <li><a href="<?php echo base_url();?>dashboard">الرئيسية</a> <span class="divider">/</span></li>			  		  
			  <li><a href="<?php echo base_url();?>subject">إدارة المواد</a> <span class="divider">/</span></li>
			  <li class="active">تعديل مادة</li>
			</ul>
	  		
			<h1>تعديل بيانات مادة</h1>  
			<br />
			<!-- error message -->
			<div  id="error" style="display: none;">
			
			</div>
			<form method="post" action="<?php echo base_url();?>subject/saveData/edit/<?php echo $subject['id'];?>" >
			<input type="hidden" value="<?php echo $subject['name'];?>" name="old_name" id="old_name" />
			<input type="hidden" value="<?php echo $subject['code'];?>" name="old_code" id="old_code" />
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
							<input type="text" name="subject_name" id="subject_name" placeholder="اسم المادة" value="<?php echo $subject['name'];?>" required="required"/>
						</td>
						<td>
							رمز المادة:
						</td>
						<td>
							<input type="text" name="subject_code" id="subject_code" placeholder="رمز المادة" required="required" value="<?php echo $subject['code'];?>"/>
						</td>
					</tr>
					
					<tr>
						<td>
							الكمية الإجمالية
						</td>
						<td>
							<input type="text" name="total_amount" value="<?php echo $subject["total_amount"];?>"/>
						</td>
						
						
						<td>
							الواحدة:
						</td>
						<td>
							<select name="unit">
								<option value="kg" <?php if($subject["unit"] == "kg") echo "selected";?>>كيلو</option>
								<option value="liter" <?php if($subject["unit"] == "liter") echo "selected";?>>ليتر</option>
								<option value="box" <?php if($subject["unit"] == "box") echo "selected";?>>صندوق</option>
								<option value="bottle" <?php if($subject["unit"] == "bottle") echo "selected";?>>زجاجة</option>
								<option value="bag" <?php if($subject["unit"] == "bag") echo "selected";?>>كيس</option>
								<option value="piece" <?php if($subject["unit"] == "peice") echo "selected";?>>قطعة</option>
							</select> 
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
			var subject_code = $('#subject_code').val();
			var old_code = $('#old_code').val();
			if(subject_name !== old_name){
				$.get('<?php echo base_url();?>'+'subject/getUnique?subject='+subject_name,function(data){
					if(data == "subject"){
						$('div#error').html('<div class="alert alert-error"><button class="close" data-dismiss="alert" type="button">×</button> اسم المادة هذا موجود مسبقاً في قاعدة البيانات..</div>');
						$('div#error').slideDown("slow");
					}else if(subject_code !== old_code){
						$.get('<?php echo base_url();?>'+'subject/getUnique?code='+subject_code,function(data){
							if(data == "code"){
								$('div#error').html('<div class="alert alert-error"><button class="close" data-dismiss="alert" type="button">×</button> رمز المادة هذا موجود مسبقاً في قاعدة البيانات..</div>');
								$('div#error').slideDown("slow");
							}else{
								$('#submit').click();
							}
						});
					}else{
						$('#submit').click();
					}
				});
			}else{
				if(subject_code !== old_code){
					$.get('<?php echo base_url();?>'+'subject/getUnique?code='+subject_code,function(data){
						if(data == "code"){
							$('div#error').html('<div class="alert alert-error"><button class="close" data-dismiss="alert" type="button">×</button> رمز المادة هذا موجود مسبقاً في قاعدة البيانات..</div>');
							$('div#error').slideDown("slow");
						}else{
							$('#submit').click();
						}
					});
				}else{
					$('#submit').click();
				}
			}
		}
	</script>
