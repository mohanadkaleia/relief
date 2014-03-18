<script>	
	$(document).ready(function() {		
	    gridRender('user');
	}); 
</script>


<div class="container">
	
	<div class="hero-unit">
		<h3 class="title">إدارة المستخدمين</h3>	 
		
		<!-- breacrumb -->
  		<ul class="breadcrumb">
		  <li><a href="<?php echo base_url();?>dashboard">الرئيسية</a> <span class="divider">/</span></li>		 
		  <li class="active">إدارة المستخدمين</li>
		</ul>
		
		<div class="grid">
			<table id="user" action="<?php echo base_url();?>user/ajaxGetUsers" dir="rtl">				
				<tr>																
					<th col="full_name" type="text">اسم المستخدم</th>
					<th col="national_id" type="text">الرقم الوطني</th>
					<th col="phone" type="text">رقم الهاتف</th>
					<th col="mobile" type="text">رقم الجوال</th>
					<th col="association" type="text">الجمعية</th>
				</tr>										
			</table>	
		</div>
		
	</div> <!-- end hero unit -->	
	
	
</div> <!-- end container -->

