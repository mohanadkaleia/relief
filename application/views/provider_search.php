


<div class="container">
	
	<div class="hero-unit">
		
		<!-- breacrumb -->
  		<ul class="breadcrumb">
		  <li><a href="<?php echo base_url();?>dashboard">الرئيسية</a> <span class="divider">/</span></li>			  		  
		  <li class="active">بحث عن معيل</li>
		</ul>
		
		<h3 class="title">بحث عن معيل</h3>	 
		
		<form method="post" action="<?php echo base_url();?>provider/searchData">
			<table>								
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
						تاريخ التسجيل:
					</td>
				</tr>
				
				<tr>
					<td>
						أكبر من:
					</td>
					<td>
						<input type="date" name="register_date_bigger" placeholder="تاريخ أكبر من"/>
					</td>
				</tr>
				
				<tr>
					<td>
						أصغر من:	
					</td>
					
					<td>						
						<input type="date" name="register_date_less" placeholder="تاريخ أصغر من"/>
					</td>
						
				</tr>
					<td>
						مساوٍ للتاريخ:
					</td>
					<td>
						<input type="date" name="register_date_equal" placeholder="تاريخ مساوي"/>
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

