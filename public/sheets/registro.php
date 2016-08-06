<?php
 require("../lib/page.php"); // libreria para modelado de paginas
 require("../../lib/database.php"); //libreria para base de datos
 require("../../lib/validator.php");  
 Page::header("Registro");
?>

<?php
   if (!empty($_POST)) 
   {
      //Campos form
      $_POST = Validator::validateForm($_POST);
      $nombre = $_POST['txtNombres'];
      $apellido = $_POST['txtApellidos'];
      $fecha_nacimiento =$_POST['txtFechadenacimiento'];
      $correo = $_POST['txtEmail'];
      $tel = $_POST['txtTelefono'];
      $contra =$_POST['txtPassword'];
      $contra2 =$_POST['txtPassword2'];
      $estado_cuenta=1;
      $nacionalidad=$_POST['txtnacionalidad'];
      $direccion=$_POST['txtdireccion'];
      $profesion=$_POST['txtprofesion'];
      
      function mthCrear($nombre, $apellido, $fecha_nacimiento,$correo, $tel,$contra, $contra2,$estado_cuenta,$nacionalidad,$direccion,$profesion)
   {
      try{
      		$paramscomp=Array($nombre, $apellido, $fecha_nacimiento,$correo, $tel,$contra, $contra2,$nacionalidad,$direccion,$profesion);
      		if($contra == $contra2){
	      		if(Page::CamposNulos($paramscomp))
	      		{
	      			$contra=password_hash($contra, PASSWORD_DEFAULT);
	      			$sql = "INSERT INTO cliente(nombre,apellido,fecha_nacimiento,correo,telefono,clave_user,estado_cuenta,nacionalidad,address,profesion) VALUES(?,?,?,?,?,?,?,?,?,?)";
		        	$stmt=array($nombre, $apellido, $fecha_nacimiento,$correo, $tel,$contra,$estado_cuenta,$nacionalidad,$direccion,$profesion);
		        	Database::executeRow($sql, $stmt);
		        	print("<script> 
		                 		swal('Usuario Creado', 'Registrarse para continuar', 'success'); 
		               		</script>");
		        	print("<script> 
		                 		window.location = '../index.php'; 
		               		</script>");
	      		}
	      		else{
	      			print("<script> 
		                 		swal('Campos Incompletos', 'Alguno de los campos ingresados esta incompleto, por favor revise su información', 'error'); 
		               		</script>");
	      		}
	      	}
	      	else{
	      		print("<script> 
		                 		swal('Las contraseñas no Coinciden', 'Revise que los campos de contraseña coincidan', 'error'); 
		               		</script>");
	      	}
	                      
       }
       catch (Exception $error)
        {
            print("<div class='card-panel red'><i class='material-icons left'>error</i>".$error->getMessage()."</div>");
        }

       }
        mthCrear($nombre, $apellido, $fecha_nacimiento,$correo, $tel,$contra, $contra2,$estado_cuenta,$nacionalidad,$direccion,$profesion);
    }
    else
    {
      $nombre = null;
      $apellido = null;
      $fecha_nacimiento = null;
      $contra = null;
      $contra2 = null;
      $correo = null;
      $tel = null;
      $estado_cuenta=null;
    }
?>
		<!--Imagenes de Registro de Usuarios-->
		<div class="parallax-container">
		    <div class="parallax"><img src="../../img/3667386_orig.jpg"></div>
		  </div>

		<!--Formulario de registro de clientes-->
		<div class=''>
		<div class='grey darken-2'>
			<div class="row">
				<div class='row'>
							<div class='col s12 m12 l12'>
								<h5 class='white-text'>
									¡Registrate!
								</h5>
							</div>
							<div class='col s12 m12 l12'>
								<p class='grey-text text-lighten-4'>
									¿Quieres Mejorar tu experiencia en nuestro hotel?, Registrate y descubre lo exclusivo y nuevo de nuestro hotel.
								</p>
							</div>
						</div>

			    <form method='post'>
							<div class='row'>

								<div class='input-field col s12 m6 l6'>
									<label>Nombres:</label>
									<input type="text" class="validate" name='txtNombres' placeholder="Ingrese sus Nombres" style='color: white;'>
								</div>

								<div class='input-field col s12 m6 l6'>
									<label>Apellidos:</label>
									<input type="text" class="validate" name='txtApellidos' placeholder="Ingrese sus Apellidos" style='color: white;'>
								</div>

								<div class='input-field col s12 m6 l6'>
									<label>Nacionalidad:</label>
									<input type="text" class="validate" name='txtnacionalidad' placeholder="Ingrese su Nacionalidad" style='color: white;'>
								</div>

								<div class='input-field col s12 m6 l6'>
									<label>Fecha de Nacimiento</label>
									<input type="date" class="datepicker" name='txtFechadenacimiento' placeholder="Fecha de Nacimiento" style='color: white;'>
								</div>


								<div class='input-field col s12 m6 l6'>
									<label>Dirección:</label>
									<input type="text" class="validate" name='txtdireccion' placeholder="Ingrese su Direccion" style='color: white;'>
								</div>

								<div class='input-field col s12 m6 l6'>
									<label>Profesión:</label>
									<input type="text" class="validate" name='txtprofesion' placeholder="Ingrese su Profesion" style='color: white;'>
								</div>

								<div class='input-field col s12 m6 l6'>
									<label>Telefono:</label>
									<input type="text" class="validate" name='txtTelefono' placeholder="Ingrese su Telefono" style='color: white;'>
								</div>	

								<div class='input-field col s12 m6 l6'>
									<label>Contraseña:</label>
									<input type="text" class="validate" name='txtPassword' placeholder="Ingrese su Correo Electronico" style='color: white;'>
								</div>

								<div class='input-field col s12 m6 l6'>
									<label>Verrifique su contraseña:</label>
									<input type="text" class="validate" name='txtPassword2' placeholder="Ingrese su Correo Electronico" style='color: white;'>
								</div>

								<div class='input-field col s12 m6 l6'>
									<label>Correo Electronico:</label>
									<input type="text" class="validate" name='txtEmail' placeholder="Ingrese su Correo Electronico" style='color: white;'>
								</div>
								<div class="input-field col s12 m6 l6">
								    <button class="btn waves-effect waves-light pink darken-4" href='sheet/galeria.php' type='submit'>Actualizar Información</button>
								</div>
							</div>
						</form>
			 </div>
		</div>

		<div class="parallax-container">
		    <div class="parallax"><img src="../../img/3667386_orig.jpg"></div>
		  </div>


<?PHP
  Page::footer(); 
?>
  