<?php

	/**
	* Autor: Harley Santoyo and Jhonnatan Cubides
	* Este programa creará una base de datos con todos sus componentes. La prueba sería usar este script y después mirar 
	* que efectivamente exportándola y creando el gráfico del modelo entidad relación, todos sus componentes estén ahí.
	*
	* En este programa se usan tanto la programación estructurada, como las funciones y la POO.
	*/

	include( "class/BD.php" ); //Se incluye la clase verificador, la idea es no hacer este código más grande.
	$objeto_verificador = new BD(); //Se crea la instancia de la clase verificador.

	define( "NUMERO_DE_TABLAS", 3 ); //Se define el número de tablas que se va a crear. 

	$contador_variables_llegada = 0; 
	$cadena_informe_instalacion = ""; 
	$interrupcion_proceso = 0;
	$imprimir_mensajes_prueba = 0;  //Usar valores 0 o 1, solo para el programador.
	$tmp_nombre_objeto_o_tabla = "";

	$mensaje1 = "Es posible que la tabla o el objeto ya esté creada(o), por favor reinicie la instalación con una base de datos vacía.";

	if( isset( $_GET[ 'servidor' ] ) ) 		$contador_variables_llegada ++;
	if( isset( $_GET[ 'usuario' ] ) ) 		$contador_variables_llegada ++;
	if( isset( $_GET[ 'contrasena' ] ) ) 	$contador_variables_llegada ++;
	if( isset( $_GET[ 'bd' ] ) ) 			$contador_variables_llegada ++;

	if( $imprimir_mensajes_prueba == 1 ) echo "<br>Llegaron ".$contador_variables_llegada." variables.";
	
	//Tienen que llegar cuatro variables para poder dar continuación al proceso de instalación.
	if( $contador_variables_llegada >= 3 && $contador_variables_llegada <= 4 ) // Super if - inicio
	{
		if( $imprimir_mensajes_prueba == 1 ) echo "<br>Entrando al bloque de instalaci&oacute;n.";

		//Se realiza una sola conexión para la ejecución de todas las consultas SQL.-------------------------------
		//$conexion = @mysqli_connect( $_GET[ 'servidor' ], $_GET[ 'usuario' ], $_GET[ 'contrasena' ], $_GET[ 'bd' ] ); //Linea anterior, salía error de conexión.
		$conexion = @mysqli_connect( $_GET[ 'servidor' ], $_GET[ 'usuario' ], $_GET[ 'contrasena' ], $_GET[ 'bd' ] ); //Ojo, con el arroba no sale el mensaje de error.

		if( !$conexion ) //Verificamos que la conexion esté establecida preguntando si hay error o conexión no existe.
		{
			$interrupcion_proceso = 1; //Si pasa a este bloque, la conexión no se ha establecido, quiere decir que activaremos la variable de interrupción.
			$cadena_informe_instalacion .= "<br>Error: no se ha podido establecer una conexión con la base de datos. ";

		}else{

				//echo "1 fds<br>".$objeto_verificador->mostrar_tablas( $conexion, 2 );

				if( $objeto_verificador->mostrar_tablas( $conexion, 3 ) != 0 ) //Aquí se verifica que no hayan tablas existentes.
				{
					//echo "2 fds<br>";

					echo "Ya hay tablas creadas, por favor cree una base de datos nueva.<br>"; 
					$interrupcion_proceso = 1;
				}
			}
			
		if( $interrupcion_proceso == 0 ) //Si esta variable cambia, la instalación será interrumpida para cada bloque sql.
		{
			$tmp_nombre_objeto_o_tabla = "tb_manuales";

			//El sistema procederá a crear la tabla si no existe.
			$sql  = " CREATE TABLE IF NOT EXISTS $tmp_nombre_objeto_o_tabla ( ";
			$sql .= " id_manual int(11) NOT NULL,  ";
			$sql .= " titulo varchar(1000) NOT NULL, ";
			$sql .= " definicion varchar(2000) NOT NULL, ";
			$sql .= " url varchar(50) NOT NULL, ";
			$sql .= " claves text NOT NULL, ";
			$sql .= " PRIMARY KEY (id_manual) ";

			
			$sql .= " ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ";
			
			$resultado = $conexion->query( $sql );

			//Si se creó la tabla, el sistema cargará los datos pertienentes del informe.
			if( $objeto_verificador-> verificar_existencia_tabla( $tmp_nombre_objeto_o_tabla, $_GET[ 'servidor' ], $_GET[ 'usuario' ], $_GET[ 'contrasena' ], $_GET[ 'bd' ], $imprimir_mensajes_prueba ) == 1 )
			{
				$cadena_informe_instalacion .= "<br>La tabla $tmp_nombre_objeto_o_tabla se ha creado con éxito.";	

			}else{
					$cadena_informe_instalacion .= "<br>Error: La tabla $tmp_nombre_objeto_o_tabla no se ha creado. ".$mensaje1;	
					$interrupcion_proceso = 1;
				}
		}

		if( $interrupcion_proceso == 0 ) //Si esta variable cambia, la instalación será interrumpida para cada bloque sql.
		{
			$tmp_nombre_objeto_o_tabla = "tb_usuarios";

			//El sistema procederá a crear la tabla si no existe.
			$sql  = " CREATE TABLE IF NOT EXISTS $tmp_nombre_objeto_o_tabla ( ";
			$sql .= " documento varchar(20) NOT NULL,  ";
			$sql .= " nombre varchar(50) NOT NULL, ";
			$sql .= " id_resultados int(11) NOT NULL, ";
			$sql .= " id_manual int(11) NOT NULL, ";
			$sql .= " PRIMARY KEY (documento), ";
			$sql .= " KEY indice_id_manual (id_manual), ";
			$sql .= " KEY indice_id_resultados (id_resultados) ";
			$sql .= " ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ";

			
			
			$resultado = $conexion->query( $sql );

			//Si se creó la tabla, el sistema cargará los datos pertienentes del informe.
			if( $objeto_verificador->  verificar_existencia_tabla( $tmp_nombre_objeto_o_tabla, $_GET[ 'servidor' ], $_GET[ 'usuario' ], $_GET[ 'contrasena' ], $_GET[ 'bd' ], $imprimir_mensajes_prueba ) == 1 )
			{
				$cadena_informe_instalacion .= "<br>La tabla $tmp_nombre_objeto_o_tabla se ha creado con éxito.";	

			}else{
					$cadena_informe_instalacion .= "<br>Error: La tabla $tmp_nombre_objeto_o_tabla no se ha creado. ".$mensaje1;	
					$interrupcion_proceso = 1;
				}
		}


		if( $interrupcion_proceso == 0 ) //Si esta variable cambia, la instalación será interrumpida para cada bloque sql.
		{
			$tmp_nombre_objeto_o_tabla = "tb_resultados";

			//El sistema procederá a crear la tabla si no existe.
			$sql  = " CREATE TABLE IF NOT EXISTS $tmp_nombre_objeto_o_tabla ( ";
			$sql .= " id_resultados int(11) NOT NULL,  ";
			$sql .= " id_signos int(11) NOT NULL, ";
			$sql .= " id_enfermedades int(11) NOT NULL, ";
			$sql .= " fecha_resultado date NOT NULL, ";
			$sql .= " PRIMARY KEY (id_resultados), ";
			$sql .= " KEY indice_id_enfermedades (id_enfermedades), ";
			$sql .= " KEY indice_id_signos (id_signos) ";
			$sql .= " ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ";
			
			$resultado = $conexion->query( $sql );

			//Si se creó la tabla, el sistema cargará los datos pertienentes del informe.
			if( $objeto_verificador->  verificar_existencia_tabla( $tmp_nombre_objeto_o_tabla, $_GET[ 'servidor' ], $_GET[ 'usuario' ], $_GET[ 'contrasena' ], $_GET[ 'bd' ], $imprimir_mensajes_prueba ) == 1 )
			{
				$cadena_informe_instalacion .= "<br>La tabla $tmp_nombre_objeto_o_tabla se ha creado con éxito.";	

			}else{
					$cadena_informe_instalacion .= "<br>Error: La tabla $tmp_nombre_objeto_o_tabla no se ha creado. ".$mensaje1;	
					$interrupcion_proceso = 1;
				}
		}


		if( $interrupcion_proceso == 0 ) //Si esta variable cambia, la instalación será interrumpida para cada bloque sql.
		{
			$tmp_nombre_objeto_o_tabla = "tb_enfermedades";

			//El sistema procederá a crear la tabla si no existe.
			$sql  = " CREATE TABLE IF NOT EXISTS $tmp_nombre_objeto_o_tabla ( ";
			$sql .= " id_enfermedades int(11) NOT NULL,  ";
			$sql .= " enfermedad varchar(200) NOT NULL, ";
			$sql .= " PRIMARY KEY (id_enfermedades) ";
			$sql .= " ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ";
			
			$resultado = $conexion->query( $sql );

			//Si se creó la tabla, el sistema cargará los datos pertienentes del informe.
			if( $objeto_verificador->  verificar_existencia_tabla( $tmp_nombre_objeto_o_tabla, $_GET[ 'servidor' ], $_GET[ 'usuario' ], $_GET[ 'contrasena' ], $_GET[ 'bd' ], $imprimir_mensajes_prueba ) == 1 )
			{
				$cadena_informe_instalacion .= "<br>La tabla $tmp_nombre_objeto_o_tabla se ha creado con éxito.";	

			}else{
					$cadena_informe_instalacion .= "<br>Error: La tabla $tmp_nombre_objeto_o_tabla no se ha creado. ".$mensaje1;	
					$interrupcion_proceso = 1;
				}
		}


		if( $interrupcion_proceso == 0 ) //Si esta variable cambia, la instalación será interrumpida para cada bloque sql.
		{
			$tmp_nombre_objeto_o_tabla = "tb_signos_y_sintomas";

			//El sistema procederá a crear la tabla si no existe.
			$sql  = " CREATE TABLE IF NOT EXISTS $tmp_nombre_objeto_o_tabla ( ";
			$sql .= " id_signos int(11) NOT NULL,  ";
			$sql .= " signos_y_sintomas varchar(200) NOT NULL, ";
			$sql .= " PRIMARY KEY (id_signos) ";
			$sql .= " ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 "; 
			
			$resultado = $conexion->query( $sql );

			//Si se creó la tabla, el sistema cargará los datos pertienentes del informe.
			if( $objeto_verificador-> verificar_existencia_tabla( $tmp_nombre_objeto_o_tabla, $_GET[ 'servidor' ], $_GET[ 'usuario' ], $_GET[ 'contrasena' ], $_GET[ 'bd' ], $imprimir_mensajes_prueba ) == 1 )
			{
				$cadena_informe_instalacion .= "<br>La tabla $tmp_nombre_objeto_o_tabla se ha creado con éxito.";	

			}else{
					$cadena_informe_instalacion .= "<br>Error: La tabla $tmp_nombre_objeto_o_tabla no se ha creado. ".$mensaje1;	
					$interrupcion_proceso = 1;
				}
		}



		
		if( $interrupcion_proceso == 0 ) //Si esta variable cambia, la instalación será interrumpida para cada bloque sql.
		{
			
			$tmp_nombre_objeto_o_tabla1 = "fk_dpto_pais" ;
		
			//El sistema procederá a crear una de las restricciones por llave foranea.				
			$sql  = " ALTER TABLE tb_usuarios ";
			$sql .= " ADD CONSTRAINT $tmp_nombre_objeto_o_tabla FOREIGN KEY (id_manual) REFERENCES tb_manuales (id_manual)"; /*ON DELETE CASCADE ON UPDATE CASCADE" . " ADD CONSTRAINT fk_dpto_pais1 FOREIGN KEY (id_resultados) REFERENCES tb_resultados (id_resultados) ON DELETE CASCADE ON UPDATE CASCADE ";*/


			

			
			

			//$sql .= " ON DELETE CASCADE ON UPDATE CASCADE ";
			//echo $sql;
			$resultado = $conexion->query( $sql );

			//Si se creó el objeto, el sistema cargará los datos pertienentes del informe.
			if( $objeto_verificador->  verificar_existencia_objeto( $tmp_nombre_objeto_o_tabla, $_GET[ 'servidor' ], $_GET[ 'usuario' ], $_GET[ 'contrasena' ], $_GET[ 'bd' ], $imprimir_mensajes_prueba ) == 1 )
			{
				$cadena_informe_instalacion .= "<br>La restricción $tmp_nombre_objeto_o_tabla se ha creado con éxito.";	

			}else{
					$cadena_informe_instalacion .= "<br>Error: La restricción $tmp_nombre_objeto_o_tabla no se ha creado. ".$mensaje1;	
					$interrupcion_proceso = 1;
				}
		}



		/////////////////////////////////////////////////////////////////
		if( $interrupcion_proceso == 0 ) //Si esta variable cambia, la instalación será interrumpida para cada bloque sql.
		{
			
			$tmp_nombre_objeto_o_tabla2 = "relacion1" ;
		
			//El sistema procederá a crear una de las restricciones por llave foranea.				
			$sql  = " ALTER TABLE tb_usuarios ";
			$sql .= " ADD CONSTRAINT $tmp_nombre_objeto_o_tabla2 FOREIGN KEY (id_resultados) REFERENCES tb_resultados (id_resultados)"; /*ON DELETE CASCADE ON UPDATE CASCADE" . " ADD CONSTRAINT fk_dpto_pais1 FOREIGN KEY (id_resultados) REFERENCES tb_resultados (id_resultados) ON DELETE CASCADE ON UPDATE CASCADE ";*/


			

			
			

			//$sql .= " ON DELETE CASCADE ON UPDATE CASCADE ";
			//echo $sql;
			$resultado = $conexion->query( $sql );

			//Si se creó el objeto, el sistema cargará los datos pertienentes del informe.
			if( $objeto_verificador->  verificar_existencia_objeto( $tmp_nombre_objeto_o_tabla, $_GET[ 'servidor' ], $_GET[ 'usuario' ], $_GET[ 'contrasena' ], $_GET[ 'bd' ], $imprimir_mensajes_prueba ) == 1 )
			{
				$cadena_informe_instalacion .= "<br>La restricción $tmp_nombre_objeto_o_tabla2 se ha creado con éxito.";	

			}else{
					$cadena_informe_instalacion .= "<br>Error: La restricción $tmp_nombre_objeto_o_tabla2 no se ha creado. ".$mensaje1;	
					$interrupcion_proceso = 1;
				}
		}
		////////////////////////////////////


		/////////////////////////////////////////////////////////////////
		if( $interrupcion_proceso == 0 ) //Si esta variable cambia, la instalación será interrumpida para cada bloque sql.
		{
			
			$tmp_nombre_objeto_o_tabla3 = "relacion4" ;
		
			//El sistema procederá a crear una de las restricciones por llave foranea.				
			$sql  = " ALTER TABLE tb_enfermedades ";
			$sql .= " ADD CONSTRAINT $tmp_nombre_objeto_o_tabla3 FOREIGN KEY (id_enfermedades) REFERENCES tb_resultados (id_enfermedades)"; /*ON DELETE CASCADE ON UPDATE CASCADE" . " ADD CONSTRAINT fk_dpto_pais1 FOREIGN KEY (id_resultados) REFERENCES tb_resultados (id_resultados) ON DELETE CASCADE ON UPDATE CASCADE ";*/


			

			
			

			//$sql .= " ON DELETE CASCADE ON UPDATE CASCADE ";
			//echo $sql;
			$resultado = $conexion->query( $sql );

			//Si se creó el objeto, el sistema cargará los datos pertienentes del informe.
			if( $objeto_verificador->  verificar_existencia_objeto( $tmp_nombre_objeto_o_tabla, $_GET[ 'servidor' ], $_GET[ 'usuario' ], $_GET[ 'contrasena' ], $_GET[ 'bd' ], $imprimir_mensajes_prueba ) == 1 )
			{
				$cadena_informe_instalacion .= "<br>La restricción $tmp_nombre_objeto_o_tabla3 se ha creado con éxito.";	

			}else{
					$cadena_informe_instalacion .= "<br>Error: La restricción $tmp_nombre_objeto_o_tabla3 no se ha creado. ".$mensaje1;	
					$interrupcion_proceso = 1;
				}
		}
		////////////////////////////////////

		/////////////////////////////////////////////////////////////////
		if( $interrupcion_proceso == 0 ) //Si esta variable cambia, la instalación será interrumpida para cada bloque sql.
		{
			
			$tmp_nombre_objeto_o_tabla4 = "relacion5" ;
		
			//El sistema procederá a crear una de las restricciones por llave foranea.				
			$sql  = " ALTER TABLE tb_signos_y_sintomas ";
			$sql .= " ADD CONSTRAINT $tmp_nombre_objeto_o_tabla4 FOREIGN KEY (id_signos) REFERENCES tb_resultados (id_signos)"; /*ON DELETE CASCADE ON UPDATE CASCADE" . " ADD CONSTRAINT fk_dpto_pais1 FOREIGN KEY (id_resultados) REFERENCES tb_resultados (id_resultados) ON DELETE CASCADE ON UPDATE CASCADE ";*/


			

			
			

			//$sql .= " ON DELETE CASCADE ON UPDATE CASCADE ";
			//echo $sql;
			$resultado = $conexion->query( $sql );

			//Si se creó el objeto, el sistema cargará los datos pertienentes del informe.
			if( $objeto_verificador->  verificar_existencia_objeto( $tmp_nombre_objeto_o_tabla, $_GET[ 'servidor' ], $_GET[ 'usuario' ], $_GET[ 'contrasena' ], $_GET[ 'bd' ], $imprimir_mensajes_prueba ) == 1 )
			{
				$cadena_informe_instalacion .= "<br>La restricción $tmp_nombre_objeto_o_tabla4 se ha creado con éxito.";	

			}else{
					$cadena_informe_instalacion .= "<br>Error: La restricción $tmp_nombre_objeto_o_tabla4 no se ha creado. ".$mensaje1;	
					$interrupcion_proceso = 1;
				}
		}
		////////////////////////////////////

		
		if( $interrupcion_proceso == 0 )
		{
			//ojo aquí se usa la clase verificadora para imprimir lo que se ha creado.
			echo $objeto_verificador->mostrar_tablas( $conexion ); //Hay que recordar que la conexión ya se creó arriba.

			echo "Se han creado ".$objeto_verificador->mostrar_tablas( $conexion, 3 )." tablas de ".NUMERO_DE_TABLAS." que se deb&iacute;an crear.  ";
			
			echo "<br><br>";
			echo "<a href='borrando_archivos.php' target='_self'>Proceder a borrar archivos de intalaci&oacute;n</a>";
			echo "<br><br>";
		}
		
		echo $cadena_informe_instalacion; //Se imprime un sencillo informe de la instalación.

	}else{ 									// Super if - else 
			echo "<br>Por favor ingresa el valor de los campos solicitados: Servidor, usuario, base de datos.<br>";
		} 									// Super if - final

	
?>
