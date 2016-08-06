<?php
	include 'sesion.php';
	
    require("sql/conexion.php");
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM permisos WHERE id_modulo = 1 AND id_tipo_usuario = $_SESSION[id_tipo_usuario]";
    $stmt = $PDO->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    $PDO = null;

    if($data == null)
    {
        print("<script> alert('Acceso Denegado'); window.location = 'read_user.php'; </script>");
    }

	if(!empty($_POST))
	{


		//Creando variable
		$nombre = $_POST['txtnombre'];
		//Creando funcion
		function AgregarUs($nombre)
		{
			//Creando conexion
			require("sql/conexion.php");
			$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//Creando consulta
			$sql = "INSERT INTO tipo_usuario(usuario) values (?)";
			//Preparando consulta
			$stmt = $PDO->prepare($sql);
			//Array
			$stmt->execute(array($nombre));
			//Cerrando conexion
			$PDO = null;
			header("location: org.php");
		}
		//Llamando funcion
		AgregarUs($nombre);
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
		<title>
			
		</title>
	</head>
	<body>
		<?php
			include 'master.php';
		?>
			<div class="container">
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 id = "lbl" class="panel-title">AGREGAR NUEVOS TIPOS DE USUARIOS</h3>
			  </div>
			  <div class="panel-body">
			  	<form method = "POST">
			  		<fieldset>
      					<div class="form-group">
	      					<label id = "lbl" for="last_name">TIPO DE USUARIO</label>
	      					<input id = "in" name = "txtnombre" type="text" class = "form-control" >
      					</div>
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
							
							$chk .= "</div>";
							//$chk .= "<label for = 'name'>Activo</label>";
							//$chk .= "<input class = 'with-gap' name = 'rdbEstado' type = 'radio' value = '1'>";
							//$chk .= "</div>";
						}
							print($chk);
							$PDO = null;
					?>
     				<button id = "g_user" type = "submit" class = "btn btn-default">GUARDAR</button>
      				<a href = "org.php" type = "button" class = "btn btn-default">CANCELAR</a>
			  		</fieldset>
			  	</form>
			  </div>
			</div>
			</div>
	</body>
</html>