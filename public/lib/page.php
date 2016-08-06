<?php
class Page
{
	public static function header($title)
	{
	    $filename = basename($_SERVER['PHP_SELF']);

		session_start();
		ini_set("date.timezone","America/El_Salvador");
		$sesion = false;
		$header= "";

				//header cuando hay sessión
		      	if(isset($_SESSION['nombre']))//falta
    			{
    				$sesion = true;

    				//comprobacion de la ruta de las paginas

    				//header cuando sea sheet
    				if($filename != "index.php")
    				{
    					$header="
    						<!Doctype html>
								<head>	
										<link rel='stylesheet' type='text/css' href='../../css/materialize.min.css'>
										<link rel='stylesheet' type='text/css' href='../../css/icons.css'/>
										<link rel='stylesheet' type='text/css' href='../../css/style.css'>
										<script src='../../js/jquery-2.2.0.min.js'></script>  
										<script src='../../js/materialize.min.js'></script>
										<script src='../../js/method.js'></script>
										<script src='../../js/sweetalert.min.js'></script> 
							      	<link rel='stylesheet' type='text/css' href='../css/sweetalert.css'>
								</head>
								<body>
								<!--Navbar Materialize-->
									<nav class='pink darken-4'>
									    <div class='nav-wrapper'>
									      <a href='../index.php' class='brand-logo' id='titulonavbar'>Hotel Fotherhouse</a>
									      <a href='#' data-activates='mobile-demo' class='button-collapse'><i class='material-icons'>menu</i></a>
									      <ul class='right hide-on-med-and-down'>
									        <li><a href='galeria.php'>Galería</a></li>
									        <li><a href='ubicacion.php'>Ubicación</a></li>
									        <li><a href='servicios.php'>Servicios</a></li>
									        <li><a class='dropdown-button' href='#!' data-activates='dropdown5'>$_SESSION[nombre]<i class='material-icons right'>arrow_drop_down</i></a></li>
									      </ul>
									      <ul class='side-nav' id='mobile-demo'>
									        <li><a href='galeria.php'>Galería</a></li>
									        <li><a href='ubicacion.php'>Ubicación</a></li>
									        <li><a href='servicios.php'>Servicios</a></li>
									        <li><a class='dropdown-button' href='#!' data-activates='dropdown4'>$_SESSION[nombre]<i class='material-icons right'>arrow_drop_down</i></a></li>
									      </ul>
									    </div>
									</nav>

									<ul id='dropdown5' class='dropdown-content'>
									  <li><a href='dashboard.php'>DashBoard</a></li>
									  <li><a href='../sheet/misacciones.php'>Mis Acciones</a></li>
									  <li><a href='../../lib/salir.php'>Cerrar Sesión</a></li>
									</ul>

									<ul id='dropdown4' class='dropdown-content'>
									  <li><a href='dashboard.php'>DashBoard</a></li>
									  <li><a href='../sheet/misacciones.php'>Mis Acciones</a></li>
									  <li><a href='../../lib/salir.php'>Cerrar Sesión</a></li>
									</ul>
						";
    				}
   					//header cuando sea index
    				else
    				{
    					$header="
    						<!Doctype html>
							<head>	
									<link rel='stylesheet' type='text/css' href='../css/materialize.min.css'>
									<link rel='stylesheet' type='text/css' href='../css/icons.css'/>
									<link rel='stylesheet' type='text/css' href='../css/style.css'>
									<script src='../js/jquery-2.2.0.min.js'></script>  
									<script src='../js/materialize.min.js'></script>
									<script src='../js/method.js'></script>
									<script src='../js/sweetalert.min.js'></script> 
						      		<link rel='stylesheet' type='text/css' href='../css/sweetalert.css'>
							</head>
							<body>
							<!--Navbar Materialize-->
								<!--Navbar Materialize-->
								<nav class='pink darken-4'>
								    <div class='nav-wrapper'>
								      <a href='index.php' class='brand-logo' id='titulonavbar'>Hotel Fotherhouse</a>
								      <a href='#' data-activates='mobile-demo' class='button-collapse'><i class='material-icons'>menu</i></a>
								      <ul class='right hide-on-med-and-down'>
								        <li><a href='sheet/galeria.php'>Galería</a></li>
								        <li><a href='sheet/ubicacion.php'>Ubicación</a></li>
								        <li><a href='sheet/servicios.php'>Servicios</a></li>
								        <li><a class='dropdown-button' href='#!' data-activates='dropdown4'>$_SESSION[nombre]<i class='material-icons right'>arrow_drop_down</i></a></li>
								      </ul>
								      <ul class='side-nav' id='mobile-demo'>
								        <li><a href='sheet/galeria.php'>Galería</a></li>
								        <li><a href='sheet/ubicacion.php'>Ubicación</a></li>
								        <li><a href='sheet/servicios.php'>Servicios</a></li>
								        <li><a class='dropdown-button' href='#!' data-activates='dropdown5'>$_SESSION[nombre]<i class='material-icons right'>arrow_drop_down</i></a></li>
								      </ul>
								    </div>
								</nav>

								<ul id='dropdown4' class='dropdown-content'>
									  <li><a href='sheets/dashboard.php'>DashBoard</a></li>
									  <li><a href='../sheets/misacciones.php'>Mis Acciones</a></li>
									  <li><a href='../sql/salir.php'>Cerrar Sesión</a></li>
								</ul>
								<ul id='dropdown5' class='dropdown-content'>
									  <li><a href='../sheet/dashboard.php'>DashBoard</a></li>
									  <li><a href='../sheet/misacciones.php'>Mis Acciones</a></li>
									  <li><a href='../sql/salir.php'>Cerrar Sesión</a></li>
								</ul>

								
    					";
    				}
	      		}
	      		//header cuando no hay session

	      		else
	      		{
	      			//comprobacion de la ruta de las paginas

    				//header cuando sea sheet
    				if($filename != "index.php"){
    					$header="
    							<!Doctype html>
								<head>	
									<link rel='stylesheet' type='text/css' href='../../css/materialize.min.css'>
									<link rel='stylesheet' type='text/css' href='../../css/style.css'>
									<link rel='stylesheet' type='text/css' href='../../css/icons.css'/>
									<script src='../../js/jquery-2.2.0.min.js'></script>  
									<script src='../../js/materialize.min.js'></script>
									<script src='../../js/method.js'></script>
									<script src='../../js/sweetalert.min.js'></script> 
							      	<link rel='stylesheet' type='text/css' href='../css/sweetalert.css'>
								</head>
								<body>
								<!--Navbar Materialize-->
									<nav class='pink darken-4'>
									    <div class='nav-wrapper'>
									      <a href='../index.php' class='brand-logo' id='titulonavbar'>Hotel Fotherhouse</a>
									      <a href='#' data-activates='mobile-demo' class='button-collapse'><i class='material-icons'>menu</i></a>
									      <ul class='right hide-on-med-and-down'>
									        <li><a href='galeria.php'>Galería</a></li>
									        <li><a href='ubicacion.php'>Ubicación</a></li>
									        <li><a href='servicios.php'>Servicios</a></li>
									        <li><a class='dropdown-button' href='#!' data-activates='dropdown5'>Identificate<i class='material-icons right'>arrow_drop_down</i></a></li>
									      </ul>
									      <ul class='side-nav' id='mobile-demo'>
									        <li><a href='galeria.php'>Galería</a></li>
									        <li><a href='ubicacion.php'>Ubicación</a></li>
									        <li><a href='servicios.php'>Servicios</a></li>
									        <li><a class='dropdown-button' href='#!' data-activates='dropdown4'>Identificate<i class='material-icons right'>arrow_drop_down</i></a></li>
									      </ul>
									    </div>
									</nav>
									<ul id='dropdown5' class='dropdown-content'>
									  <li><a href='../sheets/registro.php'>Registrate</a></li>
									  <li><a href='../sheets/iniciarsesion.php'>Iniciar Sesión</a></li>
									</ul>
									<ul id='dropdown4' class='dropdown-content'>
									  <li><a href='../sheets/registro.php'>Registrate</a></li>
									  <li><a href='../sheets/iniciarsesion.php'>Iniciar Sesión</a></li>
									</ul>
    					";
    				}
    				
   					//header cuando sea index
    				else{

    					$header="
    					 <!Doctype html>
							<head>	
									<link rel='stylesheet' type='text/css' href='../css/materialize.min.css'>
									<link rel='stylesheet' type='text/css' href='../css/icons.css'/>
									<link rel='stylesheet' type='text/css' href='../css/style.css'>
									<script src='../js/jquery-2.2.0.min.js'></script>  
									<script src='../js/materialize.min.js'></script>
									<script src='../js/method.js'></script>
									<script src='../js/sweetalert.min.js'></script> 
							      	<link rel='stylesheet' type='text/css' href='../css/sweetalert.css'>
									
							</head>

							<body>
								<!--Navbar Materialize-->
								<nav class='pink darken-4'>
								    <div class='nav-wrapper'>
								      <a href='index.php' class='brand-logo' id='titulonavbar'>Hotel Fotherhouse</a>
								      <a href='#'data-activates='mobile-demo' class='button-collapse'><i class='material-icons'>menu</i></a>
								      <ul class='right hide-on-med-and-down'>
								        <li><a href='sheets/galeria.php'>Galería</a></li>
								        <li><a href='sheets/ubicacion.php'>Ubicación</a></li>
								        <li><a href='sheets/servicios.php'>Servicios</a></li>
								        <li><a class='dropdown-button' href='#!'data-activates='dropdown4'>Identificate<i class='material-icons right'>arrow_drop_down</i></a></li>
								      </ul>
								      <ul class='side-nav' id='mobile-demo'>
								        <li><a href='sheets/galeria.php'>Galería</a></li>
								        <li><a href='sheets/ubicacion.php'>Ubicación</a></li>
								        <li><a href='sheets/servicios.php'>Servicios</a></li>
								        <li><a class='dropdown-button' href='#!' data-activates='dropdown5'>Identificate<i class='material-icons right'>arrow_drop_down</i></a></li>
								      </ul>
								    </div>
								</nav>

								<ul id='dropdown5' class='dropdown-content'>
								  <li><a href='sheets/IniciarSesion.php'>Iniciar Sesión</a></li>
								  <li><a href='sheets/registro.php'>Registro</a></li>
								</ul>

								<ul id='dropdown4' class='dropdown-content'>
								  <li><a href='sheets/IniciarSesion.php'>Iniciar Sesión</a></li>
								  <li><a href='sheets/registro.php'>Registro</a></li>
								</ul>
						";
    				}
	      		}
	      	
	  	print($header);
  		

  		if($sesion)
  		{
  			if($filename != "IniciarSesion.php")
  			{
  				print("");
  			}
  			else
  			{
  				header("location: ../index.php");
  			}
  		}
  		else
  		{
  			if($filename != "IniciarSesion.php" && $filename != "registro.php")
  			{
  				
  			}
  			else
  			{
  				print("");
  			}
  		}
	}
	

