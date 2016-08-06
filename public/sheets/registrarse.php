<?php
 require("../lib/page.php"); // libreria para modelado de paginas
 require("../../lib/database.php"); //libreria para base de datos
 require("../../lib/validator.php");  
 Page::header("Catalogo");
?>
    <?php
		   if (!empty($_POST)) 
		   {
		      //Campos form
		      $nombre = $_POST['txtnombres'];
		      $apellido = $_POST['txtApellidos'];
		      $fecha_nacimiento =$_POST['txtFechadenacimiento'];
		      $correo = $_POST['txtEmail'];
		      $telefono = $_POST['txtTelefono'];
		      $clave_user = $_POST['txtPassword'];

		      function mthCrear($nombre, $apellido,$fecha_nacimiento,$correo,$telefono,$clave_user)
		   {
		      require("../../private/sql/conexion.php");
		      $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		      $sql = "INSERT INTO cliente(nombre,apellido,fecha_nacimiento,correo,telefono,clave_user) values(?,?,?,?,?,?)";
		      $stmt = $PDO->prepare($sql);
		      $stmt->execute(array($nombre, $apellido, $fecha_nacimiento, $correo, $telefono,$clave_user));
		      $PDO = null;
		      print("<script> 
		                swal('Usuario Creado', 'Registrarse para continuar', 'success'); 
		             </script>");
		     print("<script> 
		                window.location = '../index.php'; 
		             </script>");

		   }
		      mthCrear($nombre,$apellido,$fecha_nacimiento,$correo,$telefono,$clave_user);
		   }
		 ?>

		<?php include '../comps/navbarsheet.php';?>

		<!--Formulario de registro de clientes-->
		<div class='container'>
			
			<div class="row">

			    <form class="col s12" method='post'>

			      <div class="row">
			    	<p id='titgaleriaimagenes'>¡Registrate!</p>
			    	<br>

			    	<!--Input nombres-->
			        <div class="input-field col s12 m6 l6">
			          
			          <input placeholder="Ingresa aquí tus Nombres" id="txtNombre" type="text" class="validate" name='txtnombres'
			                 required value="<?php print((isset($nombre) != "")?"$nombre":""); ?>">
			          
			          <label for="txtNombre">Nombres</label>
			        
			        </div>

			        <!--input Aoellidos-->
			        <div class="input-field col s12 m6 l6">
			          <input placeholder="Ingresa aquí tus Apellidos" id="txtApellido" type="text" class="validate" name='txtApellidos' 
			          		 required value="<?php print((isset($apellido) != "")?"$apellido":""); ?>">
			          <label for="txtApellido">Apellidos</label>
			        </div>
			    
			        <!--Input Clave-->
			        <div class="input-field col s12 m6 l6">
			          <input placeholder='Ingresa tu contraseña' id="password" type="password" class="validate" name='txtPassword'
			          		 required value="<?php print((isset($nombre) != "")?"$nombre":""); ?>">
			          <label for="password">Password</label>
			        </div>


			        <!--Input confirmar contraseña-->
			        <div class="input-field col s12 m6 l6">
			          <input placeholder='Ingresa nuevamente tu contraseña' id="password" type="password" class="validate" name=''
			                 required value="<?php print((isset($clave_user) != "")?"$clave_user":""); ?>">
			          <label for="password">Confirmar Contraseña</label>
			        </div>

			        <!--input Email-->
			        <div class="input-field col s12 m6 l6">
			          <input placeholder='algoejemplo@ejemplo.com' id="email" type="email" class="validate" name='txtEmail'
			          		 required value="<?php print((isset($correo) != "")?"$correo":""); ?>">
			          <label for="email">Email</label>
			        </div>

			        <!--input fecha de nacimiento-->
			        <div class='input-field col s12 m6 l6'>
			          <input placeholder='haz click aquí para ingresar tu fecha de nacimiento' id='txtFechadenacimiento' type="date" class="datepicker" 		name='txtFechadenacimiento'
			          		 required value="<?php print((isset($fecha_nacimiento) != "")?"$fecha_nacimiento":""); ?>">
			          <label for="txtFechadenacimiento">Fecha de Nacimiento</label>
			        </div>

			        <!--Input telefono-->
			        <div class="input-field col s12 m6 l6">
			          <i class="material-icons prefix">phone</i>
			          <input placeholder='Ingresa aquí tu numero telefonico' id="icon_telephone" type="tel" class="validate" name='txtTelefono' 
			          		 required value="<?php print((isset($telefono) != "")?"$telefono":""); ?>">
			          <label for="icon_telephone">Telephone</label>
			        </div>
					<button  type="submit" class="btn-large waves-effect waves-light pink darken-4">Registrarse</button>
			     
			      </div>
			    </form>
			 </div>
		</div>


<?PHP
  Page::footer(); 
?>
  