<script>	
	$(document).ready(function() {		
	    gridRender('association');
	}); 
</script>


<div class="container">
	
	<div class="hero-unit">
		<h3 class="title">إدارة الجمعيات</h3>	 
		
		<div class="grid">
			<table id="association" action="<?php echo base_url();?>association/ajaxGetAssociations" dir="rtl">				
				<tr>																
					<th col="code" type="text">رمز الجمعية</th>
					<th col="name" type="text">اسم الجمعية</th>
					<th col="phone1" type="text">رقم الهاتف</th>
					<th col="manager_name" type="text">اسم المدير</th>
					<th col="created_date" type="text">تاريخ الإنشاء</th>
					<th col="logo" type="text ">الشعار</thth>
				</tr>										
			</table>	
		</div>
		
	</div> <!-- end hero unit -->	
	
	
</div> <!-- end container -->

