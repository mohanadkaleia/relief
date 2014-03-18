<script>	
	$(document).ready(function() {		
	    gridRender('area');
	}); 
</script>


<div class="container">
	
	<div class="hero-unit">
		<h3 class="title">إدارة المناطق</h3>	 
		
		<!-- breacrumb -->
  		<ul class="breadcrumb">
		  <li><a href="<?php echo base_url();?>dashboard">الرئيسية</a> <span class="divider">/</span></li>		 
		  <li class="active">إدارة المناطق</li>
		</ul>
		
		<div class="grid">
			<table id="area" action="<?php echo base_url();?>area/ajaxGetAreas" dir="rtl">				
				<tr>																
					<th col="code" type="text">رمز المنطقة</th>
					<th col="name" type="text">اسم المنطقة</th>
				</tr>										
			</table>	
		</div>
		
	</div> <!-- end hero unit -->	
	
	
</div> <!-- end container -->

