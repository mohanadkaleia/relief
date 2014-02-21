<?php
	//by defalut there is no error and only greeting message
	$class="alert alert-info";
	$message = "كيف حالك اليوم؟";
	
	//error message
	
	 
	
	
	if(validation_errors()) 
		{
			$class="alert alert-error";
			$message = validation_errors();
		}

?>
<div id="wrap">   		
	<div class="container">		
				
		<!--<form action="<?php echo base_url();?>adminpanel/login/validateLogin" method="post" class="form-signin">-->
		<form action="<?php echo base_url();?>login/validateLogin" method="post" class="form-signin">	
			<h2 class="form-signin-heading">تسجيل الدخول</h2>
			
			<!-- error message -->
	
			<div class="<?php echo $class;?>">
				<button class="close" data-dismiss="alert" type="button">×</button>
				<?php echo $message;?>
			</div>
			
			<!-- username -->
			<input name="username" type="text" class="input-block-level" placeholder="اسم المستخدم" autofocus="true" required value="" /> 
			
			<!-- passowrd -->
			<input name="password" type="password" class="input-block-level" placeholder="كلمة السر" required>
			
			
			<button class="btn btn-large btn-primary" type="submit">الدخول</button>
							
		</form>

    </div> <!-- /container -->
    <div id="push"></div>
    
</div>



	
