$(document).ready(function(){
   		
   	/*configuraciones generales*/
   	
         $('#searchsheet').hide();

      /*configuracion de componentes*/
      	$('#options').hide();
   		$('#detoption').hide();
   		$('#co1').hide();
   		$('#co2').hide();
   		$('#co3').hide();
   		$('#co4').hide();
   		$('#co5').hide();
   		$('#co6').hide();
   		$('#co7').hide();

   		

   		/*search bar*/

            /*logo*/
            $('#logo').click(function(){
               $('#pagprincipal').show(400);
               $('#searchsheet').hide(400);
            });

            /*boton search*/
            $('#search').click(function(){
               $('#pagprincipal').hide(400);
               $('#searchsheet').show(400);
            });

   			/*boton  categorias*/
   				$('#cat').mouseenter(function(){
   					$(this).css('color','black').css('background-color','#D4D4D4');
   					$('#options').show(300);
   				});

   				$('#cat').mouseleave(function(){
   					$(this).css('color','white').css('background-color','#00A3CB');
   					
   				});
   			/*despliegue de menu*/
   				$('#options').mouseenter(function(){ 
   					$(this).show();
   				});
   				$('#options').mouseleave(function(){ 
                  
   				});
               $('#detoption').mouseleave(function(){
                  $('#options').hide(200);
                  $(this).hide(250);
               });
   			/*opciones de menu*/
   					
   					/*opcion1*/

   						$('#o1').mouseenter(function(){
   							$(this).css('background-color','#00A3CB').css('color','white').css('cursor','hand');
   							$('#detoption').show();
   							$('#co1').show(300);
   							$('#co2').hide();
   							$('#co3').hide();
   							$('#co4').hide();
   							$('#co5').hide();
   							$('#co6').hide();
   						});
                     $('#o1').click(function(){
                        $('#cat').text('Computadoras, Tablets y Smartphones');
                           
                           $('#txbuscador').css('width','46.16%');
                              /* Sub-Categoria 1 */
                              $('#cat1tit1').text('Computadoras');

                              $('#catlist1-1').text('Computadoras');
                              $('#catlist1-2').text('Laptops');
                              $('#catlist1-3').text('Accesorios');
                              $('#catlist1-4').text('Cargadores');
                              $('#catlist1-5').text('Baterias');
                              $('#catlist1-6').text('');
                              $('#catlist1-7').text('');
                              $('#catlist1-8').text('');

                              /* Sub-Categoria 2 */
                              $('#cat1tit2').text('Tablets');

                              $('#catlist2-1').text('Tablets');
                              $('#catlist2-2').text('Protectores');
                              $('#catlist2-3').text('Accesorios');
                              $('#catlist2-4').text('Baterías');
                              $('#catlist2-5').text('');
                              $('#catlist2-6').text('');
                              $('#catlist2-7').text('');
                              $('#catlist2-8').text('');

                              /* Sub-Categoria 3 */
                              $('#cat1tit3').text('Smartphones');

                              $('#catlist3-1').text('Smartphones');
                              $('#catlist3-2').text('Protectores');
                              $('#catlist3-3').text('Cargadores');
                              $('#catlist3-4').text('Accesorios');
                              $('#catlist3-5').text('');
                              $('#catlist3-6').text('');
                              $('#catlist3-7').text('');
                              $('#catlist3-8').text('');
                              




                        $('#detoption').hide(250);
                        $('#options').hide(250);
                     });
   						$('#o1').mouseleave(function(){
   							$(this).css('background-color','white').css('color','#00A3CB');   						
   						});

   					/*opcion2*/

   						$('#o2').mouseenter(function(){
   							$(this).css('background-color','#00A3CB').css('color','white').css('cursor','hand');
   							$('#detoption').show();
   							$('#co1').hide();
   							$('#co2').show(300);
   							$('#co3').hide();
   							$('#co4').hide();
   							$('#co5').hide();
   							$('#co6').hide();
   						});
                      $('#o2').click(function(){
                        $('#cat').text('Camara y Fotografía');

                           $('#txbuscador').css('width','54.75%');
                           
                           /* Sub-Categoria 1 */
                              $('#cat1tit1').text('Camaras Fotografícas');

                              $('#catlist1-1').text('Puente');
                              $('#catlist1-2').text('Camara reflex digital');
                              $('#catlist1-3').text('Mirrless Interchangeable');
                              $('#catlist1-4').text('Automatico');
                              $('#catlist1-5').text('Sub-Acuatico');
                              $('#catlist1-6').text('');
                              $('#catlist1-7').text('');
                              $('#catlist1-8').text('');

                              /* Sub-Categoria 2 */
                              $('#cat1tit2').text('Videocamaras');

                              $('#catlist2-1').text('de bolsillo');
                              $('#catlist2-2').text('Estándar');
                              $('#catlist2-3').text('Professional');
                              $('#catlist2-4').text('Helmet/Action');
                              $('#catlist2-5').text('Compacto');
                              $('#catlist2-6').text('');
                              $('#catlist2-7').text('');
                              $('#catlist2-8').text('');

                              /* Sub-Categoria 3 */
                              $('#cat1tit3').text('Accesorios');

                              $('#catlist3-1').text('Baterías');
                              $('#catlist3-2').text('Cables y Adaptadores');
                              $('#catlist3-3').text('Estuches Bolsos y Fundas');
                              $('#catlist3-4').text('Cargadores');
                              $('#catlist3-5').text('Tarjetas');
                              $('#catlist3-6').text('Microfonos');          
                              $('#catlist3-7').text('Albunes y Almacenamiento');
                              $('#catlist3-8').text('Protectores de Pantalla');
                              

                        $('#detoption').hide(250);
                        $('#options').hide(250);
                     });
   						$('#o2').mouseleave(function(){
   							$(this).css('background-color','white').css('color','#00A3CB');
   						
   						});

   					/*opcion3*/

   						$('#o3').mouseenter(function(){
   							$(this).css('background-color','#00A3CB').css('color','white').css('cursor','hand');
   							$('#detoption').show();
   							$('#co1').hide();
   							$('#co2').hide();
   							$('#co3').show(300);
   							$('#co4').hide();
   							$('#co5').hide();
   							$('#co6').hide();
   						});
                      $('#o3').click(function(){
                        $('#cat').text('Sistemas electronicos del vehiculo y GPS');

                           $('#txbuscador').css('width','45.055%');

                              /* Sub-Categoria 1 */
                              $('#cat1tit1').text('GPS');

                              $('#catlist1-1').text('Unidades GPS');
                              $('#catlist1-2').text('Accesorios GPS');
                              $('#catlist1-3').text('Seguimiento');
                              $('#catlist1-4').text('');
                              $('#catlist1-5').text('');
                              $('#catlist1-6').text('');
                              $('#catlist1-7').text('');
                              $('#catlist1-8').text('');

                              /* Sub-Categoria 2 */
                              $('#cat1tit2').text('Dispositivos para Vehiculos');

                              $('#catlist2-1').text('Alarmas de Seguridad');
                              $('#catlist2-2').text('Sistemas de Sonido');
                              $('#catlist2-3').text('Video ');
                              $('#catlist2-4').text('Accesorios electronicos');
                              $('#catlist2-5').text('');
                              $('#catlist2-6').text('');
                              $('#catlist2-7').text('');
                              $('#catlist2-8').text('');

                              /* Sub-Categoria 3 */
                              $('#cat1tit3').text('Accesorios');

                              $('#catlist3-1').text('Baterías');
                              $('#catlist3-2').text('Cables y Adaptadores');
                              $('#catlist3-3').text('Cargadores');
                              $('#catlist3-4').text('Tarjetas de memoria');
                              $('#catlist3-5').text('Microfonos');
                              $('#catlist3-6').text('');
                              $('#catlist3-7').text('');
                              $('#catlist3-8').text('');


                        $('#detoption').hide(250);
                        $('#options').hide(250);
                     });
   						$('#o3').mouseleave(function(){
   							$(this).css('background-color','white').css('color','#00A3CB');		
   						});

   					/*opcion4*/

   						$('#o4').mouseenter(function(){
   							$(this).css('background-color','#00A3CB').css('color','white').css('cursor','hand');
   							$('#detoption').show();
   							$('#co1').hide();
   							$('#co2').hide();
   							$('#co3').hide();
   							$('#co4').show(300);
   							$('#co5').hide();
   							$('#co6').hide();
   						});
                      $('#o4').click(function(){
                        $('#cat').text('TV, Audio y Vigilancia');
                        $('#detoption').hide(250);
                        $('#options').hide(250);

                        $('#txbuscador').css('width','54.16%');

                        /* Sub-Categoria 1 */
                              $('#cat1tit1').text('TV');

                              $('#catlist1-1').text('Reproductores Blu-Ray y DVD');
                              $('#catlist1-2').text('Televisores');
                              $('#catlist1-3').text('Cajas Directas');
                              $('#catlist1-4').text('Accesorios para televisores');
                              $('#catlist1-5').text('Antenas');
                              $('#catlist1-6').text('');
                              $('#catlist1-7').text('');
                              $('#catlist1-8').text('');

                              /* Sub-Categoria 2 */
                              $('#cat1tit2').text('Audio');

                              $('#catlist2-1').text('Audifonos');
                              $('#catlist2-2').text('Home theater');
                              $('#catlist2-3').text('Bocinas');
                              $('#catlist2-4').text('');
                              $('#catlist2-5').text('');
                              $('#catlist2-6').text('');
                              $('#catlist2-7').text('');
                              $('#catlist2-8').text('');

                              /* Sub-Categoria 3 */
                              $('#cat1tit3').text('Vigilancia');

                              $('#catlist3-1').text('Camaras de seguridad');
                              $('#catlist3-2').text('Sistemas de Seguridad');
                              $('#catlist3-3').text('Grabadoras y tarjetas de video');
                              $('#catlist3-4').text('Pantallas, monitores de Vigilancia');
                              $('#catlist3-5').text('Accesorios de Vigilancia');
                              $('#catlist3-6').text('');
                              $('#catlist3-7').text('');
                              $('#catlist3-8').text('');



                     });
   						$('#o4').mouseleave(function(){
   							$(this).css('background-color','white').css('color','#00A3CB');
   						});

   					/*opcion5*/

   						$('#o5').mouseenter(function(){
   							$(this).css('background-color','#00A3CB').css('color','white').css('cursor','hand');
   							$('#detoption').show();
   							$('#co1').hide();
   							$('#co2').hide();
   							$('#co3').hide();
   							$('#co4').hide();
   							$('#co5').show(300);
   							$('#co6').hide();
   						});
                      $('#o5').click(function(){
                        $('#cat').text('Videojuegos y Consolas');
                        $('#detoption').hide(250);
                        $('#options').hide(250);

                        $('#txbuscador').css('width','53.1%');

                        /* Sub-Categoria 1 */
                              $('#cat1tit1').text('Consolas');

                              $('#catlist1-1').text('Xbox');
                              $('#catlist1-2').text('PlayStation');
                              $('#catlist1-3').text('Wii');
                              $('#catlist1-4').text('Otros(as)');
                              $('#catlist1-5').text('');
                              $('#catlist1-6').text('');
                              $('#catlist1-7').text('');
                              $('#catlist1-8').text('');

                              /* Sub-Categoria 2 */
                              $('#cat1tit2').text('Videojuegos');

                              $('#catlist2-1').text('Xbox360');
                              $('#catlist2-2').text('Xbox One');
                              $('#catlist2-3').text('Otros(as)');
                              $('#catlist2-4').text('Nintendo Wii');
                              $('#catlist2-5').text('PC');
                              $('#catlist2-6').text('PlayStation 2');
                              $('#catlist2-7').text('PlayStation 3');
                              $('#catlist2-8').text('PlayStation 4');

                              /* Sub-Categoria 3 */
                              $('#cat1tit3').text('Accesorios');

                              $('#catlist3-1').text('Controles y Accesorios');
                              $('#catlist3-2').text('Estuches y Fundas');
                              $('#catlist3-3').text('Carcasas y calcamonias');
                              $('#catlist3-4').text('Cables y Adaptadores');
                              $('#catlist3-5').text('Lotes de Accesorios');
                              $('#catlist3-6').text('Auriculares');
                              $('#catlist3-7').text('Discos Duros');
                              $('#catlist3-8').text('');


                     });
   						$('#o5').mouseleave(function(){
   							$(this).css('background-color','white').css('color','#00A3CB');
   						});

   					/*opcion6*/

   						$('#o6').mouseenter(function(){
   							$(this).css('background-color','#00A3CB').css('color','white').css('cursor','hand');
   							$('#detoption').show();
   							$('#co1').hide();
   							$('#co2').hide();
   							$('#co3').hide();
   							$('#co4').hide();
   							$('#co5').hide();
   							$('#co6').show(300);
   						});
   						$('#o6').mouseleave(function(){
   							$(this).css('background-color','white').css('color','#00A3CB');
   						});

      /*Menu desplegable de caracteristicas*/
      $('.cat1list').mouseenter(function(){
         $('.cat1list').css('color','white').css('cursor','hand').css('background-color','#00A3CB');

      });
      $('.cat1list').mouseleave(function(){
         $('.cat1list').css('color','#00A3CB').css('cursor','hand').css('background-color','white');;
      });
      /*opcion 2*/
      $('.cat2list').mouseenter(function(){
         $('.cat2list').css('color','white').css('cursor','hand').css('background-color','#00A3CB');

      });
      $('.cat2list').mouseleave(function(){
         $('.cat2list').css('color','#00A3CB').css('cursor','hand').css('background-color','white');;
      });
      /*Opcion 3*/
      $('.cat3list').mouseenter(function(){
         $('.cat3list').css('color','white').css('cursor','hand').css('background-color','#00A3CB');

      });
      $('.cat3list').mouseleave(function(){
         $('.cat3list').css('color','#00A3CB').css('cursor','hand').css('background-color','white');;
      });
      /*Opcion 4*/

      $('.cat4list').mouseenter(function(){
         $('.cat4list').css('color','white').css('cursor','hand').css('background-color','#00A3CB');

      });
      $('.cat4list').mouseleave(function(){
         $('.cat4list').css('color','#00A3CB').css('cursor','hand').css('background-color','white');;
      });

      /*opcion 5*/
      $('.cat5list').mouseenter(function(){
         $('.cat5list').css('color','white').css('cursor','hand').css('background-color','#00A3CB');

      });
      $('.cat5list').mouseleave(function(){
         $('.cat5list').css('color','#00A3CB').css('cursor','hand').css('background-color','white');;
      });

      /*Opcion 6*/
      $('.cat6list').mouseenter(function(){
         $('.cat6list').css('color','white').css('cursor','hand').css('background-color','#00A3CB');

      });
      $('.cat6list').mouseleave(function(){
         $('.cat6list').css('color','#00A3CB').css('cursor','hand').css('background-color','white');;
      });

      /*Opcion 7*/
      $('.cat7list').mouseenter(function(){
         $('.cat7list').css('color','white').css('cursor','hand').css('background-color','#00A3CB');

      });
      $('.cat7list').mouseleave(function(){
         $('.cat7list').css('color','#00A3CB').css('cursor','hand').css('background-color','white');;
      });
      /*Opcion 8*/
      $('.cat8list').mouseenter(function(){
         $('.cat8list').css('color','white').css('cursor','hand').css('background-color','#00A3CB');

      });
      $('.cat8list').mouseleave(function(){
         $('.cat8list').css('color','#00A3CB').css('cursor','hand').css('background-color','white');;
      });


});