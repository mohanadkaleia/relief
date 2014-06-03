<div  class="row-fluid">	  	
	  	<div class="span8 main-content offset2">
			
			<!-- breacrumb -->
	  		<ul class="breadcrumb">
			  <li><a href="<?php echo base_url();?>dashboard">الرئيسية</a> <span class="divider">/</span></li>			  
			  <li><a href="<?php echo base_url();?>family_member">إدارة أفراد الأسرة</a> <span class="divider">/</span></li>
			  <li class="active">إضافة فرد أسرة</li>
			</ul>
			
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
							الرقم الوطني:
						</td>
						
						<td>
							<input type="text" name="national_id" value="<?php echo $family_member['national_id'];?>"/>
						</td>
					</tr>
					
					
					<tr>
						<td>
							الاسم:
						</td>
						
						<td>
							<input type="text" name="fname" value="<?php echo $family_member['fname'];?>"/>
						</td>
						
						<td>
							الكنية:
						</td>
						
						<td>
							<input type="text" name="lname" value="<?php echo $family_member['lname'];?>"/>
						</td>
					</tr>
					<tr>	
						<td>
							اسم الأب:
						</td>
						
						<td>
							<input type="text" name="father_name" value="<?php echo $family_member['father_name'];?>"/>
						</td>
						
						<td>
							الجنس:
						</td>
						
						<td>							
							<select name="gender" id="gender">
								<option value="M" <?php if($family_member['gender'] == "M") echo 'selected';?> >ذكر</option>
								<option value="F" <?php if($family_member['gender'] == "F") echo 'selected';?> >أنثى</option>
							</select>							
						</td>
					</tr>
					
					<tr>
						<td>
							التولد:
						</td>
						
						<td dir="ltr" align="right">						
							<?php
								$birth_date = explode("-", $family_member['birth_date']);
							?>
																					
							<select name="birth_year" style="width:70px;">
								<?php
									for($i=1900 ; $i<=date(Y);$i++)
									{
								?>
									<option value="<?php echo $i;?>" <?php if($birth_date[0] == $i) echo "selected";?>><?php echo $i;?></option>
								<?php		
									}
								?>
							</select>
							-
							<select name="birth_month" style="width:60px;">
								<?php
									for($i=1 ; $i<=12;$i++)
									{
								?>
									<option value="<?php echo $i;?>" <?php if($birth_date[1] == $i) echo "selected";?>><?php echo $i;?></option>
								<?php		
									}
								?>
							</select>
							-
							<select name="birth_day" style="width:60px;">
								<?php
									for($i=1 ; $i<=31;$i++)
									{
								?>
									<option value="<?php echo $i;?>" <?php if($birth_date[2] == $i) echo "selected";?>><?php echo $i;?></option>
								<?php		
									}
								?>
							</select>
						</td>
						
						<td>
							صلة القربى:
						</td>
						<td>
							<select name="relationship" id="relationship">
								<option value="father" <?php  if($family_member['relationship'] == "father") echo 'selected';?>>أب</option>
								<option value="mother" <?php  if($family_member['relationship'] == "mother") echo 'selected';?>>أم</option>
								<option value="husband" <?php  if($family_member['relationship'] == "husband") echo 'selected';?>>زوج</option>
								<option value="wife" <?php  if($family_member['relationship'] == "wife") echo 'selected';?>>زوجة</option>
								<option value="brother" <?php  if($family_member['relationship'] == "brother") echo 'selected';?>>أخ</option>
								<option value="sister" <?php  if($family_member['relationship'] == "sister") echo 'selected';?>>أخت</option>
								<option value="son" <?php  if($family_member['relationship'] == "son") echo 'selected';?>>إبن</option>
								<option value="daughter" <?php  if($family_member['relationship'] == "daughter") echo 'selected';?>>إبنه</option>
								<option value="other" <?php  if($family_member['relationship'] == "other") echo 'selected';?>>غير ذلك</option>	
							</select>														
						</td>
					</tr>
					
					<tr>												
						<td>
							الوضع الصحي:
						</td>
						
						<td>							
							<select name="health_status" id="health_status">
								<option value="healthy" <?php  if($family_member['health_status'] == "healthy") echo 'selected';?>>سليم</option>
								<option value="disabled" <?php  if($family_member['health_status'] == "disabled") echo 'selected';?>>عاجز</option>
								<option value="sick" <?php  if($family_member['health_status'] == "sick") echo 'selected';?>>مريض</option>
								<option value="sustenance" <?php  if($family_member['health_status'] == "sustenance") echo 'selected';?>>إعالة</option>
								<option value="pregnant" <?php  if($family_member['health_status'] == "pregnant") echo 'selected';?>>حامل</option>
								<option value="other" <?php  if($family_member['health_status'] == "other") echo 'selected';?>>غير ذلك</option>
							</select>
						</td>											
					</tr>
					
					<tr>
						<td>
							العمل والمهنة:
						</td>
						
						<td>
							<select name="job" id="job">
								<option value="unemployed" <?php  if($family_member['job'] == "unemployed") echo 'selected';?>>عاطل عن العمل</option>
								<option value="employed"<?php  if($family_member['job'] == "employed") echo 'selected';?>>موظف</option>
								<option value="freelance" <?php  if($family_member['job'] == "freelance") echo 'selected';?>>عمل حر</option>
							</select>							
						</td>
						
						<td>
							الوضع الدراسي:
						</td>
						<td>
							<select name="study_status" id="study_status">
								<option value="illiterate" <?php  if($family_member['study_status'] == "illiterate") echo 'selected';?>>جاهل</option>
								<option value="intermediate" <?php  if($family_member['study_status'] == "intermediate") echo 'selected';?>>شهادة متوسطة</option>
								<option value="secondary" <?php  if($family_member['study_status'] == "secondary") echo 'selected';?>>شهادة ثانوية</option>
								<option value="university" <?php  if($family_member['study_status'] == "university") echo 'selected';?>>شهادة جامعية</option>
							</select>							
						</td>
					</tr>
					
					<tr>
						<td>
							الوضع الاجتماعي:
						</td>
						<td>							
							<select name="social_status" id="social_status">
								<option value="married" <?php  if($family_member['social_status'] == "married") echo 'selected';?>>متزوج(ة)</option>
								<option value="single" <?php  if($family_member['social_status'] == "single") echo 'selected';?>>عازب(ة)</option>
								<option value="divorced" <?php  if($family_member['social_status'] == "divorced") echo 'selected';?>>مطلق(ة)</option>
								<option value="fatherless" <?php  if($family_member['social_status'] == "fatherless") echo 'selected';?>>يتيم(ة)</option>
								<option value="widow" <?php  if($family_member['social_status'] == "widow") echo 'selected';?>>أرمل(ة)</option>
								<option value="other" <?php  if($family_member['social_status'] == "other") echo 'selected';?>>غير ذلك</option>
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





<script>
	/*this script will show and hide select options depending on gender*/
	$(document).ready(function(){
		$("#gender").change(function(){
			gender = $('#gender').find(":selected").val();			
			if(gender == "F")
			{
				//hide male relations 
				$("#relationship option[value = 'father']").hide();	
				$("#relationship option[value = 'husband']").hide();
				$("#relationship option[value = 'brother']").hide();
				$("#relationship option[value = 'son']").hide();
				
				//show female relations
				$("#relationship option[value = 'mother']").show();	
				$("#relationship option[value = 'wife']").show();
				$("#relationship option[value = 'sister']").show();
				$("#relationship option[value = 'daughter']").show();
				
				$("#relationship option[value = 'mother']").selected = true;
			}
			else
			{
				//show male relations				
				$("#relationship option[value = 'father']").show();	
				$("#relationship option[value = 'husband']").show();
				$("#relationship option[value = 'brother']").show();
				$("#relationship option[value = 'son']").show();
				
				
				//hide female relations
				$("#relationship option[value = 'mother']").hide();	
				$("#relationship option[value = 'wife']").hide();
				$("#relationship option[value = 'sister']").hide();
				$("#relationship option[value = 'daughter']").hide();
			}
			
			
		});
	});
</script>