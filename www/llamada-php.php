<?php

    /**
     *autores: Jhonnatan Cubides - Harley Santoyo
     * Este php me permite usar el poder del php con un ejemplo de la tecnología AngularJS...
     * incluso desde el administrador de este sitio.
     */

    






    if( isset( $_GET[ 'cadena' ] ) )
    {     
        include( "config.php" );
        
        /*Esta conexión se realiza para la prueba con angularjs*/
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        
    

        $conn = new mysqli( $servidor, $usuario, $clave, $bd );

        
        //Se busca principalmente por alias.
        $sql = "SELECT tb_enfermedades.enfermedad , COUNT(tb_resultados.id_enfermedades) as conteo_sintomas , (SELECT COUNT(tb_resultados.id_enfermedades) conteo_total FROM tb_resultados where tb_enfermedades.id_enfermedades = tb_resultados.id_enfermedades GROUP BY id_enfermedades) as conteo_total FROM tb_resultados , tb_enfermedades WHERE tb_resultados.id_enfermedades = tb_enfermedades.id_enfermedades AND tb_resultados.id_signos in(".$_GET[ 'cadena' ].") GROUP BY tb_resultados.id_enfermedades";

            //echo $sql;
        //LA tabla que se cree debe tener la tabla aquí requerida, y los campos requeridos abajo.
        $result = $conn->query( $sql );
        //echo $result;
        $outp = "";

        
        while($rs = $result->fetch_array( MYSQLI_ASSOC )) 
        {
            //Mucho cuidado con esta sintaxis, hay una gran probabilidad de fallo con cualquier elemento que falte.
            if ($outp != "") {$outp .= ",";}

            $outp .= '{"Enfermedad":"'.$rs["enfermedad"].'",';            // <-- La tabla MySQL debe tener este campo.
            $outp .= '"a":"'.$sql.'",';
            $outp .= '"conteo_sintomas":"'.$rs["conteo_sintomas"].'",';         // <-- La tabla MySQL debe tener este campo.
            $outp .= '"conteo_total":"'.$rs["conteo_total"].'"}';     // <-- La tabla MySQL debe tener este campo.
        }
        
        $outp ='{"records":['.$outp.']}';
        $conn->close();
        
        echo($outp);
    
    }

    
?> 
