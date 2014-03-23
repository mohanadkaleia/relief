<!DOCTYPE html>

<html lang="en">
	
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="Relief Managment system" />
    <meta name="abstract" content="Relief Managment system" />
    <meta name="keywords" content="relief , managment , web based" />   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<link href="<?php echo base_url(); ?>fav_icon.ico" rel="shortcut icon" type="image/x-icon" />
	
	<title><?php echo $provider['full_name'];?></title>
	
	
	<style>
		table tr td { padding:5px;}
		table tr th { padding:5px; background-color:#ccc;}
		table {width:100%;}		
		td , th {border:1px solid gray;min-width: 50px;}
		body{font-size:9px;}
		table.info tr th{background-color:white; border:0px;height:25px;}
	</style>	
	  
</head>
		
<body dir="rtl">				

<table dir="rtl" cellpadding="0px" cellspacing="0px" class="info">
	<tr>
		<th>
			<h1><?php echo $association["name"];?></h1>
		</th>
		
		<th>
			<h1>استمارة كشف للمعيل</h1>
		</th>
		
		<th>
			<img src="<?php echo base_url();?>files/<?php echo $association["code"];?>/<?php echo $association["code"];?>.jpg" height="50px"/>
		</th>
	</tr>
</table>

<br/>
<table dir="rtl" cellpadding="0px" cellspacing="0px">	
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
<table dir="rtl" cellpadding="0px" cellspacing="0px">			
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

<table dir="rtl" cellpadding="0px" cellspacing="0px" style="width:50%; float:right ; margin-left:2%;">
	<tr>
		<th rowspan="2">
			العدد الإجمالي
		</th>
		
		<th colspan="2">
			ذكور
		</th>
		
		<th colspan="3">
			إناث
		</th>
	</tr>
	
	<tr>
		<th>
			12 فما دون
		</th>
		
		<th>
			فوق 12
		</th>
		
		<th>
			دون 12 سنة
		</th>
		
		<th>
			بين 12 و 45
		</th>
		
		<th>
			فوق 45
		</th>
	</tr>
	
	<tr>
		<td>
			<?php echo count($family_members);?>
		</td>
		
		<?php 
				/** calculate age **/
				
				//define age varialbe
				$male_above_12 = 0;
				$male_below_12 = 0;
				
				$female_below_12 = 0;
				$female_between_12_45 = 0;
				$female_above_45 = 0;
				
				//babies
				$babies_below_3 = 0;
				$baby_below_6 = 0;
				$baby_6_12 = 0;
				$baby_1_2 = 0;
				
				foreach($family_members as $family_member)
				{
					  $birth_date = $family_member["birth_date"];
					  //explode the date to get month, day and year
					  $birthDate = explode("-", $birth_date);
					  
					 
					  //get age from date or birthdate
					  $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
					    ? ((date("Y") - $birthDate[0]) - 1)
					    : (date("Y") - $birthDate[0]));					  					  
					  if($age <= 12 && $family_member["gender"] == "M")
					  	$male_below_12++;
					  else if($age > 12 && $family_member["gender"] == "M")
					  	$male_above_12++;
					  else if($age < 12 && $family_member["gender"] == "F")
					  	$female_below_12++;
					  else if($age >= 12 && $age < 45 && $family_member["gender"] == "F")
					  	$female_between_12_45++;
					  else if($age < 45 && $family_member["gender"] == "F")
					  	$female_above_45++;
					  
					  
					  if($age < 3)
					  {
							$babies_below_3++;
								
							$birthday = new DateTime($birth_date);
							$diff = $birthday->diff(new DateTime());
							$months = $diff->format('%m') + 12 * $diff->format('%y');	
							
							if($months < 6)
								$baby_below_6++;
							else if($monthes >=6 && $months<=12)
								$baby_6_12++;				  	
							else if($age >=1 && $age<=2)
								$baby_1_2++;
					  }

				}
			?>

		
				
		<!-- below 12 -->
		<td>
			<?php echo $male_below_12;?>
		</td>
		
		<!-- above 12 -->
		<td>
			<?php echo $male_above_12;?>
		</td>
		
		<!-- female below 12 -->
		<td>
			<?php echo $female_below_12;?>
		</td>
		
		<!-- female 12 - 45 -->
		<td>
			<?php echo $female_between_12_45;?>
		</td>
		
		<!-- female > 45 -->
		<td>
			<?php echo $female_above_45;?>
		</td>		
	</tr>
</table>


<table cellpadding="0" cellspacing="0" style="width:48%;">
	<tr>
		<th rowspan="2">
			حالات خاصة
		</th>
		
		<th colspan="3">
			الرضع
		</th>		
	</tr>
	
	<tr>
		<th>
			دون 6 أشهر
		</th>
		
		<th>
			بين 6 أشهر و 12 شهر
		</th>
		
		<th>
			بين 1 -2 سنة
		</th>
	</tr>
	
	<tr>
		<td>
			<?php echo $babies_below_3;?>
		</td>
		
		<td>
			<?php echo $baby_below_6;?>
		</td>
		
		<td>
			<?php echo $baby_6_12;?>
		</td>
		
		<td>
			<?php echo $baby_1_2;?>
		</td>
	</tr>
	
</table>

<br/>

<table cellspacing="0px" cellspacing="0px" style="width:50%;float:right;margin-left:2%;">
	<tr>
		<th>
			عدد الفرش المتوفرة
		</th>
		
		<td>
			
		</td>
		
		<th>
			عدد البطانيات المتوفرة
		</th>
		
		<td>
			
		</td>
	</tr>
	
	<tr>
		<th>
			احتياجات اخرى
		</th>
		
		<td colspan="3">
			
		</td>
	</tr>
	
	<tr>
		<th>
			ملاحظات المقيم
		</th>
		
		<td colspan="3">
			
		</td>
	</tr>
</table>

<table cellspacing="0px" cellspacing="0px" style="width:48%;">
	<tr>
		<th>
			رقم التقييم
		</th>
		
		<th>
			تقييم العائلة
			<br>
			A - B - C
		</th>
		
		<th>
			محرر الاستمارة
		</th>
		
		<th>			
			تاريخ التقييم
		</th>
	</tr>
	
	<tr>
		<td>1</td> <td></td> <td></td> <td></td>		
	</tr>
	
	<tr>
		<td>2</td> <td></td> <td></td> <td></td>		
	</tr>
	
	<tr>
		<td>3</td> <td></td> <td></td> <td></td>		
	</tr>
	
	<tr>
		<td>4</td> <td></td> <td></td> <td></td>		
	</tr>
	
</table>

<br/>
<img  width="250px" src="<?php echo base_url();?>files/barcode/<?php echo $provider['code'];?>.png" />




						
<br/>					
FWMK					
					
</body>

</html>					
	