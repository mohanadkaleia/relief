<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
<body>
<div  class="row-fluid">	  	
	  	<div class="span8 main-content offset2">
			<h1>إضافة بار كود</h1>  
			<?php echo gethostbyname(trim(`hostname`));?>
			<form method="post" action="<?php echo base_url();?>mobile/add" >
				<br />
				
				<table style="direction:rtl">
					<tr>
						<td>
							<label for="barcode">
							النص :
							</label>
						</td>
						
						<td>
							<input type="text" name="barcode" required="required" />
						</td>
					</tr>
					<tr>
						<td colspan="2" >
							<input type="submit" value="أرسل" />
						</td>
					</tr>
					<tr>
						<td colspan="2"><?php if(isset($data)){
													$data = explode(',',$data);
													var_dump($data);}?></td>
					</tr>
				</table>
			</form>
	  	</div>
	  
	</div>
	</body>
	</html>
