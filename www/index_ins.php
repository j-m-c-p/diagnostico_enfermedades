
<?php

	/**
	*	Autor:Jhonnatan cubides - Harley Santoyo
	*	Primer archivo del sitio para la instalación del aplicativo, 
	*	mostrará el proceso de instalación que finalmente llevará a la pantalla de inicio del aplicativo de diagnóstico de enfermedades.
	*/
	
	if( file_exists( "instalador.php" ) == true )
	{
		//echo "El archivo de configuración existe, se procederá a ir al sitio.";
		header( "location: instalador.php" );
	
	}else{
			//echo "El archivo no existe, se proceder&aacute; a ir al instalador.";
			header( "location: index.php" );
		}

?>
