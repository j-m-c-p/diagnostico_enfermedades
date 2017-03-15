<!--
* 
* versión: 1.0 
* autores: Jhonnatan cubides, Harley santoyo
-->
<!DOCTYPE html>
<html ng-app="acumuladorApp"><!--Hay que observar que aquí se inicia el ng-app-->
    <head>
        <title>Ej de AngularJS</title>
        <script type="text/javascript" src="js/angular.min.js"></script><!--En esta linea realizamos la conexion con el angular sin esto no nos funciona. -->
    </head>
    <body>
        
        <div ng-controller="acumuladorAppCtrl"><!--Super importante el controlador aquí-->
            
           <!-- en esta linea traemos la información de una tabla de determinados campos en un select. -->
            <?php echo $obj_o->traer_lista_informacion( "sintomas[] ", "tb_signos_y_sintomas","id_signos", "signos_y_sintomas"); ?>

            
           
            <br>
            <label>Diagn&oacute;stico:</label>
            <br>
             
                
            <div ng-repeat="x in campos">
            
              <div class='table-responsive' >
            
                <table class='table table-hover' border='2px'>
                    <tr tr class='success'> 
                   
                        <th>Enfermedad:</th>
                        <th>Sintomas Encontrados:</th>
                        <th>Sintomas en total</th>
                    </tr> 
                 
                    <tr>
                        <td>{{ x.Enfermedad }}</td>  
                        <td>{{ x.conteo_sintomas }}</td>   
                        <td>{{ x.conteo_total }}</td> 
                    </tr>   
                    
                  

                </table> 
                {{ x.a }}
              </div>
            </div> 
               


        </div>
        
        <!-- Aquí se incluye el otro archivo js para probar que el código se puede colocar en otro archivo  -->
        <script type="text/javascript" src="js/ayudante.js"></script>
        
        <script type="text/javascript" >
            
            var acumuladorApp = angular.module( 'acumuladorApp', [] );
            
            acumuladorApp.controller( "acumuladorAppCtrl",
                
                //[ "$scope",  //Originalmente solo se minificaba el scope.
                [ "$scope", "$http", //Esto es para minificar, pero interfiere con lo de php, hay que minificar las otras variables.
                 
                    function( $scope, $http )
                    {
                    
                        
                        
                        /**
                         * Esta función se activa al usar el texto 2.
                         */
                        $scope.cargar_datos_php = function()
                        {
                                var lista= document.getElementById('datos');
                                console.log(lista.length );
                                var sintomas="";


                                for (var i = 0 ; i < lista.length ; i++) 
                                {
                                    if (lista.item(i).selected ) {
                                        if (sintomas == ""){ 
                                            sintomas +=lista.item(i).value;
                                        }else{
                                            sintomas +="," +lista.item(i).value;
                                        }
                                    }
                                }
                                var cad2 = sintomas;
                                console.log(cad2);
                            
                                if( cad2.length > 0 )
                                {
                                    console.log("Cadena" + cad2);
                                    //Aquí se hace el llamado a un php con conexión a MySQL.
                                    $http.get( 'llamado-php.php?cadena=' + cad2 ).success
                                    (
                                        function( response ) 
                                        { 
                                            console.log( response );
                                            $scope.campos = response.records;            
                                        }
                                    );   
                                }                    
                        }
                    }
                ] //Si se minifica, se deben minificar todas las llamadas inyecciones, de lo contrario mejor no minifique nada.
            );

            
            
        </script>


    </body>
</html>


