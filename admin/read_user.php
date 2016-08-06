<?php
  //include 'notificar_reservacion.php';
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
<!DOCTYPE html>
<html>
	<head>
		<title>
			Lista de Clientes
		</title>
	</head>
	<body>
		<?php
			include 'master.php';
		?>
		<div class="container">
              <h2>Clientes</h2>
              <a id = "btn" href = "create_clientes.php" type='button' class='btn btn-default'>¡Agrega Clientes!</a>
              <br>
              <!--Formulario de busqueda!-->
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
                  //Creando consulta
                  $sql = "SELECT * FROM cliente WHERE nombre LIKE '%$buscar%' ORDER BY nombre";
                  $prm = null;
                }
                else
                {
                  //En caso de no realizar busqueda
                  $sql = "SELECT * FROM cliente ORDER BY nombre";
                  $prm = null;
                }
              ?>
              <table class = "table table-striped">
                <thead>
                <tr>
                  <!--th>Cod.</th!-->
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Fecha Nac</th>
                  <th>Correo</th>
                  <th>Telefono</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                    //conectando a base 
                    require("sql/conexion.php");
                    //$consult = "SELECT id_cliente, nombre, apellido, fecha_nacimiento, correo, telefono FROM cliente";
                    $result = ""; //Arreglo de datos
                  foreach($PDO->query($sql) as $datos)
                  {
                    //creando estructura HTML + PHP
                    $result .= "<tr>";
                    //$result .= "<td>$datos[id_cliente]</td>";
                    $result .= "<td name = 'td_user'>$datos[nombre]</td>";
                    $result .= "<td name = 'td_user'>$datos[apellido]</td>";
                    $result .= "<td name = 'td_user'>$datos[fecha_nacimiento]</td>";
                    /*$result .= "<td name = 'td_user'>$datos[id_tipo_usuario]</td>";*/
                    $result .= "<td name = 'td_user'>$datos[correo]</td>";
                    $result .= "<td name = 'td_user'>$datos[telefono]</td>";     
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