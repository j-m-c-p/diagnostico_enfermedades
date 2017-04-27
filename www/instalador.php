<!--
*  
* Autores: Jhonnatan Cubides, Harley Santoyo
* 
-->
<html>
<head>
	<title>Instalador</title>
	<?php
		/* se incluye la clase BD la cual contiene las funciones para el funcionamiento del prototipo */
		include ('class/BD.php');

		/*Se nombra una variable para crear un nuevo objeto*/
		$obj_o= new BD;
		/* trae la función estilos de bootstrap de la clase */
		echo $obj_o->estilos("bootstrap"); 
	?>
	
</head>
<body>

	<br>
	<br>
	<br>

	<div class="container">

		<div class="row">
		            <div class="col-xs-12 col-md-1 "></div>
		                <div class="col-xs-12 col-md-4 well">
		                        <div class="form-group" >

									<form action="instalando.php" method="get">
										<!--<label for="exampleInputEmail1">Nombre de la tabla (*)  </label>
										<br>
										<input type="text" class="form-control" name="tabla" placeholder="Nombre de la tabla" required>
										<br>-->
										<label for="exampleInputEmail1">Servidor (*)  </label>
										<br>
										<input type="text" class="form-control" name="servidor" placeholder="servidor" required>
										<br>
										<label for="exampleInputEmail1">Usuario (*)  </label>
										<br>
										<input type="text" class="form-control" name="usuario" placeholder="usuario" required>
										<br>
										<label for="exampleInputEmail1">Clave  </label>
										<br>
										<input type="text" class="form-control" name="contrasena" placeholder="clave">
										<br>
										<label for="exampleInputEmail1">Base de datos (*)  </label>
										<br>
										<input type="text" class="form-control" name="bd"  placeholder="base de datos" required>
										<br>
										<input type="submit" class="btn btn-success" value="Enviar">

									</form>


								</div>
	    				</div>
	    				<br>
	    				<br>
	    				<br>
	    				<br>
	    				<br>
	    				<br>
	            		<div class="col-xs-12 col-md-4 "><div><h3 style="color:red">Por favor tener en phpmyadmin una base de datos creada.</h3></div></div>
    	</div>
    </div>


</body>
</html>		
