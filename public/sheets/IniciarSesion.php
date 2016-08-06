<?php
 require("../lib/page.php"); // libreria para modelado de paginas
 require("../../lib/database.php"); //libreria para base de datos
 require("../../lib/validator.php");	
 Page::header("Catalogo");
?>

<?php
if(!empty($_POST))
{

  $_POST = validator::validateForm($_POST);
    $alias = $_POST['txtUsuario'];
    $clave = $_POST['txtPassword']; 
    try
    {
        if($alias != "" && $clave != "")
      {
        $sql = "SELECT * FROM cliente where correo=?";
        $params = array($alias);
        $data = Database::getRow($sql, $params);
        if($data != null)
        {
            $hash = $data['clave_user'];
            if(password_verify($clave, $hash)) 
            {
                $_SESSION['id_cliente'] = $data['id_cliente'];
                $_SESSION['nombre'] = $data['nombre'];

                header("location: ../index.php");
            }
            else 
            {
              throw new Exception("La clave ingresada es incorrecta.");
            }
        }
        else
        {
          throw new Exception("El alias ingresado no existe o su cuenta esta inhabilitada");
        }
      }
      else
      {
        throw new Exception("Debe ingresar un alias y una clave.");
      }
    }
    catch (Exception $error)
    {
        print("<div class='card-panel red'><i class='material-icons left'>error</i>".$error->getMessage()."</div>");
    }
}
?>

      <!--Formulario de inicio de secion-->
      <div class='container'>
        <h3>Iniciar Sesión</h3>
        <div class="row">
          <form class="col s12" method="post">
            <div class="row">

              <!--Usuario-->
              <div class="input-field col s6">
                <input placeholder="Placeholder" name="txtUsuario" id="txtUsuario" type="text" class="validate">
                <label for="txtUsuario">Nombre de Usuario</label>
              </div>

              <!--Contraseña-->
              <div class="input-field col s6">
                <input  name="txtPassword" id="password" type="password" class="validate">
                <label for="password">Contraseña</label>
              </div>

              <button type='submit' class="btn waves-effect waves-light pink darken-4" >Iniciar Sesión</button>

            </div>
          </form>
        </div>
      </div>

      
		

<?PHP
	Page::footer(); 
?>
	