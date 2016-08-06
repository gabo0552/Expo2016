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
			<h2>Promociones</h2>
			<a id = "btn" href = "create_promocion.php" type='button' class='btn btn-default'>¡Agrega Promociones!</a>
			<br>
			<table class = "table table-striped">
				<thead>
					<tr>
						<th>Titulo de Promoción</th>
						<th>Detalles</th>
						<th>Imagen</th>
					</tr>
				</thead>
				<tbody>
					<?php
						require("sql/conexion.php");
						$consulta = "SELECT * FROM promociones";
						$rs = "";
						foreach($PDO->query($consulta) as $datos)
						{
							$rs .= "<tr>";
							$rs .= "<td name = 'td_user'>$datos[titulo_promocion]</td>";
							$rs .= "<td name = 'td_user'>$datos[detalles]</td>";
							$rs .= "<td><img src = 'img/$datos[imagen]' width = '100' heigth = '100'></td>";
							$rs .= "<td>";
							$rs .= "<a type='button' class='btn btn-warning' href = 'editar_promocion.php?id=$datos[id_promocion]'>Editar</a>";
							$rs .= "</tr>";
						}
						print($rs);
						$PDO = null;
					?>
				</tbody>
			</table>
		</div>
	</body>
</html>