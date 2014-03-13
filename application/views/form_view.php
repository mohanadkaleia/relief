<table border="0px" cellpadding="5px" cellspacing="0" dir="rtl" style="width:550px;">											
	<tr>
		<td>
			رمز المعيل:
		</td>
		
		<td>
			<?php echo $provider["code"];?>
		</td>
	</tr>
	
	<tr class="odd">
		<td class="title-td">
			الاسم الثلاثي الكامل:
		</td>
			
		<td colspan="3">
			<?php echo $provider['full_name'];?>
		</td>		
	</tr>
	
	
	<tr>
		<td>
			عدد أفراد الأسرة:
		</td>
		
		<td>
			<?php echo count($family);?>
		</td>
	</tr>
						
	<tr>		
		<td class="title-td">
			المنطقة:
		</td>
		<td >
			<?php echo $area[0]['name'];?>
		</td>
	</tr>
	
	<tr>	
		<td class="title-td">
			العنوان السابق:
		</td>
		<td>
			<?php echo $provider['prev_address'];?>
		</td>
	</tr>
	
	
	<tr class="odd">
		<td class="title-td">
			العنوان الحالي:
		</td>
		
		<td>
			<?php echo $provider['current_address'];?>
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
			الرقم الوطني:
		</td>
		
		<td >
			<?php echo $provider['national_id'];?>
		</td>
	</tr>
	
	
	<tr>
		<td class="title-td">
			هاتف:
		</td>
		<td>
			<?php echo $provider['phone1'];?>
		</td>
		
		<td class="title-td">
			موبايل:
		</td>
		<td>
			<?php echo $provider['mobile1'];?>
		</td>						
	</tr>
	
	
	<tr class="odd">
		<td class="title-td">
			رقم دفتر العائلة:
		</td>
		
		<td>
			<?php echo $provider['family_book_num'];?>
		</td>		
	</tr>

	<tr class="odd">
		<td class="title-td">
			تاريخ التسجيل:
		</td>
		
		<td>
			<?php echo $provider['created_date'];?>
		</td>		
	</tr>
	
	<tr class="odd">	
		<td colspan="4">
			<img src="<?php echo base_url();?>files/barcode/<?php echo $provider['code'];?>.png" />
		</td>		
	</tr>	
</table>

