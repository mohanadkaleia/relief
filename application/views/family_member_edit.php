<div  class="row-fluid">	  	
	  	<div class="span8 main-content offset2">
			<h1>تعديل بيانات فرد أسرة:</h1>  
			
			
			<!-- excel sheet configuration form -->
			<form method="post" action="<?php echo base_url();?>family_member/saveData/edit/<?php echo $family_member['id'];?>" enctype="multipart/form-data">
				<!-- provider code -->
				<input type="hidden" name="provider_code" value="<?php echo $family_member['provider_code'];?>"/>
				<!-- previous page -->
				<input type="hidden" name="page" value="<?php echo $page;?>"/>
				
				<table>
					<tr>
						<td>
							الاسم الثلاثي الكامل:
						</td>
						
						<td>
							<input type="text" name="full_name" value="<?php echo $family_member['full_name'];?>"/>
						</td>
						
						<td>
							الجنس:
						</td>
						
						<td>							
							<select name="gender">
								<option value="M" <?php if($family_member['gender'] == "M") echo 'selected';?> >ذكر</option>
								<option value="F" <?php if($family_member['gender'] == "F") echo 'selected';?> >أنثى</option>
							</select>							
						</td>
					</tr>
					
					<tr>
						<td>
							التولد:
						</td>
						
						<td>													
							<input type="text" name="birth_date" id="birth_date" value="<?php echo $family_member['birth_date'];?>"/>
						</td>
						
						<td>
							صلة القربى:
						</td>
						<td>
							<select name="relationship">
								<option value="father" <?php  if($family_member['relationship'] == "father") echo 'selected';?>>أب</option>
								<option value="mother" <?php  if($family_member['relationship'] == "mother") echo 'selected';?>>أم</option>
								<option value="husband" <?php  if($family_member['relationship'] == "husband") echo 'selected';?>>زوج</option>
								<option value="wife" <?php  if($family_member['relationship'] == "wife") echo 'selected';?>>زوجة</option>
								<option value="brother" <?php  if($family_member['relationship'] == "brother") echo 'selected';?>>أخ</option>
								<option value="sister" <?php  if($family_member['relationship'] == "sister") echo 'selected';?>>أخت</option>
								<option value="son" <?php  if($family_member['relationship'] == "son") echo 'selected';?>>إبن</option>
								<option value="daughter" <?php  if($family_member['relationship'] == "daughter") echo 'selected';?>>إبنه</option>
							</select>														
						</td>
					</tr>
					
					<tr>						
						
						<td>
							الوضع الصحي:
						</td>
						
						<td>							
							<select name="health_status">
								<option value="disabled" <?php  if($family_member['health_status'] == "disabled") echo 'selected';?>>عاجز</option>
								<option value="sick" <?php  if($family_member['health_status'] == "sick") echo 'selected';?>>مريض</option>
								<option value="sustenance" <?php  if($family_member['health_status'] == "sustenance") echo 'selected';?>>إعالة</option>
								<option value="pregnant" <?php  if($family_member['health_status'] == "pregnant") echo 'selected';?>>حامل</option>
							</select>
						</td>
						
						<td>
							نازح\مقيم:
						</td>
						<td>
							<select name="is_emigrant">
								<option value="T" <?php  if($family_member['is_emigrant'] == "T") echo 'selected';?> >نازح</option>
								<option value="F" <?php  if($family_member['is_emigrant'] == "F") echo 'selected';?>>مقيم</option>
							</select>							
						</td>						
					</tr>
					
					<tr>
						<td>
							العمل والمهنة:
						</td>
						
						<td>
							<input type="text" name="job" value="<?php echo $family_member['job'];?>" />
						</td>
						
						<td>
							الوضع الدراسي:
						</td>
						<td>
							<input type="text" name="study_status" value="<?php echo $family_member['study_status'];?>" />							
						</td>
					</tr>
					
					<tr>
						<td>
							الوضع الاجتماعي:
						</td>
						<td>							
							<select name="social_status">
								<option value="married" <?php  if($family_member['social_status'] == "married") echo 'selected';?>>متزوج</option>
								<option value="divorced" <?php  if($family_member['social_status'] == "divorced") echo 'selected';?>>مطلق</option>
								<option value="fatherless" <?php  if($family_member['social_status'] == "fatherless") echo 'selected';?>>يتيم</option>
								<option value="widow" <?php  if($family_member['social_status'] == "widow") echo 'selected';?>>أرملة</option>
							</select>
						</td>
						
						<td>
							ملاحظات:
						</td>
						<td>
							<textarea name="note"><?php echo $family_member['note'];?></textarea>
						</td>
						
					</tr>
					
					
					<tr>
						
					</tr>
					
					<tr>
						<td>
							<input type="submit" name="save" class="btn btn-info" value="احفظ"/>							
							<input type="button" class="btn btn-default" value="إلغاء" name="cencel_settings" onclick="window.location='<?php echo base_url();?>provider'" />
						</td>
					</tr>
				</table>
			</form>
	  	</div>
	  
	</div>
