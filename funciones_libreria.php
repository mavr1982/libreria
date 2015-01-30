<?php
 function disponibilidad ($cantidad)
 {
 	$stock=$cantidad;
 	$resp="";
 	
 	if ($stock>0)
 	{
 		//echo "En stock";
 		$resp = "En stock";
 	}
 	else 
 	{
 		//echo "Producto agotado";
 		
 		$resp = "Producto agotado";
 	}
 	return $resp;
  }