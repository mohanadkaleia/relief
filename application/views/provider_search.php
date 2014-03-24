


<div class="container">
	
	<div class="hero-unit">
		
		<!-- breacrumb -->
  		<ul class="breadcrumb">
		  <li><a href="<?php echo base_url();?>dashboard">الرئيسية</a> <span class="divider">/</span></li>			  		  
		  <li><a href="<?php echo base_url();?>provider">إدارة معيل</a> <span class="divider">/</span></li>
		  <li class="active">بحث عن معيل</li>
		</ul>
		
		<h3 class="title">بحث عن معيل</h3>	 
		
		<form method="post" action="<?php echo base_url();?>provider/searchData">
			<table class="table">								
				<tr>
					<td>
						الاسم:			
					</td>
					<td>
						<input type="text" name="fname" placeholder="الاسم" />
					</td>
					
					<td>
						الكنية:
					</td>
					<td>
						<input type="text" name="lname" placeholder="الكنية" />
					</td>										
				</tr>
				
				<tr>
					<td>
						المنطقة:
					</td>
					
					<td>
						<select name="area">
							<option value="all">الكل</option>
							<?php
								foreach($areas as $area)
								{
							?>
									<option value="<?php echo $area["id"];?>"><?php echo $area["name"];?></option>
							<?php										
								} 
							?>							
						</select>
					</td>
					
					<td>
						الرقم الوطني:
					</td>
					
					<td>
						<input type="text" name="national_id"/>
					</td>
				</tr>
				
				<tr>
					<td>
						دفتر العائلة:
					</td>
					
					<td>
						<input type="text" name="family_book_num"/>
					</td>
					
					<td>
						الحرف:
					</td>
					
					<td>
						<input type="text" name="family_book_letter"/>
					</td>										
				</tr>
				
				<tr>
					<td>
						الرقم الأسري:
					</td>
					
					<td>
						<input type="text" name="family_book_family_number" />
					</td>														
				</tr>
				
				<tr>
					<td>
						عدد أفراد الأسرة:
					</td>
					
					<td>
						<<input type="number" name="family_less"/>
					</td>
					
					<td>
						><input type="number" name="family_big"/>
					</td>
					
					<td>
						=<input type="number" name="family_equal"/>
					</td>
				</tr>
				
				
				<tr>
					<td>
						تاريخ التسجيل:
					</td>									
					
					<td>
						<						
						<input type="date" name="register_date_less" />
					</td>
					
					<td>
						>
						<input type="date" name="register_date_bigger" />
					</td>
					
					<td>
						=
						<input type="date" name="register_date_equal"/>
					</td>
				</tr>
				
				<tr>
					<td>
						<input type="submit" value="بحث" class="btn btn-info"/>		
					</td>
				</tr>
				
			</table>									
		</form>
		
		<br/>
		<?php			
			if(isset($providers) && $providers != "")
			{
		?>
		
		<table class="table">
			<tr>
				<th>
					الاسم
				</th>
				
				<th>
					الكنية
				</th>
				<th>
					الرقم الوطني
				</th>
				<th>
					تاريخ التسجيل
				</th>
			</tr>
			
			<?php
				foreach($providers as $provider)
				{
			?>
					<tr>
						<td>
							<?php echo $provider["fname"];?>
						</td>
						
						<td>
							<?php echo $provider["lname"];?>
						</td>
						
						<td>
							<?php echo $provider["national_id"];?>
						</td>
						
						<td>
							<?php echo $provider["created_date"];?>
						</td>
					</tr>
			<?php
				}			
			?>	
		</table>
		
		<?php		
				
			}
		?>
		
	
		
	</div> <!-- end hero uit -->	
	
	
</div> <!-- end container -->

