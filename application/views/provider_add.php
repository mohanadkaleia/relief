<div  class="row-fluid">	  	
	  	<div class="span8 main-content offset2">
	  		
	  		<!-- breacrumb -->
	  		<ul class="breadcrumb">
			  <li><a href="<?php echo base_url();?>dashboard">الرئيسية</a> <span class="divider">/</span></li>			  
			  <li><a href="<?php echo base_url();?>provider">إدارة معيل</a> <span class="divider">/</span></li>
			  <li class="active">إضافة معيل</li>
			</ul>
	  		
			<h1>إضافة معيل</h1>  
			
			<?php
				if($message<>"")
				{
			?>
					<br/>
					<div class="alert alert-error">
						<?php echo $message;?>
					</div>		
			<?php		
				}	
			?>
			
			
			<!-- excel sheet configuration form -->
			<form method="post" action="<?php echo base_url();?>provider/saveData/add" enctype="multipart/form-data">
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
									<option value="<?php echo $value['code'];?>"><?php echo $value['name'];?></option>
								<?php	
								}
								?>
								
							</select>														
						</td>
						
						
						<td>
							وضع السكن:
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
						</td>
						<td>
							<!--<input type="button" class="btn btn-info" value="إضافة بيانات من الباركود" onclick="getData();"/>-->
						</td>
					</tr>
										
					<tr>
						<td>
							الاسم: *
						</td>
						
						<td>
							
								<input type="text" name="fname" id="fname" required/>
							
							<!--
							<select name="fname" id="fname">
								<option value="محمد">محمد	</option>
								<option value="عبد ">عبد </option>
								<option value="عبد الرحمن">عبد الرحمن</option>								
							</select>
							
							<script>
								$("#fname").combify();
							</script>
							-->
						</td>
						
						<td>
							الكنية: *
						</td>
						
						<td>
							<input type="text" name="lname" id="lname" required/>
						</td>
						
						
					</tr>
					
					<tr>
						
						<td>
							اسم الأب: *
						</td>
						
						<td>
							<input type="text" name="father_name" id="father_name" required/>
						</td>
					
						<td>
							اسم الأم:
						</td>
						<td>
							<input type="text" name="mother_name" id="mother_name"/>
						</td>
					</tr>
					
					<tr>
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
							الرقم الوطني: *
						</td>
						
						<td>
							<input type="text" name="national_id" id="national_id" required/>
							<br/>
							
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
						
						
						<td>
							التولد:							
						</td>
						<td>
							<input type="date" name="birth_date"/>
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
							<input type="text" name="family_book_letter" placeholder="يترك فارغاً في دفتر العائلة الجديد"/>
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
							<input type="text" name="current_address"/>
						</td>
						
						<td>
							العنوان السابق:
						</td>
						<td>
							<input type="text" name="prev_address"/>
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
						<td colspan="3"> 
							<textarea name="note"></textarea>
						</td>
					</tr>
					
					<tr>
						<td>
							<input type="submit" name="save" class="btn btn-info" value="احفظ"/>							
							<input type="button" class="btn btn-default" value="إلغاء" name="cencel_settings" onclick="window.location='<?php echo base_url()?>provider'" />
						</td>
					</tr>
					<!--
					<tr>
						<td>
							
						</td>
						<td></td>
						<td>رابط الموبايل:</td>
						<td>
							http://<?php echo gethostbyname(trim(`hostname`));?>:8080/relief/mobile
						</td>
					</tr>
					-->
				</table>
			</form>
	  	</div>
	  
	</div>
<script>
/*$(document).ready(function(){
	var timer;
			$('input:checkbox').change(function () {
				if ($('input:checkbox').is(":checked")) {
					timer = setInterval('getData()',1000);
				} else{
					clearInterval(timer);
				}
			});
		});*/
		
		function getData(){
			$.get('<?php echo base_url();?>provider/getBarcodeData',function(data){
				//alert(data);
				a = data.split(',');
				//alert(a[1]);
				if(a.length>5){
					$('input#fname').val(a[0]);
					$('input#lname').val(a[1]);
					$('input#father_name').val(a[2]);
					$('input#national_id').val(a[5]);
				}
			});
		}
</script>