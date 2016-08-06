<?php
	include 'sesion.php';


?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Consultar Reservaciones
		</title>
	</head>
	<body>
		<?php
			include 'master.php';
		?>
		
		<div class="container">
      <h2>Consultar Reservaciones</h2>
      <a id = "btn" href = "crear_reservacion.php" type='button' class='btn btn-default'>¡Agrega Reservaciones!</a>
			 <form method = "POST">
                <fieldset>
              <label for = "name">Buscar</label>
              <input id = "b_cliente" placeholder = "Buscar por nombre" name = "txtbuscar" type ="text" class = "form-control"><br>
              <button id = "btn_sub" type = "submit" class = "btn btn-default">Buscar</button>
                </fieldset>
              </form>
              <!--Operacion buscar!-->
              <?php
                if(!empty($_POST))
                {
                  $buscar = trim($_POST['txtbuscar']);
                  //Creando consulta, igual aqui, la dir¿ferencia es que esta consulta la ocupo cuando realizo una busqueda
                  $sql = "SELECT * FROM reservaciones, tipo_areas, estado, cliente WHERE reservaciones.id_cliente = cliente.id_cliente AND reservaciones.id_estado = estado.id_estado AND reservaciones.id_tipo_area = tipo_areas.id_tipo_area AND nombre LIKE '%$buscar%' ORDER BY fecha_salida";
                  $prm = null;
                }
                else
                {
                  //En esta consulta llamo todos los datos de la tabla
                  $sql = "SELECT * FROM reservaciones, tipo_areas, estado, cliente WHERE reservaciones.id_cliente = cliente.id_cliente AND reservaciones.id_estado = estado.id_estado AND reservaciones.id_tipo_area = tipo_areas.id_tipo_area";
                  $prm = null;
                }
              ?>
              <table class = "table table-striped">
                <thead>
                <tr>
                  <!--th>Cod.</th!-->
                  <th>Cliente</th>
                  <th>Check-in</th>
                  <th>Check-out</th>
                  <th>N° Habitación</th>
                  <th>Tipo de Area</th>
                  <th>Estado</th>
                  <th>N° Huespedes</th>
                  <th>Telefono</th>
                  <th>Correo</th>
                  <th>Tarjeta de Credito</th>
                  <th>Expiración de Tarjeta</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                    //conectando a base 

                    require("sql/conexion.php");
                    //$consult = "SELECT * FROM reservaciones";
                    $result = ""; //Arreglo de datos
                  foreach($PDO->query($sql) as $datos)
                  {
                    //creando estructura HTML + PHP
                    $result .= "<tr>";
                    $result .= "<td name = 'td_user'>$datos[correo]</td>";
                    $result .= "<td name = 'td_user'>$datos[fecha_entrada]</td>";
                    $result .= "<td name = 'td_user'>$datos[fecha_salida]</td>";
                    $result .= "<td name = 'td_user'>$datos[num_habitacion]</td>";
                    $result .= "<td name = 'td_user'>$datos[nombre_tipo_area]</td>";
                    $result .= "<td name = 'td_user'>$datos[nombre_estado]</td>";     
                    $result .= "<td name = 'td_user'>$datos[num_huespedes]</td>";
                    $result .= "<td name = 'td_user'>$datos[telefono]</td>";
                    $result .= "<td name = 'td_user'>$datos[correo]</td>";          
                    $result .= "<td name = 'td_user'>$datos[tarjeta_credito]</td>";
                    $result .= "<td name = 'td_user'>$datos[exp_tarjeta]</td>";
                    $result .= "<td>";
                    $result .= "<a type='button' class='btn btn-warning' href = 'update_cliente.php?id=$datos[id_cliente]'>Editar</a>";
                    $result .= "<a type='button' class='btn btn-danger' href = 'delete_cliente.php?id=$datos[id_cliente]'>Eliminar</a>";
                    $result .= "</td>";
                    $result .= "</tr>";
                  }
                  print($result);
                  $PDO = null;
                  ?>
              </tbody>
              </table>
		</div>
	</body>
</html>
