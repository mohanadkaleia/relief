<div class="container">
	
	<div class="hero-unit">
		
		<!-- breacrumb -->
  		<ul class="breadcrumb">
		  <li><a href="<?php echo base_url();?>dashboard">الرئيسية</a> <span class="divider">/</span></li>			  		  		  
		  <li class="active">إحصائيات</li>
		</ul>
		
		<h3 class="title">بحث عن معيل</h3>	 
				
		
		<form method="post" action="<?php echo base_url();?>provider/searchData">
			<table class="table">								
				<tr>
					<td>
						الاسم:			
					</td>
					<td>
						<input type="text" name="fname" placeholder="الاسم" value="<?php echo $this->input->post("fname");?>"/>
					</td>
					
					<td>
						الكنية:
					</td>
					<td>
						<input type="text" name="lname" placeholder="الكنية" value="<?php echo $this->input->post("lname");?>"/>
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
						<input type="text" name="national_id" value="<?php echo $this->input->post("national_id");?>"/>
					</td>
				</tr>
				
				<tr>
					<td>
						دفتر العائلة:
					</td>
					
					<td>
						<input type="text" name="family_book_num" <?php echo $this->input->post("family_book_num");?>/>
					</td>
					
					<td>
						الحرف:
					</td>
					
					<td>
						<input type="text" name="family_book_letter" value="<?php echo $this->input->post("family_book_letter");?>"/>
					</td>										
				</tr>
				
				<tr>
					<td>
						الرقم الأسري:
					</td>
					
					<td>
						<input type="text" name="family_book_family_number" value="<?php echo $this->input->post("family_book_family_number");?>"/>
					</td>														
				</tr>
				
				<tr>
					<td>
						عدد أفراد الأسرة:
					</td>
					
					<td>
						<input type="number" name="family_less" placeholder="أًصغر من" value="<?php echo $this->input->post("family_less");?>"/>
					</td>
					
					<td>
						<input type="number" name="family_big" placeholder="أكبر من" value="<?php echo $this->input->post("family_big");?>"/>
					</td>
					
					<td>
						<input type="number" name="family_equal" placeholder="مساوٍ" value="<?php echo $this->input->post("family_equal");?>"/>
					</td>
				</tr>
				
				
				<tr>
					<td>
						تاريخ التسجيل:
					</td>									
					
					<td>						
						<input type="text" name="register_date_less" placeholder="من تاريخ yyyy-mm-dd" value="<?php echo $this->input->post("register_date_less");?>"/>
					</td>
					
					<td>						
						<input type="text" name="register_date_bigger" placeholder="إلى تاريخ yyyy-mm-dd" value="<?php echo $this->input->post("register_date_bigger");?>"/>
					</td>
					
					<td>
						<input type="text" name="register_date_equal" placeholder="تاريخ محدد yyyy-mm-dd" value="<?php echo $this->input->post("register_date_equal");?>"/>
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
				<td>
					التولد
				</td>
				<td>
					عدد أفراد الأسرة
				</td>
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
							<?php echo $provider["birth_date"];?>
						</td>
						
						<td>
							<?php echo $provider["family_members"];?>
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

