<div  class="row-fluid">	  	
	  	<div class="span8 main-content offset2">
			
			<!-- breacrumb -->
	  		<ul class="breadcrumb">
			  <li><a href="<?php echo base_url();?>dashboard">الرئيسية</a> <span class="divider">/</span></li>			  
			  <li><a href="<?php echo base_url();?>family_member">إدارة أفراد الأسرة</a> <span class="divider">/</span></li>
			  <li class="active">إضافة فرد أسرة للمعيل</li>
			</ul>
			
			<h1>إضافة فرد أسرة للمعيل:<?php echo $provider[0]['full_name'];?></h1>  
			
			
			<!-- excel sheet configuration form -->
			<form method="post" action="<?php echo base_url();?>family_member/saveData/add" enctype="multipart/form-data">
			<table>
				<?php if($provider!== 0){?>
					<!-- provider code -->
					<input type="hidden" name="provider_code" value="<?php echo $provider[0]['code'];?>"/>
					
					<!-- provider name -->
					<input type="hidden" name="provider_name" value="<?php echo $provider[0]['full_name'];?>"/>
				<?php }else{?>
					<tr>
						<td>
							اسم المعيل الثلاثي:
						</td>
						
						<td>
							<input type="text" name="provider_name" />
						</td>
						<td>
							رمز المعيل:
						</td>
						
						<td>
							<input type="text" name="provider_code" />
						</td>
					</tr>
				<?php }?>
				
				
					<tr>
						<td>
							الرقم الوطني:
						</td>
						
						<td colspan="2">
							<input type="text" name="national_id" id="national_id"/>
							
							<input name="randomNationalId" id="randomNationalId" type="checkbox" value="true"/>توليد رقم عشوائي
							<script>
								$( "#randomNationalId" ).change(function() {
									if($(this).is(':checked')) 
									{
										var current_time = ((new Date).getTime());
										
										current_time = current_time.toString();
										
										
										random = "R" + current_time.slice(3);
										
										
										$("#national_id").val(random);								      	
								    }
								    else
								    {
								    	$("#national_id").val("");
								    }
								});							
							</script>
							
						</td>
					</tr>
				
				
					<tr>
						<td>
							الاسم:
						</td>
						
						<td>
							<input type="text" name="fname" required/>
						</td>
						
						<td>
							الكنية:
						</td>
						
						<td>
							<input type="text" name="lname" value="<?php echo $provider[0]['lname'];?>" required/>
						</td>
					</tr>
					<tr>
						<td>
							اسم الأب
						</td>
						
						<td>
							<input type="text" name="father_name" required value="<?php echo $provider[0]['fname'];?>"/>
						</td>											
						
						<td>
							الجنس:
						</td>
						
						<td>							
							<select name="gender" id="gender">
								<option value="M">ذكر</option>
								<option value="F">أنثى</option>
							</select>							
						</td>
					</tr>
					
					<tr>
						<td>
							التولد:
						</td>
						
						<td dir="ltr" align="right">																				
							<select name="birth_year" style="width:70px;">
								<?php
									for($i=1900 ; $i<=date(Y);$i++)
									{
								?>
									<option value="<?php echo $i;?>"><?php echo $i;?></option>
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
									<option value="<?php echo $i;?>"><?php echo $i;?></option>
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
									<option value="<?php echo $i;?>"><?php echo $i;?></option>
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
								<option value="father">أب</option>
								<option value="mother">أم</option>
								<option value="husband">زوج</option>
								<option value="wife">زوجة</option>
								<option value="brother">أخ</option>
								<option value="sister">أخت</option>
								<option value="son">إبن</option>
								<option value="daughter">إبنه</option>	
								<option value="other">غير ذلك</option>															
							</select>														
						</td>
					</tr>
					
					<tr>						
						
						<td>
							الوضع الصحي:
						</td>
						
						<td>							
							<select name="health_status">
								<option value="healthy">سليم</option>
								<option value="disabled">عاجز</option>
								<option value="sick">مريض</option>
								<option value="sustenance">إعالة</option>
								<option value="pregnant">حامل</option>
								<option value="other">غير ذلك</option>
							</select>
						</td>
												
					</tr>
					
					<tr>
						<td>
							العمل والمهنة:
						</td>
						
						<td>
							<select name="job">
								<option value="unemployed">عاطل عن العمل</option>
								<option value="employed">موظف</option>
								<option value="freelance">عمل حر</option>
							</select>							
						</td>
						
						<td>
							الوضع الدراسي:
						</td>
						<td>
							<select name="study_status">
								<option value="illiterate">جاهل</option>
								<option value="intermediate">شهادة متوسطة</option>
								<option value="secondary">شهادة ثانوية</option>
								<option value="university">شهادة جامعية</option>
							</select>												
						</td>
					</tr>
					
					<tr>
						<td>
							الوضع الاجتماعي:
						</td>
						<td>							
							<select name="social_status">
								<option value="married">متزوج</option>
								<option value="single">عازب</option>
								<option value="divorced">مطلق</option>
								<option value="fatherless">يتيم</option>
								<option value="widow">أرملة</option>
								<option value="other">غير ذلك</option>
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


<script>
	/*this script will show and hide select options depending on gender*/
	$(document).ready(function(){
		
		//initialize the relationship options with the male default options by hiding the female relations		
		$("#relationship option[value = 'mother']").hide();	
		$("#relationship option[value = 'wife']").hide();
		$("#relationship option[value = 'sister']").hide();
		$("#relationship option[value = 'daughter']").hide();  
		
		
				
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