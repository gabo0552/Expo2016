<!Doctype html>
	
	<head>	
			<link rel='stylesheet' type='text/css' href='../css/materialize.min.css'>
			<link rel='stylesheet' type='text/css' href='../css/style.css'>
			<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
			<script src='../js/jquery-2.2.0.min.js'></script>  
			<script src='../js/materialize.min.js'></script>
			<script src='../js/method.js'></script>
			
	</head>

	<body>

		<?php
	session_start();
	if(!isset($_SESSION['nombre']))
	{
	  header("location: ../../public/sheet/iniciarsesion.php");
	}
	if(!isset($_SESSION['id_cliente']))
	{
	  header("location: ../../public/sheet/iniciarsesion.php");
	}
?>
		<?php include '../comps/navbarsheet.php';?>

		<div class='container'>

			<p id='titgaleriaimagenes'>Mis Acciones</p>

			<ul class="collapsible popout" data-collapsible="accordion">
			    
			    <li>
			      <div class="collapsible-header"><i class="material-icons">filter_drama</i>Reservaciones</div>
			      <!--Distribucion de contenido-->
			      <div class="collapsible-body">
			      		
			      		<!--Tabla de registros-->
			      		
					          <?php

					          		require("../../private/sql/conexion.php");
									 $id=$_SESSION['id_cliente'];
									 $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									 $sql = "SELECT id_reservacion,fecha_entrada,fecha_salida,num_habitacion,num_huesped FROM `reservaciones` WHERE id_cliente=$id";
									 $stmt = $PDO->prepare($sql);
									 $stmt->execute(array($id));
									 
									 if($stmt->rowCount() > 0)
									 {
											     /*Generar anuncio*/
					                     $anuncio = "";//Arreglo de datos

					                    print("

					                    	<table>
										        <thead>
										          <tr>
										          	  <th>N°</th>
										              <th>Fecha de Entrada</th>
										              <th>Fecha de Salida</th>
										              <th>Numero de Habitaciones</th>
										              <th>Numero de Huespedes</th>
										              <th>Opciones</th>
										          </tr>
										        </thead>

										        <tbody>");
					                    
					                    foreach($PDO->query($sql) as $datos)
					                    {
					                        $anuncio .="<tr>";
					                        $anuncio .="<td>$datos[id_reservacion]</td>";
					                        $anuncio .="<td>$datos[fecha_entrada]</td>";
					                        $anuncio .="<td>$datos[fecha_salida]</td>";
					                        $anuncio .="<td>$datos[num_habitacion]</td>";
					                        $anuncio .="<td>$datos[num_huesped]</td>";
					                        $anuncio .="<td><button class='btn waves-effect waves-light pink darken-4'>Cancelar</button></td>";
					                        $anuncio .="</tr>";
					                        
					                    }
					                    print($anuncio);
					                    print(" </tbody> </table>");
									 }
									 else{
									 	print("No posee Reservaciones");
									 }
				                    $PDO = null;
				                ?>




					     
					        </tbody>
					      </table>

			      </div>
			    </li>

			    
			  </ul>
        
		</div>
		<?php include '../comps/footersheet.php';?>

	</body>