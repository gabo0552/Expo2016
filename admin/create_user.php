<?php
	if(!empty($_POST))
	{
		//Creando variables
		$nombre = $_POST['txtnombre'];
		$apellido = $_POST['txtapellido'];
		$user = $_POST['txtusuario'];
		$correo = $_POST['txtcorreo'];
		$pass = $_POST['txtpass'];
		$conf = $_POST['txtconf'];
		$direccion = $_POST['txtdirec'];
		$t_user = $_POST['cmbUs'];
		
		//Creando funcion
		function AgregarUs($nombre, $apellido, $user, $correo, $pass, $direccion, $t_user)
		{
			//Conectando a base
			require("sql/conexion.php");
			$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//Encriptacion
			$pass = password_hash($pass, PASSWORD_DEFAULT);
			//Creando consulta
			$sql = "INSERT INTO usuarios(nombre, apellido_usuario, nombre_usuario, correo, clave, direccion, id_tipo_usuario) values (?, ?, ?, ?, ?, ?, ?)";
			//Consulta preparada
			$stmt = $PDO->prepare($sql);
			//arreglo
			$stmt->execute(array($nombre, $apellido, $user, $correo, $pass, $direccion, $t_user));
			//cerrndo conexion
			$PDO = null;
			header("location: org.php");
		}
		//Verificando password
		if($pass == $conf)
		{
			//Llamando funcion
			AgregarUs($nombre, $apellido, $user, $correo, $pass, $direccion, $t_user);	
		}
		else
		{
			//En caso de que no coincidan 
			print("<script> alert('Las contraseñas no coinciden'); </script>");
		}
	}
	else
	{
		$nombre = null;
		$apellido = null;
		$user = null;
		$correo = null;
		$direccion = null;
		$t_user = null;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			CREAR USUARIOS
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
				    <h3 id = "lbl" class="panel-title">AGREGAR NUEVOS USUARIOS</h3>
				  </div>
				  <div class="panel-body">
      			<form method = "POST">
      				<fieldset>
      				<div class="form-group">
      					<label id = "lbl" for="last_name">NOMBRES</label>
      					<input id = "in" name = "txtnombre" type="text" class = "form-control" onkeypress="return validarn(event)" value = '<?php print($nombre);?>'>
      				</div>
      				<div class="form-group">
      					<label id = "lbl" for="last_name">APELLIDOS</label>
      					<input id = "in" type="text" class = "form-control" name = "txtapellido" value = '<?php print($apellido);?>'>
      				</div>
      				<div class="form-group">
      					<label id = "lbl" for="last_name">USUARIO </label>
      					<input id = "in" type="text" class = "form-control" name = "txtusuario" value = "<?php print($user); ?>">
      				</div>
      				<div class="form-group">
      					<label id = "lbl" for="last_name">CORREO </label>
      					<input id = "in" type="email" class = "form-control" name = "txtcorreo" value = "<?php print($correo); ?>">
      				</div>
      				<div class="form-group">
      					<label id = "lbl" for="last_name">CONTRASEÑA </label>
      					<input id = "in" type="password" class = "form-control" name = "txtpass">
      				</div>
      				<div class="form-group">
      					<label id = "lbl" for="last_name">CONFIRMAR CONTRASEÑA </label>
      					<input id = "in" type="password" class = "form-control" name = "txtconf">
      				</div>
      				<div class="form-group">
      					<label id = "lbl" for="last_name">DIRECCIÓN </label>
      					<textarea id = "in" class = "form-control" type = "text" name = "txtdirec"></textarea>
      				</div>
      				<div class="form-group">
      					<label id = "lbl" for="last_name">TIPO DE USUARIO</label>
      					<br>
	                     	<select id = "en" class = "btn btn-default broswer-default" name = 'cmbUs' required>
		                        <?php
		                           require("sql/conexion.php");
		                           $cn = "SELECT * FROM tipo_usuario";
		                           $sel = "";

		                           foreach ($PDO -> query($cn) as $datos) 
		                           {
		                              $sel .= "<option value = '$datos[id_tipo_usuario]'";
		                              if (isset($tipos) == $datos['id_tipo_usuario']) 
		                              {
		                                 $sel .= "selected";
		                              }
		                              $sel .= ">$datos[usuario]</option>";
		                           }
		                           print($sel);
		                           $PDO = null;
		                        ?>
                     			</select>
      				</div>
      				<button id = "g_user" type = "submit" class = "btn btn-default">GUARDAR</button>
      				<a href = "org.php" type = "button" class = "btn btn-default">CANCELAR</a>
      				</fieldset>
      			</form>
      			</div>
      		</div>
  			</div>

	</body>
</html>	