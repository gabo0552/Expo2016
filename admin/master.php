<!DOCTYPE html>
<html>
	<head>
		<title>
			Opciones
		</title>

		  <link rel="stylesheet" type = "text/css" href="css/admin.css">	
      <link rel='stylesheet' type='text/css' href='css/bootstrap.min.css'>
      <script src='js/jquery-2.2.0.min.js'></script> 
      <script src = 'js/validar.js'></script> 
      <script src='js/bootstrap.min.js'></script>
	</head>
	<body>
  
<nav id = "nav_ads" class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">HTS</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a  id = "let" href="org.php">Inicio <span class="glyphicon glyphicon-th-list"></span></a></li>
        <!--li><a  id = "let" href="create_user.php">Usuarios <span class="glyphicon glyphicon-user"></span></a></li!-->
        <li><a id = "let" href="read_user.php">Clientes <span class = "glyphicon glyphicon-share-alt"></span></a></li>
        <li><a id = "let" href = "img_admin.php">Promociones <span class = "glyphicon glyphicon-picture"></span></a></li>
        <li><a id = "let" href = "reservaciones.php">Reservaciones <span class="badge">42</span></a></li>
        <li><a id = "let" href = "consultar_areas.php">Áreas <span class = "glyphicon glyphicon-map-marker"></span></a></li>
        <li><a id = "let" href = "create_tipo_user.php">Tipo Usuario <span class = "glyphicon glyphicon-user"></span></a></li>
        <!--li class = "dropdown">
          <a id = "let" href = "#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Áreas <span clas = "glyphicon glyphicon-bookmark"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            
          </ul>
        </li!-->
      </ul>
      <!--form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Buscar">
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
      </form!-->
      <ul class="nav navbar-nav navbar-right">
        <!--li><a id = "let" href="#">Link</a></li!-->
        <li class="dropdown">
          <a id = "let" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"> </span> USUARIO <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Perfil</a></li>
            <li role="separator" class="divider"></li>
            <li><a href = "logout.php">Cerrar Sesión</a></li>
          </ul>
        </li>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	</body>
</html>