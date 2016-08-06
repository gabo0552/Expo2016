<?php
	include 'sesion.php';

	if(!empty($_POST))
	{
		$nombre = $_POST['txtnombre'];
		$estado = $_POST['cmbEst'];
		$descrip = $_POST['txtdescrip'];
		$tipo = $_POST['cmbTipo'];
		$url = $_FILES['txtfile'];
		
		if($url['name'] == null)
		{
			Insertar($nombre, $estado, $descrip, $tipo, "default.png");
		}
		else
		{
			$error = "";
			if($url['type'] == "image/jpeg" || $url['type'] == "image/png" || $url['type'] == "image/x-icon" || $url['type'] == "image/gif")
			{
					$info_imagen = getimagesize($url['tmp_name']);
					$ancho_imagen = $info_imagen[0]; 
					$alto_imagen = $info_imagen[1];
					if($ancho_imagen <= 1600 && $alto_imagen <= 1000) 
					{
						$nuevo_id = uniqid(); //Esto sirve para darle un nombre único a cada archivo de imagen.
						$nombre_archivo = $url['tmp_name'];
						$imagen_producto = $nuevo_id.".png";
						$destino = "img/$imagen_producto";
						move_uploaded_file($nombre_archivo, $destino);
						Insertar($nombre, $estado, $descrip, $tipo, $imagen_producto);
					}
					else
					{
						print("<script> alert('La dimensión de la imagen no es apropiada.') </script>");
					}		
			}
			else
			{
				print("<script> alert('') </script>");
			}
		}
	}

		function Insertar($nombre, $estado, $descrip, $tipo, $url)
		{
			require("sql/conexion.php");
			 $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			 $sql = "INSERT INTO area(nombre_area, id_estado, descripcion, id_tipo_area, url_imagen) VALUES(?,?,?,?,?)";

			 $stmt = $PDO->prepare($sql);

			 $stmt->execute(array($nombre, $estado, $descrip, $tipo, $url));

			 $PDO = null;

			 header("location: org.php");
		}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Areas
		</title>
	</head>
	<body>
		<?php
			include 'master.php';
		?>
		
		<div class="container">
			<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 id = "lbl" class="panel-title">Agregar Areas</h3>
			  	</div>
			  	<div class="panel-body">
					<form method = "POST" enctype="multipart/form-data">
						<fieldset>
							<div class="form-group">
								<label id = "lbl" for = "name">Nombre</label>
								<input id = "in" type = "text" name = "txtnombre" class = "form-control">
							</div>

							<div class="form-group">
								<label id = "lbl" for = "name">Estado</label>
								<br>

								<select id = "en" class = "btn btn-default broswer-default" name = 'cmbEst' required>
									<?php
			                           require("sql/conexion.php");
			                           $cn = "SELECT * FROM estado";
			                           $sel = "";

			                           foreach ($PDO -> query($cn) as $datos) 
			                           {
			                              $sel .= "<option value = '$datos[id_estado]'";
			                              if (isset($tipos) == $datos['id_estado']) 
			                              {
			                                 $sel .= "selected";
			                              }
			                              $sel .= ">$datos[nombre]</option>";
			                           }
			                           print($sel);
			                           $PDO = null;
		                        	?>
								</select>
							</div>
	
							<div class="form-group">
								<label for="name">Descripción</label>
								<textarea id = "in" type = "text" name = "txtdescrip" class = "form-control">
									
								</textarea>
							</div>

							<div class="form-group">
								<label for="name">Tipo de Area</label>
								<br>

								<select id = "en" class = "btn btn-default broswer-default" name = 'cmbTipo' required>
									<?php
			                           require("sql/conexion.php");
			                           $cn = "SELECT * FROM tipo_areas";
			                           $sel = "";

			                           foreach($PDO -> query($cn) as $datos) 
			                           {
			                              $sel .= "<option value = '$datos[id_tipo_area]'";
			                              if (isset($tipos) == $datos['id_tipo_area']) 
			                              {
			                                 $sel .= "selected";
			                              }
			                              $sel .= ">$datos[nombre]</option>";
			                           }
			                           print($sel);
			                           $PDO = null;
		                        	?>
								</select>
							</div>

							<div class="form-group">
								<label for="name">Extraer Imagen</label>
								<input type="file" name = "txtfile">
							</div>

			  					<button id = "g_user" type = "submit" class = "btn btn-default">Guardar</button>
  								<a href = "consultar_areas.php" type = "button" class = "btn btn-default">Cancelar</a>
						</fieldset>
					</form>
		  		</div>
		  	</div>
		</div>
	</body>
</html>