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
			
		
			<form id="accept_reject" method="post" action="<?php echo base_url();?>form/acceptReject">
				<script>
				$(document).ready(function() {
					$('#accept_reject').on('keydown', function (e) {
					    if (e.keyCode == 13) {
					        return false;
					    }
					});
				});
				</script>			
				قبول أو رفض مجموعة من الاستمارات:
				
				<input type="text" name="provider_code" id="provider_code" style="width:100%" />
				<script>
					$('#provider_code').on('keydown', function (e) {
					    if (e.keyCode == 13) 
					    {
					    	$current = $("#provider_code").val();
					    	$("#provider_code").val($current + ";");					        
					        return false;
					    }
					});
				</script>	
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

