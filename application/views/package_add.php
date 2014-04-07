<div  class="row-fluid">	  	
	  	<div class="span8 main-content offset2">
			<h1>إضافة صندوق معونات</h1>  
			<br />
			<!-- error message -->
			<div  id="error" style="display: none;">
			
			</div>
			<form method="post" action="<?php echo base_url();?>package/saveData/add" >
				<table id="input_table" style="width: 100%;">
					<tr >
						<td>
							اسم الصندوق:
						</td>
						
						<td>
							<input type="text" name="name" id="name" required="required" placeholder="اسم الصندوق"/>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<table id="subject_table" style="width: 100%;">
								<tr>
									<th>فئة المادة</th>
									<th>اسم المادة</th>
									<th>الكمية</th>
									<th></th>
								</tr>
								<tr>
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
											<option value="<?php echo $subject['code'];?>"><?php echo $subject['name'];?></option>
											<?php }?>
										</select>
										<input type="hidden" name="id[1]" />
									</td>
									<td>
										<input type="number" name="amount1" id="amount1" placeholder="الكمية" required="required"/>
									</td>
									<td>
										<input type="button" disabled="true" class="btn btn-default" value="-"/>
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
					<tr>
						<td>
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
							options +="<option value='"+subjects[i].code+"'>"+subjects[i].name+"</option>"
						}
						category.parent().next().find('select').html(options);
					});
				});
			});
		}
		
		function getUnique(){
			var name = $('#name').val();
			$.get('<?php echo base_url();?>'+'package/getUnique?name='+name,function(data){
					if(data == "package"){
						$('div#error').html('<div class="alert alert-error"><button class="close" data-dismiss="alert" type="button">×</button> اسم الصندوق موجود مسبقاً في قاعدة البيانات..</div>');
						$('div#error').slideDown("slow");
					}else{
						$('#submit').click();
					}
				});
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
                    '<input type="number" name="amount' + rowCount + '" id="amount' + rowCount + '" placeholder="الكمية" required="required"/>' +
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

	</script>
