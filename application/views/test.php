<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<script src="<?php echo base_url();?>js/jquery-1.8.0.min.js"></script>
		<script>
			$.get('<?php echo base_url();?>mobile/writeBarcode');
		</script>
	</head>
<body>
<div  class="row-fluid">	  	
	  	<div class="span8 main-content offset2">
			
			
							<textarea type="text" name="barcode" onclick="write()" ><?php echo $data;?></textarea>
						
	  	</div>
	  
	</div>
	</body>
	</html>
