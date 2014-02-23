<div  class="row-fluid">	  	
	  	<div class="span8 main-content offset2">
			<h1>إضافة فرد أسرى للمعيل :<?php echo $provider[0]['full_name'];?></h1>  
			
			
			<!-- excel sheet configuration form -->
			<form method="post" action="<?php echo base_url();?>family_member/saveData/add" enctype="multipart/form-data">
				<!-- provider code -->
				<input type="hidden" name="provider_code" value="<?php echo $provider[0]['code'];?>"/>
				
				<!-- provider name -->
				<input type="hidden" name="provider_name" value="<?php echo $provider[0]['full_name'];?>"/>
				<table>
					<tr>
						<td>
							الاسم الثلاثي الكامل:
						</td>
						
						<td>
							<input type="text" name="full_name" />
						</td>
						
						<td>
							الجنس:
						</td>
						
						<td>							
							<select name="gender">
								<option value="M">ذكر</option>
								<option value="F">أنثى</option>
							</select>							
						</td>
					</tr>
					
					<tr>
						<td>
							التولد:
						</td>
						
						<td>													
							<input type="text" name="birth_date" id="birth_date"/>
						</td>
						
						<td>
							صلة القربى:
						</td>
						<td>
							<select name="relationship">
								<option value="father">أب</option>
								<option value="mother">أم</option>
								<option value="husband">زوج</option>
								<option value="wife">زوجة</option>
								<option value="brother">أخ</option>
								<option value="sister">أخت</option>
								<option value="son">إبن</option>
								<option value="daughter">إبنه</option>
							</select>														
						</td>
					</tr>
					
					<tr>						
						
						<td>
							الوضع الصحي:
						</td>
						
						<td>							
							<select name="health_status">
								<option value="disabled">عاجز</option>
								<option value="sick">مريض</option>
								<option value="sustenance">إعالة</option>
								<option value="pregnant">حامل</option>
							</select>
						</td>
						
						<td>
							نائح\مقيم:
						</td>
						<td>
							<select name="is_emigrant">
								<option value="T">نازح</option>
								<option value="F">مقيم</option>
							</select>							
						</td>						
					</tr>
					
					<tr>
						<td>
							العمل والمهنة:
						</td>
						
						<td>
							<input type="text" name="job" />
						</td>
						
						<td>
							الوضع الدراسي:
						</td>
						<td>
							<input type="text" name="study_status" />							
						</td>
					</tr>
					
					<tr>
						<td>
							الوضع الاجتماعي:
						</td>
						<td>							
							<select name="social_status">
								<option value="married">متزوج</option>
								<option value="divorced">مطلق</option>
								<option value="fatherless">يتيم</option>
								<option value="widow">أرملة</option>
							</select>
						</td>
						
						<td>
							ملاحظات:
						</td>
						<td>
							<textarea name="note"></textarea>
						</td>
						
					</tr>
					
					
					<tr>
						
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
