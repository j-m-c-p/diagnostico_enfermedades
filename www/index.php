<!-- 
* 
* @versión: 1.0 
* @modificado: 23 de febrero del 2017 
* @autores: Jhonnatan cubides, Harley santoyo
* 
--> 


<?php
	/* se incluye la clase BD la cual contiene las funciones para el funcionamiento del prototipo */
	include ('BD.php');
	/*Se incluye el archivo el cual contiene el linck de la libreria de bootstrap  */
	include ('libreria.php');
	/*Se nombra una variable para crear un nuevo objeto*/
	$obj_o= new BD;

?>




<html>
	<head>
		<title></title>

	</head>
	<body>


		<div class="page-header">
		  	<h1><center>Signos <small>y sintomas</small></center></h1>
		</div>

		<div class='container' >
		  	<div class='row'></div>
		  	<br>
		  
				<div class='row'>
					<div class='col-xs-12 col-md-3 '></div>
						<div class='col-xs-12 col-md-6 '>
							               	
							<?php include('angularjs.php'); ?> <!--Se incluye el archivo angular el cual nos permite disminuir mostrar todos los resultados en pantalla-->

						</div>
					<div class='col-xs-12 col-md-3 '></div>
				</div>
		</div>

			
 	

	


	

	</body>
</html>

