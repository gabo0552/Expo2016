<?php
	if(!empty($_POST))
	{
		//Declarando variables
		$nombre = $_POST['txtnombre'];
		$apellido = $_POST['txtapellido'];
		$fecha = trim($_POST['txtfecha']);
		$correo = trim($_POST['txtemail']);
		$tel = trim($_POST['txttel']);
		$pass = trim($_POST['txtpass']);
		$conf = trim($_POST['txtconf']);
	
		//Creando la funcion
		if($nombre != "" && $apellido != "" && $fecha != "" && $correo != "" && $tel != "" && $pass != "" && $conf != "")
		{
			if(filter_var($correo, FILTER_VALIDATE_EMAIL))
			{
				if(filter_var($tel, FILTER_VALIDATE_INT))
				{
					function AgregarUs($nombre, $apellido, $fecha, $correo, $tel, $pass)
					{
						//Haciendo conexion
						require("sql/conexion.php");
						$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						//Encriptando contraseña
						$pass = password_hash($pass, PASSWORD_DEFAULT);
						//Insertando datos
						$sql = "INSERT INTO cliente(nombre, apellido, fecha_nacimiento, correo, telefono, clave_user) values (?, ?, ?, ?, ?, ?)";
						$stmt = $PDO->prepare($sql);
						//arreglo de datos
						$stmt->execute(array($nombre, $apellido, $fecha, $correo, $tel, $pass));
						//cerrando conexion
						$PDO = null;
						header("location: read_user.php");
					}
				}
			}

			
		}
		
		if($pass == $conf)
		{
		//Llamando la funcion
		 AgregarUs($nombre, $apellido, $fecha, $correo, $tel, $pass);
		}
		else
		{
			//En caso de que no coincida el password
			print("<script> alert('Las contraseñas no coinciden'); </script>");
		}
	}
	else
	{
		//Vacias
		$nombre = null;
		$apellido = null;
		$fecha = null;
		$correo = null;
		$tel = null;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			
		</title>
	</head>
	<body>
		<?php
		include 'master.php';
		?>

		<br>
	    	<div class="well">
				<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 id = "lbl" class="panel-title">¡AGREGAR NUEVOS CLIENTES!</h3>
				  </div>
				  <div class="panel-body">
      			<form method = "POST" onsubmit="validar()">
      				<fieldset>
      				<div class="form-group">
      					<label id = "lbl" for="last_name">NOMBRES</label>
      					<input id = "in" name = "txtnombre" type="text" class = "form-control" data-toggle = "tooltip" data-placement = "rigth" title = "INGRESE SOLO TEXTO" value = '<?php print($nombre)?>'>
      				</div>
      				<div class="form-group">
      					<label id = "lbl" for="last_name">APELLIDOS</label>
      					<input id = "in" type="text" class = "form-control" name = "txtapellido" data-toggle = "tooltip" data-placement = "rigth" title = "INGRESE SOLO TEXTO" value = '<?php print($apellido)?>'>
      				</div>
      				<div class="form-group">
      					<label id = "lbl" for="last_name">FECHA DE NACIMIENTO </label>
      					<input id = "in" type = "date" min = "1900-10-08" class = "form-control" name = "txtfecha" value = '<?php print($fecha)?>'>
      				</div>
      				<div class="form-group">
      					<label id = "lbl" for="last_name">CORREO </label>
      					<input id = "in" type="email" class = "form-control" name = "txtemail" value = '<?php print($correo)?>'>
      				</div>
      				<div class="form-group">
      					<label id = "lbl" for="last_name">TELEFONO </label>
      					<input id = "in" class = "form-control" type = "text" name = "txttel" data-toggle = "tooltip" data-placement = "rigth" title = "INGRESE SOLO NUMEROS" value = '<?php print($tel)?>'>
      				</div>
      				<div class="form-group">
      					<label id = "lbl" for="last_name">CONTRASEÑA</label>
	                     <input id = "in" type = "password" class = "form-control" name = "txtpass">
      				</div>
  					<div class="form-group">
      					<label id = "lbl" for="last_name">CONFIRMAR CONTRASEÑA</label>
	                     <input id = "in" type = "password" class = "form-control" name = "txtconf">
      				</div>
      				<button id = "g_user" type = "submit" class = "btn btn-default">GUARDAR</button>
      				<a href = "read_user.php" type = "button" class = "btn btn-default">CANCELAR</a>
      				</fieldset>
      			</form>
      			</div>
      		</div>
  			</div>
	</body>
</html>