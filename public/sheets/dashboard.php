<?php
 require("../lib/page.php"); // libreria para modelado de paginas
 require("../../lib/database.php"); //libreria para base de datos
 require("../../lib/validator.php");	
 Page::header("Catalogo");
?>
	<hr>
	<hr>
	<div class='row'>

			<!--Div de sistema-->
			<div class="card small">
				    <div class="card-image waves-effect waves-block waves-light">
				      <img class="activator" src="../../img/3.jpg">
				    </div>
				    <div class="card-content">
				      <span class="card-title activator grey-text text-darken-4">Gabriel Andaluz</span>
				    </div>
				</div>
	   		<div class='col s12 m9 l9'>
		   		

		      <div class='col s12 m12 l12'>
		      	<ul class="tabs ">
			      <li class="tab col 3 "><a href="#test1">Mi perfil</a></li>
			      <li class="tab col 3"><a href="#test2">Servicios</a></li>
			      <li class="tab col 3"><a href="#test3">Reservaciones</a></li>
			    </ul>
		      </div>

		      <!--Pages-->
		      <div class='col s12 m12 l12'>


		      		<!--Mi perfil-->
		      		<div id="test1" class="col s12 grey darken-2">
		      			<div class='row'>
							<div class='col s12 m12 l12'>
								<h5 class='white-text'>
									Datos Sobre tí
								</h5>
							</div>
							<div class='col s12 m12 l12'>
								<p class='grey-text text-lighten-4'>
									¿Cambiaste de residencia?, ¿De numero Telefonico?, Haznoslo saber, Actualiza tu informacion en esta sección.
								</p>
							</div>
						</div>

						<!--Formulario de ingreso de reservación-->
						<form method='post'>
							<div class='row'>

								<div class='input-field col s12 m6 l6'>
									<label>Nombres:</label>
									<input type="text" class="validate" name='' placeholder="Ingrese sus Nombres" style='color: white;'>
								</div>

								<div class='input-field col s12 m6 l6'>
									<label>Apellidos:</label>
									<input type="text" class="validate" name='' placeholder="Ingrese sus Apellidos" style='color: white;'>
								</div>

								<div class='input-field col s12 m6 l6'>
									<label>Nacionalidad:</label>
									<input type="text" class="validate" name='' placeholder="Ingrese su Nacionalidad" style='color: white;'>
								</div>

								<div class='input-field col s12 m6 l6'>
									<label>Fecha de Nacimiento</label>
									<input type="date" class="datepicker" name='txtfechadenacimiento' placeholder="Fecha de Nacimiento" style='color: white;'>
								</div>


								<div class='input-field col s12 m6 l6'>
									<label>Dirección:</label>
									<input type="text" class="validate" name='' placeholder="Ingrese su Direccion" style='color: white;'>
								</div>

								<div class='input-field col s12 m6 l6'>
									<label>Profesión:</label>
									<input type="text" class="validate" name='' placeholder="Ingrese su Profesion" style='color: white;'>
								</div>

								<div class='input-field col s12 m6 l6'>
									<label>Telefono:</label>
									<input type="text" class="validate" name='' placeholder="Ingrese su Telefono" style='color: white;'>
								</div>	

								<div class='input-field col s12 m6 l6'>
									<label>Correo Electronico:</label>
									<input type="text" class="validate" name='' placeholder="Ingrese su Correo Electronico" style='color: white;'>
								</div>

								<div class='input-field col s12 m6 l6'>
									<label>Tipo de Documento:</label>
									<input type="text" class="validate" name='' placeholder="Ingrese un documento de identificación" style='color: white;'>
								</div>

								<div class="input-field col s12 m6 l6">
								    <button class="btn waves-effect waves-light pink darken-4" href='sheet/galeria.php' type='submit'>Actualizar Información</button>
								</div>
							</div>
						</form>
		      		</div>

		      		<!--Servicios por cliente-->
				    <div id="test2" class="col s12 m12 l12 grey darken-2">
				    	<div class='row'>
							<div class='col s12 m12 l12'>
								<h5 class='white-text'>
									Servicios
								</h5>
							</div>
							<div class='col s12 m12 l12'>
								<p class='grey-text text-lighten-4'>
									¿Que Servicios te ha brindado nuestro hotel?, revisalo en este apartado.
								</p>
							</div>
						</div>

						<!--Formulario de ingreso de reservación-->
						<form method='post'>
							<div class='row'>
								<ul class="collection">
								    <li class="collection-item avatar">
								      <img src="../../2.jpg" alt="" class="circle">
								      <span class="title">Nombre de el Servicio</span>
								      <p>Fecha:2016/7/17<br>
								         Hora:15:00<br>
								         Cantidad:--<br>
								         Descripcion:Que se le ofrecío<br>
								         Estado:Cobrado

								      </p>
								      <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
								    </li>
								    <li class="collection-item avatar">
								      <i class="material-icons circle">folder</i>
								      <span class="title">Title</span>
								      <p>First Line <br>
								         Second Line
								      </p>
								      <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
								    </li>
								    <li class="collection-item avatar">
								      <i class="material-icons circle green">insert_chart</i>
								      <span class="title">Title</span>
								      <p>First Line <br>
								         Second Line
								      </p>
								      <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
								    </li>
								    <li class="collection-item avatar">
								      <i class="material-icons circle red">play_arrow</i>
								      <span class="title">Title</span>
								      <p>First Line <br>
								         Second Line
								      </p>
								      <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
								    </li>
								  </ul>
							</div>
						</form>
				    </div>
			</div>
	      </div>

	      <!--Interaccion de usuarios con la pagina-->
	      <div class='col s12 m3 l3 grey lighten-3'>
	      <div class='container'>
	      <br>
			<br>
		      <!--trip advisor plugin-->
		      	<div id="TA_cdswritereviewlg540" class="TA_cdswritereviewlg" style="position:center">
				<ul id="Jy2dNrO3yb" class="TA_links k9kDe8n1">
				<li id="SXUeR4h3W" class="hHNiB0GUO">
				<a target="_blank" href="https://www.tripadvisor.es/"><img src="https://www.tripadvisor.es/img/cdsi/img2/branding/medium-logo-12097-2.png" alt="TripAdvisor"/></a>
				</li>
				</ul>
				</div>
				<script src="https://www.jscache.com/wejs?wtype=cdswritereviewlg&amp;uniq=540&amp;locationId=3627402&amp;lang=es&amp;lang=es&amp;display_version=2"></script>

	      <br>
	      <br>

	      	  <!--Pluggin de facebook-->
	      	  <div id="fb-root"></div>
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.7";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>

				<!--Div donde estará el pluggin de facebook-->
				<div class="fb-like" data-href="https://www.facebook.com/Hotel-Fotherhouse-509677569061563/?fref=ts" data-width="150" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>

				<br>
				<br>

				<!--Plugin de comentarios de facebook-->

				<div id="fb-root"></div>
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.7";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>

				<!--Comentar en Facbook-->
				<div class="fb-comments" data-href="https://www.facebook.com/Hotel-Fotherhouse-509677569061563/?fref=ts" data-width="200" data-numposts="5"></div>

				</div>
	      </div>
    </div>
    

          

<?PHP
	Page::footer(); 
?>
	