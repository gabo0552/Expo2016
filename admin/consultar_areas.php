<?php
	include 'sesion.php';
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
          <h2>Areas</h2>
              <a id = "btn" href = "areas.php" type='button' class='btn btn-default'>¡Agrega nuevas áreas!</a>
              <br>
              <!--Formulario de busqueda!-->
              <form method = "POST">
                <fieldset>
              <label for = "name">Buscar</label>
              <input id = "b_cliente" placeholder = "Buscar por nombre" name = "txtbuscar" type ="text" class = "form-control"><br>
              <button id = "btn_sub" type = "submit" class = "btn btn-default">Buscar</button>
                </fieldset>
              </form>
              <?php
                if(!empty($_POST))
                {
                  $buscar = trim($_POST['txtbuscar']);
                  //Creando consulta
                  $sql = "SELECT * FROM area, estado, tipo_areas WHERE area.id_estado = estado.id_estado AND area.id_tipo_area = tipo_areas.id_tipo_area LIKE '%$buscar%' ORDER BY nombre_area";
                  $prm = null;
                }
                else
                {
                  //En caso de no realizar busqueda
                  $sql = "SELECT * FROM area, estado, tipo_areas WHERE area.id_estado = estado.id_estado AND area.id_tipo_area = tipo_areas.id_tipo_area ORDER BY nombre_area";
                  $prm = null;
                }
              ?>

                <table class = "table table-striped">
	                <thead>
	                <tr>
	                  <!--th>Cod.</th!-->
	                  <th>Nombre</th>
	                  <th>Estado</th>
	                  <th>Descripción</th>
	                  <th>Tipo de Area</th>
	                  <th>Imagen</th>
	                </tr>
	              </thead>
	              <tbody>
	              	<?php
	              		require("sql/conexion.php");
	              		$result = "";
	              		foreach($PDO->query($sql) as $datos) 
	              		{
	              			$result .= "<tr>";
              				$result .= "<td>$datos[nombre_area]</td>";
              				$result .= "<td>$datos[nombre_estado]</td>";
              				$result .= "<td>$datos[descripcion]</td>";
              				$result .= "<td>$datos[nombre_tipo_area]</td>";
          					$result .= "<td><img src = 'img/$datos[url_imagen]' width = '100' heigth = '100'></td>";
	              			$result .= "</tr>";
	              		}

	              		print($result);
	              		$PDO = null;
	              	?>
	              </tbody>
		</div>
	</body>
</html>