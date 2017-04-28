<?php
	/*
	* Autores: Jhonnatan Cubides, Harley Santoyo
	* Este archivo se encarga de insertar la información en las tablas mencionadas a continuación.
	*/

	$sql_i="INSERT INTO `tb_manuales` (`id_manual`, `titulo`, `definicion`, `url`, `claves`) VALUES
	(1, 'Modelo entidad relación', 'Es una herramienta para el modelado de datos que permite representar las entidades relevantes de un sistema de información así como sus interrelaciones y propiedades.', 'imagenes/modelo.JPG', 'base de datos, manual técnico, ayuda, uml'),
	(2, 'casos de uso', 'En el Lenguaje de Modelado Unificado, un diagrama de casos de uso es una forma de diagrama de comportamiento UML mejorado. El Lenguaje de Modelado Unificado (UML), define una notación gráfica para representar casos de uso llamada modelo de casos de uso.', 'imagenes/caaa.JPG', 'manual técnico, ayuda, uml'),
	(3, 'Clases del proyecto', 'Es un tipo de diagrama de estructura estática que describe la estructura de un sistema demostrando las clases del sistema, sus atributos, operaciones y las relaciones entre los objetos.', 'imagenes/img2.JPG', 'manual técnico, ayuda, uml'),
	(4, 'diagrama de componentes', 'Es un diagrama tipo del lenguaje unificado de modelado. Representa cómo un sistema de software es dividido en componentes y muestra las dependencias entre estos componentes.', 'imagenes/diagrama_componentes.JPG', 'manual técnico, ayuda, uml'),
	(5, 'Diagrama de casos de uso', 'Define una notación gráfica para representar casos de uso llamada modelo de casos de uso.', 'imagenes/diagrama_casosdeuso.JPG', 'manual técnico, ayuda, uml'),
	(6, 'Diagrama de distribución', 'Es donde representamos la estructura de hardware donde estará nuestro sistema o software, para ello cada componente lo podemos representar como nodos, el nodo es cualquier elemento que sea un recurso de hardware, es decir, es nuestra denominación genérica para nuestros equipos.', 'imagenes/diagrama_de_distribucion.JPG', 'manual técnico, ayuda, uml');";
	
	$sql_e="INSERT INTO `tb_enfermedades` (`id_enfermedades`, `enfermedad`) VALUES
	(1, 'anaplasmosis'),
	(2, 'Rabia'),
	(3, 'Carbon'),
	(4, 'Sida'),
	(5, 'Gonorrea'),
	(6, 'Cifilis');";

	$sql_r="INSERT INTO `tb_resultados` (`id_resultados`, `id_signos`, `id_enfermedades`, `fecha_resultado`) VALUES
	(1, 2, 3, '2017-03-16'),
	(2, 1, 2, '2017-03-21'),
	(3, 3, 1, '2017-03-14'),
	(4, 5, 4, '2017-03-16'),
	(5, 4, 6, '2017-03-20'),
	(6, 6, 5, '2017-01-25'),
	(7, 7, 1, '2017-03-02'),
	(8, 2, 5, '2017-03-07'),
	(9, 1, 6, '2017-03-30'),
	(10, 3, 4, '2017-04-13'),
	(11, 5, 1, '2017-03-27'),
	(12, 4, 3, '2017-01-17'),
	(13, 7, 2, '2017-03-29'),
	(14, 3, 5, '2017-01-18');";

	$sql_s="INSERT INTO `tb_signos_y_sintomas` (`id_signos`, `signos_y_sintomas`) VALUES
	(1, 'Polidipsia'),
	(2, 'Anorexia\r\n'),
	(3, 'Jadeo\r\n'),
	(4, 'Perdida de peso\r\n'),
	(5, 'anemia'),
	(6, 'fiebre'),
	(7, 'gripe');";




	





?>
