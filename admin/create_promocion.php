<?php
	if(!empty($_POST))
	{
		$titulo = $_POST['txttitulo'];
		$detalles = $_POST['txtdetalle'];
		$img = $_FILES['txtfile'];


		if($img['name'] == null)
		{
			Insertar($titulo, $detalles, "default.png");
		}
		else
		{
			$error = "";
			if($img['type'] == "image/jpeg" || $img['type'] == "image/png" || $img['type'] == "image/x-icon" || $img['type'] == "image/gif")
			{
		        	$info_imagen = getimagesize($img['tmp_name']);
		        	$ancho_imagen = $info_imagen[0]; 
					$alto_imagen = $info_imagen[1];
					if($ancho_imagen <= 1600 && $alto_imagen <= 1000) 
					{
						$nuevo_id = uniqid(); //Esto sirve para darle un nombre único a cada archivo de imagen.
				        $nombre_archivo = $img['tmp_name'];
				        $imagen_producto = $nuevo_id.".png";
				        $destino = "img/$imagen_producto";
				        move_uploaded_file($nombre_archivo, $destino);
				        Insertar($titulo, $detalles, $imagen_producto);
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

	function Insertar($titulo, $detalles, $img)
	{
		require("sql/conexion.php");
		 $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		 $sql = "INSERT INTO promociones(titulo_promocion, detalles, imagen) VALUES(?,?,?)";

		 $stmt = $PDO->prepare($sql);

		 $stmt->execute(array($titulo, $detalles, $img));

		 $PDO = null;

		 header("location: img_admin.php");
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
		<div class="container">
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 id = "lbl" class="panel-title">AGREGAR NUEVOS USUARIOS</h3>
			  </div>
			  	<div class="panel-body">
			  		<form method = "POST" enctype="multipart/form-data">
			  		<fieldset>
			  			
			<div class="form-group">
				<label id = "lbl" for = "name">Titulo de Promoción</label>
				<input id = "in" type="text" name = "txttitulo" class = "form-control">
			</div>
			<div class="form-group">
				<label id = "lbl" for = "name">Detalles de Promoción</label>
				<textarea id = "in" type="text" name = "txtdetalle" class = "form-control"></textarea>	
			</div>
			<div class="form-group">
				<label id = "lbl" for = "name">Imagen de Promoción</label>
				<input type="file" name = "txtfile">
			</div>
  				<button id = "g_user" type = "submit" class = "btn btn-default">Guardar</button>
  				<a href = "img_admin.php" type = "button" class = "btn btn-default">Cancelar</a>
  				
			</fieldset>
			</form>
			</div>	
		</div>
	</body>
</html>