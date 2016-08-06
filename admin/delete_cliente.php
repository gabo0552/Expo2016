<?php
    $id = null;
    if(!empty($_GET['id'])) 
    {
        $id = $_GET['id'];
    }
    if($id == null) 
    {
        header("location: read.php");
    }

        if(!empty($_POST)) 
    {
        require("sql/conexion.php");   
        $id = $_POST['id'];
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM cliente WHERE id_cliente = ?";
        $stmt = $PDO->prepare($sql);
        $stmt->execute(array($id));
        $PDO = null;
        header("location: read_user.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Eliminar
        </title>
    </head>
    <body>
        <?php
            include 'master.php';
        ?>

        <div class="well">
            <div class="panel panel-default">
              <div class="panel-heading">
                <center>    
                    <h3 class="panel-title">¿Eliminar usuario?</h3>
                </center>
              </div>
                  <div class="panel-body">
                    <form method = "POST" >
                        <fieldset>
                    <input type="hidden" name="id" value="<?php print($id);?>"/>
                        <button type = "submit" class = "btn btn-default">Eliminar</button>
                        <a class = "btn btn-default" href="org.php">Cancelar</a>
                        </fieldset>
                    </form>
                  </div>
            </div>
        </div>
    </body>
</html>