<script>	
	$(document).ready(function() {		
	    gridRender('family_member');
	}); 
</script>


<div class="container">
	
	<div class="hero-unit">
		<h3 class="title">إدارة أفراد الأسرة</h3>	 
		
		<div class="grid">
			<table id="family_member" action="<?php echo base_url();?>family_member/ajaxGetFamilyMember" dir="rtl">				
				<tr>																
					<th col="full_name" type="text">الاسم الثلاثي</th>
					<th col="full_name" type="text">اسم المعيل</th>
					<th col="relationship" type="text">صلة القربى</th>
					<th col="gender" type="text">الجنس</th>
					<th col="birth_date" type="text">التولد</th>
				</tr>										
			</table>	
		</div>
		
	</div> <!-- end hero unit -->	
	
	
</div> <!-- end container -->

