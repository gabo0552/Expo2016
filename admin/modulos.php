<?php

	include 'sesion.php';

	require("sql/conexion.php");
	$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$consult = "SELECT * FROM permisos WHERE id_permiso = 1";

	if(!empty($_POST))
	{
		if(count($_POST['chk_est']) > 0)
		{
			require("sql/conexion.php");
			$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			foreach($_POST['chk_est'] as $varIndice => $varValor)
			{
				$sql = "INSERT INTO permisos(id_modulo, id_tipo_usuario, id_acceso) VALUES(?, ?, ?)";
				$stmt = $PDO->prepare($sql);
				$stmt->execute(array($varValor, $_SESSION['id_tipo_usuario'], 1));
			}
				$PDO = null;
				header("location: org.php");
		}


	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Permisos</title>
	</head>
	<body>
		<?php
			include 'master.php';
		?>

		<div class="container">
			
		<div id = "p_mod" class="panel panel-default">
  			<div id = "mod_c" class="panel-heading">
    			<h3 class="panel-title">Accesos de Modulos</h3>
  			</div>
  			<div class="panel-body">
  				<form method = "POST">
					<?php
						require("sql/conexion.php");
						$con = "SELECT * FROM modulo";
						$chk = "";
						foreach ($PDO -> query($con) as $datos) 
						{
							//$chk .= "<div class = 'form-group'>";
							$chk .= "<div class = 'checkbox'>";
							$chk .= "<label name = 'lblN_Modulo'>$datos[id_modulo]";
							$chk .= "<input name = 'chk_est[]' type='checkbox' value=$datos[id_modulo]>";
							$chk .= " - $datos[nombre_modulo]</label>";
							$chk .= "<hr>";
							$chk .= "</div>";
							//$chk .= "<label for = 'name'>Activo</label>";
							//$chk .= "<input class = 'with-gap' name = 'rdbEstado' type = 'radio' value = '1'>";
							$chk .= "</div>";
						}
							print($chk);
							$PDO = null;
					?>
	    			<div class="panel-footer">
	    				<a id = "ce" type="button" class="btn btn-default" href = "org.php">Volver</a>
						<button id = "gu" type="submit" class="btn btn-primary">Guardar</button>
	    			</div>
    			</form>
  			</div>
		</div>
		</div>
	</body>
</html>