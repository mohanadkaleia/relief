<script>	
	$(document).ready(function() {		
	    gridRender('package');
	}); 
</script>


<div class="container">
	
	<div class="hero-unit">
		
		<!-- breacrumb -->
  		<ul class="breadcrumb">
		  <li><a href="<?php echo base_url();?>dashboard">الرئيسية</a> <span class="divider">/</span></li>			  		  		  
		  <li class="active">دارة صناديق المعونات</li>
		</ul>
		
		<h3 class="title">إدارة صناديق المعونات</h3>	 
		
		<div class="grid">
			<table id="package" action="<?php echo base_url();?>package/ajaxGetPackages" dir="rtl">				
				<tr>																
					<th col="name" type="text">اسم الصندوق</th>
				</tr>										
			</table>	
		</div>
		
	</div> <!-- end hero unit -->	
	
	
</div> <!-- end container -->

