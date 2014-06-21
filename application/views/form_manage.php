<script>	
	$(document).ready(function() {		
	    gridRender('form');
	}); 
</script>


<div class="container">
	
	<div class="hero-unit">
		
		<!-- breacrumb -->
  		<ul class="breadcrumb">
		  <li><a href="<?php echo base_url();?>dashboard">الرئيسية</a> <span class="divider">/</span></li>			  		  
		  <li class="active">إدارة الاستمارات</li>
		</ul>
		
		<h3 class="title">إدارة الاستمارات</h3>	 
		
		<div>
			<script>
				$(document).ready(function() {
	     
				    var sheepItForm = $('#sheepItForm').sheepIt({
				        separator: '',
				        allowRemoveLast: true,
				        allowRemoveCurrent: true,
				        allowRemoveAll: true,
				        allowAdd: true,
				        allowAddN: false,
				        maxFormsCount: 0,
				        minFormsCount: 1,
				        iniFormsCount: 1
				    });
				 
				});
			</script>
			
			<script>
			
				//disable subnit the form on enter key
				$(document).ready(function() {
					$('#provider_code').bind("keypress", function(e) {
					  if (e.keyCode == 13) {               
					    e.preventDefault();
					    return false;
					  }
					});
				});				
			</script>
			<form id="accept_reject" method="post" action="<?php echo base_url();?>form/acceptReject">			
				قبول أو رفض مجموعة من الاستمارات:
				<!-- sheepIt Form -->
				<div id="sheepItForm">
				 
				  <!-- Form template-->
				  <div id="sheepItForm_template">
				    <label for="sheepItForm_#index#_phone">رمز المعيل <span id="sheepItForm_label"></span></label>
				    <input id="sheepItForm_#index#_provider_code" name="provider[#index#]" type="text" class="provider_code"
				    onchange="alert('hi');"/>
				    <a id="sheepItForm_remove_current" class="btn btn-deafault">
				      <i class="icon-minus"></i>
				    </a>
				  </div>
				  
				  <script>
				  	//focus on the next element on enter					
					$(document).ready(function() {
						code_counter = 0;
						
						$(".provider_code").bind("keypress", function(e) {
							  if (e.keyCode == 13) {               
							    $('#sheepItForm_add').click();
							    code_counter++;
							    $('#sheepItForm_'+code_counter+'_provider_code').focus();
							    //alert("hi");
							  }
							  
							  //
							  //var inputs = $(this).closest('form').find(':input');
							  //inputs.eq( inputs.index(this)+ 1 ).focus();
							});
					});
				  </script>
				  <!-- /Form template-->
				   
				  <!-- No forms template -->
				  <div id="sheepItForm_noforms_template">لا يوجد استمارات</div>
				  <!-- /No forms template-->
				   
				  <!-- Controls -->
				  <div id="sheepItForm_controls">
				    <div id="sheepItForm_add"><a class="btn btn-default"><i class="icon-plus"></i></a></div>				    				    
				  </div>
				  <!-- /Controls -->
				   
				</div>
					
				<br/>				
				<input type="submit" name="save" class="btn btn-info" value="قبول" />
				<input type="submit" name="save" class="btn btn-danger" value="رفض" />
			</form> 
		</div>
		
		<br/>
		
		<div class="grid">
			<table id="form" action="<?php echo base_url();?>form/ajaxGetForms" dir="rtl">				
				<tr>																
					<th col="code" type="text">رمز المعيل</th>
					<th col="full_name" type="text">اسم المعيل</th>
					<th col="relief_form_status"  type="text">حالة الاستمارة</th>							
				</tr>										
			</table>	
		</div>
		
		
		
	</div> <!-- end hero uit -->	
	
	
</div> <!-- end container -->

