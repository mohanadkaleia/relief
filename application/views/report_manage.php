<div class="container">
	<div class="hero-unit">
		
		<!-- breacrumb -->
  		<ul class="breadcrumb">
		  <li><a href="<?php echo base_url();?>dashboard">الرئيسية</a> <span class="divider">/</span></li>			  		  
		  <li class="active">إحصائيات</li>
		</ul>
		
		<h3 class="title">الإحصائيات</h3>	 
		
		
		<table class="report-table" cellpadding="0px" cellspacing="0px">
			<tr>			
				<th colspan="4">
					تقرير بالإحصائيات العامة
				</th>
			</tr>
			
			<tr>
				<th>
					عدد العائلات المسجلة
				</th>
				
				<td>
					<?php echo count($providers);?>
				</td>
				
				<th>
					العدد الكلي للأفراد
				</th>
				
				<td>
					<?php echo count($providers)+count($members);?>
				</td>
			</tr>
									
			<tr>
				<th>
					عدد الأفراد الذكور
				</th>
				<td>
					<?php echo count($male);?>
				</td>
				
				<th>
					عدد الأفراد الإناث:
				</th>
				<td>
					<?php echo count($female);?>
				</td>
			</tr>
			
			<tr>
				<th>
					عدد الإطفال تحت 3 سنوات:
				</th>
				
				<td>
					1
				</td>
				
				
				<th>
					عدد الأفراد العاجزين:	
				</th>
				
				<td>
					<?php echo count($disabled);?>
				</td>
				
			</tr>
			
			
			<tr>
				<th>
					عدد العائلات النازحة:
				</th>
				
				<td>
					<?php echo $emigramt_family[0]['family_num'];?>
				</td>
			</tr>
			
			
			
		</table>		
		
		
		
	</div> <!-- end hero uit -->	
	
	
</div> <!-- end container -->

