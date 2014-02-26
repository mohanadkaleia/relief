<script>	
	$(document).ready(function() {		
	    gridRender('provider');
	}); 
</script>


<div class="container">
	
	<div class="hero-unit">
		<h3 class="title">إدارة المعيل</h3>	 
		
		<div class="grid">
			<table id="provider" action="<?php echo base_url();?>provider/ajaxGetProviders" dir="rtl">				
				<tr>																
					<!--<th col="code" type="text">رمز المعيل</th>-->
					<th col="full_name" type="text">اسم المعيل</th>
					<th col="national_id"  type="text">الرقم الوطني</th>		
					<th col="created_date" type="date">تاريخ الإنشاء</th>
				</tr>										
			</table>	
		</div>
		
	</div> <!-- end hero uit -->	
	
	
</div> <!-- end container -->

