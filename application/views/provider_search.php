<script>	
	$(document).ready(function() {		
	    gridRender('provider');
	}); 
</script>


<div class="container">
	
	<div class="hero-unit">
		
		<!-- breacrumb -->
  		<ul class="breadcrumb">
		  <li><a href="<?php echo base_url();?>dashboard">الرئيسية</a> <span class="divider">/</span></li>			  		  
		  <li class="active">بحث عن معيل</li>
		</ul>
		
		<h3 class="title">بحث عن معيل</h3>	 
		
		
		
		<div class="grid">								
			<table id="provider" action="<?php echo base_url();?>provider/ajaxGetProviders" dir="rtl">				
				<tr>																
					<th col="code" type="text">رمز المعيل</th>
					<th col="full_name" type="text">اسم المعيل</th>						
					<th col="created_date" type="date">تاريخ الإنشاء</th>
				</tr>										
			</table>	
		</div>
		
	</div> <!-- end hero uit -->	
	
	
</div> <!-- end container -->

