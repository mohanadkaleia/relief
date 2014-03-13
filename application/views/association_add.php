

<div  class="row-fluid">	  	
	  	<div class="span8 main-content offset2">
			<!-- breacrumb -->
	  		<ul class="breadcrumb">
			  <li><a href="<?php echo base_url();?>dashboard">الرئيسية</a> <span class="divider">/</span></li>			  
			  <li><a href="<?php echo base_url();?>association">إدارة الجمعيات</a> <span class="divider">/</span></li>
			  <li class="active">إضافة جمعية</li>
			</ul>
			
			<h1>إضافة جمعية</h1>  
			
			
			<!-- error message -->
			<div  id="error" style="display: none;">
			
			</div>
			<form method="post" action="<?php echo base_url();?>association/saveData/add" enctype="multipart/form-data" >
				<table>
					<tr>
						<td>
							اسم الجمعية:
						</td>
						
						<td>
							<input type="text" name="name" id="name" placeholder="اسم الجمعية" required />
						</td>
						
						<td>
							رمز الجمعية:
						</td>
						
						<td>
							<input type="text" name="code" id="code" pattern="\d\d" placeholder="رقم مؤلف من خانتين"  required/>
						</td>
						
					</tr>
					<tr>
						
						<td>
							اسم المدير:
						</td>
						
						<td>
							<input type="text" name="manager_name" placeholder="اسم المدير"  />
						</td>
						
						<td>
							شعار الجمعية:
						</td>
						
						<td>
							<input type="file" name="logo" id="logo" placeholder="الشعار" />
						</td>
						
						
					</tr>
					<tr>
						
						<td>
							هاتف 1:
						</td>
						
						<td>
							<input type="text" name="phone1" placeholder="هاتف 1" />
						</td>
						
						<td>
							هاتف 2:
						</td>
						
						<td>
							<input type="text" name="phone2" placeholder="هاتف 2" />
						</td>
						
					</tr>
					<tr>
						
						<td>
							موبايل 1:
						</td>
						
						<td>
							<input type="text" name="mobile1" placeholder="موبايل 1" />
						</td>
						
						<td>
							موبايل 2:
						</td>
						
						<td>
							<input type="text" name="mobile2" placeholder="موبايل 2" />
						</td>
						
					</tr>
					<tr>
						
						<td>
							العنوان:
						</td>
						
						<td>
							<textarea name="address" placeholder="العنوان" ></textarea>
						</td>
						
						<td>
							حول الجمعية:
						</td>
						
						<td>
							<textarea name="about" placeholder="حول الجمعية" ></textarea>
						</td>
						
					</tr>
					<tr>
						
						<td>
							تاريخ الإنشاء:
						</td>
						
						<td>
							<input type="text" name="created_date"  id="created_date" placeholder="YYYY-MM-DD"/>
						</td>
					</tr>
					
					<tr>
						<td>
							<input type="button" onclick="getUnique()" name="save" class="btn btn-info" value="احفظ"/>
							<input type="button" class="btn btn-default" value="إلغاء" name="cencel_settings" onclick="window.location='<?php echo base_url()?>dashboard'" />
						</td>
					</tr>
				</table>
				<input type="submit" id="submit" style="display: none" />
			</form>
	  	</div>
	  
	</div>
	
	<script>
		function getUnique(){
			var name = $('#name').val();
			var code = $('#code').val();
			$.get('<?php echo base_url();?>'+'association/getUnique?name='+name+'&code='+code,function(data){
				if(data == "code"){
					$('div#error').html('<div class="alert alert-error"><button class="close" data-dismiss="alert" type="button">×</button> رمز الجمعية هذا منسوب إلى جمعية أخرى..</div>');
					$('div#error').slideDown("slow");
				}else if(data == "name"){
					$('div#error').html('<div class="alert alert-error"><button class="close" data-dismiss="alert" type="button">×</button> اسم الجمعية موجود مسبقاً في قاعدة البيانات..</div>');
					$('div#error').slideDown("slow");
				}else{
					$('#submit').click();
				}
			});
		}
	 $(document).ready(function() {
		$("#created_date").datepicker({
			format: 'yyyy-mm-dd'
		});
	});
</script>
