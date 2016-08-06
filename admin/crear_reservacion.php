<?php
	include 'sesion.php';
	
	if(!empty($_POST))
	{
		$cliente = trim($_POST['cmbCli']);
		$entrada = trim($_POST['txtentrada']);
		$salida = trim($_POST['txtsalida']);
		$n_hab = trim($_POST['txtnum_hab']);
		$t_area = trim($_POST['cmbT_a']);
		$estado = trim($_POST['cmbEst']);
		$num_per = trim($_POST['txtper']);
		$tel = trim($_POST['txttel']);
		$correo = trim($_POST['txtcorreo']);
		$card = trim($_POST['txtcard']);
		$exp_card = trim($_POST['txtexp']);
		$costo = trim($_POST['txtcosto']);
		
		if($cliente != "" && $entrada != "" && $salida != "" && $n_hab != "" && $t_area != "" && $estado != "" && $num_per != "" && $tel != "" && $correo != "" && $card != "" && $exp_card != "" && $costo)
	 	{
	 		if(filter_var($correo, FILTER_VALIDATE_EMAIL))
	 		{	
	 			if(preg_match('/[^a-zA-Z0-9\s]/'),$cliente && preg_match('/[^a-zA-Z0-9\s]/'), $n_hab && preg_match('/[^a-zA-Z0-9\s]/'), $num_per && preg_match('/[^a-zA-Z0-9\s]/'), $tel && preg_match('/[^a-zA-Z0-9\s]/'), $card)
	 			{
	 				if(filter_var($cliente, FILTER_VALIDATE_STRING))
	 				{
	 					if(filter_var($n_hab, FILTER_VALIDATE_INT))
	 					{
	 						if(filter_var($num_per, FILTER_VALIDATE_INT))
	 						{
	 							if(filter_var($tel, FILTER_VALIDATE_INT))
	 							{
	 								if(filter_var($card, FILTER_VALIDATE_INT))
	 								{
										function Insertar($cliente, $entrada, $salida, $n_hab, $t_area, $estado, $num_per, $tel, $correo, $card, $exp_card, $costo)
										{
											require("sql/conexion.php");
											$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
											$sql = "INSERT INTO reservaciones(id_cliente, fecha_entrada, fecha_salida, num_habitacion, id_tipo_area, id_estado, num_huespedes ,telefono, correo, tarjeta_credito, exp_tarjeta) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
											$stmt = $PDO->prepare($sql);
											$stmt->execute(array($cliente, $entrada, $salida, $n_hab, $t_area, $estado, $num_per, $tel, $correo, $card, $exp_card, $costo));
											$PDO = null;
											header("location: reservaciones.php");
										}
											Insertar($cliente, $entrada, $salida, $n_hab, $t_area, $estado, $num_per, $tel, $correo, $card, $exp_card, $costo);
									}
								}
							}
						}
					}
				}
			}
			else
			{
				print("<script> alert('La direccion de correo es INVALIDA'); </script>");
			}
		}
	
		 	
		else
		{
			$cliente = null;
			$entrada = null;
			$salida = null;
			$n_hab = null;
			$t_area = null;
			$estado = null;
			$num_per = null;
			$tel = null;
			$correo = null;
			$card = null;
			$exp_card = null;
			$costo = null;
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Reservaciones
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
			    <h3 id = "lbl" class="panel-title">¡Agregar Reservaciones!</h3>
			  </div>
				  <div class="panel-body">

				  	<form method = "POST">
				  		<fieldset>
				  			<div class="form-group">
				  				<label for="name">Cliente</label>
				  				<br>
				  				<select id = "en" class = "form-control broswer-default" name = 'cmbCli' required>
				  					<?php
				  						require("sql/conexion.php");
				  						$sql = "SELECT * FROM cliente";
			  							$sel = "";
				  						foreach ($PDO -> query($sql) as $datos) 
			                           {
			                              $sel .= "<option value = '$datos[id_cliente]'";
			                              if (isset($tipos) == $datos['id_cliente']) 
			                              {
			                                 $sel .= "selected";
			                              }
			                              $sel .= ">$datos[correo]</option>";
			                           }
			                           print($sel);
			                           $PDO = null;
				  					?>
				  				</select>
				  			</div>

		  			<!--div class="input-group">
			<input id = "" type="text" class="form-control" aria-label="...">
      <div class="input-group-btn">
        <button id = "cb" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>
        <ul id = "in" class="dropdown-menu dropdown-menu-right">
        	<?php
        		//require("sql/conexion.php");
        		//$sql = "SELECT * FROM cliente";

        		//foreach($PDO->query($sql) as $datos)
        		{
        			//$sel .= "";
        		}
        	?>
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="#">Separated link</a></li>
        </ul>
      </div!--><!-- /btn-group -->
    <!--/div!--><!-- /input-group -->
    <div class="form-group">
    	<label for="name">Chek-in</label>
    	<input id = "in" type="date" class = "form-control" name = "txtentrada">
    </div>
    <div class="form-group">
    	<label for="name">Chek-out</label>
    	<input id = "in" type="date" class = "form-control" name = "txtsalida">
    </div>
    <div class="form-group">
    	<label for="name">Habitaciones</label>
    	<input id = "in" type="number" class = "form-control" name = "txtnum_hab">
    </div>

    <div class="form-group">
    	<label for="name">Tipo de Área</label>
    	<select id = "in" name="cmbT_a" class = "form-control" required>
    		<?php
    			require("sql/conexion.php");
    			$tipo_a = "SELECT * FROM tipo_areas";
				$op = "";
    			foreach($PDO->query($tipo_a) as $datos)
    			{
    				$op .= "<option value = '$datos[id_tipo_area]'";
	                  if (isset($tipos) == $datos['id_tipo_area']) 
	                  {
	                     $op .= "selected";
	                  }
	                  $op .= ">$datos[nombre_tipo_area]</option>";
               }
	               print($op);
	               $PDO = null;
    		?>
    	</select>
    </div>

    <div class="form-group">
    	<label for="name">Estado</label>
    	<select id = "in" name="cmbEst" class = "form-control" required>
			<?php
    			require("sql/conexion.php");
    			$est = "SELECT * FROM estado";
				$op2 = "";
    			foreach($PDO->query($est) as $datos)
    			{
    				$op2 .= "<option value = '$datos[id_estado]'";
	                  if (isset($tipos) == $datos['id_estado']) 
	                  {
	                     $op2 .= "selected";
	                  }
	                  $op2 .= ">$datos[nombre_estado]</option>";
               }
	               print($op2);
	               $PDO = null;
    		?>
    	</select>
    </div>	
    <div class="form-group">
    	<label for="name">Numero de Huespedes</label>
    	<input id = "in" type="number" class = "form-control" name = "txtper">
    </div>
	
	<div class="form-group">
    	<label for="name">Telefono</label>
    	<input id = "in" type="text" class = "form-control" name = "txttel">
    </div>

    <div class="form-group">
    	<label for="name">Correo Electronico</label>
    	<input id = "in" type="text" class = "form-control" name = "txtcorreo">
    </div>

    <div class="form-group">
    	<label for="name">Tarjeta de Credito</label>
    	<input id = "in" type="text" class = "form-control" name = "txtcard">
    </div>

    <div class="form-group">
    	<label for="name">Expiracion de Tarjeta de Credito</label>
    	<input id = "in" type="date" class = "form-control" name = "txtexp">
    </div>

    <div class="form-group">
    	<label for="name">Costo</label>
    	<input id = "in" type="text" class = "form-control" name = "txtcosto">
    </div>
      				<button id = "g_user" type = "submit" class = "btn btn-default">GUARDAR</button>
      				<a href = "reservaciones.php" type = "button" class = "btn btn-default">CANCELAR</a>
				  		</fieldset>
				  	</form>
			  </div>
			</div>
		</div>
	</body>
</html>