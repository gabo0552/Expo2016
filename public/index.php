<?PHP
	require("lib/page.php"); // libreria para modelado de paginas
    require("../lib/database.php"); //libreria para base de datos
    require("../lib/validator.php");  // libreria para validaciones

    Page::header("Pagina Principal"); //Funcion de la clase PAGE que asigna el nombre de las pagina
?>
<form method='post'>
<?php



	/*Metodo para agregar reservaciones*/
	if(!empty($_POST)){

	  $_POST = Validator::validateForm($_POST);
      $fechaentrada = $_POST['txtfechaentrada'];
      $fechasalida = $_POST['txtfechasalida'];
      $idcliente=$_SESSION['id_cliente'];
      $habitacionsencilla=$_POST['txthabitacionsencilla'];
	  $habitaciondoble=$_POST['txthabitaciondoble'];
	  $habitaciontriple=$_POST['txthabitaciontriple'];
      $fechasys=Page::getDate();
      $id_estado=1;
      $idreservacion="";

      function mthCrear($idcliente,$fechaentrada,$fechasalida,$fechasys,$id_estado,$habitacionsencilla,$habitaciondoble,$habitaciontriple){
      try{

      	//Obteniendo las Habitaciones disponibles
		//verificacion de las habitaciones Sencillas
		$sqlsen="SELECT numero FROM area WHERE id_tipo_area=? and id_estado=?";
		$paramssen=Array(1,1);
		$datossencilla=Database::getRows($sqlsen,$paramssen);
		$canthabsencilla=count($datossencilla);
		
					

		//Verificacion de las habitaciones dobles
		$sqldob="SELECT numero FROM `area` WHERE id_tipo_area=? and id_estado=?";
		$paramsdob=Array(2,1);
		$datosdoble=Database::getRows($sqldob,$paramsdob);			
		$canthabdoble=count($datosdoble);
						
		

		//verificacion de las habitaciones triples
		$sqltri="SELECT numero FROM `area` WHERE id_tipo_area=? and id_estado=?";
		$paramstri=Array(3,1);
		$datostriple=Database::getRows($sqltri,$paramstri);
		$canthabtriple=count($datostriple);
      	/*
      		-crea una consulta que te saque las fechas para que valides cuando un hijueputa reserva en el mismo rango de fechas
      		crea una consulta que te verifique el id de la reservacion para que así podas consultarlo y asignar el numero de habitacion a las otras areas
      	*/
      	//si la fecha de entrada contiene algo
      	if($fechaentrada != ""){
      		//si la fecha de salida contiene algo
	      	if($fechasalida != ""){
	      		$imp=Page::VerificacionFechas($fechaentrada,$fechasalida);

	      		if($imp =="<script>swal('Accion Realizada', 'Su reservacion se creo exitosamente', 'success')</script>"){
	      			
	      			/*Proceso de insercion de reservacion*/
	      			$sqlres="INSERT INTO reservaciones(id_cliente,fecha_entrada,fecha_salida,fecha_reservacion,id_estado)VALUES(?,?,?,?,?)";
	      			$parres=Array($idcliente,$fechaentrada,$fechasalida,$fechasys,$id_estado);

	      			$sqlverhab="SELECT * FROM reservaciones where fecha_entrada=? and fecha_salida=? and id_cliente =?";
	      			$paramsverhab =Array($fechaentrada,$fechasalida,$idcliente);
	      			Database::executeRow($sqlres, $parres);
	      			$datosreservacion=Database::getRow($sqlverhab,$paramsverhab);
	      			/*Proceso de insercion de habitaciones por cada cliente*/
	      			//obteniendo el id de la habitacion que se acaba de añadir
	      			

	      			//id de la reservacion obtenido 
	      			$idreservacion = $datosreservacion['id_reservacion'];

	      			/*Proceso de insercion de habitaciones por cliente*/
	      			
	      			/*insercion habitacion simple*/
	      			if(isset($_POST['chk_hs'])){
						//Habitación sencilla
						/*remplazar los $i por la cantidad contenidad en los txt*/
						if($habitacionsencilla != ""){
							//Cantidad de habitaciones reservadas por el cliente

							//verificacion de las habitaciones Sencillas
							$sqlsen="SELECT numero FROM area WHERE id_tipo_area=? and id_estado=? LIMIT $habitacionsencilla";
							$paramssen=Array(1,1);
							$datossencilla=Database::getRows($sqlsen,$paramssen);
							$canthabsencilla=count($datossencilla);

							print("Entra en eel if");
							$cantsencillascliente=$_POST['txthabitacionsencilla'];
							foreach ($datossencilla as $filasen) {
								$insehabsencilla="INSERT INTO areasporcliente(id_area,id_reservacion) VALUES(?,?)";
								$paraminsehabsencilla=Array($filasen['numero'],$idreservacion);
								Database::executeRow($insehabsencilla,$paraminsehabsencilla);	
							}
						}
						else{
							print("no contiene nada en habitacion sencila");
						}
					}
					/*insercion habitaion doble*/
					if(isset($_POST['chk_hd'])){
						//Habitacion doble
						if($habitaciondoble != null){

							//Verificacion de las habitaciones dobles
							$sqldob="SELECT numero FROM `area` WHERE id_tipo_area=? and id_estado=? LIMIT $habitaciondoble";
							$paramsdob=Array(2,1);
							$datosdoble=Database::getRows($sqldob,$paramsdob);			
							$canthabdoble=count($datosdoble);

							//Cantidad de habitaciones reservadas por el cliente
							$cantdoblescliente=$_POST['txthabitaciondoble'];
							foreach ($datosdoble as $filadob) {
								$insehabdoble="INSERT INTO areasporcliente(id_area,id_reservacion) VALUES(?,?)";
								$paraminsehabdoble=Array($filadob['numero'],$idreservacion);
								Database::executeRow($insehabdoble,$paraminsehabdoble);								
							}
						}
						else{
							print("no contiene hada en habitacion dobled");
						}
						
					}
					/*insercion habitacion triple*/
					if(isset($_POST['chk_ht'])){
						//Habitacion Triple
						if($habitaciontriple != null){

							//verificacion de las habitaciones triples
							$sqltri="SELECT numero FROM `area` WHERE id_tipo_area=? and id_estado=? LIMIT $habitaciontriple";
							$paramstri=Array(3,1);
							$datostriple=Database::getRows($sqltri,$paramstri);
							$canthabtriple=count($datostriple);

							//Cantidad de habitaciones reservadas por el cliente
							$canttriplescliente=$_POST['txthabitaciontriple'];

							foreach ($datostriple as $filatrip) {
								/*insert*/
								$insehabtriple="INSERT INTO areasporcliente(id_area,id_reservacion) VALUES(?,?)";
								$paraminsehabtriple=Array($filatrip['numero'],$idreservacion);
								Database::executeRow($insehabtriple,$paraminsehabtriple);								
								/*update*/
							}
						}
						else{
							print("no contiene hada en habitacion dobled");
						}
					}

	      			/*Obteniendo las Habitaciones disponibles
	      				-lo ideal debería ser obtener un array con la cantidad de habitaciones disponibles y escoger una al azar
	      				y para el conteo de habitaciones que se utilice el metodo "count($array);" 
	      				-la consulta devería ser la seleccion de areas de x tipo con estado disponible, una por cada tipo de habitacion
	      				-al momento de insertar podrían insertarse las habitaciones con un "for" de la siguiente estructura:
	      				
	      				*problematica de insercion de datos por cada tipo de habitacion 
	      				for($i=0;$tamaño_del_array > $i;$i++){
							$sql="INSERT INTO habitacionesporcliente(idreservacion,idarea) VALUES(?,?)";
							$params=Array($id_reservacion,Arrayobtenidodextipodehabitaciones[$i]);
							Database::ExecuteRow($sql,$params);
	      				}

	      				 
	      			*/
					
	      			print($imp);
	      		}
	      		else{
	      			print($imp);
	      		}
	      	}
	      	//Si la fecha de salida esta vacia
	      	else{
	      		throw new Exception("Debe llenar el campo de fecha de salida"); 
	      	}	
	     }
      	//Si la fecha de entrada esta vacia
      	else{
      		throw new Exception("Debe llenar el campo de fecha de entrada"); 
      	}
       }
       catch (Exception $error)
        {
            print("<script>swal('Algo no anda bien',".$error->getMessage()."','error')</script>");
        }
      }
      mthCrear($idcliente,$fechaentrada,$fechasalida,$fechasys,$id_estado,$habitacionsencilla,$habitaciondoble,$habitaciontriple);
	}
