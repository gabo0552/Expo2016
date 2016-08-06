<?php
	if(!empty($_GET['id']))
	{
		$id = $_GET['id'];
	}

	if ($id == null)
	{
		header("location: org.php");
	}

	if(!empty($_POST))
	{
		$nombre = $_POST['txtnombre'];
		$apellido = $_POST['txtapellido'];
		$nac = $_POST['txtfecha'];
		$correo = $_POST['txtcorreo'];
		$tel = $_POST['txtTel'];
		$pass = $_POST['txtpass'];
		$estado = $_POST['rdbEstado'];

		function Update($id, $estado)
		{
			require("sql/conexion.php");
			$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE cliente SET estado_cuenta = ? WHERE id_cliente = ?";
			$stmt = $PDO->prepare($sql);
			$stmt->execute(array($estado, $id));
			$PDO = null;
			header("location: read_user.php");
		}

		Update($id, $estado);
	}
	else
	{
		require("sql/conexion.php");
		$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM cliente WHERE id_cliente = $id";
		$stmt = $PDO->prepare($sql);
		$stmt->execute();
		$data = $stmt->fetch(PDO::FETCH_ASSOC);
		$PDO = null;
		$nombre = $data['nombre'];
		$apellido = $data['apellido'];
		$nac = $data['fecha_nacimiento'];
		$correo = $data['correo'];
		$tel = $data['telefono'];
		$pass = $data['clave_user'];
		$estado = $data['estado_cuenta'];
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

		<div class="well">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Modifica Clientes</h3>
				</div>
				<div class="panel-body">
					<form method = "POST" accept-charset="UTF-8" role="form">
						<fieldset>	
							<div class="form-group">
								<label for="name">Nombre</label>
								<input class = "form-control" placeholder = "Nombre" name="txtnombre" type="text" value = "<?php print($nombre)?>" disabled>
							</div>
							<div class="form-group">
								<label for="name">Apellido</label>
								<input class = "form-control" placeholder = "Apellido" name="txtapellido" type="text" value = "<?php print($apellido)?>" disabled>
							</div>
							<div class="form-group">
								<label for="name">Fecha de Nacimiento</label>
								<input class = "form-control" placeholder = "Fecha" name="txtfecha" type="date" value = "<?php print($nac)?>" disabled>
							</div>
							<div class="form-group">
								<label for="name">Correo</label>
								<input class = "form-control" placeholder = "Correo" name="txtcorreo" type="email" value = "<?php print($correo)?>" disabled>
							</div>

							<div class="form-group">
								<label for="name">Telefono</label>
								<input class = "form-control" placeholder = "Telefono" name="txtTel" type="text" value = "<?php print($tel)?>" disabled>
							</div>

							<div class="form-group">
								<label for="name">Contraseña</label>
								<input class = "form-control" placeholder = "Contraseña" name="txtpass" type="password" value = "<?php print($pass)?>" disabled>
							</div>
	                      	<div class="form-group">
	                        <label for = "name">Activo</label>
	                        <input class="with-gap" name="rdbEstado" type="radio" id="activo" value="1" <?php print(isset($estado) && $estado == 1 || !isset($estado)?"checked":""); ?>/>
	                      </div>
	                      <div class="form-group">
	                        <label for = "name">Inactivo</label>
	                        <input class="with-gap" name="rdbEstado" type="radio" id="inactivo" value="0" <?php print(isset($estado) && $estado == 0?"checked":""); ?>/>
	                      </div>
							<button id = "btn" type = "submit" class = "btn btn-default">Guardar</button>
							<a href = "read_user.php"  type = "button" class = "btn btn-default">Cancelar</a>
						</fieldset>
					</form>
				</div>	
			</div>	
		</div>
	</body>
</html>