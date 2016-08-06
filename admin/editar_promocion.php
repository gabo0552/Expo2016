<?php
	
	$id = null;
	if(!empty($_GET['id']))
	{
		$id = $_GET['id'];
	}
	if($id == null)
	{
		header("location: img_admin.php");
	}

	if(!empty($_POST))
	{
		$titulo = $_POST['txttitulo'];
		$detalle = $_POST['txtdet'];
		$imagen = $_POST['txtimg'];
		$estado = $_POST['rdbEstado'];

		function Estado($id, $estado)
		{
			require("sql/conexion.php");
			$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE promociones SET estado_promocion = ? WHERE id_promocion = ?";
	      	$stmt = $PDO->prepare($sql);
      		$stmt->execute(array($estado, $id));
      		$PDO = null;
      		header("location: img_admin.php");
		}

		Estado($id, $estado);

	}
	else
	{
		require("sql/conexion.php");
		$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM promociones WHERE id_promocion = $id";
	    $stmt = $PDO->prepare($sql);
	    $stmt->execute();
	    $data = $stmt->fetch(PDO::FETCH_ASSOC);
	    $PDO = null;
	    $titulo = $data['titulo_promocion'];
	    $detalle = $data['detalles'];
	    $imagen = $data['imagen'];
	    $estado = $data['estado_promocion'];
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>
			Estado Promoción
		</title>
	</head>
	<body>
		<?php
			include 'master.php';
		?>
		<br>

		<div class="container">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Modifica Promoción</h3>
				</div>
			<div class="panel-body">
				<form method = "POST" accept-charset="UTF-8" role="form">
					<fieldset>
						<div class="form-group">
							<label for="name">Titulo de Promoción</label>
							<input class = "form-control" placeholder = "Titulo" name="txttit" type="text" value = "<?php print($titulo)?>">
						</div>

						<div class="form-group">
							<label for="name">Detalles</label>
							<!--input class = "form-control" placeholder = "Detalles" name="txtdet" type="text" value = "<?php //print($detalle)?>"!-->
							<textarea class = "form-control" name = "txtdet" id = "" cols="10" rows="10"><?php print($detalle)?></textarea>
						</div>

						<div class="form-group">
							<label for = "name">Imagen</label>
							<input type="file" value = "<?php print($imagen)?>">
						</div>

						<div class="form-group">
							<label for = "name">Activa</label>
							<input class="with-gap" name="rdbEstado" type="radio" id="activo" value="1" <?php print(isset($estado) && $estado == 1 || !isset($estado)?"checked":""); ?>/>
						</div>

						<div class="form-group">
							<label for = "name">Inactiva</label>
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