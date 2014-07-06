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
		  <li class="active">إدارة معيل</li>		  
		</ul>
		
		<h3 class="title">إدارة المعيل</h3>	 
		
		<div class="grid">								
			<table id="provider" action="<?php echo base_url();?>provider/ajaxGetProviders" dir="rtl">				
				<tr>																
					<th col="code" type="text">رمز المعيل</th>
					<th col="full_name" type="text">اسم المعيل</th>											
				</tr>										
			</table>	
		</div>
		
		
		
	</div> <!-- end hero uit -->	
	
	
</div> <!-- end container -->

