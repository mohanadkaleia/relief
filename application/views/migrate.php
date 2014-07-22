<div  class="row-fluid">	  	
	  	<div class="span8 main-content offset2">
	  		<br />
	  		
	  		<!-- breacrumb -->
	  		<ul class="breadcrumb">
			  <li><a href="<?php echo base_url();?>dashboard">الرئيسية</a> <span class="divider">/</span></li>			  			  
			  <li class="active">استيراد\تصدير</li>
			</ul>
	  		
			<h1>استيراد \ تصدير بيانات</h1>  
			<br/>
			
			<?php if(isset($result) && $result!= "")
				{
				?>
					<p class="alert alert-success">
						<?php echo $result;?>						
					</p>
				<?php	
				}
				?>
				
			<div class="row">
				
				
				
				
				<div class="span6 right-side">
					
					<p class="alert alert-info">
						يمكنك تصدير كافة بيانات المعيل وأفراد أسرته من خلال الضغط على زر تصدير،
						 بحيث يمكن استيراد هذه البيانات ليتم إضافتها على جهاز آخر.
						 إن صيغة ملف الخرج ستكون على شكل ملف اكسل. 						
					</p>
					
					<form method="post" action="<?php echo base_url()?>migrate/export">
						<input type="checkbox" name="export_provider" value="true" checked="true"/> تصدير بيانات المعيلين
						<br/>
						<input type="checkbox" name="export_aid" value="true" checked="true"/> تصدير بيانات المعونات
						<br/>
						<input type="submit" class="btn btn-info" value="تصدير البيانات"/>
						<br/>	
					</form>					
				</div>
				
				
				<div class="span6">					
					<p class="alert alert-warning">
						قم باختيار ملف الاكسل ليتم استيراد البيانات منه ودمجها مع البيانات الحالية الموجودة في قاعدة البيانات،
						في حال وجود بيانات قديمة أو مكررة فأنه لن يتم إضافتها. 						
					</p>
					<form method="post" action="<?php echo base_url()?>migrate/import" enctype="multipart/form-data">
						
						<input type="file" name="imported_file" id=imported_file"" required="true"/>
						<input type="submit" class="btn btn-success" value="استيراد البيانات"/>	
					</form>	
				</div>												
			</div>
			
			
			<hr />
				
			<h2>ملف جديد</h2>
			<p class="alert alert-info">
				يمكنك هنا استيراد قاعدة بيانات جديدة بحيث تكون منفصلة عن الحالية، أي لن يتم هنا دمج بيانات
				الملف الذي سيتم استيراده،
				عند الضغط على الزر سيتم تصدير ملف بالبيانات الحالية واستيراد بيانات الملف الذي قمت بتحديده 						
			</p>
			
			<form method="post" action="<?php echo base_url()?>migrate/exportImportNew" enctype="multipart/form-data">
						
				<input type="file" name="imported_file" id=imported_file"" required="true"/>
				<input type="submit" class="btn btn-success" value="استيراد ملف جديد"/>	
			</form>	
			
				
	  	</div>
	  
			  
	  
	  
	  
	</div>
