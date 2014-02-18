<div  class="row-fluid">	  	
	  	<div class="span8 main-content offset2">
			<h1>إضافة معيل</h1>  
			
			<!-- excel sheet configuration form -->
			<form method="post" action="<?php echo base_url();?>provider/saveData" enctype="multipart/form-data">
				<table>
					<tr>
						<td>
							الاسم الثلاثي الكامل:
						</td>
						
						<td>
							<input type="text" name="full_name" />
						</td>
						
						<td>
							الرقم الوطني:
						</td>
						
						<td>
							<input type="text" name="national_id"  />
						</td>
					</tr>
					
					<tr>
						<td>
							رقم دفتر العائلة:
						</td>
						
						<td>
							<input type="text" name="family_book_num" />
						</td>
						
						<td>
							الحرف:
						</td>
						<td>
							<input type="text" name="family_book_letter" />
						</td>
					</tr>
					
					<tr>
						<td>
							الرقم الأسري:	
						</td>
						
						<td>
							<input type="text" name="family_book_family_number" />
						</td>
						
						<td>
							بيان عائلي:
						</td>
						<td>
							<input type="text" name="family_book_note" />
						</td>						
					</tr>
					
					<tr>
						<td>
							العنوان الحالي:
						</td>
						
						<td>
							<textarea name="current_address"></textarea>
						</td>
						
						<td>
							العنوان السابق:
						</td>
						<td>
							<textarea name="prev_address"></textarea>
						</td>
					</tr>
					
					<tr>
						<td>
							الشارع:
						</td>
						<td>
							<input type="text" name="street" />	
						</td>
						
						<td>
							بناء:
						</td>
						
						<td>
							<input type="text" name="build" />
						</td>
					</tr>
					
					<tr>
						<td>
							نقطة علام:
						</td>
						<td>
							<input type="text" name="point_guide" />
						</td>
						
						<td>
							طابق:
						</td>
						<td>
							<input type="text" name="floor" />
						</td>
					</tr>
					
					<tr>
						<td>
							هاتف 1:
						</td>
						<td>
							<input type="text" name="phone1" />
						</td>
						
						<td>
							هاتف 2:
						</td>
						<td>
							<input type="text" name="phone2" />
						</td>						
					</tr>
					
					<tr>
						<td>
							موبايل 1:
						</td>
						<td>
							<input type="text" name="mobile1" />
						</td>
						
						<td>
							موبايل 2:
						</td>
						
						<td>
							<input type="text" name="mobile2" />
						</td>
					</tr>
					
					<tr>
						<td>
							ملاحظات:
						</td>
						<td>
							<textarea name="note"></textarea>
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
