<?php 
	/*
	* 
	* Autores: Jhonnatan Cubides, Harley Santoyo
	* 
	*/

	/**
	*Esta clase contiene todas la funciones  
	*/
	include ('class/Verificador.php');/* se incluye la clase verificador. */

	class Graficos extends Verificador

	{
			/**
			*esta función contiene el link de la libreria de bootstrap. 
			*@return 		caracteres 		retorna estilos de bootstrap.
			*/
			function estilos($carpeta=null)
			{
				$salida="";
				$salida=" <link rel='stylesheet'  href='css/bootstrap.min.css'>";
						 
				return $salida;		 
			}

			/**
			*esta función contiene el encabezado de la página. 
			*@return 		caracteres 		retorna el encabezado.
			*/
			function encabezado()
			{
				$salida="";
				$salida="<img class='img img-responsive' src='imagenes/encabezado.png'>";
				return $salida;
			}
			/**
			*esta función nos envia a un formulario de busqueda. 
			*@return 		caracteres 		icono de ayuda.
			*/
			function ayuda()
			{
				$salida="";
				$salida="<a href='ayuda.php'><img src='imagenes/help.png' align='right'></a>";
				return $salida;
			}
			/**
			*esta función nos permite dirijirnos al index. 
			*@return 		caracteres 		icono de inicio.
			*/
			function inicio()
			{
				$salida="";
				$salida="<a href='index.php'><img src='imagenes/inicio.png' align='right' class='img img-responsive'></a>";
				return $salida;
			}

	}
?>
