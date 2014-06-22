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
					<?php echo $male;?>
				</td>
				
				<th>
					عدد الأفراد الإناث:
				</th>
				<td>
					<?php echo $female;?>
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
				
				<th>
					عدد العائلات المقيمة:
				</th>
				
				<td>
					<?php echo count($providers) - $emigramt_family[0]['family_num'];?>
				</td>
			</tr>
			
			<tr>
				<th>
					الأفراد الأميين:
				</th>
				<td>
					<?php echo $illiterates[0]['member_num'];?>
				</td>
				
				<th>
					الأفراد الجامعيين:
				</th>
				<td>
					<?php echo $university[0]['member_num'];?>
				</td>
			</tr>
			
			<tr>
				<th>
					الأفراد العاطلين عن العمل:
				</th>
				<td>
					<?php echo $unemployed[0]['member_num'];?>
				</td>
				
				<th>
					الأفراد الموظفين:
				</th>
				<td>
					<?php echo $employed[0]['member_num'];?>
				</td>
			</tr>
			
			<tr>
				<th>
					عدد المعاقين:
				</th>
				<td>
					<?php echo $disabled[0]['member_num'];?>
				</td>				
			</tr>
			
			
		</table>		
		
		
		
	</div> <!-- end hero uit -->	
	
	
</div> <!-- end container -->

