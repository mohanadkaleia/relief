<script>	
	$(document).ready(function() {		
	    gridRender('form');
	}); 
</script>


<div class="container">
	
	<div class="hero-unit">
		
		<!-- breacrumb -->
  		<ul class="breadcrumb">
		  <li><a href="<?php echo base_url();?>dashboard">الرئيسية</a> <span class="divider">/</span></li>			  		  
		  <li class="active">إدارة الاستمارات</li>
		</ul>
		
		<h3 class="title">إدارة الاستمارات</h3>	 
		
		<div class="grid">
			<table id="form" action="<?php echo base_url();?>form/ajaxGetForms" dir="rtl">				
				<tr>																
					<th col="code" type="text">رمز المعيل</th>
					<th col="full_name" type="text">اسم المعيل</th>
					<th col="national_id"  type="text">الرقم الوطني</th>		
					<th col="created_date" type="date">تاريخ الإنشاء</th>
				</tr>										
			</table>	
		</div>
		
	</div> <!-- end hero uit -->	
	
	
</div> <!-- end container -->