?>





<?PHP
	
	

//Evalua si hay session o no 
	if(isset($_SESSION['id_cliente'])){
		$res="
		<div class='grey darken-2'>
					<div class='container'>

						<!--generalidades, nombre tc.--> 
						<div class='row'>
							<div class='col s12 m12 l12'>
								<h5 class='white-text'>
									¡Reserva Ya!
								</h5>
							</div>
							<div class='col s12 m12 l12'>
								<p class='grey-text text-lighten-4'>
									Reserva y disfruta de nuestras comodas habitaciones
								</p>
							</div>
						</div>

						<!--Formulario de ingreso de reservación-->
						
							<div class='row'>
								<div class='input-field col s12 m6 l6'>
									<label>Fecha de Entrada</label>
									<input type='date' class='datepicker' name='txtfechaentrada' placeholder='Fecha de Entrada' style='color: white;'>
								</div>
								<div class='input-field col s12 m6 l6'>
									<label>Fecha de Salida</label>
									<input type='date' class='datepicker' name='txtfechasalida' placeholder='Fecha de Salida' style='color: white;'>
								</div>

								<div class='input-field col s12 m6 l6'>
								    <a class='waves-effect waves-light btn modal-trigger' href='#modal1'>Elije tus Habitaciones</a>
								</div>
								
								<div class='input-field col s12 m6 l6'>
								    <button class='btn waves-effect waves-light pink darken-4' href='sheet/galeria.php' type='submit'>¡Reservar Ahora!</button>
								</div>
							</div>
						
					</div>
				</div>";

	}
	else{
		$res="<div class='card-panel yellow'><i class='material-icons left'>warning</i>Registrate y Realiza Reservaciones en línea</div>";
	}
	print($res);

