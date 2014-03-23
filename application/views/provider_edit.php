<div  class="row-fluid">	  	
	  	<div class="span8 main-content offset2">
	  		
	  		
	  		<!-- breacrumb -->
	  		<ul class="breadcrumb">
			  <li><a href="<?php echo base_url();?>dashboard">الرئيسية</a> <span class="divider">/</span></li>			  
			  <li><a href="<?php echo base_url();?>provider">إدارة معيل</a> <span class="divider">/</span></li>
			  <li class="active">تعديل معيل</li>
			</ul>
	  		
			<h1>تعديل بيانات معيل</h1>  
			<!-- excel sheet configuration form -->
			<form method="post" action="<?php echo base_url();?>provider/saveData/edit/<?php echo $provider['id'];?>" enctype="multipart/form-data">
				<table>									
					
					<tr>
						<td>
							المنطقة:
						</td>
						<td>
							<select name="area">
								<?php foreach ($area as $key => $value) 
								{
								?>
									<option value="<?php echo $value['code'];?>" <?php if($provider['area_code'] == $value['code']) echo 'selected';?>><?php echo $value['name'];?></option>
								<?php	
								}
								?>
								
							</select>
						</td>
					</tr>
										
					<tr>
						<td>
							الاسم:
						</td>
						
						<td>
							<input type="text" name="fname"  value="<?php echo $provider['fname'];?>" />
						</td>
						
						<td>
							الكنية:
						</td>
						
						<td>
							<input type="text" name="lname"  value="<?php echo $provider['lname'];?>" />
						</td>
						
					</tr>
					
					<tr>
						
						<td>
							اسم الأب:
						</td>
						
						<td>
							<input type="text" name="father_name"  value="<?php echo $provider['father_name'];?>" />
						</td>
						
						<td>
							الرقم الوطني:
						</td>
						
						<td>
							<input type="text" name="national_id" value="<?php echo $provider['national_id'];?>" />
						</td>
					</tr>
					
					<tr>
						<td>
							رقم دفتر العائلة:
						</td>
						
						<td>
							<input type="text" name="family_book_num" value="<?php echo $provider['family_book_num'];?>" />
						</td>
						
						<td>
							الحرف:
						</td>
						<td>
							<input type="text" name="family_book_letter" value="<?php echo $provider['family_book_letter'];?>" />
						</td>
					</tr>
					
					<tr>
						<td>
							الرقم الأسري:	
						</td>
						
						<td>
							<input type="text" name="family_book_family_number" value="<?php echo $provider['family_book_family_number'];?>" />
						</td>
						
						<td>
							بيان عائلي:
						</td>
						<td>
							<input type="text" name="family_book_note" value="<?php echo $provider['family_book_note'];?>" />
						</td>						
					</tr>
					
					<tr>
						<td>
							العنوان الحالي:
						</td>
						
						<td>
							<textarea name="current_address"><?php echo $provider['current_address'];?></textarea>
						</td>
						
						<td>
							العنوان السابق:
						</td>
						<td>
							<textarea name="prev_address"><?php echo $provider['prev_address'];?></textarea>
						</td>
					</tr>
					
					<tr>
						<td>
							الشارع:
						</td>
						<td>
							<input type="text" name="street" value="<?php echo $provider['street'];?>" />	
						</td>
						
						<td>
							بناء:
						</td>
						
						<td>
							<input type="text" name="build" value="<?php echo $provider['build'];?>" />
						</td>
					</tr>
					
					<tr>
						<td>
							نقطة علام:
						</td>
						<td>
							<input type="text" name="point_guide" value="<?php echo $provider['point_guide'];?>" />
						</td>
						
						<td>
							طابق:
						</td>
						<td>
							<input type="text" name="floor" value="<?php echo $provider['floor'];?>" />
						</td>
					</tr>
					
					<tr>
						<td>
							هاتف 1:
						</td>
						<td>
							<input type="text" name="phone1" value="<?php echo $provider['phone1'];?>" />
						</td>
						
						<td>
							هاتف 2:
						</td>
						<td>
							<input type="text" name="phone2" value="<?php echo $provider['phone2'];?>" />
						</td>						
					</tr>
					
					<tr>
						<td>
							موبايل 1:
						</td>
						<td>
							<input type="text" name="mobile1" value="<?php echo $provider['mobile1'];?>" />
						</td>
						
						<td>
							موبايل 2:
						</td>
						
						<td>
							<input type="text" name="mobile2" value="<?php echo $provider['mobile2'];?>" />
						</td>
					</tr>
					
					<tr>
						<td>
							ملاحظات:
						</td>
						<td colspan="3"> 
							<textarea name="note"><?php echo $provider['note'];?></textarea>
						</td>
					</tr>
					
					<tr>
						<td>
							<input type="submit" name="save" class="btn btn-info" value="احفظ"/>							
							<input type="button" class="btn btn-default" value="إلغاء" name="cencel_settings" onclick="window.location='<?php echo base_url()?>provider'" />
						</td>
					</tr>
				</table>
			</form>
	  	</div>
	  
	</div>
