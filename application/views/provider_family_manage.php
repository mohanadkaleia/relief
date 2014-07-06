<script>	
	$(document).ready(function() {		
	    gridRender('provider_family');
	}); 
</script>


<div class="container">
	
	<div class="hero-unit">
		
		<!-- breacrumb -->
  		<ul class="breadcrumb">
		  <li><a href="<?php echo base_url();?>dashboard">الرئيسية</a> <span class="divider">/</span></li>			  
		  <li><a href="<?php echo base_url();?>provider">إدارة معيل</a> <span class="divider">/</span></li>
		  <li class="active">إدارة أفراد الأسرة</li>
		</ul>
		
		
		<h3 class="title">إدارة أفراد الأسرة</h3>	 
		
		<div class="grid">
			<table id="provider_family" action="<?php echo base_url();?>family_member/ajaxGetProviderFamily/<?php echo $provider_code;?>" dir="rtl">				
				<tr>																
					<th col="full_name" type="text">الاسم الثلاثي</th>					
					<th col="relationship" type="text">صلة القربى</th>
					<th col="gender" type="text">الجنس</th>
					<th col="birth_date" type="text">التولد</th>
				</tr>										
			</table>	
		</div>
		
	</div> <!-- end hero unit -->	
	
	
</div> <!-- end container -->

