<script>	
	$(document).ready(function() {		
	    gridRender('aid');
	}); 
</script>


<div class="container">
	
	<div class="hero-unit">
		<!-- breacrumb -->
  		<ul class="breadcrumb">
		  <li><a href="<?php echo base_url();?>dashboard">الرئيسية</a> <span class="divider">/</span></li>			  		  		 
		  <li class="active">إدارة المعونات</li>
		</ul>
		
		<h3 class="title">إدارة المعونات</h3>	 
		
		<div class="grid">
			<table id="aid" action="<?php echo base_url();?>aid/ajaxGetPackagesByProviderCode/<?php echo $code;?>" dir="rtl">				
				<tr>																
					<th col="provider_name" type="text">اسم المعيل</th>
					<th col="package_name" type="text">اسم السلة الغذائية</th>
					<th col="deliever_date" type="text">تاريخ الاستلام</th>
				</tr>										
			</table>	
		</div>
		
	</div> <!-- end hero unit -->	
	
	
</div> <!-- end container -->

