<?php 

/**
* 
* @versión: 1.0  
* @autores: Jhonnatan cubides, Harley santoyo
*/

/**
*Esta clase contiene todas la funciones  
*/
class Graficos

{
		/**
		*esta función contiene el link de la libreria de bootstrap. 
		*
		*/
		function estilos($carpeta=null)
			{
				$salida="";
				$salida=" <link rel='stylesheet'  href='css/bootstrap/bootstrap.min.css'>";
						 
				return $salida;		 
			}
				/**
			* Esta función se encarga de retornar el encabezado.
			*
			*/
		function encabezado()
			{
				$salida="";
				$salida="<img class='img img-responsive' src='imagenes/encabezado.png'>";
				return $salida;
			}

		function ayuda()
			{
				$salida="";
				$salida="<a href='ayuda.php'><img src='imagenes/help.png' align='right'></a>";
				return $salida;
			}
		function inicio()
			{
				$salida="";
				$salida="<a href='index.php'><img src='imagenes/inicio.png' align='right' class='img img-responsive'></a>";
				return $salida;
			}

}
