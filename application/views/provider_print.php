<style>
	table tr td { padding:5px;}
	table tr th { padding:5px; background-color:#ccc;}
	table {width:100%;}
	
	
</style>

<table dir="rtl" border="1px" cellpadding="0" cellspacing="0">	
	<tr>
		<!-- full name -->
		<td>
			الاسم الثلاثي:
		</td>
		<td>
			<?php echo $provider['full_name'];?>
		</td>
		
		
		<!-- area -->
		<td>
			المنطقة التابع لها:
		</td>
		<td>
			<?php echo $area[0]['name'];?>
		</td>
	</tr>
	
	<tr>
		<th>
			الرقم الوطني
		</th>
		
		<th>
			دفتر عائلة
		</th>
		
		<th>
			الحرف
		</th>
		
		<th>
			الرقم الأسري
		</th>
		
		<th>
			بيان عائلي
		</th>	
	</tr>
	
	<tr>
		<td >
			<?php echo $provider['national_id'];?>
		</td>	
		
		<td>
			<?php echo $provider['family_book_num'];?>
		</td>
		
		<td>
			<?php echo $provider['family_book_letter'];?>
		</td>
		
		<td>
			<?php echo $provider['family_book_family_number'];?>
		</td>
		
		<td>
			<?php echo $provider['family_book_note'];?>
		</td>
	</tr>
	
	<tr>
		<td>
			العنوان السابق:
		</td>
		
		<td colspan="4">
			<?php echo $provider['prev_address'];?>
		</td>
	</tr>
	
	<tr>
		<td>
			العنوان الحالي:
		</td>
		
		<td colspan="4">
			<?php echo $provider['current_address'];?>
		</td>
	</tr>
	
	<tr>
		<td>
			الشارع:
		</td>
		<td colspan="2">
			<?php echo $provider['street'];?>
		</td>
		
		<td>
			بناء:
		</td>
		
		<td>
			<?php echo $provider['build'];?>
		</td>
	</tr>
		
	<tr>
		<td class="title-td">
			نقطة علام:
		</td>
		<td colspan="2">
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
		<td>
			هاتف 1:
		</td>
		<td colspan="2">
			<?php echo $provider['phone1'];?>
		</td>
		
		<td>
			هاتف 2:
		</td>
		<td>
			<?php echo $provider['phone2'];?>
		</td>						
	</tr>
	
	<tr class="odd">
		<td>
			موبايل 1:
		</td>
		<td colspan="2">
			<?php echo $provider['mobile1'];?>
		</td>
		
		<td>
			موبايل 2:
		</td>
		
		<td>
			<?php echo $provider['mobile2'];?>
		</td>
	</tr>
	
</table>

	
<br/>	
	
<!-- family member -->	
<table dir="rtl" border="1px" cellpadding="0" cellspacing="0">			
	<tr>
		<th>
			#
		</th>
		
		<th>
			الاسم الثلاثي
		</th>
		
		<th>
			صلة القربى
		</th>
		
		<th>
			التولد
		</th>
		
		<th>
			الجنس
		</th>
		
		<th>
			نازح\مقيم
		</th>
		
		<th>
			العمل
		</th>
		
		<th>
			الوضع الدراسي
		</th>
		
		<th>
			الوضع الاجتماعي 
		</th>
		
		<th>
			الوضع الصحي
		</th>
		
		<th>
			ملاحظات
		</th>		
	</tr>
	
	<?php
	$i=1; 
	foreach($family_members as $family_member)
	{
	?>		
		<tr>
			
			<td>
				<?php echo $i;$i++?>
			</td>
						
			<td>
				<?php echo $family_member['full_name'];?>
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
			
			
			<td>													
				<?php echo $family_member['birth_date'];?>
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
			
			
			<td>
				<?php echo $family_member['job'];?>
			</td>
			
			<td>
				<?php echo $family_member['study_status'];?>							
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
			
			<td>
				<?php echo $family_member['note'];?>
			</td>
		</tr>
	
	<?php	
	}
	?>
</table>


<br/>
<img  width="250px" src="<?php echo base_url();?>files/barcode/<?php echo $provider['code'];?>.png" />

						
<br/>					
FWMK					
					
					
					
	<!--				
					
					<tr>
						<td class="title-td">
							ملاحظات:
						</td>
						<td colspan="3"> 
							<?php echo $provider['note'];?>
						</td>
					</tr>
					<tr class="odd">
						<td class="title-td">
							الباركود:
						</td>
						<td colspan="5">
							<img src="<?php echo base_url();?>files/barcode/<?php echo $provider['code'];?>.png" />
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
				<?php }?>	  -->	