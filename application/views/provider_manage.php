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
		
		<form method="post" action="#">
			<table>
				<tr>
					<td>
						الاسم:			
					</td>
					<td>
						<input type="text" name="fname" placeholder="الاسم" />
					</td>
					
					<td>
						الكنية:
					</td>
					<td>
						<input type="text" name="lname" placeholder="الكنية" />
					</td>										
				</tr>
			</table>
			
			
			
		</form>
		
		<div class="grid">								
			<table id="provider" action="<?php echo base_url();?>provider/ajaxGetProviders" dir="rtl">				
				<tr>																
					<th col="code" type="text">رمز المعيل</th>
					<th col="full_name" type="text">اسم المعيل</th>						
					<th col="created_date" type="date">تاريخ الإنشاء</th>
				</tr>										
			</table>	
		</div>
		
	</div> <!-- end hero uit -->	
	
	
</div> <!-- end container -->

