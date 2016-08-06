<?php
	$id = null;
	//llamando ID de la tabla
	if(!empty($_GET['id']))
	{
		$id = $_GET['id'];
	}

	if($id == null)
	{
		header("location: org.php");
	}

	if(!empty($_POST))
	{
		//declarando variables
		$nombre = $_POST['txtnombre'];
		$apellido = $_POST['txtapellido'];
		$user = $_POST['txtuser'];
		$email = $_POST['txtcorreo'];
		$pass = $_POST['txtpass'];
		$direc = $_POST['txtdirec'];
		$t_user = $_POST['cmbUs'];

		//Creando funcion
		function Update($id, $nombre, $apellido, $user , $email, $pass, $direc, $t_user)
		{
			//Conectando a base
			require("sql/conexion.php");
			//
			$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//Funcion actualizar
			$sql = "UPDATE usuarios SET nombre = ?, apellido_usuario = ?, nombre_usuario = ?, correo = ?, clave = ?, direccion = ?, id_tipo_usuario = ? WHERE id_usuario = ?";
			//Preparando consulta
			$stmt = $PDO->prepare($sql);
			//arreglo de datos
			$stmt->execute(array($nombre, $apellido, $user, $email, $pass, $direc, $t_user, $id));
			//Cerrando conexion
			$PDO = null;
			header("location: org.php");
		}
		//Llamando funcion
		Update($id, $nombre, $apellido, $user, $email, $pass, $direc, $t_user);
	}
	else
	{
		//estableciendo conexion
		require("sql/conexion.php");
		$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM usuarios WHERE id_usuario = $id";
		$stmt = $PDO->prepare($sql);
		$stmt->execute();
		$data = $stmt->fetch(PDO::FETCH_ASSOC);
		$PDO = null;
		$nombre = $data['nombre'];
		$apellido = $data['apellido_usuario'];
		$user = $data['nombre_usuario'];
		$email = $data['correo'];
		$pass = $data['clave'];
		$direc = $data['direccion'];
		$t_user = $data['id_tipo_usuario'];
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Actualizar Usuario
		</title>
	</head>
	<body>
		<?php
			include 'master.php';
		?>

		<div class="well">
		<div class="panel panel-default">
  			<div class="panel-heading">
    			<h3 class="panel-title">Panel title</h3>
			</div>
  		<div class="panel-body">
    		<form method = "POST" accept-charset="UTF-8" role="form">
    			<fieldset>
    				<div class="form-group">
    					<label for="name">Nombre</label>
    					<input class = "form-control" placeholder = "Nombre" name="txtnombre" type="text" value = "<?php print($nombre); ?>">
    				</div>

    				<div class="form-group">
    					<label for="name">Apellido</label>
    					<input class = "form-control" placeholder = "Apellido" name = "txtapellido" type = "text" value = "<?php print($apellido);?>">
    				</div>

    				<div class="form-group">
    					<label for="name">Usuario</label>
    					<input class = "form-control" placeholder = "Usuario" name = "txtuser" type = "text" value = "<?php print($user);?>">
    				</div>

    				<div class="form-group">
    					<label for="name">Correo Electrionico</label>
    					<input class = "form-control" placeholder = "Correo" name = "txtcorreo" type = "email" value = "<?php print($email);?>">
    				</div>

    				<div class="form-group">
    					<label for="name">Contraseña</label>
    					<input class = "form-control" placeholder = "Contraseña" name = "txtpass" type = "password" value = "<?php print($pass);?>">
    				</div>

					<div class="form-group">
						<label for="name">Dirección</label>
						<input class = "form-control" placeholder = "Dirección" name="txtdirec" id="" value = "<?php print($direc);?>">
					</div>

					<div class="form-group">
						<label for="">Tipo Usuario</label>
						<br>
						<select class = "btn btn-default broswer-default" name="cmbUs" required>
							<?php
								require("sql/conexion.php");
								$con = "SELECT * FROM tipo_usuario";
								$sel = "";

								foreach($PDO -> query($con) as $datos)
								{
									$sel .= "<option value = '$datos[id_tipo_usuario]'";
									if(isset($tipos) == $datos['id_tipo_usuario'])
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
					<button id = "btn" type = "submit" class = "btn btn-default">Guardar</button>
					<a href = "org.php"  type = "button" class = "btn btn-default">Cancelar</a>
    			</fieldset>
    		</form>
  		</div>
		</div>
		</div>
	</body>
</html>