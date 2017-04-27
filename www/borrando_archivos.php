<?php

    /**
    * Autores: Jhonnatan Cubides - Harley Santoyo
    * Este código borra los archivos de la instalación y redirige al sitio. 
    */

    include( "class/Verificador.php" );//se incluye la clase verificador 
    $objeto_verificador = new Verificador();//se nombra una variable para crear un nuevo objeto.

    $objeto_verificador->borrar_archivo( "instalador.php" );//Con  esta linea de código el archivo instalador.php se elimina.
    $objeto_verificador->borrar_archivo( "instalando.php" );//Con  esta linea de código el archivo instalando.php se elimina.
    header( "location: index.php" );//luego de que se eliminen los archivos nos direcciona a index.php.
?>