?>

  <!-- Modal Structure -->
  
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>¡Elije tus Habitaciones!</h4>
      <p>Elije entre nuestras Habitaciones, la mejor opcion para tu estadía.</p>
      

      <div class='row s12 m12 l12'>
      	<div class='col s2 m6 s12'>
      		<input type="checkbox" id="chk_hs" name="chk_hs"/>
      		<label for="chk_hs">Habitacion Sencilla</label>
      	</div>
      	<div class='col s12 m6 l6'>
      		<label>Cantidad</label>
			<input type='number' min='1' max='<?php print($canthabsencilla);?>' name='txthabitacionsencilla'/>
      	</div>
      </div>
      <div class='row s12 m12 l12'>
      	<div class='col s12 m6 s6'>
      		<input type="checkbox" id="chk_hd" name="chk_hd"/>
      		<label for="chk_hd">Habitacion Doble</label>
      	</div>
      	<div class='col s12 m6 l6'>
      		<label>Cantidad</label>
			<input type='number' min='1' max='<?php print($canthabdoble);?>' name='txthabitaciondoble'/>
      	</div>
      </div>
      <div class='row s12 m12 l12'>
      	<div class='col s12 m6 l6'>
      		<input type="checkbox" id="chk_ht" name="chk_ht"/>
      		<label for="chk_ht">Habitacion Triple</label>
      	</div>
      	<div class='col s12 m6 l6'>
      		<label>Cantidad:</label>
	        <input type='number' min='1' max='<?php print($canthabtriple);?>'  name='txthabitaciontriple'/>
      	</div>
      </div>
      
    </div>
    <div class="modal-footer">
      <button class='modal-action modal-close btn waves-effect waves-light pink darken-4' href='sheet/galeria.php' type='submit'>Ya escogí mis Habitaciones</button>
    </div>
  </div>



  </form>




<?php
Page::footer();
?>