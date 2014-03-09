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
		  <li class="active">حالات الغش</li>
		</ul>
		
		<h3 class="title">حالات الغش</h3>	 
		
		<div class="grid">
			<table id="provider" action="<?php echo base_url();?>fraud/ajaxGetFroudProviders" dir="rtl">				
				<tr>																
					<th col="code" type="text">رمز المعيل</th>
					<th col="full_name" type="text">اسم المعيل</th>
					<th col="association_name"  type="text">الجمعية</th>		
					<th col="created_date" type="date">تاريخ الإنشاء</th>
				</tr>										
			</table>	
		</div>
		
	</div> <!-- end hero uit -->	
	
	
</div> <!-- end container -->