	public static function footer()
	{
		$filename = basename($_SERVER['PHP_SELF']); //obteniendo en nombre del archivo 

		if($filename != "index.php")
		{
			$footer = " 
					</body>
					<footer class='page-footer pink darken-4'>
			          <div class='container'>
			            <div class='row'>
			              <div class='col l6 s12'>
			                <h5 class='white-text'>Hotel Fotherhouse</h5>
			                <p class='grey-text text-lighten-4'>La mejor opción para tu estadía</p>
			              </div>
			              <div class='col l4 offset-l2 s12'>
			                <h5 class='white-text'>Secciones</h5>
			                <ul>
			                  <li><a class='grey-text text-lighten-3' href='../index.php'>Principal</a></li>
			                  <li><a class='grey-text text-lighten-3' href='galeria.php'>Galería</a></li>
			                  <li><a class='grey-text text-lighten-3' href='ubicacion.php'>Ubicación</a></li>
			                  <li><a class='grey-text text-lighten-3' href='servicios.php'>Servicios</a></li>
			                  <li><a class='grey-text text-lighten-3' href='registro.php'>Registro</a></li>
			                </ul>
			              </div>
			            </div>
			          </div>
			          <div class='footer-copyright'>
			            <div class='container'>
			            © 2014 Copyright Text
			            <a class='grey-text text-lighten-4 right' href='#!'>More Links</a>
			            </div>
			          </div>
			        </footer>
			";
		}
		else{
			$footer = "
			<footer class='page-footer pink darken-4'>
	          <div class='container'>
	            <div class='row'>
	              <div class='col l6 s12'>
	                <h5 class='white-text'>Hotel Fotherhouse</h5>
	                <p class='grey-text text-lighten-4'>La mejor opción para tu estadía</p>
	              </div>
	              <div class='col l4 offset-l2 s12'>
	                <h5 class='white-text'>Secciones</h5>
	                <ul>
	                  <li><a class='grey-text text-lighten-3' href='index.php'>Principal</a></li>
	                  <li><a class='grey-text text-lighten-3' href='sheet/galeria.php'>Galería</a></li>
	                  <li><a class='grey-text text-lighten-3' href='sheet/ubicacion.php'>Ubicación</a></li>
	                  <li><a class='grey-text text-lighten-3' href='sheet/servicios.php'>Servicios</a></li>
	                  <li><a class='grey-text text-lighten-3' href='sheet/registro.php'>Registro</a></li>
	                </ul>
	              </div>
	            </div>
	          </div>
	          <div class='footer-copyright'>
	            <div class='container'>
	            © 2014 Copyright Text
	            <a class='grey-text text-lighten-4 right' href='#!'>More Links</a>
	            </div>
	          </div>
	        </footer>
			";//footer cuando este en el index
		}
		print($footer);
	}


