<div class="container">
	
	<div class="hero-unit">
		
		<!-- breacrumb -->
  		<ul class="breadcrumb">
		  <li><a href="<?php echo base_url();?>dashboard">الرئيسية</a> <span class="divider">/</span></li>			  		  
		  <li><a href="<?php echo base_url();?>aid">إدارة المعونات</a> <span class="divider">/</span></li>
		  <li class="active">إضافة معونة</li>
		</ul>
		
		<h3 class="title">إدارة المعونات</h3>	 
		
		<div class="alert alert-info">
			<p>اختر المعونة والمعيل الذي سيتم تسليم المعونة له</p>	
		</div>
		
		
		<form method="post" action="<?php echo base_url();?>aid/saveData">
			<!-- provider -->
			<label for="provider">المعيل:</label>
			<select name="provider" id="provider">
				<?php foreach($providers as $provider)
				{
				?>
					<option value="<?php echo $provider["code"];?>"><?php echo $provider["full_name"];?></option>
				<?php
				}
				?>			
			</select>
	
			<!-- aid -->
			<label for="aid">المعونة:</label>
			<select name="aid" id="aid">
				<?php foreach($packages as $package)
				{
				?>
					<option value="<?php echo $package["id"];?>"><?php echo $package["name"];?></option>
				<?php
				}
				?>			
			</select>
				
			<br/>	
			<input type="submit" class="btn btn-primary" value="تسليم معونة"/>
		</form>
		
		
	</div> <!-- end hero uit -->	
	
	
</div> <!-- end container -->

