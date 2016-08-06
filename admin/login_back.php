<?php
//En caso de que no existan usuarios, se redireccionara al archivo de creacion de los mismos.
require("sql/conexion.php");
$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM usuarios";
$stmt = $PDO->prepare($sql);
$stmt->execute();
$PDO = null;
if($stmt->rowCount() == 0)
{
  header("location: create_user.php");
}

	if(!empty($_POST))
	{
		//declarando variables
		$us = $_POST['txtuser'];
		$pass = $_POST['txtcontra'];
		//variable de exception
		$error = "";
		if($us != "" && $pass != "")
		{
			require("sql/conexion.php");
			$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//parametros
			$sql = "SELECT * FROM usuarios WHERE correo = ?";
			//preparando query
			$stmt = $PDO->prepare($sql);
			//arreglo de parametros
			$stmt->execute(array($us));
			//se cierra la conexion
			$PDO = null;
			if($stmt->rowCount() > 0)
			{	
				//login/ sesion activa
				session_start();
				$data = $stmt->fetch(PDO::FETCH_ASSOC);

				if(password_verify($pass, $data['clave']))
				{
					$_SESSION['nombre_usuario'] = $data['nombre_usuario'];
			        $_SESSION['id_usuario'] = $data['id_usuario'];
			        $_SESSION['id_tipo_usuario'] = $data['id_tipo_usuario'];
			        print("<script> alert('BIENVENIDO'); window.location = '/hotelfotherhouse/admin/org.php'; </script>");
		        }
			}
			else
			{
				//en caso de datos erroneos
				$error = "Datos Incorrectos";
				print("<script> alert('Usuario y/o Contraseña invalidos'); </script>");
			}
		}
		else
		{	
			//campos vacios
			$error = "Debes ingresar usuario y contraseña";
			print("<script> alert('Debes ingresar usuario y contraseña'); </script>");
		}
	}
?>
<!DOCTYPE html>
<html>

	<head>

		<title>
			Inicia Sesión
		</title>
		  <link rel="stylesheet" type = "text/css" href="css/admin.css">	
	      <link rel='stylesheet' type='text/css' href='css/bootstrap.min.css'>
	      <script src='js/jquery-2.2.0.min.js'></script>  
	      <script src='js/bootstrap.min.js'></script>
	</head>

	<body>


		<br>
		<br>
		<br>
		<br>
		<br>
		<div class="row">
      <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-default">
      
         <center> <h4><span class="glyphicon glyphicon-lock"></span> LOGIN</h4></center>
           <div class="panel-body">
               <form method = "POST" accept-charset="UTF-8" role="form">
                  <fieldset>
                  	<center>
               <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> USUARIO</label> <!--Creando forms para el login-->
              <input id = "btn_ing" type="text" class="form-control" id="usrname" placeholder="INGRESAR USUARIO" name="txtuser" type="text" value = "<?php print((isset($nombre) != "")?"$nombre":""); ?>">
            </div>
               <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> CONTRASEÑA</label>
              <input id = "btn_ing" type="password" class="form-control" id="psw" placeholder="INGRESAR CONTRASEÑA" name="txtcontra" type="password" value = "<?php print((isset($direc) != "")?"$direc":""); ?>">
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>RECÚERDAME</label>
            </div>
               <br>
               <button id = "btn_ing" type="submit" class="btn btn-success btn-block" name="Ingresar"><span type = "submit" class="glyphicon glyphicon-off"></span> INGRESAR</button>
               <br>
               <center>
               
               <button id = "btn_can" type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> CANCELAR</button>
           		
           		</center>
               </center>
                  </fieldset>        
               </div>
             </div>
	</body>
</html>