	public static function getRating($ponderacion){

				$rating="";

				switch($ponderacion){
					case 1:
						$rating=
						"<div>
		                    <i class='material-icons'>stars</i>
		                </div>";
					break;

					case 2:
						$rating=
						"<div>
		                    <i class='material-icons'>stars</i>
		                    <i class='material-icons'>stars</i>
		                </div>";
					break;

					case 3:
						$rating=
						"<div>
		                    <i class='material-icons'>stars</i>
		                    <i class='material-icons'>stars</i>
		                    <i class='material-icons'>stars</i>
		                </div>";
					break;

					case 4:
						$rating=
						"<div>
		                    <i class='material-icons'>stars</i>
		                    <i class='material-icons'>stars</i>
		                    <i class='material-icons'>stars</i>
		                    <i class='material-icons'>stars</i>
		                </div>";
					break;

					case 5:
						$rating=
						"<div>
		                    <i class='material-icons'>stars</i>
		                    <i class='material-icons'>stars</i>
		                    <i class='material-icons'>stars</i>
		                    <i class='material-icons'>stars</i>
		                    <i class='material-icons'>stars</i>
		                </div>";
					break;
				}
				return $rating;
	}

	public static function getponderacion($ponderacion){

				$rating="";

				if($ponderacion > 1 && $ponderacion < 1.5){
					$rating=
						"<div>
		                    <i class='material-icons'>stars</i>
		                </div>";
				}
				if($ponderacion > 1.5 && $ponderacion < 2.5){
					$rating=
						"<div>
		                    <i class='material-icons'>stars</i>
		                    <i class='material-icons'>stars</i>
		                </div>";
				}
				if($ponderacion > 2.5 && $ponderacion < 3.5){
					$rating=
						"<div>
		                    <i class='material-icons'>stars</i>
		                    <i class='material-icons'>stars</i>
		                    <i class='material-icons'>stars</i>
		                </div>";
				}
				if($ponderacion > 3.5 && $ponderacion < 4.5){
					$rating=
						"<div>
		                    <i class='material-icons'>stars</i>
		                    <i class='material-icons'>stars</i>
		                    <i class='material-icons'>stars</i>
		                    <i class='material-icons'>stars</i>
		                </div>";
				}
				if($ponderacion > 4.5){
					$rating=
						"<div>
		                    <i class='material-icons'>stars</i>
		                    <i class='material-icons'>stars</i>
		                    <i class='material-icons'>stars</i>
		                    <i class='material-icons'>stars</i>
		                    <i class='material-icons'>stars</i>
		                </div>";
				}
					
				if($ponderacion == null){
					$rating=
						"<div>
		                    El producto no tiene valoracion
		                </div>";
				}
						
				return $rating;
	}

