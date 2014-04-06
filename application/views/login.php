

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
    
    
    
    <!-- clock -->
    <script type="text/javascript">
	$(document).ready(function() {
	// Create two variable with the names of the months and days in an array
	var monthNames = [ "كانون الثاني", "شباط", "آذار", "نيسان", "آيار", "حزيان", "تموز", "آب", "إيلول", "تشرين الأول", "تشرين الثاني", "كانون الأول" ];
	
	//	var monthNames = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ]; 
	var dayNames= ["الأحد","الاثنين","الثلاثاء","الأربعاء","الخميس","الجمعة","السبت"]
	
	// Create a newDate() object
	var newDate = new Date();
	// Extract the current date from Date object
	newDate.setDate(newDate.getDate());
	// Output the day, date, month and year    
	$('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());
	
	setInterval( function() {
		// Create a newDate() object and extract the seconds of the current time on the visitor's
		var seconds = new Date().getSeconds();
		// Add a leading zero to seconds value
		$("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
		},1000);
		
	setInterval( function() {
		// Create a newDate() object and extract the minutes of the current time on the visitor's
		var minutes = new Date().getMinutes();
		// Add a leading zero to the minutes value
		$("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
	    },1000);
		
	setInterval( function() {
		// Create a newDate() object and extract the hours of the current time on the visitor's
		var hours = new Date().getHours();
		// Add a leading zero to the hours value
		$("#hours").html(( hours < 10 ? "0" : "" ) + hours);
	    }, 1000);
		
	}); 
	</script>
    
    <style>
    	.clock {width:800px; margin:0 auto; padding:30px; border:0px solid #333; color:#fff;}

		#Date { font-family:'BebasNeueRegular', Arial, Helvetica, sans-serif; font-size:36px; text-align:center; text-shadow:0 0 5px #00c6ff; margin-bottom:25px;float:right }
		
		ul { width:800px; margin:0 auto; padding:0px; list-style:none; text-align:center;direction:rtl;}
		ul li { display:inline; font-size:5em; text-align:center; font-family:'BebasNeueRegular', Arial, Helvetica, sans-serif; text-shadow:0 0 5px #00c6ff;float:left}
		
		#point { position:relative; -moz-animation:mymove 1s ease infinite; -webkit-animation:mymove 1s ease infinite; padding-left:10px; padding-right:10px; }
		
		@-webkit-keyframes mymove 
		{
		0% {opacity:1.0; text-shadow:0 0 20px #00c6ff;}
		50% {opacity:0; text-shadow:none; }
		100% {opacity:1.0; text-shadow:0 0 20px #00c6ff; }	
		}
		
		
		@-moz-keyframes mymove 
		{
		0% {opacity:1.0; text-shadow:0 0 20px #00c6ff;}
		50% {opacity:0; text-shadow:none; }
		100% {opacity:1.0; text-shadow:0 0 20px #00c6ff; }	
		}

    </style>
    
    
    <div class="clock">
	<div id="Date"></div>
	
	<ul>
		<li id="hours"> </li>
	    <li id="point">:</li>
	    <li id="min"> </li>
	    <li id="point">:</li>
	    <li id="sec"> </li>
	</ul>
	
	<div style="clear:both"></div>
	</div>
    
    
    <div id="push"></div>
    
</div>



	
