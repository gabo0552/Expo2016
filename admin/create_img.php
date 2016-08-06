<?php
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<?php
			include 'master.php'; 
		?>
<div class="container">
	<div class="panel panel-default">
  		<div class="panel-heading">Nuevas Imagenes</div>
  		<div class="panel-body">
    		<form method = "POST" >
    			<fieldset>
    				<div class="form-group">
    					<label id = "lbl" for="name">Zona</label>
    					<select id = "en" class = "btn btn-default broswer-default" name = 'cmbUs' required>
    						
    					</select>
    				</div>
    				<div class="form-group">
    					<label id = "lbl" for="last_name">ARCHIVO</label>
      					<input id = "in" name = "txtnombre" type="file" class = "form-control" value = ''>
    				</div>
            <button id = "btn" type = "submit" class = "btn btn-default">Guardar</button>
            <a type = "button" href = "img_admin.php" class = "btn btn-default">Cancelar</a>
    			</fieldset>
    		</form>
  		</div>
	</div>
  </div>
	</body>
</html>