	public static function getDate(){
		$dia = date("d");//dia del mes actual con 2 digitos
		$mes = date("m");//mes actual en 2 digitos
		$año = date("Y");// año actual

		$fecha_actual= "$dia/$mes/$año";

		return $fecha_actual; //getdate converted day
	}

	public static function VerificacionFechas($fecha1,$fecha2){

		$mensaje="";

		$dia = date("d");//dia del mes actual con 2 digitos
		$mes = date("m");//mes actual en 2 digitos
		$año = date("Y");// año actual

		$fecha_actual= "$año-$mes-$dia";
		$fecha_hoy=  date_create($fecha_actual);
		$datetime1 = date_create($fecha1);
		$datetime2 = date_create($fecha2);

		//validacion de que las fechas sean mayores al día actual
		if($datetime1 >= $fecha_hoy){

			//validacion de que la fecha n° 2 sea mayor al día de hoy
			if($datetime2 >= $fecha_hoy){

				//si la fecha n°1 es mayor a la fecha numero 2
				if($datetime1 > $datetime2) 
					$mensaje = "<script> swal('¿Posee una maquina del tiempo?', 'Es fisicamente imposible que la fecha de entrada sea mayor que la fecha de salida, por favor verifique sus datos.', 'error')</script>";

				//si la fecha n2 es mayor a la numero 1
				if($datetime1 < $datetime2) 
					$mensaje = "<script>swal('Accion Realizada', 'Su reservacion se creo exitosamente', 'success')</script>";

				//si las fechas son iguales
				if($datetime1 == $datetime2) 
					$mensaje = 'Nuestras politicas no admiten reservaciones el mismo día, por favor elija un día diferente';
			}
			else{
				$mensaje = "<script> swal('¿Viene del Pasado?', 'Es fisicamente imposible que su fecha de salida sea antes de el día de hoy, por favor verifique sus datos.', 'error')</script>";
			}
		}
		else{
			$mensaje = "<script> swal('¿Viene del Pasado?', 'Es fisicamente imposible que su fecha de entrada sea antes de el día de hoy, por favor verifique sus datos.', 'error')</script>";
		}
		return $mensaje;
	}

	public static function CamposNulos($array){
		$arrayel=count($array);
		for($i = 0; $arrayel > $i ;$i++){
			if($array[$i] == null){
				return false;
			}
		}
		return true;
	}





	public static function setCombo($name, $value, $query)
	{
		$data = Database::getRows($query, null);
		$combo = "<select name='$name' required>";
		if($value == null)
		{
			$combo .= "<option value='' disabled selected>Seleccione una opción</option>";
		}
		foreach($data as $row)
		{
			$combo .= "<option value='$row[0]'";
			if(isset($_POST[$name]) == $row[0] || $value == $row[0])
			{
				$combo .= " selected";
			}
			$combo .= ">$row[1]</option>";
		}	
		$combo .= "</select>
				<label style='text-transform: capitalize;'>$name</label>";
		print($combo);
	}
}
?>