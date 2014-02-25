<div  class="row-fluid">	  	
	  	<div class="span8 main-content offset2">
			<h1>بيانات المعيل <?php echo $provider['code'];?>#</h1>  
			 <br />
				<table id="details">									
					
					<tr class="odd">
						<td class="title-td">
							الاسم الثلاثي الكامل:
						</td>
							
						<td colspan="3">
							<?php echo $provider['full_name'];?>
						</td>
						
					</tr>
										
					<tr >
						
						<td class="title-td">
							المنطقة:
						</td>
						<td >
							<?php echo $area[0]['name'];?>
						</td>
						
						<td class="title-td">
							الرقم الوطني:
						</td>
						
						<td >
							<?php echo $provider['national_id'];?>
						</td>
					</tr>
					
					<tr class="odd">
						<td class="title-td">
							رقم دفتر العائلة:
						</td>
						
						<td>
							<?php echo $provider['family_book_num'];?>
						</td>
						
						<td class="title-td">
							الحرف:
						</td>
						<td>
							<?php echo $provider['family_book_letter'];?>
						</td>
					</tr>
					
					<tr>
						<td class="title-td">
							الرقم الأسري:	
						</td>
						
						<td>
							<?php echo $provider['family_book_family_number'];?>
						</td>
						
						<td class="title-td">
							بيان عائلي:
						</td>
						<td>
							<?php echo $provider['family_book_note'];?>
						</td>						
					</tr>
					
					<tr class="odd">
						<td class="title-td">
							العنوان الحالي:
						</td>
						
						<td>
							<?php echo $provider['current_address'];?>
						</td>
						
						<td class="title-td">
							العنوان السابق:
						</td>
						<td>
							<?php echo $provider['prev_address'];?>
						</td>
					</tr>
					
					<tr>
						<td class="title-td">
							الشارع:
						</td>
						<td>
							<?php echo $provider['street'];?>
						</td>
						
						<td class="title-td">
							بناء:
						</td>
						
						<td>
							<?php echo $provider['build'];?>
						</td>
					</tr>
					
					<tr class="odd">
						<td class="title-td">
							نقطة علام:
						</td>
						<td>
							<?php echo $provider['point_guide'];?>
						</td>
						
						<td class="title-td">
							طابق:
						</td>
						<td>
							<?php echo $provider['floor'];?>
						</td>
					</tr>
					
					<tr>
						<td class="title-td">
							هاتف 1:
						</td>
						<td>
							<?php echo $provider['phone1'];?>
						</td>
						
						<td class="title-td">
							هاتف 2:
						</td>
						<td>
							<?php echo $provider['phone2'];?>
						</td>						
					</tr>
					
					<tr class="odd">
						<td class="title-td">
							موبايل 1:
						</td>
						<td>
							<?php echo $provider['mobile1'];?>
						</td>
						
						<td class="title-td">
							موبايل 2:
						</td>
						
						<td>
							<?php echo $provider['mobile2'];?>
						</td>
					</tr>
					
					<tr>
						<td class="title-td">
							ملاحظات:
						</td>
						<td colspan="3"> 
							<?php echo $provider['note'];?>
						</td>
					</tr>
					<tr></tr>
				</table>
				
				<h1>أفراد العائلة</h1> 
				<?php	$i = 0;
						foreach($family_members as $family_member){?>
							<br />
							<?php echo '#'. ++$i;?>
				<table id="details">
					<tr class="odd">
						<td class="title-td">
							الاسم الثلاثي:
						</td>
						
						<td>
							<?php echo $family_member['full_name'];?>
						</td>
						
						<td class="title-td">
							الجنس:
						</td>
						
						<td>			
							<?php switch ($family_member['gender']){
									case "M":
									echo "ذكر";
									break;
									case "F":
									echo "أنثى";
									break;
								}?>										
						</td>
					
						<td class="title-td">
							التولد:
						</td>
						
						<td>													
							<?php echo $family_member['birth_date'];?>
						</td>
					</tr>
					
					<tr>
						<td class="title-td">
							صلة القربى:
						</td>
						<td>
							<?php switch ($family_member['relationship']){
									case "father":
									echo "أب";
									break;
									case "father":
									echo "أب";
									break;
									case "mother":
									echo "أم";
									break;
									case "husband":
									echo "زوج";
									break;
									case "wife":
									echo "زوجة";
									break;
									case "brother":
									echo "أخ";
									break;
									case "sister":
									echo "أخت";
									break;
									case "son":
									echo "إبن";
									break;
									case "daughter":
									echo "إبنه";
									break;
								}?>													
						</td>
										
						
						<td class="title-td">
							الوضع الصحي:
						</td>
						
						<td>	
							<?php switch ($family_member['health_status']){
									case "disabled":
									echo "عاجز";
									break;	
									case "sick":
									echo "مريض";
									break;	
									case "sustenance":
									echo "إعالة";
									break;	
									case "pregnant":
									echo "حامل";
									break;	
								}?>					
						</td>
						
						<td class="title-td">
							نازح\مقيم:
						</td>
						<td>
							<?php switch ($family_member['is_emigrant']){
									case "T":
									echo "نازح";
									break;
									case "F":
									echo "مقيم";
									break;
								}?>						
						</td>						
					</tr>
					
					<tr class="odd">
						<td class="title-td">
							العمل والمهنة:
						</td>
						
						<td>
							<?php echo $family_member['job'];?>
						</td>
						
						<td class="title-td">
							الوضع الدراسي:
						</td>
						<td>
							<?php echo $family_member['study_status'];?>							
						</td>
						
						<td class="title-td">
							الوضع الاجتماعي:
						</td>
						<td>		
							<?php switch ($family_member['social_status']){
									case "married":
									echo "متزوج";
									break;
									case "divorced":
									echo "مطلق";
									break;
									case "fatherless":
									echo "يتيم";
									break;
									case "widow":
									echo "أرملة";
									break;
								}?>
						</td>
						</tr>
					
					<tr>
						<td class="title-td">
							ملاحظات:
						</td>
						<td colspan="5">
							<?php echo $family_member['note'];?>
						</td>
						
					</tr>
				</table>
				<?php }?>
	  	</div>
	  
	</div>
