

<div  class="row-fluid">	  	
	  	<div class="span8 main-content offset2">
			<h1>تعديل بيانات جمعية</h1>  
			<br />
			<!-- error message -->
			<div  id="error" style="display: none;">
			
			</div>
			<input type="hidden" value="<?php echo $association['name'];?>" name="old_name" id="old_name" />
			<input type="hidden" value="<?php echo $association['code'];?>" name="old_code" id="old_code" />
			<form method="post" action="<?php echo base_url();?>association/saveData/edit/<?php echo $association['id'];?>" enctype="multipart/form-data">
				<table>
					<tr>
						<td>
							اسم الجمعية:
						</td>
						
						<td>
							<input type="text" name="name" id="name" value='<?php echo $association['name'];?>'  placeholder="اسم الجمعية" required ></input>
						</td>
						
						<td>
							رمز الجمعية:
						</td>
						
						<td>
							<input type="text" name="code" id="code" value='<?php echo $association['code'];?>' pattern="\d\d" placeholder="رقم مؤلف من خانتين"  required ></input>
						</td>
						
					</tr>
					<tr>
						
						<td>
							اسم المدير:
						</td>
						
						<td>
							<input type="text" name="manager_name"  value='<?php echo $association['manager_name'];?>'></input>
						</td>
						
						<td>
							شعار الجمعية:
						</td>
						
						<td>
							<input type="file" name="logo" id="logo"></input>
						</td>
						
						
					</tr>
					<tr>
						
						<td>
							هاتف 1:
						</td>
						
						<td>
							<input type="text" name="phone1" value='<?php echo $association['phone1'];?>'></input>
						</td>
						
						<td>
							هاتف 2:
						</td>
						
						<td>
							<input type="text" name="phone2" value='<?php echo $association['phone2'];?>'></input>
						</td>
						
					</tr>
					<tr>
						
						<td>
							موبايل 1:
						</td>
						
						<td>
							<input type="text" name="mobile1" value='<?php echo $association['mobile1'];?>'></input>
						</td>
						
						<td>
							موبايل 2:
						</td>
						
						<td>
							<input type="text" name="mobile2" value='<?php echo $association['mobile2'];?>'></input>
						</td>
						
					</tr>
					<tr>
						
						<td>
							العنوان:
						</td>
						
						<td>
							<textarea name="address"  ><?php echo $association['address'];?></textarea>
						</td>
						
						<td>
							حول الجمعية:
						</td>
						
						<td>
							<textarea name="about" ><?php echo $association['about'];?></textarea>
						</td>
						
					</tr>
					<tr>
						
						<td>
							تاريخ الإنشاء:
						</td>
						
						<td>
							<input type="text" name="created_date"  id="created_date" value='<?php echo $association['created_date'];?>'></input>
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
				<input type="hidden" name="old_logo" id="old_logo" value='<?php echo $association['logo'];?>'/>
			</form>
			
	  	</div>
	  
	</div>
	
<script>
	var logo = "";
	 $(document).ready(function() {
		$("#created_date").datepicker({
			format: 'yyyy/mm/dd'
		});
		logo = "<?php echo 'files/'.$association['name'].'/'.$association['logo'];?>";
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
			$.get('<?php echo base_url();?>'+'association/getUnique?name='+name+'&code='+code+'&old_name='+old_name+'&old_code='+old_code,function(data){
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
	
	$('form').submit(function(){
		if($('#logo').val() !== undefined && $('#logo').val() && 'undefined' && $('#logo').val().trim() !== ""){
			$('#old_logo').val("");
		}
	});
</script>
