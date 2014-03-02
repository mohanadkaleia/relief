<div  class="row-fluid">	  	
	  	<div class="span8 main-content offset2">
			<h1>تعديل بيانات منطقة</h1>  
			<br />
			<!-- error message -->
			<div  id="error" style="display: none;">
			
			</div>
			<input type="hidden" value="<?php echo $area['name'];?>" name="old_name" id="old_name" />
			<input type="hidden" value="<?php echo $area['code'];?>" name="old_code" id="old_code" />
			<form method="post" action="<?php echo base_url();?>area/saveData/edit/<?php echo $area['id'];?>" >
				<table>
					<tr>
						<td>
							اسم المنطقة:
						</td>
						
						<td>
							<input type="text" name="name" id="name" required="required"  placeholder="اسم المنطقة" value="<?php echo $area['name'];?>" />
						</td>
						
						<td>
							رمز المنطقة:
						</td>
						
						<td>
							<input  type="text" pattern="\d\d\d" name="code" id="code"  required="required" placeholder="رقم من ثلاث خانات" value="<?php echo $area['code'];?>" />
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
		$(document).ready(function(){
			
		});
		
		function getUnique(){
			var name = $('#name').val();
			var old_name = $('#old_name').val();
			var code = $('#code').val();
			var old_code = $('#old_code').val();
			if(name == old_name){
				name = "";
				old_name = "";
			}
			if(code == old_code){
				code = "";
				old_code = "";
			}
			$.get('<?php echo base_url();?>'+'area/getUnique?name='+name+'&code='+code+'&old_name='+old_name+'&old_code='+old_code,function(data){
				if(data == "code"){
					$('div#error').html('<div class="alert alert-error"><button class="close" data-dismiss="alert" type="button">×</button> رمز المنطقة هذا منسوب إلى منطقة أخرى..</div>');
					$('div#error').slideDown("slow");
				}else if(data == "name"){
					$('div#error').html('<div class="alert alert-error"><button class="close" data-dismiss="alert" type="button">×</button> اسم المنطقة موجود مسبقاً في قاعدة البيانات..</div>');
					$('div#error').slideDown("slow");
				}else{
					$('#submit').click();
				}
			});
		}
	</script>
