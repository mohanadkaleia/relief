<div  class="row-fluid">	  	
	  	<div class="span8 main-content offset2">
			<h1>تعديل بيانات صندوق معونات</h1>  
			<br />
			<!-- error message -->
			<div  id="error" style="display: none;">
			
			</div>
			<form method="post" action="<?php echo base_url();?>package/saveData/edit/<?php echo $package['id'];?>" >
				<table id="input_table" style="width: 100%;">
					<tr style="border-bottom: solid 1px #FFFFFF">
						<td>
							اسم الصندوق:
						</td>
						
						<td colspan="4">
							<input type="text" name="name" id="name" required="required" placeholder="اسم الصندوق" value="<?php echo $package['name'];?>"/>
							<input type="hidden" name="old_name" id="old_name" value="<?php echo $package['name'];?>" />
						</td>
					</tr>
					
					<?php if(isset($details))
						for($i=0;$i<count($details);$i++){?>
							<tr id="detail_<?php echo $i;?>" style="border-bottom: solid 1px #FFFFFF">
								<td style="width: 80px;">
									اسم المادة:
								</td>
								<td style="width: 100px;">
									<?php echo $subject_names[$i];?>
								</td>
								<td>
									الكمية:
								</td>
								<td >
									<input type="number" name="amount[<?php echo $i;?>]" value="<?php echo $details[$i]['amount'];?>" placeholder="الكمية" required="required"/>
								</td>
								<td>
									<input type="button" class="btn btn-default" value="حذف المادة" onclick="delDetail(<?php echo $i;?>)"/>
									<input type="hidden" value="<?php echo $details[$i]['id'];?>" name="detail_id[<?php echo $i;?>]"/>
								</td>
							</tr>
					<?php }?>
					
					<tr>
						<td colspan="5">
							<table id="subject_table" style="width: 100%;">
								<tr>
									<th>فئة المادة</th>
									<th>اسم المادة</th>
									<th>الكمية</th>
									<th></th>
								</tr>
								<tr id="row1">
									<td>
										<select id="categorySelect1" class="category">
											<?php foreach($categories as $category){?>
											<option value="<?php echo $category['id'];?>"><?php echo $category['name'];?></option>
											<?php }?>
										</select>
									</td>
									<td>
										<select id="subjectSelect1" name="subjectSelect1">
											<?php foreach($subjects as $subject){?>
											<option value="<?php echo $subject['id'];?>"><?php echo $subject['name'];?></option>
											<?php }?>
										</select>
									</td>
									<td>
										<input type="number" name="amount1" id="amount1" placeholder="الكمية" required="required"/>
									</td>
									<td>
										<input type="button" onclick="delRow(1)" class="btn btn-default" value="-"/>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td>
							<input type="button" class="btn btn-info" value="+" onclick="addRow()"/>
						</td>
						
					</tr>
					<tr >
						<td colspan="2">
							<input type="button" onclick="getUnique()" name="save" class="btn btn-info" value="احفظ"/>
							<input type="button" class="btn btn-default" value="إلغاء" name="cencel_settings" onclick="window.location='<?php echo base_url()?>dashboard'" />
						</td>
					</tr>
				</table>
				<input type="submit" id="submit" style="display: none" />
				<input type="hidden" name="rowCount" id="rowCount" value="1" />
			</form>
	  	</div>
	  
	</div>
	
	<script>
		var subjectSelectOptions = "";
		$(document).ready(function(){
			addAjax();
			subjectSelectOptions = $("select#subjectSelect1").html()
		});
		
		function addAjax(){
			$("select.category").each(function(){
				$(this).change(function(){
					var category = $(this);
					$.get("<?php echo base_url();?>package/getCategorySubjects/"+ $(this).val(),function(data){
						var subjects = JSON.parse(data);
						options = "";
						for(var i=0;i<subjects.length;i++){
							options +="<option value='"+subjects[i].id+"'>"+subjects[i].name+"</option>"
						}
						category.parent().next().find('select').html(options);
					});
				});
			});
		}
		
		function getUnique(){
			var name = $('#name').val();
			var old_name = $('#old_name').val();
			if(name !== old_name){
				$.get('<?php echo base_url();?>'+'package/getUnique?name='+name,function(data){
					if(data == "package"){
						$('div#error').html('<div class="alert alert-error"><button class="close" data-dismiss="alert" type="button">×</button> اسم الصندوق موجود مسبقاً في قاعدة البيانات..</div>');
						$('div#error').slideDown("slow");
					}else{
						$('#submit').click();
					}
				});
			}else{
				$('#submit').click();
			}
		}
		
		
		var rowCount = document.getElementById("rowCount").value;
            function addRow() {
                rowCount++;

                //var table = document.getElementsByTagName("tbody");
                //tableData = table[0].innerHTML;
                tableData = '<tr id="row' + rowCount + '" style="display: none;">' +
                    '<td>' +
                    '<select name="categorySelect' + rowCount + '" id="categorySelect' + rowCount + '"  class="category">';
                tableData += $("select#categorySelect1").html() +'</select>'+' </td>' ;
                tableData +=  '<td> <select name="subjectSelect' + rowCount + '" id="subjectSelect' + rowCount + '">';
                tableData += subjectSelectOptions +'</select>'+ '</td> <input type="hidden" name="id['+rowCount+']" value="0"/>' ;
				tableData += '<td>' +
                    '<input type="number" name="amount' + rowCount + '" id="amount' + rowCount + '" placeholder="الكمية" required="required"/>'+
                    '</td>' + '<td>' +
                    '<input type="button" class="btn btn-default" value="-" onclick="delRow('+rowCount+')"/>' +
                    '</td>' +
                    '</tr>';
                //table[0].innerHTML = tableData;
                $("table#subject_table").append(tableData);
                var options = document.getElementById("categorySelect" + rowCount).childNodes;
                for (var option in options) {
                    option.selected = false;
                }
                options = document.getElementById("subjectSelect" + rowCount).childNodes;
                for (var option in options) {
                    option.selected = false;
                }
                document.getElementById("rowCount").value = rowCount;
                $("#row"+rowCount).slideDown("slow");
                addAjax();
            }

            function delRow(id) {
                $("#row" + id).remove();
            }
            
            function delDetail(id) {
                $("#detail_" + id).remove();
            }

	</script>
