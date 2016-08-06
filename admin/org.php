<?php 
    include 'sesion.php';

    require("sql/conexion.php");
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM permisos WHERE id_modulo = 1 AND id_tipo_usuario = $_SESSION[id_tipo_usuario]";
    $stmt = $PDO->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    $PDO = null;

    if($data == null)
    {
        print("<script> alert('Acceso Denegado'); window.location = 'index.php'; </script>");
    }
 ?>
<!DOCTYPE hmtl>
<html>
	<head>
		<title>
			Area Administrativa
		</title>
	</head>
	<body>
		<?php
			include 'master.php';
		?>
	<br>
	 	   
          <div class="container">
              <h2>Usuarios</h2>
              <a id = "btn" href = "create_user.php" type='button' class='btn btn-default'>¡Agrega Usuarios!</a>
              <!--form method = "POST">
                <fieldset>
                  <div class="form-group">
                    <label for="name">Buscar</label>
                    <input id = "b_user" placeholder = "Buscar pon nombre" name = "txtB_user" type = "text" class = "form-control">   
                  </div>
                  <button id = "btn_cl" type = "submit" class = "btn btn-default">Buscar</button>
                </fieldset>
              </form!-->
              <!--Operacion Buscar!-->
              <table class = "table table-striped">
                <thead>
                <tr>
                  <!--th>Cod.</th!-->
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Usuario</th>
                  <th>Tipo de Usuario</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                    require("sql/conexion.php");
                    $consult = "SELECT * FROM usuarios, tipo_usuario WHERE usuarios.id_tipo_usuario = tipo_usuario.id_tipo_usuario";
                    $result = ""; //Arreglo de datos
                  foreach($PDO->query($consult) as $datos)
                  {
                    $result .= "<tr>";
                    //$result .= "<td>$datos[id_usuario]</td>";
                    $result .= "<td name = 'td_user'>$datos[nombre]</td>";
                    $result .= "<td name = 'td_user'>$datos[apellido_usuario]</td>";
                    $result .= "<td name = 'td_user'>$datos[nombre_usuario]</td>";
                    $result .= "<td name = 'td_user'>$datos[usuario]</td>";     
                    $result .= "<td>";
                    $result .= "<a type='button' class='btn btn-warning' href = 'update_user.php?id=$datos[id_usuario]'>Editar</a>";
                    $result .= "<a type='button' class='btn btn-danger' href = 'delete_user.php?id=$datos[id_usuario]'>Eliminar</a>";
                    $result .= "<a type='button' class='btn btn-success' href = 'modulos.php'>Permisos</a>";
                    $result .= "</td>";
                    $result .= "</tr>";
                  }
                  print($result);
                  $PDO = null;
                  ?>
              </tbody>
              </table>
          </div>
    
          <br>
            <!--Select a usuarios de sistema!-->
	</body>
</html>