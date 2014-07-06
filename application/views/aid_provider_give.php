<div class="container">
	<div class="hero-unit">		
		<!-- breacrumb -->
  		<ul class="breadcrumb">
		  <li><a href="<?php echo base_url();?>dashboard">الرئيسية</a> <span class="divider">/</span></li>			  		  
		  <li><a href="<?php echo base_url();?>provider">إدارة المعيلين</a> <span class="divider">/</span></li>
		  <li class="active">إضافة معونة</li>
		</ul>
		
		<h3 class="title">إضافة معونة للمعيل: <?php echo $provider_info['full_name'];?></h3>	 
		
		
		
		
		<form method="post" action="<?php echo base_url();?>aid/saveData/<?php echo $provider_info["code"];?>">			
			<!-- number of packages -->
			<input type="hidden" name="packages_number" value="<?php echo count($packages);?>" />
			
			<!-- aid -->			
			<table class="table">
				<tr>
					<th>
						#
					</th>
					
					<th>
						اسم السلة
					</th>
					
					<th>
						تفاصيل السلة
					</th>					
				</tr>
				
				<?php
					foreach ($packages as $key => $package) 
					{
				?>
						<tr>
							<td>
								<input type="checkbox" name="package_<?php echo $key;?>" value="true"/>								
							</td>
							
							<td>
								<input type="hidden" name="package_id_<?php echo $key;?>" value="<?php echo $package['id'];?>"/>
								<input type="hidden" name="package_code_<?php echo $key;?>" value="<?php echo $package['code'];?>"/>
								<?php echo $package["name"];?>
							</td>	
							
							<td>								
								<!-- Button to trigger modal -->
								<a href="#myModal" role="button" class="btn" data-toggle="modal">تفاصيل السلة</a>
								 
								<!-- Modal -->
								<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								  <div class="modal-header">
								    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								    <h3 id="myModalLabel">محتويات السلة</h3>
								  </div>
								  <div class="modal-body">
								  	<ul>
								    <?php
								    	foreach($package_details as $package_detail)
										{
											if($package_detail['id'] == $package['id'])
											{																							
									?>											
												<li>اسم المادة:<?php echo $package_detail['subject_name']?> -- الكمية: <?php echo $package_detail['amount'];?> <?php echo $package_detail['unit'];?></li>												
												
									<?php	
											}	
										} 
								    ?>
								    </ul>
								    
								  </div>
								  <div class="modal-footer">
								    <button class="btn" data-dismiss="modal" aria-hidden="true">إغلاق</button>								    
								  </div>
								</div>
							</td>					
						</tr>						
				<?php		
								
					} 
				?>
			</table>
				
			<br/>	
			<input type="submit" class="btn btn-primary" value="تسليم معونة"/>
		</form>
		
		
	</div> <!-- end hero uit -->	
	
	
</div> <!-- end container -->

