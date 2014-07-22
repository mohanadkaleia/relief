<div  class="row-fluid">	  	
	  	<div class="span8 main-content offset2">
	  		<br />
	  		
	  		<!-- breacrumb -->
	  		<ul class="breadcrumb">
			  <li><a href="<?php echo base_url();?>dashboard">الرئيسية</a> <span class="divider">/</span></li>			  			  
			  <li class="active">استيراد\تصدير</li>
			</ul>
	  		
			<h1>نتائج الاستيراد</h1>  
			<br/>
			
			
			<!-- summary -->
			<h1>خلاصة الاستيراد</h1>
			
			<table class="table table-striped">
				<tr>
					<th>
						عدد المعيلين الكلي
					</th>
					
					<th>
						عدد المعيلين الموجودين مسبقاً
					</th>
					
					<th>
						عدد أفراد الأسرة
					</th>
					
					<th>
						عدد المناطق
					</th>
					
					<th>
						عدد الجمعيات
					</th>
					
					
				</tr>
				
				<tr>
					<td>
						<?php echo count($providers);?>
					</td>
					
					<td>
						<?php echo count($duplicated_providers);?>
					</td>
					
					<td>
						<?php echo count($family_members);?>
					</td>
					
					<td>
						<?php echo count($areas);?>
					</td>
					
					<td>
						<?php echo count($associations);?>
					</td>
				</tr>
				
				
			</table>
			
			<form method="post" action="<?php echo base_url();?>migrate/importApprove">
				<input type="hidden" name="excel_file" value="<?php echo $excel_file;?>" />
				<input type="submit" value="تأكيد استيراد البيانات" class="btn btn-info"/>	
			</form>
			
			
			
			<h1>التفاصيل</h1>
			
			<!-- provider table -->
			<h2>معلومات المعيلين الكليين</h2>
			<table class="table table-striped">
				<tr>
					<th>
						الاسم الكامل
					</th>
					
					<th>
						الرمز
					</th>
					
					<th>
						الجنس
					</th>
					
					<th>
						التولد
					</th>
				</tr>
				
				<?php
					foreach($providers as $provider)
					{
				?>
						<tr>
							<td>
								<?php echo $provider["fname"]. " " . $provider["lname"];?>
							</td>
							
							<td>
								<?php echo $provider["code"];?>
							</td>
							
							<td>
								<?php echo $provider["gender"];?>
							</td>
							
							<td>
								<?php echo $provider["birth_date"];?>
							</td>
						</tr>
				<?php		
					}
				?>
				
			</table>
				
			<!-- provider table -->
			<h2>معلومات المعيلين الموجودين مسبقاً في قاعدة البيانات والذي سيتم تعديل بياناتهم فقط</h2>
			<table class="table table-striped">
				<tr>
					<th>
						الاسم الكامل
					</th>
					
					<th>
						الرمز
					</th>
					
					<th>
						الجنس
					</th>
					
					<th>
						التولد
					</th>
				</tr>
				
				<?php
					foreach($duplicated_providers as $duplicated_provider)
					{
				?>
						<tr>
							<td>								
								<?php echo $duplicated_provider["fname"]. " " . $duplicated_provider["lname"];?>
							</td>
							
							<td>
								<?php echo $duplicated_provider["code"];?>
							</td>
							
							<td>
								<?php echo $duplicated_provider["gender"];?>
							</td>
							
							<td>
								<?php echo $duplicated_provider["birth_date"];?>
							</td>
						</tr>
				<?php		
					}
				?>
				
			</table>
			
			
			<!-- family member table -->
			<h2>معلومات أفراد الأسرة</h2>
			<table class="table table-striped">
				<tr>
					<th>
						الاسم الكامل
					</th>
					
					<th>
						الرقم الوطني
					</th>
					
					<th>
						الجنس
					</th>
					
					<th>
						التولد
					</th>
				</tr>
				
				<?php
					foreach($family_members as $family_member)
					{
				?>
						<tr>
							<td>
								<?php echo $family_member["fname"]. " " . $provider["lname"];?>
							</td>
							
							<td>
								<?php echo $family_member["national_id"];?>
							</td>
							
							<td>
								<?php echo $family_member["gender"];?>
							</td>
							
							<td>
								<?php echo $family_member["birth_date"];?>
							</td>
							
						</tr>
				<?php		
					}
				?>
				
			</table>
			
			
			
			<!-- area table -->
			<h2>معلومات المناطق</h2>
			<table class="table table-striped">
				<tr>
					<th>
						رمز المنطقة
					</th>
					
					<th>
						اسم المنطقة
					</th>					
				</tr>
				
				<?php
					foreach($areas as $area)
					{
				?>
						<tr>
							<td>
								<?php echo $area["code"];?>
							</td>
							
							<td>
								<?php echo $area["name"];?>
							</td>														
						</tr>
				<?php		
					}
				?>
				
			</table>	
			
			
			
			<!-- asociations table -->
			<h2>معلومات المناطق</h2>
			<table class="table table-striped">
				<tr>
					<th>
						رمز الجمعية
					</th>
					
					<th>
						اسم الجمعية
					</th>					
				</tr>
				
				<?php
					foreach($associations as $association)
					{
				?>
						<tr>
							<td>
								<?php echo $association["code"];?>
							</td>
							
							<td>
								<?php echo $association["name"];?>
							</td>														
						</tr>
				<?php		
					}
				?>
				
			</table>	
	  	</div>
	  
	</div>
