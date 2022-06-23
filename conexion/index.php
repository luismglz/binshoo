<?php

 $usuario    = "root";
 $contrasena = "hola123";

	
	/*$usuario    = "lgonzalezadm";
	$contrasena = "6w?\$Ds7]pNnF4[Q*13";
*/
	try{
    	$conn = new PDO('mysql:host=localhost;dbname=lgonzalez', $usuario, $contrasena);
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 	}
		catch(PDOException $e)
			{
    			echo "ERROR: " . $e->getMessage();
			}
